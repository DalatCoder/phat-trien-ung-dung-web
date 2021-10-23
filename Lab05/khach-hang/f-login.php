<?php
require_once __DIR__ . '/../layout/ClientLayoutController.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Milk Store | Đăng nhập</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/admin/assets/style/bootstrap.min.css">
    <script src="/admin/assets/js/feather.min.js"></script>

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link href="/assets/styles/carousel.css" rel="stylesheet">
    <link href="/assets/styles/feature.css" rel="stylesheet">
</head>
<body>

<?= ClientLayoutController::get_header(ClientLayoutController::PATH_DANG_NHAP) ?>

<main>

    <div class="container marketing mt-5" style="min-height: 100vh">

        <h1 class="text-center">Đăng nhập khách hàng</h1>

        <div class="row justify-content-center mt-3">
            <div class="col-sm-10 col-md-6">
                <form action="c-login.php" method="post">
                    <?php if (isset($_GET['redirect'])): ?>
                        <input type="hidden" name="redirect_url" value="<?= $_GET['redirect'] ?>">
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2"
                               placeholder="Tên đăng nhập" name="tendangnhap" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="exampleFormControlInput3" placeholder="Mật khẩu"
                               name="matkhau" autocomplete="off" required>
                    </div>

                    <div class="mb-4"></div>

                    <input type="submit" value="Đăng nhập ngay" class="btn btn-primary mb-5">

                </form>
            </div>
        </div>

    </div><!-- /.container -->


    <!-- FOOTER -->
    <?= ClientLayoutController::get_footer() ?>
</main>


<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>

<script>
    window.feather.replace();
</script>

</body>
</html>
