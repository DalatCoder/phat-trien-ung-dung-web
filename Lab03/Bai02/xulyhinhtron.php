<?php

if (!isset($_GET['bankinh'])) {
    header('Location: hinhtron.php');
}

$bankinh = $_GET['bankinh'];

$chuvi = $bankinh * 3.14 * 2;
$dientich = 3.14 * ($bankinh * $bankinh);
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="xulyhinhtron.php" method="GET">
                <div class="form-group">
                    <label for="">Nhap vao ban kinh</label>
                    <input class="form-control" type="number" name="bankinh" id="" value="<?php echo $bankinh; ?>">
                </div>
                <div class="form-group">
                    <label for="">Chu vi</label>
                    <input class="form-control" type="number" name="chuvi" id="" value="<?php echo $chuvi; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="">Dien tich</label>
                    <input class="form-control" type="number" name="dientich" id="" value="<?php echo $dientich; ?>" disabled>
                </div>
                <div class="form-group">
                    <input type="submit" value="Tinh" class="btn btn-secondary">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>
