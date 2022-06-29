<?php

namespace classes;

use Models\Product;
use Waavi\Sanitizer\Sanitizer;

require './vendor/autoload.php';

class Controller extends Product
{
    // private $selectedCart;
    // private $shippingData;
    // private $billingData;

    public function __construct($connection){
        $this->connection = $connection;
        $this->result = $this->selectProduct();
    }

    public function back(){
        unset($_SESSION['errors']);
        if (isset($_SESSION['billing'])) {
            unset($_SESSION['billing']);
            $_SESSION['shipping'] = true;
            header('location: ' . $_SERVER['PHP_SELF']);
            return;
        }
        if (isset($_SESSION['summary'])) {
            unset($_SESSION['summary']);
            $_SESSION['billing'] = true;
            header('location: ' . $_SERVER['PHP_SELF']);
            return;
        }
        unset($_SESSION['shipping'], $_SESSION['selected_cart']);
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function search(){
        $search = $_POST['search'];
        $select_products = "SELECT id, name, price, image, size FROM products WHERE name like '%$search%'";
        $_SESSION['search'] = $select_products;
        header('location:' . $_SERVER['HTTP_REFERER']);
    }

    public function addcart(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }

        $_POST['price'] = (int)$_POST['price'];
        $_POST['pieces'] = (int)$_POST['pieces'];
        $_POST['price'] *= $_POST['pieces'];

        array_push($_SESSION['cart'], $_POST);
        header('location: ' . $_SERVER['PHP_SELF']);
    }

    public function cartbuy(){
        if (count($_SESSION['cart']) > 0) {

            $_SESSION['selected_cart'] = $_POST['allcart'];
            $this->selectedCart = $_SESSION['selected_cart'];

            $_SESSION['shipping'] = true;
            header('location:' . $_SERVER['HTTP_REFERER']);
        } else {
            header('location:' . $_SERVER['HTTP_REFERER']);
        }
    }
    
    public function shipping(){
        unset($_SESSION['old']);
        unset($_SESSION['errors']);
        $filters = [
            'shipping_name' => 'trim|escape|capitalize',
            'shipping_email' => 'trim|lowercase',
            'shipping_phone' => 'digit',
            'shipping_zip_code' => 'digit',
            'shipping_city' => 'trim|escape|capitalize',
            'shipping_postcode' => 'trim|escape|capitalize'
        ];
        $sanitizer = new Sanitizer($_POST, $filters);
        $sanitized = $sanitizer->sanitize();
        
        foreach ($sanitized as $key => $input) {
            if (empty($input)) {
                $_SESSION['errors'][$key] = 'Szükséges kitölteni!';
            } else {
                $_SESSION['old'][$key] = $input;
            }
        }
        if (!filter_var($sanitized['shipping_email'], FILTER_VALIDATE_EMAIL)) $_SESSION['errors']['shipping_email'] = 'Nem megfelelő formátum!';
        if (isset($_SESSION['errors'])) {
            header('location:' . $_SERVER['HTTP_REFERER']);
            return;
        }

        $_SESSION['shipping_data'] = $sanitized;
        $this->shippingData = $_SESSION['shipping_data'];
        unset($_SESSION['shipping']);
        $_SESSION['billing'] = true;
        header('location:' . $_SERVER['HTTP_REFERER']);
    }

    public function billing(){
        unset($_SESSION['old']);
        unset($_SESSION['errors']);
        $filters = [
            'billing_name' => 'trim|escape|capitalize',
            'billing_email' => 'trim|lowercase',
            'billing_phone' => 'digit',
            'billing_zip_code' => 'digit',
            'billing_city' => 'trim|escape|capitalize',
            'billing_postcode' => 'trim|escape|capitalize'
        ];
        $sanitizer = new Sanitizer($_POST, $filters);
        $sanitized = $sanitizer->sanitize();

        foreach ($sanitized as $key => $input) {
            if (empty($input)) {
                $_SESSION['errors'][$key] = 'Szükséges kitölteni!';
            } else {
                $_SESSION['old'][$key] = $input;
            }
        }
        if (!filter_var($sanitized['billing_email'], FILTER_VALIDATE_EMAIL)) $_SESSION['errors']['billing_email'] = 'Nem megfelelő formátum!';
        if( !isset($sanitized['payment'])) $_SESSION['errors']['payment'] = 'Válaszzon fizetési módot!';
        if (isset($_SESSION['errors'])) {
            header('location:' . $_SERVER['HTTP_REFERER']);
            return;
        }

        $_SESSION['billing_data'] = $sanitized;
        $this->billingData = $_SESSION['billing_data'];

        unset($_SESSION['billing']);
        $_SESSION['summary'] = true;
        header('location:' . $_SERVER['HTTP_REFERER']);
    }

    public function successOrder(){
        unset($_SESSION['selected_cart'], $_SESSION['cart']);
        $_SESSION['success'] = 'Sikeres rendelés!';
        header('location:' . $_SERVER['HTTP_REFERER']);
    }

    public function deletecart()
    {
        unset($_SESSION['cart'][$_POST['delete-item-key']]);
        if(count($_SESSION['cart']) == 0) session_destroy();
        header('location:' . $_SERVER['HTTP_REFERER']);
    }

    public function combineSummaryKeyData(array $array, array $session): array{
        if(count($session) > count($array)){
            array_pop($session);
        }
        return array_combine( $array, $session);
    }

    public function old($old)
    {
        if ($old) {
            return $old;
        } else {
            return;
        }
    }

    function render()
    {
        require "./views/main.php";
    }
}
