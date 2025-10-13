<?php
/**
 * Secure MySQL Database Wrapper using Prepared Statements
 *
 *  PHP Version Requirements:
 *  - Minimum: PHP 7.4 (typed class properties)
 *  - Recommended: PHP 8.0+
 *  - Tested on: PHP 8.4
 *
 * Prevents SQL injection by using parameterized queries.
 * Supports dependency injection for logging.
 *
 * @example Basic usage
 * $db = new Database($host, $user, $pass, $dbname, $port);
 *
 * @example With logger
 * $logger = new Logger();
 * $db = new Database($host, $user, $pass, $dbname, $port, $logger);
 */
class Database extends mysqli
{
    // Store an optional logger object instead of relying on global logSQL() function
    private ?object $logger;

    /**
     * @param string $host Database host
     * @param string $username Database username
     * @param string $password Database password
     * @param string $database Database name
     * @param int $port Database port (default: 3306)
     * @param object|null $logger Optional logger instance (must have logSQL method)
     * @throws Exception on database connection error
     */
    public function __construct(
        string $host,
        string $username,
        string $password,
        string $database,
        int $port = 3306,
        ?object $logger = null
    ) {
        parent::__construct($host, $username, $password, $database, $port);

        if ($this->connect_error) {
            throw new Exception("Database connection failed: " . $this->connect_error);
        }

        $this->set_charset("utf8mb4");
        $this->logger = $logger;
    }

    /**
     * Prepare and execute a statement
     *
     * @param string $query SQL with ? placeholders
     * @param array $params Parameters to bind
     * @param string $types Type string (i=int, d=double, s=string, b=blob)
     * @return mysqli_stmt Executed statement
     * @throws Exception on database errors
     */
    private function executeStatement(string $query, array $params = [], string $types = ''): mysqli_stmt {
        $stmt = $this->prepare($query);

        if (!$stmt) {
            $this->logError($query, $this->error);
            throw new Exception("Query execution failed: " . $this->error);
        }

        if (!empty($params)) {
            if (empty($types)) {
                $types = str_repeat('s', count($params));
            }
            $stmt->bind_param($types, ...$params);
        }

        if (!$stmt->execute()) {
            $this->logError($query, $stmt->error);
            throw new Exception("Query execution failed: " . $this->error);
        }

        $this->log($query, $params);

        return $stmt;
    }

    /**
     * Execute a query without returning results (INSERT, UPDATE, DELETE)
     *
     * @param string $query SQL with ? placeholders
     * @param array $params Parameters to bind
     * @param string $types Type string (i=int, d=double, s=string, b=blob)
     * @return void Success implied by not throwing
     * @throws Exception on database errors
     *
     * @example Insert quest global
     *  $db->executeQuery(
     *      "INSERT INTO quest_globals (name, value, charid, npcid, zoneid) VALUES (?, ?, ?, ?, ?)",
     *      ['quest_complete', '1', 12345, 0, 0],
     *      'ssiii'
     *  );
     *
     * @example Update NPC stats
     *  $db->executeQuery(
     *      "UPDATE npc_types SET hp = ?, level = ? WHERE id = ?",
     *      [5000, 50, 1001],
     *      'iii'
     *  );
     *
     * @example Delete with transaction
     *  $db->beginTransaction();
     *  try {
     *      $db->executeQuery("DELETE FROM quest_globals WHERE charid = ?", [12345], 'i');
     *      $db->executeQuery("UPDATE character_data SET deleted_at = NOW() WHERE id = ?", [12345], 'i');
     *      $db->commitTransaction();
     *  } catch (Exception $e) {
     *      $db->rollbackTransaction();
     *      throw $e;
     *  }
     */
    public function executeQuery(string $query, array $params = [], string $types = ''): void {
        $stmt = $this->executeStatement($query, $params, $types);
        $stmt->close();
    }

    /**
     * Fetch a single row as associative array
     *
     * @param string $query SQL with ? placeholders
     * @param array $params Parameters to bind
     * @param string $types Type string (i=int, d=double, s=string, b=blob)
     * @return array|null Single row or null if no results found
     * @throws Exception on database errors
     *
     * @example Fetch admin user
     *  $user = $db->fetchAssoc(
     *      "SELECT * FROM peq_admin WHERE login = ?",
     *      [$username],
     *      's'
     *  );
     *  if ($user) {
     *      echo "Found admin: " . $user['login'];
     *  }
     *
     * @example Fetch NPC by ID
     *  $npc = $db->fetchAssoc(
     *      "SELECT name, level, hp, race, class FROM npc_types WHERE id = ?",
     *      [$npcid],
     *      'i'
     *  );
     */
    public function fetchAssoc(string $query, array $params = [], string $types = ''): ?array {
        $stmt = $this->executeStatement($query, $params, $types);
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        return $row;
    }

