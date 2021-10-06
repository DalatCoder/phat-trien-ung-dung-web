<?php
session_start();

$file = $_FILES;

$filename = $_FILES['image-file']['name'];
$filetype = $_FILES['image-file']['type'];
$filesize = $_FILES['image-file']['size'];

$valid_filetype = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif', 'image/webp'];

if (!in_array($filetype, $valid_filetype)) {
    $_SESSION['error'] = 'Dinh dang tap tin khong ho tro: ' . $filetype;
    header('Location: index.php');
    exit();
}

$_SESSION['filename'] = $filename;
$_SESSION['filetype'] = $filetype;
$_SESSION['filesize'] = $filesize;

header('Location: ketqua.php');
?>

