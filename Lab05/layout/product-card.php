<div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
     style="background-image: url('<?= $duong_dan_san_pham ?>'); position: relative">

    <div style="position:absolute; top: 0; bottom: 0; left: 0; right: 0; background-color: rgba(0,0,0,0.3); z-index: 0;"></div>

    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1" style="z-index: 1">
        <p class="lead pt-5 mt-5 mb-4 lh-1 fw-bold"><?= $ten_san_pham ?></p>
        <ul class="d-flex list-unstyled mt-auto">
            <li class="me-auto">
                <span data-feather="dollar-sign"></span>
                <small><?= $don_gia ?> VNĐ</small>
            </li>
            <li class="d-flex align-items-center me-3">
                <a class="nav-link p-0 text-white fw-bold"
                   href="<?= ClientLayoutController::PATH_CHI_TIET_SAN_PHAM ?>?id=<?= $ma_dinh_danh_san_pham ?>">
                    <span data-feather="eye"></span>
                </a>
            </li>
            <li class="d-flex align-items-center">
                <form action="<?= ClientLayoutController::PATH_THEM_VAO_GIO_HANG ?>" method="post">
                    <input type="hidden" name="product_id"
                           value="<?= $ma_dinh_danh_san_pham ?>">
                    <button type="submit" class="nav-link p-0 me-1 border-0 bg-transparent text-white fw-bold">
                        <span data-feather="shopping-cart"></span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
