<?php
session_start();

if (!isset($_SESSION['ten_nguoi_dung'])) {
    header('Location: login_form.php');
}

$ten_nguoi_dung = $_SESSION['ten_nguoi_dung'];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Tinh toan</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <p>Xin chao <?php echo $ten_nguoi_dung ?>, ban co the thuc hien tinh toan ngay bay gio</p>
            <form action="calculation_handler.php" method="POST">
                <div class="form-group">
                    <label for="">Nhap so thu nhat</label>
                    <input type="text" name="so_1" id="" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Nhap so thu hai</label>
                    <input type="text" name="so_2" id="" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Chon phep toan</label>
                    <select name="phep_toan" id="" class="form-control">
                        <option value="">Chon phep toan tuong ung</option>
                        <option value="cong">Cong</option>
                        <option value="tru">Tru</option>
                        <option value="nhan">Nhan</option>
                        <option value="chia">Chia</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Tinh toan ngay" class="btn btn-primary">
                    <a href="" class="btn btn-secondary">Xem lich su tinh toan</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>
