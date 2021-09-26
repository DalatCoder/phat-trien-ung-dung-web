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

            <form action="ketquapheptinh.php" method="POST">
                <div class="form-group">
                    <label for="" class="d-inline-block mr-3">Chon phep tinh</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pheptinh" id="inlineRadio1" value="cong" checked>
                        <label class="form-check-label" for="inlineRadio1">Cong</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pheptinh" id="inlineRadio2" value="tru">
                        <label class="form-check-label" for="inlineRadio2">Tru</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pheptinh" id="inlineRadio3" value="nhan">
                        <label class="form-check-label" for="inlineRadio3">Nhan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pheptinh" id="inlineRadio4" value="chia">
                        <label class="form-check-label" for="inlineRadio4">Chia</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">So thu nhat</label>
                    <input type="text" class="form-control" name="so_1">
                </div>
                <div class="form-group">
                    <label for="">So thu hai</label>
                    <input type="text" class="form-control" name="so_2">
                </div>
                <hr>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" name="submit" value="Tinh"/>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>