<?php
require_once __DIR__ . '/../Models/Authenticate.php';
require_once  __DIR__ . '/layout/AdminLayoutController.php';
require_once __DIR__ . '/../Models/DonHang.php';
require_once __DIR__ . '/../Models/HangSua.php';
require_once __DIR__ . '/../Models/LoaiSua.php';

$authenticate = new Authenticate();
$authenticate->restrict();

$don_hand_model = new DonHang();
$hang_sua_model = new HangSua();
$loai_sua_model = new LoaiSua();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin | Tổng quan</title>

    <!-- Bootstrap core CSS -->
    <link href="/admin/assets/style/bootstrap.min.css" rel="stylesheet">

    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link href="/admin/assets/style/main.css" rel="stylesheet">
</head>
<body>

<?= AdminLayoutController::get_header() ?>

<div class="container-fluid">
    <div class="row">

        <?= AdminLayoutController::get_menu(AdminLayoutController::PATH_ADMIN) ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Lượng tiền thu được trong 7 ngày gần đây</h1>
            </div>

            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
        </main>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Lượng sản phẩm theo hãng sản xuất</h1>
            </div>

            <canvas class="my-4 w-100" id="chart-hang-san-pham" width="900" height="380"></canvas>
        </main>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Lượng sản phẩm theo loại</h1>
            </div>

            <canvas class="my-4 w-100" id="chart-loai-san-pham" width="900" height="380"></canvas>
        </main>
    </div>
</div>

<?php ?>

<?php
$chart_data = $don_hand_model->get_the_last_7_days_for_chart_overview();
$chart_data_hang_sua = $hang_sua_model->get_products_by_brands_for_chart_overview();
$chart_data_loai_sua = $loai_sua_model->get_products_by_types_for_chart_overview();
?>

<script>
    var labels = <?= json_encode(array_keys($chart_data), JSON_HEX_TAG) ?>;
    var data = <?= json_encode(array_values($chart_data), JSON_HEX_TAG) ?>;

    var hangsua_labels = <?= json_encode(array_keys($chart_data_hang_sua), JSON_HEX_TAG) ?>;
    var hangsua_data = <?= json_encode(array_values($chart_data_hang_sua), JSON_HEX_TAG) ?>;

    var loaisua_labels = <?= json_encode(array_keys($chart_data_loai_sua), JSON_HEX_TAG) ?>;
    var loaisua_data = <?= json_encode(array_values($chart_data_loai_sua), JSON_HEX_TAG) ?>;
</script>

<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>

<script src="/admin/assets/js/feather.min.js"></script>
<script src="/admin/assets/js/Chart.min.js"></script>
<script src="/admin/assets/js/main.js"></script>
</body>
</html>
