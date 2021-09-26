<?php

require __DIR__ . '/XuLyMangMotChieu.php';

$random_array = [];
$length = 16;
$min = 100;
$max = 999;

for ($i = 0; $i < $length; $i++) {
    $random_number = rand($min, $max);
    $random_array[$i] = $random_number;
}

//$random_array[5] = 130;
//$random_array[7] = 130;

/**
$xulymang = new XuLyMangMotChieu($random_array);

$xulymang->xuat_mang();
$xulymang->tim_min();
$xulymang->tim_max();
$xulymang->get_mang_tang_dan();
$xulymang->get_mang_giam_dan();
$xulymang->tim_gia_tri(130);
$xulymang->thay_the_gia_tri(130, 510);
$xulymang->xoa_gia_tri(130);
 */

$matrix = new XuLyMangHaiChieu($random_array);

