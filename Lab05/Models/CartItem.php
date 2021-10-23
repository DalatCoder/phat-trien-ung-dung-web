<?php

require_once __DIR__ . '/SanPhamSua.php';

class CartItem
{
    const COL_PRODUCT_ID = 'product_id';
    const COL_PRODUCT_AMOUNT = 'product_amount';

    private int $product_id;
    private int $product_amount;

    public function __construct($product_id, $product_amount)
    {
        $this->product_id = $product_id;
        $this->product_amount = $product_amount;
    }

    public function get_product_detail()
    {
        $model = new SanPhamSua();
        return $model->getByID($this->product_id);
    }

    public function get_product_name()
    {
        $san_pham = $this->get_product_detail();
        return $san_pham[SanPhamSua::COL_TEN];
    }

    public function get_product_price()
    {
        $san_pham = $this->get_product_detail();
        return $san_pham[SanPhamSua::COL_DON_GIA];
    }

    public function get_product_id()
    {
        return $this->product_id;
    }

    public function get_product_amount()
    {
        return $this->product_amount;
    }

    public function set_product_amount($amount)
    {
        $this->product_amount = $amount;
    }

    public function increase($amount = 1)
    {
        $this->product_amount += $amount;
    }

    public function decrease($amount = 1)
    {
        if ($this->product_amount - $amount < 0) $this->product_amount = 0;
        else $this->product_amount -= $amount;
    }
}