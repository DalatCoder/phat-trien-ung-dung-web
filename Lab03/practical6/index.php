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
    <h3 class="mt-3 text-center">Choose File To Upload</h3>
    <div class="row justify-content-center">
        <div class="col col-md-6 col-lg-5">
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="tap_tin_cua_toi[]" required multiple>
                    <label class="custom-file-label" for="validatedCustomFile">Chon tap tin can upload</label>
                </div>
                <div class="form-group">
                    <input type="submit" value="Upload" class="btn btn-primary" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>