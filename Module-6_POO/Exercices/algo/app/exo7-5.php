<?php

// Créer une fonction appelée trierTableau qui :
    // prend en paramètre un tableau de nombres
    // retourne le tableau trié du plus petit au plus grand
    // Typer les paramètres d'entrées et de sortie de la fonction

$tab = [8, 3, 5, 1, 9];

$resultat = trierTableau($tab);

var_dump($resultat);        // Résultat attendu : [1, 3, 5, 8, 9]

function trierTableau(array $tab) : array
{
    foreach($tab as $position => $number) {
        foreach($tab as $pos => $num) {
            if($tab[$position] < $tab[$pos]) {
                $varInt = $tab[$position];
                $tab[$position] = $tab[$pos];
                $tab[$pos] = $varInt;
            }
        }
    }

    return $tab;
}

// function trierTableau(array $tab) : array
// {
//     sort($tab);

//     return $tab;
// }
