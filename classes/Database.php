<?php

/**
 * Secure MySQL Database Wrapper using Prepared Statements
 * PHP 8.2+ compatible
 */
class Database extends mysqli
{
    // Store an optional logger object instead of relying on global logSQL() function
    private ?object $logger;

    /**
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
     * @throws Exception on database errors (bad syntax, missing table/column, etc...)
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
     * @param string $types Type string
     * @return array|null Single row or null
     * @throws Exception on database errors
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
     * @param string $types Type string
     * @return array Array of rows
     * @throws Exception on database errors
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
     */
    public function lastInsertId(): int {
        return $this->insert_id;
    }

    /**
     * Get number of affected rows from last query
     */
    public function affectedRows(): int {
        return $this->affected_rows;
    }

    /**
     * Begin a transaction
     */
    public function beginTransaction(): bool {
        return $this->begin_transaction();
    }

    /**
     * Commit a transaction
     */
    public function commitTransaction(): bool {
        return $this->commit();
    }

    /**
     * Rollback a transaction
     */
    public function rollbackTransaction(): bool {
        return $this->rollback();
    }

    /**
     * Log successful queries
     * @param string $query The SQL query that was executed
     * @param array $params The parameters that were bound to the query
     * @return void
     */
    private function log(string $query, array $params = []): void {
        if ($this->logger && method_exists($this->logger, 'logSQL')) {
            $paramStr = empty($params) ? '' : ' [' . implode(', ', $params) . ']';
            $this->logger->logSQL($query, $paramStr);
        }
    }

    /**
     * Log database errors
     *
     * @param string $query The SQL query that failed
     * @param string $error The error message from MySQL
     * @return void
     */
    private function logError(string $query, string $error): void {
        if ($this->logger && method_exists($this->logger, 'logSQL')) {
            $this->logger->logSQL("Error: $query - $error");
        }
    }

}
