<?php
require_once __DIR__ . '/../layout/AdminLayoutController.php';
require_once __DIR__ . '/../../Models/Authenticate.php';

$auth = new Authenticate();
$auth->restrict();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin | Thêm tài khoản mới</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/admin/assets/style/bootstrap.min.css">

    <script src="/admin/assets/js/feather.min.js"></script>

    <!-- Favicons -->
    <meta name="theme-color" content="#7952b3">

    <!-- Custom styles for this template -->
    <link href="/admin/assets/style/main.css" rel="stylesheet">
</head>
<body>

<?= AdminLayoutController::get_header() ?>

<div class="container-fluid">
    <div class="row">

        <?= AdminLayoutController::get_menu(AdminLayoutController::PATH_KHACH_HANG) ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1 class="h2 my-5 text-center">Thêm tài khoản</h1>

            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-7">
                    <form action="c-add-new.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tên</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên" name="ten" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="select3" class="form-label">Giới tính</label>
                            <select class="form-select" id="select3" name="gioitinh" required>
                                <option value="" selected>Chọn giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea2" class="form-label">Địa chỉ</label>
                            <textarea class="form-control" id="exampleFormControlTextarea2" rows="3" name="diachi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Số điện thoại" name="sdt" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput" placeholder="Email" name="email" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="Tên đăng nhập" name="tendangnhap" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" id="exampleFormControlInput3" placeholder="Mật khẩu" name="matkhau" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="select4" class="form-label">Loại tài khoản</label>
                            <select class="form-select" id="select4" name="loaitaikhoan" required>
                                <option value="user" selected>Người dùng bình thường</option>
                                <option value="admin">Quản trị viên</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Thêm" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

</div>

<script src="/admin/assets/js/bootstrap.bundle.min.js"></script>

<script>
    window.feather.replace();
</script>
</body>
</html>
