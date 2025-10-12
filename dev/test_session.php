<?php

/**
 * Manual test script for refactored session.php authentication
 * Tests ONLY the session class methods, not the full web flow
 */

// Manually start session for testing
session_start();

require_once("../config.php");
require_once("../lib/logging.php");
require_once("../classes/Database.php");

// Declare globals
global $dbhost, $dbuser, $dbpass, $db, $dbport;

// Initialize database
global $database;
try {
    $database = new Database($dbhost, $dbuser, $dbpass, $db, $dbport, new Logger());
    echo "✓ Database connected\n\n";
} catch (Exception $e) {
    die("✗ Database connection failed: " . $e->getMessage() . "\n");
}

// Define getIP() function (needed by login method)
function getIP()
{
    return '127.0.0.1';
}

// Include only the session CLASS, not the whole file
// Copy just the class definition without the bottom code
class session
{
    public static function start(): void
    {
        global $SessionTimeout;
        $SessionTimeout = $SessionTimeout ?? 604800;
        ini_set('session.gc_maxlifetime', $SessionTimeout);
        ini_set('session.gc_probability', 1);
        session_set_cookie_params($SessionTimeout);
        session_start();
    }

    public static function login($login, $pw): void
    {
        global $database;

        $logger = new Logger();

        try {
            $result = $database->fetchAssoc(
                "SELECT password FROM peq_admin WHERE login = ?",
                [$login],
                's'
            );

            if (empty($result)) {
                $_SESSION['error'] = 1;
                $logger->logSQL("Invalid login attempt. Bad username from IP: '" . getIP() . "'. Username: '$login' Password: '$pw'.");
                return;
            }

            $password = $result['password'];

            if ($password == md5($pw)) {
                $_SESSION['login'] = $login;
                $_SESSION['password'] = md5($pw);
            } else {
                $_SESSION['error'] = 1;
                $logger->logSQL("Invalid login attempt. Bad password from IP: '" . getIP() . "'. Username: '$login' Password: '$pw'.");
            }
        } catch (Exception $e) {
            error_log("Login error: " . $e->getMessage());
            $_SESSION['error'] = 1;
        }
    }

    public static function validate_credentials(): bool
    {
        global $database;

        if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
            return false;
        }

        $login = $_SESSION['login'];
        $pw = $_SESSION['password'];

        try {
            $result = $database->fetchAssoc(
                "SELECT password FROM peq_admin WHERE login = ?",
                [$login],
                's'
            );

            if (empty($result)) {
                return false;
            }

            return $result['password'] == $pw;
        } catch (Exception $e) {
            error_log("Validation error: " . $e->getMessage());
            return false;
        }
    }

    public static function logged_in(): bool
    {
        if (isset($_SESSION['guest']) && $_SESSION['guest'] == 1) {
            return true;
        }

        return self::validate_credentials();
    }

    public static function check_authorization(): bool
    {
        if (isset($_SESSION['guest']) && $_SESSION['guest'] == 1) {
            return false;
        }

        return self::validate_credentials();
    }

    public static function is_admin(): bool
    {
        global $database;

        if (isset($_SESSION['guest']) && $_SESSION['guest'] == 1) {
            return false;
        }

        if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
            return false;
        }

        $login = $_SESSION['login'];

        try {
            $result = $database->fetchAssoc(
                "SELECT administrator FROM peq_admin WHERE login = ?",
                [$login],
                's'
            );

            if (empty($result)) {
                return false;
            }

            return $result['administrator'] == 1;
        } catch (Exception $e) {
            error_log("Admin check error: " . $e->getMessage());
            return false;
        }
    }

    public static function stop(): void
    {
        session_unset();
        session_destroy();
    }
}

echo "=== Session Authentication Tests ===\n\n";

// Test 1: Valid credentials
echo "Test 1: Valid login credentials\n";
echo "Enter valid username: ";
$valid_user = trim(fgets(STDIN));
echo "Enter valid password: ";
$valid_pass = trim(fgets(STDIN));

