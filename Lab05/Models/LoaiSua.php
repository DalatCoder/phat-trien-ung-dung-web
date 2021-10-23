<?php

require_once __DIR__ . '/../Databases/DBHelper.php';
require_once __DIR__ . '/IBasicDatabaseQuery.php';

require_once __DIR__ . '/SanPhamSua.php';

class LoaiSua implements IBasicDatabaseQuery
{
    private string $table = 'loai-sua';
    private string $primaryKey = 'id';
    private DBHelper $db_helper;

    const COL_PRIMARY_KEY = 'id';
    const COL_TEN_LOAI = 'ten_loai';
    const COL_MO_TA = 'mo_ta';

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

    function get_danh_sach_san_pham(int $loai_sua_id)
    {
        $san_pham_model = new SanPhamSua();
        $ds_san_pham = $san_pham_model->getAll();

        $results = [];

        foreach ($ds_san_pham as $item) {
            if ($item[SanPhamSua::COL_LOAI_SUA] == $loai_sua_id) $results[] = $item;
        }

        return $results;
    }

    function get_products_by_types_for_chart_overview()
    {
        $types = $this->getAll();

        $associative_array = [];

        foreach ($types as $type) {
            $associative_array[$type[self::COL_PRIMARY_KEY]] = [
                'title' => $type[self::COL_TEN_LOAI],
                'amount' => 0
            ];
        }

        foreach ($types as $type) {
            $products = $this->get_danh_sach_san_pham($type[self::COL_PRIMARY_KEY]);
            $associative_array[$type[self::COL_PRIMARY_KEY]]['amount'] = count($products);
        }

        $titles = array_column($associative_array, 'title');
        $amounts = array_column($associative_array, 'amount');

        return array_combine($titles, $amounts);
    }

}