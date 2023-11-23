<?php

use JetBrains\PhpStorm\NoReturn;

class mysql extends mysqli
{

    public function __construct($host, $username, $password, $database, $port)
    {
        parent::__construct("$host", "$username", "$password", "$database", $port);
        if (mysqli_connect_error()) {
            die('Could not connect: ' . mysqli_connect_error());
        }
    }

    function query_no_result($query)
    {
        global $log_error;
        if (mysqli_query($this, quote_smart($query))) {
            logSQL($query);
            return true;
        } else {
            if ($log_error == 1) {
                logSQL($query . " - Error: " . mysqli_error($this));
            }
            die ($query . " - " . mysqli_error($this));
        }
    }

    function query_no_result_no_log($query)
    {
        global $log_error;
        if (mysqli_query($this, $query)) {
            return true;
        } else {
            if ($log_error == 1) {
                logSQL($query . " - Error: " . mysqli_error($this));
            }
            die ($query . " - " . mysqli_error($this));
        }
    }

    function query_assoc($query)
    {
        global $log_all, $log_error;
        if ($result = mysqli_query($this, quote_smart($query))) {
            $row = $result->fetch_assoc();
            if ($log_all == 1) {
                logSQL($query);
            }
            return ($row ?? '');
        }
        if ($log_error == 1) {
            logSQL($query . " - Error: " . mysqli_error($this));
        } else {
            die ($query . " - " . mysqli_error($this));
        }
        return '';
    }

    // Used to return multidimensional arrays
    function query_mult_assoc($query)
    {
        global $log_all, $log_error;
        if ($result = mysqli_query($this, quote_smart($query))) {
            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
            if ($log_all == 1) {
                logSQL($query);
            }
            return ($array ?? '');
        }
        if ($log_error == 1) {
            logSQL($query . " - Error: " . mysqli_error($this));
        } else {
            die ($query . " - " . mysqli_error($this));
        }
        return '';
    }

    #[NoReturn] function generate_insert_query($query): void
    {
        preg_match("/FROM (.*?) /i", $query, $matches);
        $table = $matches[1];

        preg_match("/WHERE (.*) LIMIT/i", $query, $matches);
        $where = $matches[1];

        $query2 = "SELECT * FROM " . $table . " WHERE " . $where;

        $row = mysql::query_assoc($query2);

        foreach ($row as $key => $value) {
            $values[] = "$key=\"$value\"";
        }
        $values2 = implode(", ", ($values ?? []));

        $insert = "INSERT INTO " . $table . " VALUES (" . $values2 . ")";

        echo "insert query: <br>$insert";

        exit;
    }

    function error($error): void
    {
        echo "Query failed:<br> $error<br><br>";
    }
}

$mysql = new mysql($dbhost ?? '', $dbuser ?? '', $dbpass ?? '', $db ?? '', $dbport ?? 3306);

// Quote variable to make safe
function quote_smart($value)
{

    // Deter UNION SQL Injection
    if (stripos($value, 'union all') || stripos($value, 'union select')) {
        logSQL("SQL injection monitored by user at IP: '" . getIP() . "' using the query: '" . $value . "'.");
        header("Location: index.php");
        exit;
    }

    return $value;
}

?>
