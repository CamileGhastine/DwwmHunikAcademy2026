<?php

// Créer une fonction extrairePairs qui :
    // Paramètre : tableau de nombres
    // Retour : tableau contenant uniquement les nombres pairs
    // Typer les paramètres d'entrées et de sortie de la fonction


var_dump(extrairePairs([1,2,3,4,5]));    // résultat : [2,4]


function extrairePairs(array $tab) : array
{
    $result = [];

    foreach ($tab as $number) {
        if($number % 2 === 0) $result[] = $number;
    }

    return $result;
}