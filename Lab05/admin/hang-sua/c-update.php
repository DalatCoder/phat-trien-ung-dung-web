<?php

if (!isset($_POST['submit'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../../Models/HangSua.php';

$model = new HangSua();

$id = $_POST['id'];
$sku = $_POST['sku'];
$ten = $_POST['ten'];
$email = $_POST['email'];
$sdt = $_POST['sdt'];
$diachi = $_POST['diachi'];

$model = new HangSua();

$model->save([
    HangSua::COL_PRIMARY_KEY => $id,
    HangSua::COL_SKU => $sku,
    HangSua::COL_TEN_HANG => $ten,
    HangSua::COL_EMAIL => $email,
    HangSua::COL_DIEN_THOAI => $sdt,
    HangSua::COL_DIA_CHI => $diachi
]);

header('Location: index.php');
