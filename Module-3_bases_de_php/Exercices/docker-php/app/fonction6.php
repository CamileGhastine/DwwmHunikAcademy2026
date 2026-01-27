<?php

$a = [12, 50, -1, 8];


// 1

function maxNumber(array $tableau) : float
{
    $max = $tableau[0];

    foreach ($tableau as $value) {
        if ($value > $max) {
            $max = $value;
        }
    }

    return $max;
}

echo maxNumber($a);

// 2

function minNumber(array $tableau) : float
{
    $min = $tableau[0];

    foreach ($tableau as $value) {
        if ($value < $min) {
            $min = $value;
        }
    }

    return $min;
}

echo '<br>';
echo minNumber($a);


// 3
echo '<br>';
echo '<br>';
echo max($a);

echo '<br>';
echo min($a);