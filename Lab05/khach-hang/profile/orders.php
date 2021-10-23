<?php
require_once __DIR__ . '/../../layout/ClientLayoutController.php';
require_once __DIR__ . '/../../Models/Authenticate.php';
require_once __DIR__ . '/../../Models/KhachHang.php';
require_once __DIR__ . '/../../Models/DonHang.php';
require_once __DIR__ . '/../../Models/ChiTietDonHang.php';

$authenticate_model = new Authenticate();
if (!$authenticate_model->is_user_logged_in()) {
    header('Location: /');
    exit();
}

$user = $authenticate_model->get_user_data();

$don_hang_model = new DonHang();
$ct_don_hang_model = new ChiTietDonHang();
$don_hangs = $don_hang_model->get_all_by_customer_id($authenticate_model->get_user_id());
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Milk Store | Danh sách đơn hàng</title>

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

<?= ClientLayoutController::get_header(ClientLayoutController::PATH_PROFILE) ?>

<main>

    <div class="container marketing mt-5">

        <div class="row mb-3 min-vh-100">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="/khach-hang/profile/index.php"
                       class="py-3 list-group-item list-group-item-action d-flex align-content-center">
                        <span data-feather="home"></span>
                        <span class="ms-1">Tổng quan</span>
                    </a>
                    <a href="/khach-hang/profile/orders.php"
                       class="py-3 list-group-item list-group-item-action d-flex align-content-center active">
                        <span data-feather="shopping-bag"></span>
                        <span class="ms-1">Đơn hàng</span>
                    </a>
                    <a href="/khach-hang/c-logout.php"
                       class="py-3 list-group-item list-group-item-action d-flex align-content-center">
                        <span data-feather="log-out"></span>
                        <span class="ms-1">Đăng xuất</span>
                    </a>
                </div>
            </div>

            <div class="col-md-8">
                <?php if (count($don_hangs) == 0): ?>

                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <h2 class="text-info text-center mb-4">Bạn chưa có đơn hàng nào</h2>
                                <a href="/" class="btn btn-primary mx-auto d-block">Mua hàng ngay</a>
                            </div>
                        </div>

                <?php else: ?>
                    <h2 class="text-center mb-5">Danh sách đơn hàng</h2>

                    <?php foreach ($don_hangs as $don_hang): ?>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">Đơn hàng
                                            #<?= $don_hang[DonHang::COL_PRIMARY_KEY] ?></div>
                                        <div class="card-subtitle mb-2 text-muted mb-4">Ngày
                                            mua: <?= $don_hang_model->get_formatted_order_date($don_hang[DonHang::COL_PRIMARY_KEY]) ?></div>

                                        <?php foreach ($don_hang_model->get_order_details($don_hang[DonHang::COL_PRIMARY_KEY]) as $chi_tiet): ?>
                                            <div class="row mb-3 align-content-center">
                                                <div class="col-md-1">
                                                    <img height="50"
                                                         src="/<?= $ct_don_hang_model->get_product_image_path($chi_tiet[ChiTietDonHang::COL_PRIMARY_KEY]) ?>"
                                                         alt="">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card-text">
                                                        <a class="text-decoration-none text-secondary"
                                                           href="/san-pham/index.php?id=<?= $chi_tiet[ChiTietDonHang::COL_SAN_PHAM_ID] ?>">
                                                            <?= $ct_don_hang_model->get_product_name($chi_tiet[ChiTietDonHang::COL_PRIMARY_KEY]) ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-text"><?= $chi_tiet[ChiTietDonHang::COL_SO_LUONG] ?>
                                                        sản phẩm x <?= $chi_tiet[ChiTietDonHang::COL_GIA_MUA] ?></div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="card-text fw-bold text-end"><?= $chi_tiet[ChiTietDonHang::COL_SO_LUONG] * $chi_tiet[ChiTietDonHang::COL_GIA_MUA] ?>
                                                        VNĐ
                                                    </div>
                                                </div>

                                            </div>
                                        <?php endforeach; ?>

                                        <div class="card-subtitle text-muted mt-3">Tổng tiền: <span
                                                    class="fw-bold"><?= $don_hang[DonHang::COL_TONG_TIEN] ?> VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php endif; ?>

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
