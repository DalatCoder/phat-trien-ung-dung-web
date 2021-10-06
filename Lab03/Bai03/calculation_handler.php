<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
session_start();

if (!isset($_SESSION['ten_nguoi_dung'])) {
    // Chua dang nhap => Chuyen vao trang login_form.php
    header('Location: login_form.php');
}

$ten_nguoi_dung = $_SESSION['ten_nguoi_dung'];

if (!isset($_POST['so_1'])) {
    echo 'So thu nhat khong hop le';
}

if (!isset($_POST['so_2'])) {
    echo 'So thu hai khong hop le';
}

if (!isset($_POST['phep_toan'])) {
    echo 'Phep toan khong hop le';
}

$so1 = $_POST['so_1'];
$so2 = $_POST['so_2'];
$pheptoan = $_POST['phep_toan'];

$ket_qua = 0;

if ($pheptoan == 'cong') {
    $ket_qua = $so1 + $so2;
} else if ($pheptoan == 'tru') {
    $ket_qua = $so1 - $so2;
} else if ($pheptoan == 'nhan') {
    $ket_qua = $so1 * $so2;
} else if ($pheptoan == 'chia') {
    $ket_qua = $so1 / $so2;
}

if (!isset($_SESSION['ket_qua_tinh_toan'])) {
    // Neu chua ton tai, thi khoi tao 1 mang rong
    $_SESSION['ket_qua_tinh_toan'] = [];
}

$ket_qua_tinh_toan = $_SESSION['ket_qua_tinh_toan'];

$tinh_toan_moi = [
    'so_1' => $so1,
    'so_2' => $so2,
    'phep_toan' => $pheptoan,
    'ket_qua' => $ket_qua,
    'thoi_gian' => (new DateTime())->format('d-m-Y H:i:s')
];

array_push($ket_qua_tinh_toan, $tinh_toan_moi);

$_SESSION['ket_qua_tinh_toan'] = $ket_qua_tinh_toan;

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

    <title>Tinh toan</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <p>Xin chao <?php echo $ten_nguoi_dung ?>, day la ket qua tinh toan cua ban</p>
            <form action="calculation_handler.php" method="POST">
                <div class="form-group">
                    <label for="">Nhap so thu nhat</label>
                    <input type="text" name="so_1" id="" class="form-control" autocomplete="off"
                           value="<?php echo $so1 ?>">
                </div>
                <div class="form-group">
                    <label for="">Nhap so thu hai</label>
                    <input type="text" name="so_2" id="" class="form-control" autocomplete="off"
                           value="<?php echo $so2 ?>">
                </div>
                <div class="form-group">
                    <label for="">Chon phep toan</label>
                    <select name="phep_toan" id="" class="form-control">
                        <option value="">Chon phep toan tuong ung</option>
                        <option value="cong" <?php echo $pheptoan == 'cong' ? 'selected' : '' ?> >Cong</option>
                        <option value="tru" <?php echo $pheptoan == 'tru' ? 'selected' : '' ?>>Tru</option>
                        <option value="nhan" <?php echo $pheptoan == 'nhan' ? 'selected' : '' ?>>Nhan</option>
                        <option value="chia" <?php echo $pheptoan == 'chia' ? 'selected' : '' ?>>Chia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Ket qua</label>
                    <input type="text" id="" class="form-control" autocomplete="off"
                           value="<?php echo $ket_qua ?>" disabled>
                </div>
                <div class="form-group">
                    <input type="submit" value="Tinh toan tiep" class="btn btn-primary">
                    <a href="dashboard.php" class="btn btn-secondary">Xem lich su tinh toan</a>
                </div>
            </form>
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

