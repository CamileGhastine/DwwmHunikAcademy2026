<?php

// Exercice 2

// 1)

$animal = [
    'nom' => 'Drufus',
    'animal' => 'chien',
    'race' => 'Berger Allemand',
    'age' => 12,
    'vacciné' => false,
];

var_dump($animal);
echo '<br>';

// 2)
echo $animal['nom'] . ' est un ' . $animal['race'] .' de ' . $animal['age'] . ' ans.';
echo '<br>';

// 3)
$animal['couleur'] = 'noir';
var_dump($animal);
echo '<br>';

// 4)
// $animal['age']++;
// $animal['age'] += 1;
$animal['age'] = $animal['age'] + 1;
var_dump($animal);
echo '<br>';

// 5)
if ($animal['vacciné']) {
    $vaccin = 'est vacciné';
} else {
    $vaccin = 'n\'est pas vacciné';
}

echo $animal['nom'] . ' est un ' . $animal['race'] .' de ' . $animal['age'] . ' ans et ' . $vaccin . $genre;