    /**
     * Fetch all rows as array of associative arrays
     *
     * @param string $query SQL with ? placeholders
     * @param array $params Parameters to bind
     * @param string $types Type string (i=int, d=double, s=string, b=blob)
     * @return array Array of rows (empty array if no results)
     * @throws Exception on database errors
     *
     * @example Fetch quest globals for a character
     *  $globals = $db->fetchAll(
     *      "SELECT * FROM quest_globals WHERE charid = ? AND zoneid = ?",
     *      [$charid, $zoneid],
     *      'ii'
     *  );
     *  foreach ($globals as $global) {
     *      echo $global['name'] . ': ' . $global['value'];
     *  }
     *
     * @example Fetch characters for account
     *  $characters = $db->fetchAll(
     *      "SELECT id, name, level, class, race FROM character_data WHERE account_id = ? ORDER BY name",
     *      [$acctid],
     *      'i'
     *  );
     */
    public function fetchAll(string $query, array $params = [], string $types = ''): array {
        $stmt = $this->executeStatement($query, $params, $types);
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $rows;
    }

    /**
     * Get the ID of the last inserted row
     *
     * @return int The auto-increment ID from last INSERT
     *
     * @example
     * $db->executeQuery("INSERT INTO users (name) VALUES (?)", ['John'], 's');
     * $userId = $db->lastInsertId();
     */
    public function lastInsertId(): int {
        return $this->insert_id;
    }

    /**
     * Get number of affected rows from last query
     *
     * Returns the number of rows affected by the last INSERT, UPDATE, DELETE, or SELECT query.
     * For SELECT statements, this is equivalent to the number of rows returned.
     *
     * @return int Number of affected rows, or -1 on error
     *
     * @example
     * $db->executeQuery("DELETE FROM cache WHERE expired = ?", [1], 'i');
     * echo "Deleted " . $db->affectedRows() . " rows";
     */
    public function affectedRows(): int {
        return $this->affected_rows;
    }

    /**
     * Begin a transaction
     *
     * Starts a new database transaction. All queries after this point will be
     * part of the transaction until commit() or rollback() is called.
     *
     * @return bool True on success, false on failure
     *
     * @example
     * $db->beginTransaction();
     * try {
     *     $db->executeQuery("UPDATE accounts SET balance = balance - ? WHERE id = ?", [100, 5], 'di');
     *     $db->executeQuery("UPDATE accounts SET balance = balance + ? WHERE id = ?", [100, 10], 'di');
     *     $db->commitTransaction();
     * } catch (Exception $e) {
     *     $db->rollbackTransaction();
     *     throw $e;
     * }
     */
    public function beginTransaction(): bool {
        return $this->begin_transaction();
    }

    /**
     * Commit a transaction
     *
     * Commits the current transaction, making all changes permanent.
     *
     * @return bool True on success, false on failure
     *
     * @example
     * $db->beginTransaction();
     * $db->executeQuery("INSERT INTO logs (message) VALUES (?)", ['Transaction started'], 's');
     * $db->commitTransaction(); // Changes are now permanent
     */
    public function commitTransaction(): bool {
        return $this->commit();
    }

    /**
     * Rollback a transaction
     *
     * Rolls back the current transaction, discarding all changes made since beginTransaction().
     * Typically used in error handling to undo partial changes.
     *
     * @return bool True on success, false on failure
     *
     * @example
     * $db->beginTransaction();
     * try {
     *     $db->executeQuery("DELETE FROM orders WHERE user_id = ?", [$userId], 'i');
     *     // Oops, realized we need to keep these
     *     $db->rollbackTransaction(); // Changes are undone
     * } catch (Exception $e) {
     *     $db->rollbackTransaction();
     * }
     */
    public function rollbackTransaction(): bool {
        return $this->rollback();
    }

    /**
     * Log successful queries
     * Supports both new Logger objects and old global function
     * @param string $query The SQL query that was executed
     * @param array $params The parameters that were bound to the query
     * @return void
     */
    private function log(string $query, array $params = []): void {
        $paramStr = empty($params) ? '' : ' [' . implode(', ', $params) . ']';
        $logMessage = $query . $paramStr;

        // New way: injected logger object
        if ($this->logger && method_exists($this->logger, 'logSQL')) {
            $this->logger->logSQL($logMessage);
        }
        // Old way: fallback to global function for backward compatibility
        elseif (function_exists('logSQL')) {
            logSQL($logMessage);
        }
    }

    /**
     * Log database errors
     * Supports both new Logger objects and old global function
     *
     * @param string $query The SQL query that failed
     * @param string $error The error message from MySQL
     * @return void
     */
    private function logError(string $query, string $error): void {
        $logMessage = "ERROR: $query - $error";

        // New way: injected logger object
        if ($this->logger && method_exists($this->logger, 'logSQL')) {
            $this->logger->logSQL($logMessage);
        }
        // Old way: fallback to global function for backward compatibility
        elseif (function_exists('logSQL')) {
            logSQL($logMessage);
        }
    }
}
