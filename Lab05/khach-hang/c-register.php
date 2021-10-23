<?php

require_once __DIR__ . '/../Models/Authenticate.php';

$authenticate_model = new Authenticate();

$ten = $_POST['ten'];
$email = $_POST['email'];
$dienthoai = $_POST['dienthoai'];
$gioitinh = $_POST['gioitinh'];
$diachi = $_POST['diachi'];
$tendangnhap = $_POST['tendangnhap'];
$matkhau = $_POST['matkhau'];

$redirect_url = null;
if (isset($_POST['redirect_url'])) {
    $redirect_url = $_POST['redirect_url'];
}

$khach_hang_moi = [
    KhachHang::COL_TEN => $ten,
    KhachHang::COL_EMAIL => $email,
    KhachHang::COL_DIEN_THOAI => $dienthoai,
    KhachHang::COL_GIOI_TINH => $gioitinh,
    KhachHang::COL_DIA_CHI => $diachi,
    KhachHang::COL_TEN_DANG_NHAP => $tendangnhap,
    KhachHang::COL_MAT_KHAU => $matkhau,
    KhachHang::COL_KIEU => KhachHang::TYPE_USER
];

$authenticate_model->register($khach_hang_moi);

if ($redirect_url) {
    header('Location: ' . $redirect_url);
}
else {
    header('Location: ../index.php');
}
