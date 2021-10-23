<?php
require_once __DIR__ . '/../../Models/LoaiSua.php';

require_once __DIR__ . '/../layout/AdminLayoutController.php';
require_once __DIR__ . '/../../Models/Authenticate.php';

$auth = new Authenticate();
$auth->restrict();

$model = new LoaiSua();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin | Loại sữa</title>

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
            <h1 class="h2 my-5">Quản lý loại sữa</h1>

            <div class="row mb-3">
                <div class="col d-flex justify-content-end">
                    <a href="f-add-new.php" class="btn btn-primary">Thêm mới</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên loại</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Số sản phẩm</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model->getAll() as $item): ?>
                    <tr>
                        <td><?= $item[LoaiSua::COL_PRIMARY_KEY] ?></td>
                        <td><?= $item[LoaiSua::COL_TEN_LOAI] ?></td>
                        <td><?= $item[LoaiSua::COL_MO_TA] ?></td>
                        <td><?= 0 ?></td>
                        <td>
                            <a class="d-inline-block me-2" href="javascript:0">
                                <span data-feather="info"></span>
                            </a>
                            <a class="d-inline-block me-2" href="f-edit.php?id=<?= $item[LoaiSua::COL_PRIMARY_KEY] ?>">
                                <span data-feather="edit"></span>
                            </a>
                            <a class="d-inline-block" href="c-delete.php?id=<?= $item[LoaiSua::COL_PRIMARY_KEY] ?>">
                                <span data-feather="trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>

<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>

<script>
    window.feather.replace();
</script>
</body>
</html>
