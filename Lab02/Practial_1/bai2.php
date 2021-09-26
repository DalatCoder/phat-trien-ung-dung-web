<?php 

$a = 1;
$b = 2;
$c = 3;

// $max = $a > $b ? $a : $b;

// $max = $max > $c ? $max : $c;

// $max = $a;

// if ($max < $b) $max = $b;
// if ($max < $c) $max = $c;

$max = max($a, $b);
$max = max($max, $c);

// echo 'Max is ' . $max; 
echo "Max is $max";