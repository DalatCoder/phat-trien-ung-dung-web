<?php 

$str = 'Nguyen Trong Hieu';

echo $str . '<br>';
echo 'String length: ' . strlen($str) . '<br>';

// Lay chu Hieu

$hieu = substr($str, 13, 4);
echo $hieu;