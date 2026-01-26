<?php

// Exercice 2


$a = [12, 50, -1, 8];

// 1

function maxNumber(array $numberList) : float
{
    $maxNumber = 0;
    
    foreach ($numberList as $key => $number) {
        if ($maxNumber < $number) {
            $maxNumber = $number;
        }
    }

    return $maxNumber;
}

var_dump(maxNumber($a));