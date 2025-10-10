<?php

function logSQL ($query) {
  global $log_file, $logging, $logs_dir;
  $user = $_SESSION['login'] ?? '';

  if (isset($_SESSION['guest']) && ($_SESSION['guest'] == 1)) {
    $user = 'Guest';
  }
  if ($user == '') {
    $user = 'N/A';
  }

  if ($logging == 1) {
    checkLogDir();
    $time = date("(j-M-y  G:i:s)");
    if (!is_writable($log_file)) {
      $handle = fopen($log_file, 'w') or die("Could not create $log_file! Make sure the logs directory is writeable by your webserver.");
    }
    if (!$handle = fopen($log_file, 'a')) {
      echo "Unable to open the log file ($log_file)! Make sure the file is readable by your webserver.";
      exit;
    }
    if (!fwrite($handle, "$query; -- $user $time\r\n")) {
      echo "Could not write to the log file ($log_file)! Make sure the file is writeable by your webserver.";
      exit;
    }
    fclose($handle);
  }
}

function logPerl ($query) {
  global $perl_log_file, $logging, $logs_dir;
  $user = $_SESSION['login'];

  if (isset($_SESSION['guest']) && ($_SESSION['guest'] == 1)) {
    $user = 'Guest';
  }
  if ($user == '') {
    $user = 'N/A';
  }

  if ($logging == 1) {
    checkLogDir();
    $time = date("j-M-y  G:i:s");
    if (!is_writable($perl_log_file)) {
      $handle = fopen($perl_log_file, 'w') or die("Could not create $perl_log_file! Make sure the logs directory is writeable by your webserver.");
    }
    if (!$handle = fopen($perl_log_file, 'a')) {
      echo "Unable to open the log file ($perl_log_file)! Make sure the file is readable by your webserver.";
      exit;
    }
    if (!fwrite($handle, "$query ($user $time)\r\n")) {
      echo "Could not write to the log file ($perl_log_file)! Make sure the file is writeable by your webserver.";
      exit;
    }
    fclose($handle);
  }
}

function checkLogDir () {
  global $logs_dir;

  if (!file_exists($logs_dir)) {
    mkdir($logs_dir, 0755, true);
  }
}

/**
 * Query logger for database operations
 *
 * Logs SQL queries with user context and timestamps.
 * Respects configuration from config.php by default.
 *
 * @example
 * // Uses config.php settings
 * $logger = new Logger();
 *
 * @example
 * // Custom configuration
 * $logger = new Logger('/custom/path.log', '/logs', true);
 */
class Logger {
    private string $log_file;
    private string $logs_dir;
    private bool $logging;

    /**
     * @param string|null $logFile Path to log file (uses config.php if null)
     * @param string|null $logsDir Directory for logs (uses config.php if null)
     * @param bool|null $enableLogging Enable/disable logging (uses config.php if null)
     */
    public function __construct(?string $logFile = null, ?string $logsDir = null, ?bool $enableLogging = null) {
        // Read from config.php globals if not explicitly provided
        global $log_file, $logs_dir, $logging;

        $this->log_file = $logFile ?? $log_file ?? 'logs/sql_log_' . date("m-Y") . '.sql';
        $this->logs_dir = $logsDir ?? $logs_dir ?? 'logs';
        $this->logging = $enableLogging ?? $logging ?? 1;
    }

    public function logSQL(string $query): void {
        $user = $_SESSION['login'] ?? '';

        if (isset($_SESSION['guest']) && ($_SESSION['guest'] == 1)) {
            $user = 'Guest';
        }
        if ($user == '') {
            $user = 'N/A';
        }

        if ($this->logging == 1) {
            $this->checkLogDir();
            $time = date("(j-M-y  G:i:s)");

            if (!is_writable($this->log_file)) {
                $handle = fopen($this->log_file, 'w') or die("Could not create {$this->log_file}!");
            }

            if (!$handle = fopen($this->log_file, 'a')) {
                echo "Unable to open the log file ({$this->log_file})!";
                exit;
            }

            if (!fwrite($handle, "$query; -- $user $time\r\n")) {
                echo "Could not write to the log file ({$this->log_file})!";
                exit;
            }

            fclose($handle);
        }
    }

    private function checkLogDir(): void {
        if (!file_exists($this->logs_dir)) {
            mkdir($this->logs_dir, 0755, true);
        }
    }
}

?>