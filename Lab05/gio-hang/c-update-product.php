<?php

require_once __DIR__ . '/../Models/CartItem.php';
require_once __DIR__ . '/../Models/Cart.php';

$cart_model = new Cart();

$product_id = $_POST['product_id'];
$soluong = $_POST['soluong'];

$cart_item = new CartItem($product_id, $soluong);
$cart_model->set_amount($cart_item, $soluong);

header('Location: index.php');