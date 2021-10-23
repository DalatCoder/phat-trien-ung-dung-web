<?php
require_once __DIR__ . '/AdminLayoutController.php';
?>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $page_path == AdminLayoutController::PATH_ADMIN ? 'active' : '' ?>" href="<?= AdminLayoutController::PATH_ADMIN ?>/index.php">
                    <span data-feather="home"></span>
                    Tổng quan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $page_path == AdminLayoutController::PATH_HANG_SUA ? 'active' : '' ?>" href="<?= AdminLayoutController::PATH_HANG_SUA ?>/index.php">
                    <span data-feather="file"></span>
                    Hãng sữa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $page_path == AdminLayoutController::PATH_LOAI_SUA ? 'active' : '' ?>" href="<?= AdminLayoutController::PATH_LOAI_SUA ?>/index.php">
                    <span data-feather="hexagon"></span>
                    Loại sữa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $page_path == AdminLayoutController::PATH_SAN_PHAM_SUA ? 'active' : '' ?>" href="<?= AdminLayoutController::PATH_SAN_PHAM_SUA ?>/index.php">
                    <span data-feather="shopping-cart"></span>
                    Sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $page_path == AdminLayoutController::PATH_KHACH_HANG ? 'active' : '' ?>" href="<?= AdminLayoutController::PATH_KHACH_HANG ?>/index.php">
                    <span data-feather="users"></span>
                    Khách hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $page_path == AdminLayoutController::PATH_DON_HANG ? 'active' : '' ?>" href="<?= AdminLayoutController::PATH_DON_HANG ?>/index.php">
                    <span data-feather="layers"></span>
                    Đơn hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:0">
                    <span data-feather="bar-chart-2"></span>
                    Thống kê
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:0">
                    <span data-feather="user"></span>
                    <?= $admin_name ?>
                </a>
            </li>
        </ul>
    </div>
</nav>
