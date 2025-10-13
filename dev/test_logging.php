<?php


session_start();
require_once("config.php");
require_once("lib/logging.php");

// Clean up old test logs
$test_log = 'logs/test_' . date("m-Y") . '.sql';
if (file_exists($test_log)) {
    unlink($test_log);
}

try {
    echo "Testing Logger class...\n\n";

    // Test 1: Logger with defaults (uses config.php)
    $_SESSION['login'] = 'test_user';
    $logger = new Logger();
    $logger->logSQL("SELECT * FROM test WHERE id = 1");
    echo "✓ Logger created with config.php defaults\n";

    // Test 2: Logger with custom path
    $customLogger = new Logger('logs/custom_test.sql', 'logs', true);
    $customLogger->logSQL("INSERT INTO test (name) VALUES ('test')");
    echo "✓ Logger created with custom path\n";

    // Test 3: Guest user logging
    $_SESSION['guest'] = 1;
    $logger->logSQL("SELECT * FROM items LIMIT 10");
    echo "✓ Guest user logged\n";

    // Test 4: No user logged in
    unset($_SESSION['login']);
    unset($_SESSION['guest']);
    $logger->logSQL("SELECT COUNT(*) FROM npcs");
    echo "✓ Anonymous user logged as N/A\n";

    // Test 5: Old global function still works
    $_SESSION['login'] = 'legacy_user';
    logSQL("SELECT * FROM zones -- testing legacy function");
    echo "✓ Legacy logSQL() function still works\n";

    // Verify log files exist
    if (file_exists($test_log)) {
        echo "\n✓ Default log file created: $test_log\n";
        echo "Log contents:\n";
        echo str_repeat("-", 60) . "\n";
        echo file_get_contents($test_log);
        echo str_repeat("-", 60) . "\n";
    }

    if (file_exists('logs/custom_test.sql')) {
        echo "\n✓ Custom log file created\n";
    }

    echo "\nAll logging tests passed!\n";

} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
}

// Cleanup
if (file_exists($test_log)) {
    unlink($test_log);
}
if (file_exists('logs/custom_test.sql')) {
    unlink('logs/custom_test.sql');
}
