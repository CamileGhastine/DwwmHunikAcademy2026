<?php

// Numéro de CB caché : remplacer tous les chiffres d'une carte bancaire par *, sauf les 4 derniers.
// 1234567890123456 -> ************2456
$carte1 = "1234567890123456";

$carteCachee = '************'.substr($carte1, 12, 4);



echo "Votre CB : $carteCachee";
echo '<br>';

// Numéro de CB caché : adapter le code au cas où le numéro de CB compte des esapce.
// 1234 5678 9012 3456 -> ************2456
$carte2 = '1234 5678 9012 3456';

$carte2 = str_replace(' ', '', $carte2);
$carteCachee2 = '************'.substr($carte2, 12, 4);

echo "Votre CB : $carteCachee2";
echo '<br>';

// Cas ou on ne sait pas combien il ya de chiffre à l'avance

$carte3 = '1234 5678 9012 3456 3263 1111';

$carte3 = str_replace(' ', '', $carte3);
$carteCachee2 = str_repeat('*', mb_strlen($carte3) -4).substr($carte3, mb_strlen($carte3) - 4, 4);

echo "Votre CB : $carteCachee2";
echo '<br>';

// Cas pour le fun de manière bas niveau
$carte4 = '1234 5678';

$tab = str_split($carte4);
$nbreCaratere = count($tab);
$carteCachee = '';
$count = 0;
foreach ($tab as $letter) {
    $count++;

    if ($letter === ' ') {
        continue;
    }

    if($count <= $nbreCaratere-4) {
        $carteCachee .= '*';
        continue;
    }

    $carteCachee .= $letter;

};

echo "Votre CB : $carteCachee";
