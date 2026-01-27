<?php

// --> snake_case : je_vais_au_cinema

$string = 'je vais au cinéma';

$stringToArray = str_split($string); // Transformer une string en array

$snakeCase = '';

foreach ($stringToArray as $char) {
    if ($char !== ' ') {
        $snakeCase = $snakeCase . $char;
    } else {
        $snakeCase = $snakeCase . '_';
    }

}


echo $snakeCase;

echo '<br>';

echo str_replace(' ', '_', $string);