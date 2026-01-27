<?php

// 1

$mot = 'chien';

function displayReverseString(string $string) : void
{
    $reverseString = '';

    for ($i = strlen($string) -1; $i >= 0; $i--) {
        $reverseString = $reverseString . $string[$i];
    }


    echo $reverseString;
}


displayReverseString($mot);

echo '<br>';

// 2 

function  reverseString(string $string) : string
{
    $reverseString = '';

    for ($i = strlen($string) -1; $i >= 0; $i--) {
        $reverseString = $reverseString . $string[$i];
    }

    return $reverseString;
}

echo reverseString($mot);

echo '<br>';


// 3 Palinddromme ex: kayak <--> Kayak

function isPallindrome(string $string) : bool
{
    if ($string === reverseString($string)) {
        return true;
    } else {
        return false;
    }
}


var_dump(isPallindrome($mot));