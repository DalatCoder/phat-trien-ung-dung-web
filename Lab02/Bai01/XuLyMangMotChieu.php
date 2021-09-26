<?php
class XuLyMangMotChieu
{
    private $array;

    public function __construct($arr)
    {
        $this->array = $arr;
    }

    public function xuat_mang()
    {
        ?>
        <h3>Mang cac phan tu ngau nhien</h3>
        <p>So luong phan tu: <?php echo count($this->array); ?></p>
        <ul>
            <?php foreach ($this->array as $item): ?>
                <li><?= $item ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }

    public function tim_min()
    {
        ?>
        <h4>Gia tri toi thieu: <?php echo min($this->array) ?></h4>
        <?php
    }

    public function tim_max()
    {
        ?>
        <h4>Gia tri toi da: <?php echo max($this->array) ?></h4>
        <?php
    }

    public function get_mang_tang_dan()
    {
        $temp_arr = $this->array;
        sort($temp_arr);
        ?>
        <h3>Mang cac phan tu tang dan</h3>
        <p>So luong phan tu: <?php echo count($temp_arr); ?></p>
        <ul>
            <?php foreach ($temp_arr as $item): ?>
                <li><?= $item ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }

    public function get_mang_giam_dan()
    {
        $temp_arr = $this->array;
        rsort($temp_arr);
        ?>
        <h3>Mang cac phan tu giam dan</h3>
        <p>So luong phan tu: <?php echo count($temp_arr); ?></p>
        <ul>
            <?php foreach ($temp_arr as $item): ?>
                <li><?= $item ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }

    public function tim_gia_tri($value)
    {
        $is_exist = in_array($value, $this->array);

        $location = null;

        if ($is_exist) {
            foreach ($this->array as $key => $val) {
                if ($val == $value) {
                    $location = $key;
                }
            }
        }

        if ($is_exist) {
            echo '<h4>Phan tu ' . $value . ' co ton tai trong mang</h4>';
            echo '<p>Tai vi tri: ' . $location . '</p>';
        }
        else {
            echo '<h4>Phan tu ' . $value . ' khong ton tai trong mang</h4>';
        }
    }

    public function thay_the_gia_tri($value, $replace)
    {
        $is_exist = in_array($value, $this->array);

        if (!$is_exist) {
            echo 'Khong tim thay phan tu de thay the';
            return;
        }

        $new_array = [];
        foreach ($this->array as $item) {
            if ($item == $value) {
                $new_array[] = $replace;
            }
            else {
                $new_array[] = $item;
            }
        }
        ?>
        <h3>Mang cac phan tu sau khi thay the gia tri</h3>
        <p>So luong phan tu: <?php echo count($new_array); ?></p>
        <ul>
            <?php foreach ($new_array as $item): ?>
                <li><?= $item ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }

    public function xoa_gia_tri($value)
    {
        $is_exist = in_array($value, $this->array);

        if (!$is_exist) {
            echo 'Phan tu can xoa khong ton tai trong mang';
            return;
        }

        $new_array = [];
        foreach ($this->array as $item) {
            if ($item != $value) {
                $new_array[] = $item;
            }
        }

        ?>
        <h3>Mang sau khi xoa phan tu</h3>
        <p>So luong phan tu: <?php echo count($new_array); ?></p>
        <ul>
            <?php foreach ($new_array as $item): ?>
                <li><?= $item ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }
}
