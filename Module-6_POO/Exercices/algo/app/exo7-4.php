<?php

// Créer une fonction appelée supprimerDoublons qui :
    // prend en paramètre un tableau
    // retourne un nouveau tableau sans doublons
    // Typer les paramètres d'entrées et de sortie de la fonction


$tab = [1, 2, 2, 3, 4, 4, 5];

$resultat = supprimerDoublons($tab);

echo '<pre>';
var_dump($resultat);        //Résultat attendu : [1, 2, 3, 4, 5]
echo '<pre>';

function supprimerDoublons(array $tab) : array
{
    $newTab = [];
    foreach ($tab as $number) {
        if(!in_array($number, $newTab)) {
            $newTab[] = $number;
        }
    }

    return $newTab;
}



// function supprimerDoublons(array $tab) : array
// {
//     $newTab = [];
//     $first = true;
//     foreach ($tab as $number) {
//         if ($first) {
//             $newTab[] = $number;
//             $first = false;
//             continue;
//         }
//         $isSame = false;
//         foreach ($newTab as $newNumber) {
//             if($number === $newNumber) {
//                 $isSame = true;
//             }
//         }
//         if (!$isSame) {
//             $newTab[] = $number;
//         }
//     }

//     return $newTab;
// }


// function supprimerDoublons($array $tab) : array
// {
//     return array_values(array_unique($tab));
// }

