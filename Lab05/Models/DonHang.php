<?php

require_once __DIR__ . '/../Databases/DBHelper.php';
require_once __DIR__ . '/IBasicDatabaseQuery.php';
require_once __DIR__ . '/KhachHang.php';
require_once __DIR__ . '/ChiTietDonHang.php';

class DonHang implements IBasicDatabaseQuery
{
    private string $table = 'don-hang';
    private string $primaryKey = 'id';
    private DBHelper $db_helper;

    const COL_PRIMARY_KEY = 'id';
    const COL_KHACH_HANG_ID = 'khach_hang';
    const COL_NGAY_MUA = 'ngay_mua';
    const COL_TONG_TIEN = 'tong_tien';

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

    function get_latest_id()
    {
        return $this->db_helper->get_last_insert_id();
    }

    function get_customer_data($order_id)
    {
        $order = $this->getByID($order_id);

        $customer_model = new KhachHang();
        $customer = $customer_model->getByID($order[self::COL_KHACH_HANG_ID]);

        return $customer;
    }

    function get_customer_display_name($order_id)
    {
        $customer = $this->get_customer_data($order_id);
        return $customer[KhachHang::COL_TEN];
    }

    function get_formatted_order_date($order_id)
    {
        $order = $this->getByID($order_id);

        $date = new DateTime($order[self::COL_NGAY_MUA]);
        return $date->format('d-m-Y H:i:s');
    }

    function get_order_details($order_id)
    {
        $order_detail_model = new ChiTietDonHang();
        $all_order_details = $order_detail_model->getAll();

        $filtered = [];

        foreach ($all_order_details as $item) {
            if ($item[ChiTietDonHang::COL_DON_HANG_ID] == $order_id) {
                $filtered[] = $item;
            }
        }

        return $filtered;
    }

    function count_order_details($order_id)
    {
        $all = $this->get_order_details($order_id);
        return count($all);
    }

    function count_products_in_order_details($order_id)
    {
        $all = $this->get_order_details($order_id);

        $count = 0;

        foreach ($all as $item) {
            $count += $item[ChiTietDonHang::COL_SO_LUONG];
        }

        return $count;
    }

    function get_all_by_customer_id($cid)
    {
        $all = $this->getAll();

        $filtered = [];

        foreach ($all as $item) {
            if ($item[self::COL_KHACH_HANG_ID] == $cid) {
                $filtered[] = $item;
            }
        }

        return $filtered;
    }

    function get_order_in_range(DateTime $date_begin, DateTime $date_end)
    {
        $all = $this->getAll();

        $filtered = [];

        foreach ($all as $item) {
            $date = new DateTime($item[self::COL_NGAY_MUA]);

            if ($date_begin->getTimestamp() <= $date->getTimestamp() && $date->getTimestamp() <= $date_end->getTimestamp()) {
                $filtered[] = $item;
            }
        }

        return $filtered;
    }

    function get_the_last_7_days_for_chart_overview(DateTime $date_current = null)
    {
        if (!$date_current) {
            $date_current = new DateTime();
        }

        $seven_dates_ago = clone $date_current;
        $seven_dates_ago->modify('-1 week');

        $orders = $this->get_order_in_range($seven_dates_ago, $date_current);

        $assoc_array = [];

        for ($i = 1; $i < 7; $i++) {
            $seven_dates_ago->modify('+1 day');
            $index = $seven_dates_ago->format('d-m-Y');
            $assoc_array[$index] = 0;
        }

        foreach ($orders as $order) {
            $request_date = new DateTime($order[self::COL_NGAY_MUA]);

            $date_str = $request_date->format('d-m-Y');
            if (!isset($assoc_array[$date_str])) {
                $assoc_array[$date_str] = 0;
            }

            $assoc_array[$date_str] += $order[self::COL_TONG_TIEN];
        }

        return $assoc_array;
    }
}