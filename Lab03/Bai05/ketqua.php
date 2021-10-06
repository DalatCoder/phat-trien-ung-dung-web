<?php
session_start();

$files = [];
$size = 100;

if (isset($_SESSION['files'])) {
    $files = $_SESSION['files'];
}

if (isset($_SESSION['size'])) {
    $size = $_SESSION['size'];
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Lab 03 - Bài 05</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="d-flex flex-wrap mb-5">
            <?php foreach ($files as $file): ?>
            
            <div class="m-2">
                <img src="<?php echo $file ?>" alt="" width="<?php echo $size; ?>">
            </div>

            <?php endforeach; ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col">
            <a href="index.php" class="btn btn-primary">Quay lai trang chu</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
