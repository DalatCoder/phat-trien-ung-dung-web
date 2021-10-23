<?php

if (!isset($_POST['submit'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../../Models/KhachHang.php';

$model = new KhachHang();

$id = $_POST['id'];
$ten = $_POST['ten'];
$gioitinh = $_POST['gioitinh'];
$diachi = $_POST['diachi'];
$sdt = $_POST['sdt'];
$email = $_POST['email'];
$tendangnhap = $_POST['tendangnhap'];
$matkhau = $_POST['matkhau'];
$loaitaikhoan = $_POST['loaitaikhoan'];

$model = new KhachHang();

$model->save([
    KhachHang::COL_PRIMARY_KEY => $id,
    KhachHang::COL_TEN => $ten,
    KhachHang::COL_GIOI_TINH => $gioitinh,
    KhachHang::COL_DIA_CHI => $diachi,
    KhachHang::COL_DIEN_THOAI => $sdt,
    KhachHang::COL_EMAIL => $email,
    KhachHang::COL_TEN_DANG_NHAP => $tendangnhap,
    KhachHang::COL_MAT_KHAU => $matkhau,
    KhachHang::COL_KIEU => $loaitaikhoan
]);

header('Location: index.php');
