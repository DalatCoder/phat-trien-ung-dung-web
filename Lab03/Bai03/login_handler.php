<?php
session_start();

if (!isset($_POST['ten_nguoi_dung'])) {
    header('Location: login_form.php');
}

$ten_nguoi_dung = $_POST['ten_nguoi_dung'];

$_SESSION['ten_nguoi_dung'] = $ten_nguoi_dung;

header('Location: calculation.php');