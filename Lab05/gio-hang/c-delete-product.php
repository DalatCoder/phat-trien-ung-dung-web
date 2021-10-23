<?php

if (!isset($_GET['product_id'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../Models/Cart.php';
$cart_model = new Cart();

$product_id = $_GET['product_id'];

$cart_model->remove($product_id);

header('Location: index.php');