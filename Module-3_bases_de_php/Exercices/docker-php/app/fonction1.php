<?php
// Exercice 1

//1
/*
function calculTVA(float $price) : float
{
    return $price * 20 / 100;
} 

var_dump(calculTVA(100));
echo '<br>';
*/

// 2
/*
function calculTTC(float $price) : float
{
    return $price + $price * 20 /100;
}

var_dump(calculTTC(100));
echo '<br>';
*/

// 3 

function calculTVA(float $price, float $tva = 20) : float
{
    return $price * $tva / 100;
} 

var_dump(calculTVA(100, 5));
echo '<br>';

// 4

function calculTTC(float $price, float $tva = 20) : float
{
    return $price + $price * $tva /100;
}

var_dump(calculTTC(100, 5));
echo '<br>';

// remarque : il est possible d'appeler une focntion dans une autre fonction
function calculTTC2(float $price, float $tva = 20) : float
{
    return $price + calculTVA($price, $tva);
}

var_dump(calculTTC2(100, 5));