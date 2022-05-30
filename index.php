<?php

spl_autoload_register(function($file){
  require ("$file.php");
});

$init = new classes\Init;
$connection = $init->db_connection();

$page = new classes\Controller($connection);

$urlpage = $_GET["page"]??false ? $_GET["page"] : 'render';

$page->$urlpage();