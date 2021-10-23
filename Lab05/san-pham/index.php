<?php

if (!isset($_GET['id'])) {
    header('Location: /');
    exit();
}

require_once __DIR__ . '/../Models/SanPhamSua.php';
require_once __DIR__ . '/../Models/HangSua.php';
require_once __DIR__ . '/../Models/LoaiSua.php';
require_once __DIR__ . '/../Models/Cart.php';

require_once __DIR__ . '/../layout/ClientLayoutController.php';

$san_pham_model = new SanPhamSua();
$cart_model = new Cart();
$hang_sua_model = new HangSua();
$loai_sua_model = new LoaiSua();

$san_pham = $san_pham_model->getByID($_GET['id']);
$hang_san_pham = $san_pham_model->get_hang_sua($_GET['id']);
$loai_san_pham = $san_pham_model->get_loai_sua($_GET['id']);

$so_luong_san_pham_trong_gio_hang = $cart_model->get_amount_by_id($_GET['id']);

if ($so_luong_san_pham_trong_gio_hang == 0)
    $so_luong_san_pham_trong_gio_hang = 1;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Milk Store | Chi tiết sản phẩm</title>

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
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-3">
                            <form action="/gio-hang/c-add-product.php" method="POST">
                                <input type="hidden" name="product_id"
                                       value="<?= $san_pham[SanPhamSua::COL_PRIMARY_KEY] ?>">
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Số lượng</label>
                                    <input min="0"
                                           value="<?= $so_luong_san_pham_trong_gio_hang ?>"
                                           type="number"
                                           class="form-control" id="exampleFormControlInput1"
                                           placeholder="Số lượng" name="soluong" autocomplete="off" required>
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput3" class="form-label">Đơn giá</label>
                                    <input value="<?= $san_pham[SanPhamSua::COL_DON_GIA] ?> VNĐ" type="text"
                                           class="form-control" readonly id="exampleFormControlInput3">
                                </div>
                                <hr>
                                <div class="d-flex">
                                    <input type="submit" value="Thêm vào giỏ hàng" class="btn btn-primary me-auto">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="featurette-divider">

        <h2><?= $hang_san_pham[HangSua::COL_TEN_HANG] ?></h2>

        <div class="row featurette row-cols-1 row-cols-md-2 row-cols-lg-3 align-items-stretch g-4 py-5">
            <?php foreach ($hang_sua_model->get_danh_sach_san_pham($hang_san_pham[HangSua::COL_PRIMARY_KEY]) as $item): ?>
                <div class="col">
                    <?= ClientLayoutController::get_product_card($item) ?>
                </div>
            <?php endforeach; ?>

        </div>

        <hr class="featurette-divider">

        <h2><?= $loai_san_pham[LoaiSua::COL_TEN_LOAI] ?></h2>

        <div class="row featurette row-cols-1 row-cols-md-2 row-cols-lg-3 align-items-stretch g-4 py-5">
            <?php foreach ($loai_sua_model->get_danh_sach_san_pham($loai_san_pham[LoaiSua::COL_PRIMARY_KEY]) as $item): ?>
                <div class="col">
                    <?= ClientLayoutController::get_product_card($item) ?>
                </div>
            <?php endforeach; ?>

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
