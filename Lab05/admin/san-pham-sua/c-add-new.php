<?php

if (!isset($_POST['submit'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../../Models/SanPhamSua.php';

$item = $_POST;

$sku = $_POST['sku'];
$ten = $_POST['ten'];
$hangsua = $_POST['hangsua'];
$loaisua = $_POST['loaisua'];
$trongluong = $_POST['trongluong'];
$donvitinh = $_POST['donvitinh'];
$dinhduong = $_POST['dinhduong'];
$loiich = $_POST['loiich'];
$dongia = $_POST['dongia'];

$valid_types = ['image'];
$type = $_FILES['anh']['type'];

foreach ($valid_types as $valid_type) {
    if (strpos($type, $valid_type) < 0) {
        die('Tập tin không hợp lệ');
    }
}

if ($_FILES['anh']['error'] != 0) die('Lỗi xảy ra khi tải tập tin lên server');

$ten_anh_goc = $_FILES['anh']['name'];
$duong_dan_tam_thoi = $_FILES['anh']['tmp_name'];

$ten_anh_random = uniqid() . $ten_anh_goc;

$duong_dan_uploads = __DIR__ . '/../uploads/' . $ten_anh_random;

$success = move_uploaded_file($duong_dan_tam_thoi, $duong_dan_uploads);
if (!$success) die('Lỗi xảy ra khi tải tập tin lên server');

$model = new SanPhamSua();

$model->save([
    SanPhamSua::COL_TEN => $ten,
    SanPhamSua::COL_HANG_SUA => $hangsua,
    SanPhamSua::COL_LOAI_SUA => $loaisua,
    SanPhamSua::COL_TRONG_LUONG => $trongluong,
    SanPhamSua::COL_DON_GIA => $dongia,
    SanPhamSua::COL_THANH_PHAN => $dinhduong,
    SanPhamSua::COL_LOI_ICH => $loiich,
    SanPhamSua::COL_TEN_HINH_ANH_GOC => $ten_anh_goc,
    SanPhamSua::COL_TEN_HINH_ANH_SERVER => 'admin/uploads/' . $ten_anh_random,
    SanPhamSua::COL_DON_VI_TINH => $donvitinh,
    SanPhamSua::COL_SKU => $sku
]);

header('Location: index.php');
