<?php

require_once __DIR__ . '/../layout/AdminLayoutController.php';
require_once __DIR__ . '/../../Models/Authenticate.php';

$auth = new Authenticate();
$auth->restrict();

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../../Models/HangSua.php';
$model = new HangSua();

$hang_sua = $model->getByID($_GET['id']);

if (!$hang_sua) {
    header('Location: index.php');
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin | Chỉnh sửa hãng sữa</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/admin/assets/style/bootstrap.min.css">

    <script src="/admin/assets/js/feather.min.js"></script>

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link href="/admin/assets/style/main.css" rel="stylesheet">
</head>
<body>

<?= AdminLayoutController::get_header() ?>

<div class="container-fluid">
    <div class="row">

        <?= AdminLayoutController::get_menu(AdminLayoutController::PATH_HANG_SUA) ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1 class="h2 my-5 text-center">Cập nhật thông tin hãng sữa</h1>

            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-7">
                    <form action="c-update.php" method="POST">
                        <input type="hidden" name="id" value="<?= $hang_sua[HangSua::COL_PRIMARY_KEY] ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Mã SKU</label>
                            <input value="<?= $hang_sua[HangSua::COL_SKU] ?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mã SKU" name="sku" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Tên hãng</label>
                            <input value="<?= $hang_sua[HangSua::COL_TEN_HANG] ?>" type="text" class="form-control" id="exampleFormControlInput2" placeholder="Tên hãng sữa" name="ten" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Email</label>
                            <input value="<?= $hang_sua[HangSua::COL_EMAIL] ?>" type="email" class="form-control" id="exampleFormControlInput3" placeholder="Email" name="email" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Số ĐT</label>
                            <input value="<?= $hang_sua[HangSua::COL_DIEN_THOAI] ?>" type="text" class="form-control" id="exampleFormControlInput4" placeholder="Số điện thoại" name="sdt" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Địa chỉ</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="diachi"><?= $hang_sua[HangSua::COL_DIA_CHI] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Cập nhật" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

</div>

<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>

<script>
    window.feather.replace();
</script>
</body>
</html>
