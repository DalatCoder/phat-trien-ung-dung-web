<?php

require_once __DIR__ . '/CartItem.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


class Cart
{
    const S_KEY_PRODUCTS = 'products';

    public function add(CartItem $item)
    {
        if ($this->exists($item)) {
            if ($item->get_product_amount() > 1) {
                $this->set_amount($item, $item->get_product_amount());
            }
            else {
                $this->increase($item);
            }
        }
        else {
            $products = $this->get_all();
            $products[] = $item;

            $this->save($products);
        }
    }

    public function exists(CartItem $item)
    {
        $products = $this->get_all();

        foreach ($products as $p) {
            if ($p->get_product_id() == $item->get_product_id()) {
                return $p;
            }
        }

        return null;
    }

    public function get_number_of_products_in_cart()
    {
        $total = 0;
        $products = $this->get_all();

        foreach ($products as $p) {
            $total += $p->get_product_amount();
        }

        return $total;
    }

    public function remove(int $product_id)
    {
        $products = $this->get_all();

        $filtered = [];

        foreach ($products as $p) {
            if ($p->get_product_id() != $product_id) {
                $filtered[] = $p;
            }
        }

        $this->save($filtered);
    }

    /**
     * @return CartItem[]
     */
    public function get_all(): array
    {
        if (!isset($_SESSION[self::S_KEY_PRODUCTS]) || !is_array($_SESSION[self::S_KEY_PRODUCTS])) return [];
        $results = [];
        foreach ($_SESSION[self::S_KEY_PRODUCTS] as $item)
        {
            $serialized_item = unserialize(serialize($item));
            $results[] = $serialized_item;
        }

        return $results;
    }

    public function get_product(CartItem $product)
    {
        return $product->get_product_detail();
    }

    public function get_amount_by_id($product_id)
    {
        $all = $this->get_all();

        foreach ($all as $item) {
            if ($item->get_product_id() == $product_id)
                return $item->get_product_amount();
        }

        return 0;
    }

    /**
     * @param int $product_id
     * @return CartItem
     */
    public function get_product_by_id($product_id)
    {
        $all = $this->get_all();

        foreach ($all as $item) {
            if ($item->get_product_id() == $product_id)
                return $this->get_product($item);
        }

        return null;
    }

    public function remove_all()
    {
        $this->clear();
    }

    public function increase(CartItem $product, $amount = 1)
    {
        $products = $this->get_all();

        $mapped = [];

        foreach ($products as $p) {
            if ($p->get_product_id() == $product->get_product_id()) {
                $p->increase($amount);
            }
            $mapped[] = $p;
        }

        $this->save($mapped);
    }

    public function decrease(CartItem $product, $amount = 1)
    {
        $products = $this->get_all();

        $mapped = [];

        foreach ($products as $p) {
            if ($p->get_product_id() == $product->get_product_id()) {
                $p->decrease($amount);
            }

            $mapped[] = $p;
        }

        $this->save($mapped);
    }

    public function get_bill_total()
    {
        $products = $this->get_all();

        $total = 0;

        foreach ($products as $product) {
            $total += ($product->get_product_amount() * $product->get_product_price());
        }

        return $total;
    }

    public function set_amount(CartItem $product, $amount)
    {
        if ($amount < 0) $amount = 0;

        $products = $this->get_all();

        $mapped = [];

        foreach ($products as $p) {
            if ($p->get_product_id() == $product->get_product_id()) {
                $p->set_product_amount($amount);
            }

            $mapped[] = $p;
        }

        $this->save($mapped);
    }

    private function save($prodcts)
    {
        $_SESSION[self::S_KEY_PRODUCTS] = $prodcts;
    }

    private function clear()
    {
        unset($_SESSION[self::S_KEY_PRODUCTS]);
    }
}