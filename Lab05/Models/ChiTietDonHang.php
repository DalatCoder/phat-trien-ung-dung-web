<?php

require_once __DIR__ . '/../Databases/DBHelper.php';
require_once __DIR__ . '/IBasicDatabaseQuery.php';
require_once __DIR__ . '/SanPhamSua.php';

class ChiTietDonHang implements IBasicDatabaseQuery
{
    private string $table = 'chi-tiet-don-hang';
    private string $primaryKey = 'id';
    private DBHelper $db_helper;

    const COL_PRIMARY_KEY = 'id';
    const COL_DON_HANG_ID = 'don_hang';
    const COL_SAN_PHAM_ID = 'san_pham';
    const COL_SO_LUONG = 'so_luong';
    const COL_GIA_MUA = 'gia_mua';

    public function __construct()
    {
        $this->db_helper = new DBHelper($this->table, $this->primaryKey);
    }

    function getAll()
    {
        return $this->db_helper->findAll();
    }

    function getByID(int $id)
    {
        return $this->db_helper->findById($id);
    }

    function getTotalRecord()
    {
        return $this->db_helper->total();
    }

    function save($record)
    {
        $this->db_helper->save($record);
    }

    function delete(int $id)
    {
        $this->db_helper->delete($id);
    }

    function get_product($order_detail_id)
    {
        $order = $this->getByID($order_detail_id);

        $product_model = new SanPhamSua();
        $product = $product_model->getByID($order[self::COL_SAN_PHAM_ID]);

        return $product;
    }

    function get_product_image_path($order_detail_id)
    {
        $product = $this->get_product($order_detail_id);
        return $product[SanPhamSua::COL_TEN_HINH_ANH_SERVER];
    }

    function get_product_name($order_detail_id)
    {
        $product = $this->get_product($order_detail_id);
        return $product[SanPhamSua::COL_TEN];
    }
}