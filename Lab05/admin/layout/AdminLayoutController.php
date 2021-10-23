<?php

require_once __DIR__ . '/../../Models/Authenticate.php';

class AdminLayoutController
{
    const PATH_ADMIN = '/admin';
    const PATH_DON_HANG = '/admin/don-hang';
    const PATH_HANG_SUA = '/admin/hang-sua';
    const PATH_KHACH_HANG = '/admin/khach-hang';
    const PATH_LOAI_SUA = '/admin/loai-sua';
    const PATH_SAN_PHAM_SUA = '/admin/san-pham-sua';

    public static function get_header()
    {
        ob_start();

        include "header.php";

        return ob_get_clean();
    }

    public static function get_menu($page_path)
    {
        ob_start();

        $auth_model = new Authenticate();

        $admin_name = $auth_model->get_user_display_name();

        include "side-menu.php";

        return ob_get_clean();
    }

    public static function get_footer()
    {
        ob_start();

        include "footer.php";

        return ob_get_clean();
    }
}