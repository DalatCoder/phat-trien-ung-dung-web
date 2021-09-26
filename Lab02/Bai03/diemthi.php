<?php
if (!isset($_POST['submit'])) {
    header('location: index.php');
}

$diemtoan = $_POST['toan'];
$diemly = $_POST['ly'];
$diemhoa = $_POST['hoa'];
$diemchuan = $_POST['diemchuan'];

$tongdiem = $diemtoan + $diemly + $diemhoa;

$dau_hay_rot = $tongdiem >= $diemchuan ? 'Dau' : 'Rot';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header text-center">
                    KET QUA THI DAI HOC
                </div>
                <div class="card-body">
                    <form action="diemthi.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Toan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="toan" value="<?php echo $diemtoan ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ly</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="ly" value="<?php echo $diemly ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Hoa</label>
                            <input type="text" class="form-control" id="exampleInputPassword2" name="hoa" value="<?php echo $diemhoa ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">Diem Chuan</label>
                            <input type="text" class="form-control" id="exampleInputEmail2" name="diemchuan" value="<?php echo $diemchuan ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword3">Tong diem</label>
                            <input type="text" class="form-control" id="exampleInputPassword3" disabled value="<?php echo $tongdiem ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Ket qua thi</label>
                            <input type="text" class="form-control" id="exampleInputPassword4" disabled value="<?php echo $dau_hay_rot ?>" disabled>
                        </div>
                        <hr class="mb-3">
                        <a href="index.php" class="btn btn-primary btn-block">Quay lai trang truoc</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
<