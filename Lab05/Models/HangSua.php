<?php

require_once __DIR__ . '/../Databases/DBHelper.php';
require_once __DIR__ . '/IBasicDatabaseQuery.php';
require_once __DIR__ . '/SanPhamSua.php';

class HangSua implements IBasicDatabaseQuery
{
    private string $table = 'hang-sua';
    private string $primaryKey = 'id';
    private DBHelper $db_helper;

    const COL_PRIMARY_KEY = 'id';
    const COL_SKU = 'sku';
    const COL_TEN_HANG = 'ten_hang';
    const COL_DIA_CHI = 'dia_chi';
    const COL_DIEN_THOAI = 'dien_thoai';
    const COL_EMAIL = 'email';

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

    function get_danh_sach_san_pham(int $hang_sua_id)
    {
        $san_pham_model = new SanPhamSua();
        $ds_san_pham = $san_pham_model->getAll();

        $results = [];

        foreach ($ds_san_pham as $item) {
            if ($item[SanPhamSua::COL_HANG_SUA] == $hang_sua_id) $results[] = $item;
        }

        return $results;
    }

    function get_products_by_brands_for_chart_overview()
    {
        $brands = $this->getAll();

        $associative_array = [];

        foreach ($brands as $brand) {
            $associative_array[$brand[self::COL_PRIMARY_KEY]] = [
                'title' => $brand[self::COL_TEN_HANG],
                'amount' => 0
            ];
        }

        foreach ($brands as $brand) {
            $products = $this->get_danh_sach_san_pham($brand[self::COL_PRIMARY_KEY]);
            $associative_array[$brand[self::COL_PRIMARY_KEY]]['amount'] = count($products);
        }

        $titles = array_column($associative_array, 'title');
        $amounts = array_column($associative_array, 'amount');

        return array_combine($titles, $amounts);
    }
}