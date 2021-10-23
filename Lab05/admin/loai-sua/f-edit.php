<?php
require_once __DIR__ . '/../layout/AdminLayoutController.php';
require_once __DIR__ . '/../../Models/Authenticate.php';

$auth = new Authenticate();
$auth->restrict();

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../../Models/LoaiSua.php';
$model = new LoaiSua();

$san_pham = $model->getByID($_GET['id']);

if (!$san_pham) {
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
    <title>Admin | Chỉnh sửa loại sữa</title>

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

        <?= AdminLayoutController::get_menu(AdminLayoutController::PATH_LOAI_SUA) ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1 class="h2 my-5 text-center">Cập nhật loại sữa</h1>

            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-7">
                    <form action="c-update.php" method="POST">
                        <input type="hidden" name="id" value="<?= $san_pham[LoaiSua::COL_PRIMARY_KEY] ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tên loại</label>
                            <input value="<?= $san_pham[LoaiSua::COL_TEN_LOAI] ?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên loại sữa" name="ten" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mo-ta"><?= $san_pham[LoaiSua::COL_MO_TA] ?></textarea>
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
