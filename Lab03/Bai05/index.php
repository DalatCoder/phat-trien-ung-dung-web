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
        <div class="col-md-6">
            <form action="xuly.php" method="post">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Chon Folder Anh</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="folder_name">
                        <option value="">Chon Folder</option>
                        <option value="cat">Cat</option>
                        <option value="dog">Dog</option>
                        <option value="lion">Lion</option>
                        <option value="sea">Sea</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlSelect2">Chon kich thuoc anh</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="image_size">
                        <option value="">Chon kich thuoc anh</option>
                        <option value="100">100 x 100</option>
                        <option value="200">200 x 200</option>
                        <option value="300">300 x 300</option>
                    </select>
                </div>
                <hr>
                <input type="submit" value="Chap nhan" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>