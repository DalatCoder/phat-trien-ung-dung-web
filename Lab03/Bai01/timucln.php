<?php

function ucln($a, $b)
{
    if ($a == 0 || $b == 0) {
        return $a + $b;
    }
    while ($a != $b) {
        if ($a > $b) {
            $a -= $b; // $a = $a - $b
        } else {
            $b -= $a;
        }
    }
    return $a;
}

function bcnn($a, $b)
{
    $lcm = 0;

    $maxV = $a * $b;

    for ($i = max($a, $b); $i <= $maxV;
         $i++) {
        if ($i % $a == 0 && $i % $b == 0) {
            $lcm = $i;
            break;
        }
    }

    return $lcm;
}