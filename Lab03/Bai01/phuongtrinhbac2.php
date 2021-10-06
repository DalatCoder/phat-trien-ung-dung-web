<?php

$a = 4;
$b = -2;
$c = -6;


$denta = ($b * $b) - (4 * $a *$c);

if ($denta < 0) {
    echo 'Phuong trinh vo nghiem';
}
else if ($denta == 0) {
    $x = (-$b) / (2 * $a);
    echo 'Phuong trinh co nghiem kep: x = ' . $x;
}
else {
    $x1 = (-$b + sqrt($denta)) / (2 * $a);
    $x2 = (-$b - sqrt($denta)) / (2 * $a);

    echo 'Phuong trinh co 2 nghiem phan biet<br>';
    echo 'x1 = ' . $x1 . '<br>';
    echo 'x2 = ' . $x2 . '<br>';
}
