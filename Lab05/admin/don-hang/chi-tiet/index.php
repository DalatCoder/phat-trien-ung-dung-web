<?php
require_once __DIR__ . '/../../Models/DonHang.php';

$model = new DonHang();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin | Đơn hàng</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../assets/style/bootstrap.min.css">

    <script src="../../assets/js/feather.min.js"></script>

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link href="../../assets/style/main.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Milk Shop</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Tìm kiếm" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Đăng xuất</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="home"></span>
                            Tổng quan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Hãng sữa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="hexagon"></span>
                            Loại sữa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Khách hàng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="layers"></span>
                            Đơn hàng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Thống kê
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1 class="h2 my-5">Quản lý đơn hàng</h1>

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
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Số loại</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($model->getAll() as $item): ?>
                        <tr>
                            <td><?= $item[DonHang::COL_PRIMARY_KEY] ?></td>
                            <td><?= $model->get_customer_display_name($item[DonHang::COL_PRIMARY_KEY]) ?></td>
                            <td><?= $model->get_formatted_order_date($item[DonHang::COL_PRIMARY_KEY]) ?></td>
                            <td><?= $item[DonHang::COL_TONG_TIEN] ?></td>
                            <td><?= $model->count_order_details($item[DonHang::COL_PRIMARY_KEY]) ?></td>
                            <td><?= $model->count_products_in_order_details($item[DonHang::COL_PRIMARY_KEY]) ?></td>
                            <td>
                                <a class="d-inline-block me-2" href="">
                                    <span data-feather="info"></span>
                                </a>
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

<script src="../../assets/js/bootstrap.bundle.min.js"></script>

<script>
    window.feather.replace();
</script>
</body>
</html>
