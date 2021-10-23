<?php

require_once __DIR__ . '/../layout/AdminLayoutController.php';
require_once __DIR__ . '/../../Models/Authenticate.php';

$auth = new Authenticate();
$auth->restrict();

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

require_once __DIR__ . '/../../Models/SanPhamSua.php';

$model = new SanPhamSua();

$san_pham = $model->getByID($_GET['id']);

if (!$san_pham) {
    header('Location: index.php');
    exit();
}

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
    <title>Admin | Cập nhật sản phẩm sữa</title>

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
            <h1 class="h2 my-5 text-center">Cập nhật sản phẩm sữa</h1>

            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-7">
                    <form action="c-update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $san_pham[SanPhamSua::COL_PRIMARY_KEY] ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">SKU</label>
                            <input value="<?= $san_pham[SanPhamSua::COL_SKU] ?>" type="text" class="form-control"
                                   id="exampleFormControlInput1" placeholder="SKU" name="sku" autocomplete="off"
                                   required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Tên sản phẩm</label>
                            <input value="<?= $san_pham[SanPhamSua::COL_TEN] ?>" type="text" class="form-control"
                                   id="exampleFormControlInput2"
                                   placeholder="Tên sản phẩm" name="ten" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="select1" class="form-label">Hãng sữa</label>
                            <select class="form-select" id="select1" required name="hangsua">
                                <option value="" selected>Chọn hãng sữa</option>
                                <?php foreach ($hang_sua->getAll() as $item): ?>
                                    <?php if ($item[HangSua::COL_PRIMARY_KEY] == $san_pham[SanPhamSua::COL_HANG_SUA]): ?>
                                        <option value="<?= $item[HangSua::COL_PRIMARY_KEY] ?>"
                                                selected><?= $item[HangSua::COL_TEN_HANG] ?></option>
                                    <?php else: ?>
                                        <option value="<?= $item[HangSua::COL_PRIMARY_KEY] ?>"><?= $item[HangSua::COL_TEN_HANG] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="select2" class="form-label">Loại sữa</label>
                            <select class="form-select" id="select2" required name="loaisua">
                                <option value="" selected>Chọn loại sữa</option>
                                <?php foreach ($loai_sua->getAll() as $item): ?>
                                    <?php if ($item[LoaiSua::COL_PRIMARY_KEY] == $san_pham[SanPhamSua::COL_LOAI_SUA]): ?>
                                        <option value="<?= $item[LoaiSua::COL_PRIMARY_KEY] ?>"
                                                selected><?= $item[LoaiSua::COL_TEN_LOAI] ?></option>
                                    <?php else: ?>
                                        <option value="<?= $item[LoaiSua::COL_PRIMARY_KEY] ?>"><?= $item[LoaiSua::COL_TEN_LOAI] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput3" class="form-label">Trọng lượng</label>
                            <input value="<?= $san_pham[SanPhamSua::COL_TRONG_LUONG] ?>" type="number" class="form-control" id="exampleFormControlInput3"
                                   placeholder="Trọng lượng" name="trongluong" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="select3" class="form-label">Đơn vị tính</label>
                            <select class="form-select" id="select3" name="donvitinh" required>
                                <option value="gram" <?php echo ($san_pham[SanPhamSua::COL_DON_VI_TINH] == "gram") ? 'selected' : '' ?>>Gram</option>
                                <option value="ml" <?php echo ($san_pham[SanPhamSua::COL_DON_VI_TINH] == "ml") ? 'selected' : '' ?>>Milliliter</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput4" class="form-label">Đơn giá</label>
                            <input value="<?= $san_pham[SanPhamSua::COL_DON_GIA] ?>" type="number" class="form-control" id="exampleFormControlInput4"
                                   placeholder="Đơn giá" name="dongia" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Thành phần dinh dưỡng</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                      name="dinhduong"><?= $san_pham[SanPhamSua::COL_THANH_PHAN] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea2" class="form-label">Lợi ích</label>
                            <textarea class="form-control" id="exampleFormControlTextarea2" rows="3"
                                      name="loiich"><?= $san_pham[SanPhamSua::COL_LOI_ICH] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Chọn ảnh đại diện</label>
                            <input class="form-control" type="file" id="formFile" name="anh">
                        </div>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-7 col-xl-6">
                                <img class="img-fluid rounded-3" src="/<?= $san_pham[SanPhamSua::COL_TEN_HINH_ANH_SERVER] ?>" alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Cập nhật" class="btn btn-primary" name="submit">
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
