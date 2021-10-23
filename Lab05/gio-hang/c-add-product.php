<?php

require_once __DIR__ . '/../Models/Cart.php';
require_once __DIR__ . '/../Models/CartItem.php';

$cart_model = new Cart();

$product_id = $_POST['product_id'];
$so_luong = 1;

if (isset($_POST['soluong'])) {
    $so_luong = $_POST['soluong'];
}

$cart_item = new CartItem($product_id, $so_luong);
$cart_model->add($cart_item);

header('Location: index.php');