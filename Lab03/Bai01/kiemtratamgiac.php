<?php

$a = 100;
$b = 1;
$c = 1;

$co_phai_tam_giac_hay_khong = ($a < $b + $c) || ($b < $a + $c) || ($c < $a + $b);
if (!$co_phai_tam_giac_hay_khong) {
    echo 'Day khong phai la tam giac hop le';
    exit();
}

if ($a * $a == $b * $b + $c * $c || $b * $b == $a * $a + $c * $c || $c * $c == $a * $a + $b * $b) {
    echo 'Day la tam giac vuong';
    exit();
}

if ($a == $b && $b == $c) {
    echo 'Day la tam giac deu';
    exit();
}

if ($a == $b || $b == $c || $c == $a) {
    echo 'Day la tam giac can';
    exit();
}

if ($a * $a > $b * $b + $c * $c || $b * $b > $a * $a + $c * $c || $c * $c > $a * $a + $b * $b):
    echo 'Day la tam giac tu';
    exit();
endif;

echo 'Day la tam giac nhon';