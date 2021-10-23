<?php
require_once __DIR__ . '/../../Models/SanPhamSua.php';
require_once __DIR__ . '/../../Models/HangSua.php';
require_once __DIR__ . '/../../Models/LoaiSua.php';

require_once __DIR__ . '/../layout/AdminLayoutController.php';
require_once __DIR__ . '/../../Models/Authenticate.php';

$auth = new Authenticate();
$auth->restrict();

$model = new SanPhamSua();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin | Sản phẩm sữa</title>

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

        <?= AdminLayoutController::get_menu(AdminLayoutController::PATH_SAN_PHAM_SUA) ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1 class="h2 my-5">Quản lý sản phẩm sữa</h1>

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
                        <th scope="col">SKU</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Hãng</th>
                        <th scope="col">Loại</th>
                        <th scope="col">Trọng lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model->getAll() as $item): ?>
                    <?php
                        $hang_sua = $model->get_hang_sua($item[SanPhamSua::COL_PRIMARY_KEY]);
                        $loai_sua = $model->get_loai_sua($item[SanPhamSua::COL_PRIMARY_KEY]);
                    ?>
                    <tr>
                        <td><?= $item[SanPhamSua::COL_PRIMARY_KEY] ?></td>
                        <td><?= $item[SanPhamSua::COL_SKU] ?></td>
                        <td><?= $item[SanPhamSua::COL_TEN] ?></td>
                        <td><?= $hang_sua[HangSua::COL_TEN_HANG] ?></td>
                        <td><?= $loai_sua[LoaiSua::COL_TEN_LOAI] ?></td>
                        <td><?= $item[SanPhamSua::COL_TRONG_LUONG] ?></td>
                        <td><?= $item[SanPhamSua::COL_DON_GIA] ?></td>
                        <td>
                            <img height="50px" class="rounded-3" src="/<?= $item[SanPhamSua::COL_TEN_HINH_ANH_SERVER] ?>" alt="">
                        </td>
                        <td>
                            <a class="d-inline-block me-2" href="f-edit.php?id=<?= $item[SanPhamSua::COL_PRIMARY_KEY] ?>">
                                <span data-feather="edit"></span>
                            </a>
                            <a class="d-inline-block" href="c-delete.php?id=<?= $item[SanPhamSua::COL_PRIMARY_KEY] ?>">
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
