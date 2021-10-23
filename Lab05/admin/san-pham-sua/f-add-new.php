<?php
require_once __DIR__ . '/../layout/AdminLayoutController.php';
require_once __DIR__ . '/../../Models/Authenticate.php';

$auth = new Authenticate();
$auth->restrict();

require_once __DIR__ . '/../../Models/HangSua.php';
require_once __DIR__ . '/../../Models/LoaiSua.php';

$hang_sua = new HangSua();
$loai_sua = new LoaiSua();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Admin | Thêm sản phẩm sữa</title>

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

        <?= AdminLayoutController::get_menu(AdminLayoutController::PATH_SAN_PHAM_SUA) ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1 class="h2 my-5 text-center">Thêm sản phẩm sữa</h1>

            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-7">
                    <form action="c-add-new.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">SKU</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="SKU"
                                   name="sku" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2"
                                   placeholder="Tên sản phẩm" name="ten" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="select1" class="form-label">Hãng sữa</label>
                            <select class="form-select" id="select1" required name="hangsua">
                                <option value="" selected>Chọn hãng sữa</option>
                                <?php foreach ($hang_sua->getAll() as $item): ?>
                                    <option value="<?= $item[HangSua::COL_PRIMARY_KEY] ?>"><?= $item[HangSua::COL_TEN_HANG] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="select2" class="form-label">Loại sữa</label>
                            <select class="form-select" id="select2" required name="loaisua">
                                <option value="" selected>Chọn loại sữa</option>
                                <?php foreach ($loai_sua->getAll() as $item): ?>
                                    <option value="<?= $item[LoaiSua::COL_PRIMARY_KEY] ?>"><?= $item[LoaiSua::COL_TEN_LOAI] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Trọng lượng</label>
                            <input type="number" class="form-control" id="exampleFormControlInput3"
                                   placeholder="Trọng lượng" name="trongluong" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="select3" class="form-label">Đơn vị tính</label>
                            <select class="form-select" id="select3" name="donvitinh" required>
                                <option value="gram" selected>Gram</option>
                                <option value="ml">Milliliter</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Đơn giá</label>
                            <input type="number" class="form-control" id="exampleFormControlInput4"
                                   placeholder="Đơn giá" name="dongia" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Thành phần dinh dưỡng</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                      name="dinhduong"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea2" class="form-label">Lợi ích</label>
                            <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"
                                      name="loiich"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Chọn ảnh đại diện</label>
                            <input class="form-control" type="file" id="formFile" name="anh">
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