session::login($valid_user, $valid_pass);
if (isset($_SESSION['login']) && $_SESSION['login'] === $valid_user) {
    echo "✓ Valid login successful\n";
    echo "  Session login: " . $_SESSION['login'] . "\n";
} else {
    echo "✗ Valid login failed\n";
}
echo "\n";

// Clear session for next test
unset($_SESSION['login']);
unset($_SESSION['password']);
unset($_SESSION['error']);

// Test 2: Invalid username
echo "Test 2: Invalid username\n";
session::login('nonexistent_user_xyz', 'password123');
if (isset($_SESSION['error']) && $_SESSION['error'] === 1) {
    echo "✓ Invalid username correctly rejected\n";
} else {
    echo "✗ Invalid username should set error flag\n";
}
unset($_SESSION['error']);
echo "\n";

// Test 3: Invalid password (use real username from Test 1)
echo "Test 3: Invalid password\n";
session::login($valid_user, 'wrong_password_xyz');
if (isset($_SESSION['error']) && $_SESSION['error'] === 1) {
    echo "✓ Invalid password correctly rejected\n";
} else {
    echo "✗ Invalid password should set error flag\n";
}
unset($_SESSION['error']);
echo "\n";

// Test 4: SQL injection attempts
echo "Test 4: SQL injection attempts\n";
$injection_attempts = [
    'admin" OR "1"="1',
    "admin' OR '1'='1",
    '" OR 1=1--',
    "'; DROP TABLE peq_admin; --",
    "1' UNION SELECT * FROM peq_admin--"
];

$all_blocked = true;
foreach ($injection_attempts as $attempt) {
    session::login($attempt, 'password');
    if (isset($_SESSION['login'])) {
        echo "✗ SQL injection NOT blocked: $attempt\n";
        $all_blocked = false;
        unset($_SESSION['login']);
        unset($_SESSION['password']);
    }
    unset($_SESSION['error']);
}

if ($all_blocked) {
    echo "✓ All SQL injection attempts blocked\n";
}
echo "\n";

// Test 5: Session validation
echo "Test 5: Session validation\n";
$_SESSION['login'] = $valid_user;
$_SESSION['password'] = md5($valid_pass);

if (session::validate_credentials()) {
    echo "✓ Valid session correctly validated\n";
} else {
    echo "✗ Valid session should validate\n";
}

// Tamper with session
$_SESSION['password'] = 'tampered_hash';
if (!session::validate_credentials()) {
    echo "✓ Tampered session correctly rejected\n";
} else {
    echo "✗ Tampered session should be rejected\n";
}
echo "\n";

// Test 6: Admin check
echo "Test 6: Admin privileges check\n";
$_SESSION['login'] = $valid_user;
$_SESSION['password'] = md5($valid_pass);

if (session::is_admin()) {
    echo "✓ User '$valid_user' is an admin\n";
} else {
    echo "ℹ User '$valid_user' is not an admin (expected if not admin account)\n";
}
echo "\n";

// Test 7: logged_in() function
echo "Test 7: logged_in() function\n";
$_SESSION['login'] = $valid_user;
$_SESSION['password'] = md5($valid_pass);

if (session::logged_in()) {
    echo "✓ logged_in() returns true for valid session\n";
} else {
    echo "✗ logged_in() should return true\n";
}

unset($_SESSION['login']);
unset($_SESSION['password']);

if (!session::logged_in()) {
    echo "✓ logged_in() returns false when logged out\n";
} else {
    echo "✗ logged_in() should return false\n";
}
echo "\n";

// Test 8: Guest mode
echo "Test 8: Guest mode\n";
$_SESSION['guest'] = 1;

if (session::logged_in()) {
    echo "✓ Guest mode allows access\n";
} else {
    echo "✗ Guest mode should allow access\n";
}

if (!session::check_authorization()) {
    echo "✓ Guest mode denied for authorization check\n";
} else {
    echo "✗ Guest should not have authorization\n";
}

if (!session::is_admin()) {
    echo "✓ Guest is not admin\n";
} else {
    echo "✗ Guest should not be admin\n";
}
echo "\n";

echo "=== All Tests Complete ===\n";
echo "\nCheck logs/sql_log_" . date("m-Y") . ".sql for logged queries\n";
