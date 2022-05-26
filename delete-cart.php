<?php
session_start();

if (isset($_POST['delete-item-key'])) {
    unset($_SESSION['cart'][$_POST['delete-item-key']]);

    header('location:' . $_SERVER['HTTP_REFERER']);
}
