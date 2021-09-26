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
                            <input type="text" class="form-control" id="exampleInputEmail1" name="toan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ly</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="ly">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Hoa</label>
                            <input type="text" class="form-control" id="exampleInputPassword2" name="hoa">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">Diem Chuan</label>
                            <input type="text" class="form-control" id="exampleInputEmail2" name="diemchuan">
                        </div>
                        <hr class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Xem ket qua</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>