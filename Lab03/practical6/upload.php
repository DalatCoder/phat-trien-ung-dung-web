<?php
$target_dir = __DIR__ . "/uploads/";
$target_file = $target_dir . basename($_FILES["tap_tin_cua_toi"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size, 500Kb
if ($_FILES["tap_tin_cua_toi"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "zip") {
    echo "Sorry, only docx file is accepted";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["tap_tin_cua_toi"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["tap_tin_cua_toi"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>