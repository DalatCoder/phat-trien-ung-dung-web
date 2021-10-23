<?php

require_once __DIR__ . '/../Models/DonHang.php';
require_once __DIR__ . '/../Models/ChiTietDonHang.php';
require_once __DIR__ . '/../Models/Cart.php';
require_once __DIR__ . '/../Models/CartItem.php';
require_once __DIR__ . '/../Models/KhachHang.php';

require_once __DIR__ . '/../Models/Authenticate.php';

$don_hang_model = new DonHang();
$ct_don_hang_model = new ChiTietDonHang();
$cart_model = new Cart();
$authenticate_model = new Authenticate();
$khach_hang_model = new KhachHang();

if ($authenticate_model->is_user_logged_in()) {
    $user_id = $authenticate_model->get_user_id();
}
else {

    $existing_user = $khach_hang_model->get_by_username($_POST['tendangnhap']);
    if ($existing_user) {
        $user_id = $existing_user[KhachHang::COL_PRIMARY_KEY];

        $user_name = $existing_user[KhachHang::COL_TEN_DANG_NHAP];
        $user_pass = $existing_user[KhachHang::COL_MAT_KHAU];

        $authenticate_model->login($user_name, $user_pass);
    }
    else {
        $khach_hang_model->save([
            KhachHang::COL_PRIMARY_KEY => null,
            KhachHang::COL_MAT_KHAU => 'password',
            KhachHang::COL_GIOI_TINH => $_POST['gioitinh'],
            KhachHang::COL_TEN => $_POST['ten'],
            KhachHang::COL_KIEU => KhachHang::TYPE_USER,
            KhachHang::COL_DIEN_THOAI => $_POST['sdt'],
            KhachHang::COL_DIA_CHI => $_POST['diachi'],
            KhachHang::COL_EMAIL => $_POST['email'],
            KhachHang::COL_TEN_DANG_NHAP => $_POST['tendangnhap']
        ]);

        $authenticate_model->login($_POST['tendangnhap'], 'password');

        $user_id = $khach_hang_model->get_latest_id();
    }
}

$bill_total = $cart_model->get_bill_total();

$don_hang_model->save([
    DonHang::COL_KHACH_HANG_ID => $user_id,
    DonHang::COL_TONG_TIEN => $bill_total
]);
$don_hang_id = $don_hang_model->get_latest_id();

foreach ($cart_model->get_all() as $item) {
    $ct_don_hang_model->save([
        ChiTietDonHang::COL_PRIMARY_KEY => null,
        ChiTietDonHang::COL_DON_HANG_ID => $don_hang_id,
        ChiTietDonHang::COL_GIA_MUA => $item->get_product_price(),
        ChiTietDonHang::COL_SAN_PHAM_ID => $item->get_product_id(),
        ChiTietDonHang::COL_SO_LUONG => $item->get_product_amount(),
    ]);
}

$cart_model->remove_all();


header('Location: /khach-hang/profile/orders.php');
