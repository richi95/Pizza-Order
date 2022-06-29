<?php

spl_autoload_register(function($file){
  require ("$file.php");
});

$init = new classes\Init;
$connection = $init->db_connection();

$resource = new classes\Controller($connection);

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  $url = 'render';
}else{
  $url = $_GET['action'];
}

// $url = $_GET['action']?? false ? $_GET['action'] : 'render';

$resource->$url();