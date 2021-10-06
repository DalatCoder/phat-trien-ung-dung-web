<?php
session_start();

if (!isset($_SESSION['ten_nguoi_dung'])) {
    header('Location: login_form.php');
}

$ten_nguoi_dung = $_SESSION['ten_nguoi_dung'];

$danh_sach_ket_qua = $_SESSION['ket_qua_tinh_toan'];

function lay_toan_tu($phep_tinh) {
    if ($phep_tinh == 'cong') return '+';
    if ($phep_tinh == 'tru') return '-';
    if ($phep_tinh == 'nhan') return '*';
    if ($phep_tinh == 'chia') return '/';

    return '';
}

function lay_tinh_toan($so1, $so2, $pheptinh) {
    return $so1 . ' ' . lay_toan_tu($pheptinh) . ' '. $so2;
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Tong quan</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center my-5">Thong tin nguoi dung: <?php echo $ten_nguoi_dung ?></h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Phep toan</th>
                    <th scope="col">Ket qua</th>
                    <th scope="col">Thoi gian thuc hien</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($danh_sach_ket_qua as $index => $ket_qua) : ?>
                    <tr>
                        <th scope="row"><?php echo $index + 1 ?></th>
                        <td><?php echo lay_tinh_toan($ket_qua['so_1'], $ket_qua['so_2'], $ket_qua['phep_toan']) ?></td>
                        <td><?php echo $ket_qua['ket_qua'] ?></td>
                        <td><?php echo $ket_qua['thoi_gian'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="mt-5">
                <a href="calculation.php" class="btn btn-primary">Tinh toan tiep</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

</body>
</html>
