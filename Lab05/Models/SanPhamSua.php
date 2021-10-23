<?php

require_once __DIR__ . '/../Databases/DBHelper.php';
require_once __DIR__ . '/IBasicDatabaseQuery.php';

require_once __DIR__ . '/LoaiSua.php';
require_once __DIR__ . '/HangSua.php';

class SanPhamSua implements IBasicDatabaseQuery
{
    private string $table = 'san-pham-sua';
    private string $primaryKey = 'id';
    private DBHelper $db_helper;

    const COL_PRIMARY_KEY = 'id';
    const COL_TEN = 'ten';
    const COL_SKU = 'sku';
    const COL_HANG_SUA = 'hang_sua';
    const COL_LOAI_SUA = 'loai_sua';
    const COL_TRONG_LUONG = 'trong_luong';
    const COL_DON_GIA = 'don_gia';
    const COL_THANH_PHAN = 'thanh_phan';
    const COL_LOI_ICH = 'loi_ich';
    const COL_TEN_HINH_ANH_GOC = 'ten_hinh_anh_goc';
    const COL_TEN_HINH_ANH_SERVER = 'ten_hinh_anh_server';
    const COL_DON_VI_TINH = 'unit';

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

    function get_hang_sua(int $id)
    {
        $san_pham = $this->getByID($id);
        if (!$san_pham)
            throw new Exception('Sản phẩm không tồn tại');

        $hang_sua_model = new HangSua();
        return $hang_sua_model->getByID($san_pham[self::COL_HANG_SUA]);
    }

    function get_loai_sua(int $id)
    {
        $san_pham = $this->getByID($id);
        if (!$san_pham)
            throw new Exception('Sản phẩm không tồn tại');

        $loai_sua = new LoaiSua();
        return $loai_sua->getByID($san_pham[self::COL_LOAI_SUA]);
    }
}