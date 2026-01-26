<?php
// Exercice 10

$notes = [
    'Jean' => 11,
    'Reda' => 14,
    'Julie' => 18,
    'Kayla' => 9,
];

$effectif = 0;
$somme = 0;
$noteMax = 0;

foreach ($notes as $prenom => $note) {
    echo $prenom . ' : ' . $note .'/20';
    echo '<br>';

    // 3
    $effectif++;

    //4
    $somme = $somme + $note;

    //5
    if ($noteMax <= $note) {
        $noteMax = $note;
    }
}

echo 'Effectif : ' . $effectif;
echo '<br>';

$moyenne = $somme / $effectif;
echo 'Moyenne : ' . $moyenne;
echo '<br>';

echo 'Note la plus haute : ' . $noteMax;
echo '<br>';
echo '<br>';


//6
echo 'Avec les fonctions PHP';
echo '<br>';

echo 'Effectif : ' . count($notes);
echo '<br>';

$moyenne = array_sum($notes) / count($notes);
echo 'Moyenne : ' . $moyenne;
echo '<br>';


echo 'Note la plus haute : ' . max($notes);
echo '<br>';
