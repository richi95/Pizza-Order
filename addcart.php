<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if(isset($_POST)){
    $_POST['price'] = (int)$_POST['price'];
    $_POST['pieces'] = (int)$_POST['pieces'];
    $_POST['price'] *= $_POST['pieces'];
    
    array_push($_SESSION['cart'], $_POST);
}

header('location: '.$_SERVER['HTTP_REFERER']);
