<?php

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

        // TODO: In Phase 6 (dependency injection) we'll inject one logger across everything
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

            $password = $result["password"];

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

        // return false if session credentials don't exist or don't match database, otherwise true
        return self::validate_credentials();
    }

    public static function check_authorization(): bool
    {
        if (isset($_SESSION['guest']) && $_SESSION['guest'] == 1) {
            return false;
        }

        // return false if session credentials don't exist or don't match database, otherwise true
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

session::start();

// Default to a more secure disabled if variable isn't set
$enable_guest_mode = $enable_guest_mode ?? 0;
$enable_user_login = $enable_user_login ?? 0;

// Handle logouts
if (isset($_GET['logout'])) {
    session::stop();
    header('Location: index.php');
    exit;
}

// Handle logins
if (isset($_GET['login'])) {
    if ($_GET['login'] == "guest") {
        $_SESSION['guest'] = $enable_guest_mode ? 1 : 0;
    }
    if ($enable_user_login != 1) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        logSQL("POSSIBLE HACK ATTEMPT. Person was from IP: '" . getIP() . "'. and used Username: '$login' Password: '$password'.");
        $_SESSION['error'] = 1;
    } else {
        $login = $_POST['login'] ?? "";
        $password = $_POST['password'] ?? "";
        session::login($login, $password);
    }
    header('Location: index.php');
    exit;
}

// Verify user is logged in
if (!session::logged_in()) {
    $body = new Template("templates/login.tmpl.php");
    $error = isset($_SESSION['error']) ? 1 : 0;

    // Safer to fail if not set
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    $tmpl = $tmpl ?? new Template;

    $body->set('enable_guest_mode', $enable_guest_mode);
    $body->set('enable_user_login', $enable_user_login);
    $body->set('error', $error);
    $body->set('login', $login);
    $body->set('password', $password);
    $tmpl->set('body', $body);
    echo $tmpl->fetch('templates/index.tmpl.php');
    unset($_SESSION['error']);
    exit;
}

// Get IP address
function getIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

?>
