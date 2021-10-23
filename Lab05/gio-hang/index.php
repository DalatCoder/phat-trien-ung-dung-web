<?php
require_once __DIR__ . '/../Models/SanPhamSua.php';
require_once __DIR__ . '/../Models/HangSua.php';
require_once __DIR__ . '/../Models/LoaiSua.php';
require_once __DIR__ . '/../Models/Authenticate.php';
require_once __DIR__ . '/../Models/CartItem.php';
require_once __DIR__ . '/../Models/Cart.php';

require_once __DIR__ . '/../layout/ClientLayoutController.php';

$san_pham_model = new SanPhamSua();
$authenticate_model = new Authenticate();
$cart_model = new Cart();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Milk Store | Giỏ hàng</title>

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

<?= ClientLayoutController::get_header(ClientLayoutController::PATH_GIO_HANG) ?>

<main>

    <div class="container marketing mt-5">

        <?php if ($cart_model->get_number_of_products_in_cart() == 0): ?>
        
        <div class="min-vh-100">
            <div class="row justify-content-center">
                <div class="col-sm-6 col-xl-5">
                    <h2 class="text-info text-center mb-4">Giỏ hàng trống</h2>
                    <a href="/index.php" class="btn btn-primary mx-auto d-block">Tiếp tục mua hàng</a>
                </div>
            </div>
        </div>

        <?php else: ?>
            <h1 class="text-center mb-5">Giỏ hàng</h1>

            <div class="row mb-3">
                <div class="col d-flex justify-content-center justify-content-md-end">
                    <a href="/index.php" class="btn btn-primary ms-md-auto me-3">Tiếp tục mua hàng</a>
                    <a href="/thanh-toan/index.php" class="btn btn-primary">Thanh toán</a>
                </div>
            </div>

            <?php foreach ($cart_model->get_all() as $item): ?>
                <?php $san_pham = $item->get_product_detail(); ?>

                <div class="row mb-3">
                    <div class="col">
                        <div class="card mb-3">
                            <div class="row g-3 align-items-start p-3 justify-content-center">
                                <div class="col-md-4 col-lg-2">
                                    <img src="/<?= $san_pham[SanPhamSua::COL_TEN_HINH_ANH_SERVER] ?>"
                                         class="img-fluid rounded-start ratio ratio-1x1" alt="...">
                                </div>
                                <div class="col-md-8 col-lg-7">
                                    <div class="card-body p-0">
                                        <h5 class="card-title"><?= $san_pham[SanPhamSua::COL_TEN] ?></h5>
                                        <p class="card-text mt-1">
                                            Hãng: <?= $san_pham_model->get_hang_sua($san_pham[SanPhamSua::COL_PRIMARY_KEY])[HangSua::COL_TEN_HANG] ?>
                                        </p>
                                        <p class="card-text">
                                            Loại: <?= $san_pham_model->get_loai_sua($san_pham[SanPhamSua::COL_PRIMARY_KEY])[LoaiSua::COL_TEN_LOAI] ?>
                                        </p>
                                        <p class="card-text">
                                            Trọng
                                            lượng: <?= $san_pham[SanPhamSua::COL_TRONG_LUONG] ?> <?= $san_pham[SanPhamSua::COL_DON_VI_TINH] ?>
                                        </p>
                                        <p class="card-text">
                                            Dinh dưỡng: <?= $san_pham[SanPhamSua::COL_THANH_PHAN] ?>
                                        </p>
                                        <p class="card-text">
                                            Lợi ích: <?= $san_pham[SanPhamSua::COL_LOI_ICH] ?>
                                        </p>
                                        <a href="/san-pham/index.php?id=<?= $san_pham[SanPhamSua::COL_PRIMARY_KEY] ?>" class="card-text"><small class="text-muted">Xem chi tiết</small></a>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-3">
                                    <form action="c-update-product.php" method="POST">
                                        <input type="hidden" name="product_id" value="<?= $item->get_product_id() ?>">
                                        <div class="mb-2">
                                            <label for="exampleFormControlInput1" class="form-label">Số lượng</label>
                                            <input min="0" value="<?= $item->get_product_amount() ?>" type="number"
                                                   class="form-control" id="exampleFormControlInput1"
                                                   placeholder="Số lượng" name="soluong" autocomplete="off" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="exampleFormControlInput3" class="form-label">Đơn giá</label>
                                            <input value="<?= $san_pham[SanPhamSua::COL_DON_GIA] ?> VNĐ" disabled
                                                   type="text" class="form-control" id="exampleFormControlInput3">
                                        </div>
                                        <div class="mb-2">
                                            <label for="exampleFormControlInput4" class="form-label">Thành tiền</label>
                                            <input value="<?php echo $san_pham[SanPhamSua::COL_DON_GIA] * $item->get_product_amount() ?> VNĐ"
                                                   disabled type="text" class="form-control"
                                                   id="exampleFormControlInput4">
                                        </div>
                                        <hr>
                                        <div class="d-flex">
                                            <input type="submit" value="Cập nhật" class="btn btn-primary me-auto">
                                            <a href="c-delete-product.php?product_id=<?= $san_pham[SanPhamSua::COL_PRIMARY_KEY] ?>"
                                               class="btn btn-danger">Xóa</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

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
