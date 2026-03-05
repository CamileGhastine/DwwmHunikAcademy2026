<?php

// Numéro de CB caché : remplacer tous les chiffres d'une carte bancaire par *, sauf les 4 derniers.
// 1234567890123456 -> ************2456
$carte1 = "1234567890123456";

// Coder ici ...



echo "Votre CB : $carteCachee";
echo '<br>';

// Numéro de CB caché : adapter le code au cas où le numéro de CB compte des esapce.
// 1234 5678 9012 3456 -> ************2456
$carte2 = '1234 5678 9012 3456';


echo "Votre CB : $carteCachee2";
echo '<br>';
