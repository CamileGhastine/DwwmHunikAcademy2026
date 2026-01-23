<?php

// Exercice 1
$a = 1;
while ($a <= 10) {
    echo $a;
    echo '<br>';
    $a++;
}

echo '<br>';


// Exercice 2
for ($a = 1; $a <= 10; $a++) {
    echo $a . '<br>';
}

// Exercice 3
$i = 1;
while ($i <= 8) {
    echo '*';
    $i++;
}

echo '<br>';

// Exercice 4
for ($i = 1; $i <= 8; $i++ ) {
    echo '*';
}

echo '<br>';

// Exercice 5
$table = 4;

for ($i=1; $i <= 10; $i++) {
    echo $table . 'x' . $i . '=' . $table * $i;
    if ($i !== 10) {
        echo ', '; 
    }
}

echo '<br>';

// Exercice 6
$i = 10;
while($i >= 0) {
    echo $i . '<br>';
    // $i = $i -1;
    // $i -= 1;
    $i--;
}

echo '<br>';

// Exercice 7
for ($i = 32; $i >= 18 ; $i--) {
    echo $i . '<br>';
}

echo '<br>';

// Exercice 8
$user = [
    'nom' => 'nicolas',
    'age' => 13,
    'passion' => 'jeux vidéo'
];

foreach($user as $key => $value) {
    echo $key . ' : ' . $value;
    echo '<br>';
}

echo '<br>';

// Exercice 9

// Initialisation des variables : $notes, $hommes et $femmes
$people = [
    'Jean' => 'H',
    'Julie' => 'F',
    'Reda' => 'H',
    'Kayla' => 'F',
];

$hommes = '';
$femmes = '';

// Trier les hommes et les femmes
foreach ($people as $key => $value) {
    if ($value === 'H') {
        $hommes = $hommes . $key . ' ';
    } else {
        $femmes = $femmes . $key . ' ';

    }
}

// Afficher les résultats
echo 'Femmes : ' . $femmes;
echo '<br>';
echo 'Hommes : ' . $hommes;


echo '<br>';
echo '<br>';

// Exercice 10
$notes = [
    'Jean' => 11,
    'Reda' => 13,
    'Julie' => 18,
    'Kayla' => 8,
];

foreach ($notes as $prenom => $note) {
    echo $prenom . ' : ' . $note . '/20';
    echo '<br>';
}
