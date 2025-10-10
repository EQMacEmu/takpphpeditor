<?php
session_start();
require_once("config.php");
require_once("lib/logging.php");
require_once("classes/database.php");

try {
    global $dbhost;
    global $dbuser;
    global $dbpass;
    global $db;
    global $dbport;
    // Test 1: Database without logger (falls back to global logSQL)
    $database = new Database($dbhost, $dbuser, $dbpass, $db, $dbport);
    echo "✓ Database connected without logger\n";

    // Test 2: Database with logger
    $logger = new Logger();
    $database2 = new Database($dbhost, $dbuser, $dbpass, $db, $dbport, $logger);
    echo "✓ Database connected with logger\n";

    // Test 3: Simple query
    $result = $database->fetchAssoc("SELECT 1 as test");
    echo "✓ Query executed: " . $result['test'] . "\n";

    echo "\nAll tests passed!\n";

} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
}