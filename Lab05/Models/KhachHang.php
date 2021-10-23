<?php

require_once __DIR__ . '/../Databases/DBHelper.php';
require_once __DIR__ . '/IBasicDatabaseQuery.php';

class KhachHang implements IBasicDatabaseQuery
{
    private string $table = 'khach_hang';
    private string $primaryKey = 'id';
    private DBHelper $db_helper;

    const TABLE_NAME = 'khach_hang';

    const COL_PRIMARY_KEY = 'id';
    const COL_TEN = 'ten';
    const COL_GIOI_TINH = 'gioi_tinh';
    const COL_DIA_CHI = 'dia_chi';
    const COL_DIEN_THOAI = 'dien_thoai';
    const COL_TEN_DANG_NHAP = 'ten_dang_nhap';
    const COL_MAT_KHAU = 'mat_khau';
    const COL_EMAIL = 'email';
    const COL_KIEU = 'kieu';

    const TYPE_ADMIN = 'admin';
    const TYPE_USER = 'user';

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

    function is_admin(int $id): bool
    {
        $khach_hang = $this->getByID($id);
        $type = $khach_hang[self::COL_KIEU];

        return $type == self::TYPE_ADMIN;
    }

    function get_latest_id()
    {
        return $this->db_helper->get_last_insert_id();
    }

    function get_by_username($username)
    {
        $all = $this->getAll();

        foreach ($all as $item) {
            if ($item[self::COL_TEN_DANG_NHAP] == $username)
                return $item;
        }

        return null;
    }
}