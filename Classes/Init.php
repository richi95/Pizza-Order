<?php

namespace classes;

class Init
{
    function __construct()
    {
        session_start();
        ini_set("display_errors", 0);
        $dbconfig = parse_ini_file(".env");
        
        $this->host = $dbconfig["DB_HOST"];
        $this->username = $dbconfig["DB_USERNAME"];
        $this->password = $dbconfig["DB_PASSWORD"];
        $this->database = $dbconfig["DB_DATABASE"];
    }

    function db_connection()
    {
        $connection = mysqli_connect( $this->host, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        return $connection;
    }
}
