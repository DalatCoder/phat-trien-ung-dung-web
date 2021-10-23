<?php
require_once __DIR__ . '/../Models/HangSua.php';
require_once __DIR__ . '/../Models/KhachHang.php';
require_once __DIR__ . '/../Models/LoaiSua.php';
require_once __DIR__ . '/../Models/Authenticate.php';
require_once __DIR__ . '/../Models/CartItem.php';
require_once __DIR__ . '/../Models/Cart.php';

require_once __DIR__ . '/../layout/ClientLayoutController.php';

$san_pham_model = new SanPhamSua();
$authenticate_model = new Authenticate();
$cart_model = new Cart();

$user = null;
if ($authenticate_model->is_user_logged_in()) {
    $user = $authenticate_model->get_user_data();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Milk Store | Thanh toán</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../admin/assets/style/bootstrap.min.css">
    <script src="/admin/assets/js/feather.min.js"></script>

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link href="/assets/styles/carousel.css" rel="stylesheet">
    <link href="/assets/styles/feature.css" rel="stylesheet">
</head>
<body>

<?= ClientLayoutController::get_header(ClientLayoutController::PATH_THANH_TOAN) ?>

<main>

    <div class="container marketing mt-5">
        <div class="py-5 text-center">
            <h2>Đặt hàng ngay</h2>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <?php if (!$authenticate_model->is_user_logged_in()): ?>
                        <p class="lead">
                            Nếu bạn đã có tài khoản tại cửa hàng, vui lòng <a class="text-primary"
                                                                              href="../khach-hang/f-login.php?redirect=<?= $_SERVER['REQUEST_URI'] ?>">đăng
                                nhập</a>
                            ngay, chúng tôi sẽ điền các thông tin mua hàng cho bạn.
                            Trường hợp chưa có tài khoản, vào đây để tạo <a class="text-primary"
                                                                            href="../khach-hang/f-register.php?redirect=<?= $_SERVER['REQUEST_URI'] ?>">đăng
                                ký</a>,
                            hoặc điền thông tin bên dưới. Chúng tôi sẽ tự
                            động tạo tài khoản cho bạn.
                        </p>
                    <?php else: ?>
                        <p class="lead">
                            Cảm ơn <?= $authenticate_model->get_user_display_name() ?> đã mua hàng. Bạn có thể theo dõi
                            đơn
                            hàng tại <a href="/khach-hang/profile/orders.php" class="text-primary">trang cá nhân</a> của mình.
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <div class="col-md-5 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Đơn hàng</span>
                    <span class="badge bg-primary rounded-pill"><?= $cart_model->get_number_of_products_in_cart() ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php foreach ($cart_model->get_all() as $cart_item): ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><?= $cart_item->get_product_name() ?></h6>
                                <small class="text-muted text-start">
                                    <?= $cart_item->get_product_amount() ?> x <?= $cart_item->get_product_price() ?> VNĐ
                                </small>
                            </div>
                            <span class="text-muted"><?php echo $cart_item->get_product_amount() * $cart_item->get_product_price() ?> VNĐ</span>
                        </li>
                    <?php endforeach; ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng tiền</span>
                        <strong><?= $cart_model->get_bill_total() ?> VNĐ</strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Comming Soon">
                        <button type="button" class="btn btn-secondary" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Redeem
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-7">
                <h4 class="mb-3">Thông tin thanh toán</h4>
                <form action="c-process-order.php" method="POST">
                    <?php if ($user): ?>
                        <input type="hidden" name="user_id" value="<?= $user[KhachHang::COL_PRIMARY_KEY] ?>">
                    <?php endif; ?>

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="firstName" class="form-label">Họ tên khách hàng *</label>
                            <?php if ($user): ?>
                                <input name="ten" type="text" class="form-control" id="firstName" placeholder="Họ tên đầy đủ"
                                       value="<?= $user[KhachHang::COL_TEN] ?>" disabled required>
                            <?php else: ?>
                                <input name="ten" type="text" class="form-control" id="firstName" placeholder="Họ tên đầy đủ"
                                       required>
                            <?php endif ?>

                        </div>

                        <div class="col-md-6">
                            <label for="username" class="form-label">Tên đăng nhập *</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <?php if ($user): ?>
                                    <input name="tendangnhap" type="text" class="form-control" id="username" placeholder="Tên đăng nhập"
                                           value="<?= $user[KhachHang::COL_TEN_DANG_NHAP] ?>" disabled required>
                                <?php else: ?>
                                    <input name="tendangnhap" type="text" class="form-control" id="username" placeholder="Tên đăng nhập"
                                           required>
                                <?php endif; ?>
                            </div>

                            <?php if (!$authenticate_model->is_user_logged_in()): ?>
                                <small class="text-muted">Dùng để đăng nhập tài khoản</small>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email *</label>

                            <?php if ($user): ?>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Email"
                                       value="<?= $user[KhachHang::COL_EMAIL] ?>" required disabled>
                            <?php else: ?>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Email" required>
                            <?php endif; ?>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Địa chỉ *</label>

                            <?php if ($user): ?>
                                <textarea required class="form-control" disabled name="diachi" id="address"
                                          rows="3"><?= $user[KhachHang::COL_DIA_CHI] ?></textarea>
                            <?php else: ?>
                                <textarea required name="diachi" class="form-control" id="address" rows="3"></textarea>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <label for="address2" class="form-label">Số điện thoại liên hệ *</label>

                            <?php if ($user): ?>
                                <input name="sdt" value="<?= $user[KhachHang::COL_DIEN_THOAI] ?>" disabled type="text"
                                       class="form-control" id="address2" placeholder="Số điện thoại liên hệ">
                            <?php else: ?>
                                <input name="sdt" type="text" class="form-control" id="address2"
                                       placeholder="Số điện thoại liên hệ" required>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <label for="country" class="form-label">Giới tính</label>

                            <?php if ($user): ?>
                                <input type="text" class="form-control" id="address2" name="gioitinh"
                                       value="<?= $user[KhachHang::COL_GIOI_TINH] ?>" disabled required>
                            <?php else: ?>
                                <select class="form-select" id="country" required name="gioitinh">
                                    <option value="" class="text-muted">Chọn giới tính</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            <?php endif; ?>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="same-address" checked>
                        <label class="form-check-label" for="same-address">Tôi đã đọc và đồng ý với chính sách và điều
                            khoản của cửa hàng</label>
                    </div>

                    <?php if (!$authenticate_model->is_user_logged_in()): ?>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="save-info" checked>
                            <label class="form-check-label" for="save-info">Tài khoản của bạn sẽ được tự động tạo với
                                mật khẩu mặc định là: "password"</label>
                        </div>
                    <?php endif; ?>

                    <hr class="my-4">

                    <?php if (!$authenticate_model->is_user_logged_in()): ?>
                        <div class="col-md-12">
                            <label for="" class="form-label">
                                Bạn cần tài khoản để thực hiện các tác vụ theo dõi đơn hàng. Bên cạnh đó, việc đăng ký
                                thành viên
                                tại cửa hàng sẽ giúp chúng tôi đánh giá và đưa ra những ưu đãi cho bạn.
                            </label>
                        </div>

                        <hr class="my-4">
                    <?php endif; ?>

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Tiến hành đặt hàng</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mb-5"></div>
    <!-- FOOTER -->
    <?= ClientLayoutController::get_footer() ?>
</main>


<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>

<script>
    window.feather.replace();
</script>

</body>
</html>
