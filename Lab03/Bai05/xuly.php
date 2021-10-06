<?php
session_start();

$dulieu = $_POST;

$folder_name = $_POST['folder_name'];
$image_size = $_POST['image_size'];

$folder_path = __DIR__ . '/uploads/' . $folder_name;
$files = scandir($folder_path);

$file_results = [];

for ($i = 2; $i < count($files); $i++) {
    array_push($file_results, 'uploads/' . $folder_name . '/' . $files[$i]);
}

$_SESSION['files'] = $file_results;
$_SESSION['size'] = $image_size;

header('Location: ketqua.php');
exit();