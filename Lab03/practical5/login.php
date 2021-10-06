<?php
session_start();

$dia_chi_email = $_POST['diachiemail'];
$mat_khau_nguoi_dung = $_POST['matkhaunguoidung'];

// Kiem tra thong tin dang nhap
// Neu thong tin dang nhap hop le
$_SESSION['user_email'] = $dia_chi_email;

header('Location: home.php');
exit();

// Neu thong tin dang nhap khong hop
// header('location: index.php') => Kem voi ma loi

?>

