<?php
require_once __DIR__ . '/../layout/AdminLayoutController.php';
require_once __DIR__ . '/../../Models/Authenticate.php';

$auth = new Authenticate();
$auth->restrict();

if (!isset($_GET['order_id'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../../Models/DonHang.php';
require_once __DIR__ . '/../../Models/ChiTietDonHang.php';

$model = new DonHang();
$ct_don_hang_model = new ChiTietDonHang();

$don_hang = $model->getByID($_GET['order_id']);
$chi_tiet_don_hangs = $model->get_order_details($don_hang[DonHang::COL_PRIMARY_KEY]);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin | Chi tiết đơn hàng</title>

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

        <?= AdminLayoutController::get_menu(AdminLayoutController::PATH_DON_HANG) ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1 class="h2 my-5">Chi tiết đơn hàng #<?= $don_hang[DonHang::COL_PRIMARY_KEY] ?></h1>

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
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá mua</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($chi_tiet_don_hangs as $item): ?>
                        <tr>
                            <td><?= $item[ChiTietDonHang::COL_PRIMARY_KEY] ?></td>
                            <td>
                                <img height="50px" src="/<?= $ct_don_hang_model->get_product_image_path($item[ChiTietDonHang::COL_PRIMARY_KEY]) ?>" alt="">
                            </td>
                            <td><?= $ct_don_hang_model->get_product_name($item[ChiTietDonHang::COL_PRIMARY_KEY]) ?></td>
                            <td><?= $item[ChiTietDonHang::COL_SO_LUONG] ?></td>
                            <td><?= $item[ChiTietDonHang::COL_GIA_MUA] ?> VNĐ</td>
                            <td><?= $item[ChiTietDonHang::COL_GIA_MUA] * $item[ChiTietDonHang::COL_SO_LUONG] ?> VNĐ</td>
                            <td>
                                <a class="d-inline-block me-2" href="">
                                    <span data-feather="edit"></span>
                                </a>
                                <a class="d-inline-block" href="">
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
