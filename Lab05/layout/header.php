<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><?= $store_name ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page_path == ClientLayoutController::PATH_HOME) ? 'active' : '' ?>"
                           href="/">Trang chủ</a>
                    </li>
                    <?php if ($is_admin): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin">Admin</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page_path == ClientLayoutController::PATH_SAN_PHAM) ? 'active' : '' ?>"
                           href="#">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page_path == ClientLayoutController::PATH_HANG_SUA) ? 'active' : '' ?>"
                           href="#">Hãng sữa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page_path == ClientLayoutController::PATH_LOAI_SUA) ? 'active' : '' ?>"
                           href="#">Loại sữa</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-md-0 me-0 me-md-2">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($page_path == ClientLayoutController::PATH_GIO_HANG) ? 'active' : '' ?>"
                           href="<?= ClientLayoutController::PATH_GIO_HANG ?>/index.php">
                            <span data-feather="shopping-cart"></span>
                            <?php if ($number_of_products_in_cart > 0): ?>
                                <span class="badge bg-info"><?= $number_of_products_in_cart ?></span>
                            <?php endif; ?>
                            Giỏ hàng
                        </a>
                    </li>
                    <?php if (!$is_user_logged_in): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page_path == ClientLayoutController::PATH_TAO_TAI_KHOAN) ? 'active' : '' ?>"
                               href="<?= ClientLayoutController::PATH_TAO_TAI_KHOAN ?>">Tạo tài
                                khoản</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page_path == ClientLayoutController::PATH_DANG_NHAP) ? 'active' : '' ?>"
                               href="<?= ClientLayoutController::PATH_DANG_NHAP ?>">Đăng nhập</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page_path == ClientLayoutController::PATH_PROFILE) ? 'active' : '' ?>"
                               href="<?= ClientLayoutController::PATH_PROFILE ?>/index.php">Xin
                                chào <?= $user_display_name ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm">
                    <button class="btn btn-outline-success" type="submit">Tìm</button>
                </form>
            </div>
        </div>
    </nav>
</header>
