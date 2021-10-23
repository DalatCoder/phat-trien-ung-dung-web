<?php

require_once __DIR__ . '/../Models/Authenticate.php';
require_once __DIR__ . '/../Models/Cart.php';
require_once __DIR__ . '/../Models/SanPhamSua.php';

class ClientLayoutController
{
    const PATH_HOME = '/';
    const PATH_SAN_PHAM = '/san-pham';
    const PATH_HANG_SUA = '/hang-sua';
    const PATH_LOAI_SUA = '/loai-sua';
    const PATH_GIO_HANG = '/gio-hang';
    const PATH_PROFILE = '/khach-hang/profile';
    const PATH_DANG_XUAT = '/khach-hang/c-logout.php';
    const PATH_TAO_TAI_KHOAN = '/khach-hang/f-register.php';
    const PATH_DANG_NHAP = '/khach-hang/f-login.php';
    const PATH_THANH_TOAN = '/thanh-toan';
    const PATH_THEM_VAO_GIO_HANG = '/gio-hang/c-add-product.php';
    const PATH_CHI_TIET_SAN_PHAM = '/san-pham/index.php';

    public static function get_header($page_path)
    {
        $auth = new Authenticate();

        $is_user_logged_in = $auth->is_user_logged_in();
        $is_admin = $auth->is_admin_user();
        $user_display_name = $auth->get_user_display_name();

        $store_name = 'NTH Store';

        $cart_model = new Cart();
        $number_of_products_in_cart = $cart_model->get_number_of_products_in_cart();

        ob_start();
        include "header.php";
        return ob_get_clean();
    }

    public static function get_footer()
    {
        ob_start();

        include "footer.php";

        return ob_get_clean();
    }

    public static function get_store_objective()
    {
        ob_start();

        include "store-objective.php";

        return ob_get_clean();
    }

    public static function get_product_card($product)
    {
        $duong_dan_san_pham = '/' . $product[SanPhamSua::COL_TEN_HINH_ANH_SERVER];
        $ten_san_pham = $product[SanPhamSua::COL_TEN];
        $don_gia = $product[SanPhamSua::COL_DON_GIA];
        $ma_dinh_danh_san_pham = $product[SanPhamSua::COL_PRIMARY_KEY];

        ob_start();

        include 'product-card.php';

        return ob_get_clean();
    }

    public static function get_slider()
    {
        ob_start();

        include 'slider.php';

        return ob_get_clean();
    }
}