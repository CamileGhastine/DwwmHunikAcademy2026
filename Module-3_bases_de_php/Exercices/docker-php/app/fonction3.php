<?php


$a = [12, 50, -1, 8];

echo sum($a);
echo '<br>';
echo sum([12, 50, -1, 8]);
echo '<br>';
echo sum([12, 41, -100, 69, 81, 75, 110]);
echo '<br>';

function sum(array $listNumber) : float
{
    $sum = 0;

    foreach ($listNumber as $value) {
        $sum += $value;
    }

    return $sum;
}

// Cette fonction est la même sur array_sum

echo array_sum($a);
