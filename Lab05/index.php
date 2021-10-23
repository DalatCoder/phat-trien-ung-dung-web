<?php
require_once __DIR__ . '/Models/HangSua.php';
require_once __DIR__ . '/Models/LoaiSua.php';
require_once __DIR__ . '/Models/SanPhamSua.php';
require_once __DIR__ . '/Models/Authenticate.php';

require_once __DIR__ . '/layout/ClientLayoutController.php';

$hang_sua_model = new HangSua();
$loai_sua_model = new LoaiSua();
$san_pham_model = new SanPhamSua();
$authenticate_model = new Authenticate();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Milk Store | Trang chủ</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="admin/assets/style/bootstrap.min.css">
    <script src="admin/assets/js/feather.min.js"></script>

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link href="assets/styles/carousel.css" rel="stylesheet">
    <link href="assets/styles/feature.css" rel="stylesheet">
</head>
<body>

<?= ClientLayoutController::get_header(ClientLayoutController::PATH_HOME) ?>

<main>

    <?= ClientLayoutController::get_slider() ?>

    <div class="container marketing">

        <?= ClientLayoutController::get_store_objective() ?>

        <hr class="featurette-divider">

        <?php foreach ($hang_sua_model->getAll() as $item) : ?>

            <?php
            $danh_sach_san_pham = $hang_sua_model->get_danh_sach_san_pham($item[HangSua::COL_PRIMARY_KEY]);
            if (count($danh_sach_san_pham) == 0 || count($danh_sach_san_pham) < 3) continue;
            ?>

            <h2><?= $item[HangSua::COL_TEN_HANG] ?></h2>

            <div class="row featurette row-cols-1 row-cols-md-2 row-cols-lg-3 align-items-stretch g-4 py-5">

                <?php foreach ($danh_sach_san_pham as $san_pham): ?>
                    <div class="col">
                        <?= ClientLayoutController::get_product_card($san_pham) ?>
                    </div>
                <?php endforeach; ?>

            </div>
            <hr class="featurette-divider">

        <?php endforeach; ?>

        <?php foreach ($loai_sua_model->getAll() as $item) : ?>

            <?php
            $danh_sach_san_pham = $loai_sua_model->get_danh_sach_san_pham($item[LoaiSua::COL_PRIMARY_KEY]);
            if (count($danh_sach_san_pham) == 0 || count($danh_sach_san_pham) < 3) continue;
            ?>

            <h2><?= $item[LoaiSua::COL_TEN_LOAI] ?></h2>

            <div class="row featurette row-cols-1 row-cols-md-2 row-cols-lg-3 align-items-stretch g-4 py-5">
                <?php foreach ($danh_sach_san_pham as $san_pham): ?>
                    <div class="col">
                        <?= ClientLayoutController::get_product_card($san_pham) ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <hr class="featurette-divider">

        <?php endforeach; ?>

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <!-- FOOTER -->
    <?= ClientLayoutController::get_footer() ?>
</main>


<script src="admin/assets/js/bootstrap.bundle.min.js"></script>

<script>
    window.feather.replace();
</script>

</body>
</html>
