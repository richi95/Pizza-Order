<?php
namespace Models;

class Product{

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function selectProduct(){
        $select_products = "SELECT id, name, price, image, size FROM products";
        $result = $this->connection->query($select_products);
        return $result;
    }
}