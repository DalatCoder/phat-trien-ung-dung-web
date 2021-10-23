<?php
require_once __DIR__ . '/../../layout/ClientLayoutController.php';
require_once __DIR__ . '/../../Models/Authenticate.php';
require_once __DIR__ . '/../../Models/KhachHang.php';

$authenticate_model = new Authenticate();
if (!$authenticate_model->is_user_logged_in()) {
    header('Location: /');
    exit();
}

$user = $authenticate_model->get_user_data();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Milk Store | Trang cá nhân</title>

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

        <div class="row mb-3">
            <div class="col-md-4">
                <div class="list-group">
                    <a href="/khach-hang/profile/index.php" class="py-3 list-group-item list-group-item-action d-flex align-content-center active">
                        <span data-feather="home"></span>
                        <span class="ms-1">Tổng quan</span>
                    </a>
                    <a href="/khach-hang/profile/orders.php" class="py-3 list-group-item list-group-item-action d-flex align-content-center">
                        <span data-feather="shopping-bag"></span>
                        <span class="ms-1">Đơn hàng</span>
                    </a>
                    <a href="/khach-hang/c-logout.php" class="py-3 list-group-item list-group-item-action d-flex align-content-center">
                        <span data-feather="log-out"></span>
                        <span class="ms-1">Đăng xuất</span>
                    </a>
                </div>
            </div>

            <div class="col-md-8">
                <h2 class="text-center">Thông tin tổng quan</h2>

                <form action="/khach-hang/profile/c-update.php" method="POST" class="row g-3">
                    <input type="hidden" name="id" value="<?= $user[KhachHang::COL_PRIMARY_KEY] ?>">
                    <div class="col-12">
                        <label for="firstName" class="form-label">Họ tên khách hàng *</label>
                        <input name="ten" type="text" class="form-control" id="firstName"
                               placeholder="Họ tên đầy đủ"
                               value="<?= $user[KhachHang::COL_TEN] ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="username" class="form-label">Tên đăng nhập *</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">@</span>
                            <input name="tendangnhap" type="text" class="form-control" id="username"
                                   placeholder="Tên đăng nhập"
                                   value="<?= $user[KhachHang::COL_TEN_DANG_NHAP] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email *</label>

                        <input name="email" type="email" class="form-control" id="email" placeholder="Email"
                               value="<?= $user[KhachHang::COL_EMAIL] ?>" required>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Địa chỉ *</label>
                        <textarea required class="form-control" name="diachi" id="address"
                                  rows="3"><?= $user[KhachHang::COL_DIA_CHI] ?></textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="address2" class="form-label">Số điện thoại liên hệ *</label>
                        <input name="sdt" value="<?= $user[KhachHang::COL_DIEN_THOAI] ?>" type="text"
                               class="form-control" id="address2" placeholder="Số điện thoại liên hệ">
                    </div>

                    <div class="col-md-6">
                        <label for="country" class="form-label">Giới tính</label>

                        <select class="form-select" id="country" required name="gioitinh">
                            <option value="" class="text-muted">Chọn giới tính *</option>
                            <option value="Nam" <?php echo $user[KhachHang::COL_GIOI_TINH] == 'Nam' ? 'selected' : '' ?>>
                                Nam
                            </option>
                            <option value="Nữ" <?php echo $user[KhachHang::COL_GIOI_TINH] == 'Nữ' ? 'selected' : '' ?>>
                                Nữ
                            </option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="password1" class="form-label">Mật khẩu *</label>
                        <input name="matkhau" value="<?= $user[KhachHang::COL_MAT_KHAU] ?>" type="password"
                               class="form-control" id="password1" placeholder="Nhập mật khẩu">
                    </div>

                    <div class="col-md-6">
                        <label for="password3" class="form-label">Nhập lại mật khẩu</label>
                        <input name="" value="" type="password"
                               class="form-control" id="password3" placeholder="Nhập lại mật khẩu">
                        <small class="text-muted">Nhập lại mật khẩu nếu bạn cần thay đổi</small>
                    </div>

                    <hr class="my-4">

                    <button name="submit" class="w-100 btn btn-primary btn-lg" type="submit">Cập nhật thông tin</button>
                </form>

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
