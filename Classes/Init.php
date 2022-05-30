<?php

namespace classes;

class Init{
    function __construct()
    {
        session_start();

        print ini_set("display_errors",1);
    }

    function db_connection(){
        $connection = mysqli_connect('localhost', 'root', '12345', 'pizza_shop' );
        if (mysqli_connect_error()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }        
        return $connection;
    }
}