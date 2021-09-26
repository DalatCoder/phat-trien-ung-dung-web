<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Lab02 - Bai02</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <form action="querystr.php" method="POST">
                <div class="form-group">
                    <label for="user_name">Name</label>
                    <input type="text" name="user_name" id="user_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="user_password" id="" class="form-control">
                </div>
                <div class="form-check form-check-inline">
                    <label for="">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="user_gender" id="" value="male" checked>
                        <label class="form-check-label" for="">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="user_gender" id="" value="female">
                        <label class="form-check-label" for="">
                            Female
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Branch</label>
                    <select name="user_branch" id="" class="form-control">
                        <option value="c.e.">C.E.</option>
                        <option value="mech">MECH</option>
                        <option value="e.c.">E.C.</option>
                        <option value="i.t.">I.T</option>
                        <option value="e.e.">E.E</option>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <input type="submit" value="Submit" name="submit" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>