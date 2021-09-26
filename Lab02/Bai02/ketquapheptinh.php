<?php

if (!isset($_POST['submit'])) {
    header('location: pheptinh.php');
}

$pheptinh = $_POST['pheptinh'];
$so1 = $_POST['so_1'];
$so2 = $_POST['so_2'];

$ketqua = 0;
$nhan_phep_tinh = '';

if ($pheptinh == 'cong') {
    $ketqua = $so1 + $so2;
    $nhan_phep_tinh = 'Phep tinh cong';
}
else if ($pheptinh == 'tru') {
    $ketqua = $so1 - $so2;
    $nhan_phep_tinh = 'Phep tinh tru';
}
else if ($pheptinh == 'nhan') {
    $ketqua = $so1 * $so2;
    $nhan_phep_tinh = 'Phep tinh nhan';
}
else if ($pheptinh == 'chia') {
    $ketqua = $so1 / $so2;
    $nhan_phep_tinh = 'Phep tinh chia';
}
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
            <h1>PHEP TINH TREN HAI SO</h1>

            <div>
                <div class="form-group">
                    <label for=""><?php echo $nhan_phep_tinh; ?></label>
                </div>
                <div class="form-group">
                    <label for="">So thu nhat</label>
                    <input type="text" class="form-control" value="<?php echo $so1; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="">So thu hai</label>
                    <input type="text" class="form-control" value="<?php echo $so2; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="">Ket qua</label>
                    <input type="text" class="form-control" value="<?php echo $ketqua; ?>" disabled>
                </div>
                <hr>
                <div class="form-group">
                    <a href="pheptinh.php" class="btn btn-primary btn-block">Quay lai trang truoc</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>
