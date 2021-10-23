<?php

require_once __DIR__ . '/../Models/Authenticate.php';

$authenticate_model = new Authenticate();

$tendangnhap = $_POST['tendangnhap'];
$matkhau = $_POST['matkhau'];

$redirect_url = null;
if (isset($_POST['redirect_url'])) {
    $redirect_url = $_POST['redirect_url'];
}

$user = $authenticate_model->login($tendangnhap, $matkhau);

if (!$user) {
    header('Location: f-login.php');
}
else {
    if ($redirect_url) {
        header('Location: ' . $redirect_url);
    }
    else {
        header('Location: ../index.php');
    }
}

