<?php

$gio_bd = $_POST['gio_bd'];
$gio_kt = $_POST['gio_kt'];

$tien_moi_gio = 0;
$co_phai_gio_nghi = false;

$tong_tien = 0;

if ($gio_bd < 10) {
    $co_phai_gio_nghi = true;
} else if ($gio_kt <= 17) {
    $tien_moi_gio = 20000;
    $tong_tien = ($gio_kt - $gio_bd) * $tien_moi_gio;
} else if ($gio_kt <= 24) {
    if ($gio_bd < 17) {
        $tien_moi_gio = 20000;
        $tong_tien += (17 - $gio_bd) * $tien_moi_gio;
    }

    $tien_moi_gio = 45000;
    $tong_tien += ($gio_kt - 17) * $tien_moi_gio;
}

if ($co_phai_gio_nghi == true) {
    // Hien thi dang nghi
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
              integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
              crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="alert alert-danger" role="alert">Quan hien dang dong cua, mo cua trong khoang tu 10h - 24h
                </div>
                <a href="index.php" class="btn btn-danger btn-block">Quay lai trang truoc</a>
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
    <?php
} else {
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
              integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
              crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card">
                    <h5 class="card-header text-center">TINH TIEN KARAOKE</h5>
                    <div class="card-body">
                        <form action="tinhtien.php" method="POST">
                            <div class="form-group">
                                <label for="inlineFormInputGroupUsername2">Gio bat dau</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Gio</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                           placeholder="Gio bat dau" name="gio_bd" value="<?php echo $gio_bd ?>"
                                           disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inlineFormInputGroupUsername2">Gio ket thuc</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Gio</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                           placeholder="Gio ket thuc" name="gio_kt" value="<?php echo $gio_kt ?>"
                                           disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inlineFormInputGroupUsername2">Tong tien thanh toan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">VND</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                           placeholder="Tong tien thanh toan" name="tong_tien"
                                           value="<?php echo $tong_tien ?>" disabled>
                                </div>
                            </div>

                            <hr class="mb-3">

                            <div class="form-group">
                                <a href="index.php" class="btn btn-block btn-primary">Quay lai trang truoc</a>
                            </div>
                        </form>
                    </div>
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
    <?php
}