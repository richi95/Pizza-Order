<?php

namespace classes;

use \Models\Product;

class Controller extends Product
{

    function __construct($connection)
    {
        $this->connection = $connection;
        $this->result = $this->selectProduct();
    }

    function search()
    {
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $select_products = "SELECT id, name, price, image, size FROM products WHERE name like '%$search%'";
            $_SESSION['search'] = $select_products;
            header('location:' . $_SERVER['HTTP_REFERER']);
        }
    }

    function addcart()
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_POST)) {
            $_POST['price'] = (int)$_POST['price'];
            $_POST['pieces'] = (int)$_POST['pieces'];
            $_POST['price'] *= $_POST['pieces'];

            array_push($_SESSION['cart'], $_POST);
        }

        header('location: ' . $_SERVER['HTTP_REFERER']);
    }

    function cartbuy(){
        if(count($_SESSION['cart'])>0){
            $_POST['allcart'];
            $_SESSION['buy'] = $_POST['allcart'];
            print_r($_SERVER['REQUEST_URI']);
            exit;
            header('location:'.$_SERVER['HTTP_REFERER']);
            //TODO:
        }
    }

    function deletecart()
    {
        if (isset($_POST['delete-item-key'])) {
            unset($_SESSION['cart'][$_POST['delete-item-key']]);

            header('location:' . $_SERVER['HTTP_REFERER']);
        }
    }

    function render()
    {
        require "./views/main.php";
    }
}
