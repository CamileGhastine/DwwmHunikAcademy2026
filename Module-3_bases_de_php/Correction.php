<?php

// Lancer docker desktop sur votre ordinateur
// Ouvrir le dossier docker-php dans VScode
// Lancer vos conteneurs : docker compose up -d
// Vous pouvez voir le résultat dans le navigateur à l'adresse : localhost:8080
// Pour voir le résultat dans le terminal, saisir dans le terminal de VScode:
// docker exec -ti app_php sh
// puis dans le terminal lancer le fichier php : php index.php


// Exercice 1
echo "Hello world !";
echo PHP_EOL;

//Exercice 2
echo "Hello world !";

// Exercice 3
$a = 10;
$b = 20;

if ($a < $b) {
    echo $a;
} else {
    echo $b;
}
echo '<br>';

//exercice 4 :
$a = 10;
$b = 20;

if ($a < $b) {
    echo $a;
} else {
    echo $b;
}
echo PHP_EOL;

// Exercice 5
$nom = 'Ghastine';
$prenom = 'Camile';
$age = 49;
$ville = 'Brunoy'; 

echo PHP_EOL;
echo $nom;
echo PHP_EOL;
echo $prenom;
echo PHP_EOL;
echo $age;
echo PHP_EOL;
echo $ville;
echo PHP_EOL;

// Exercice 6
echo '<br>';
echo $nom;
echo '<br>';
echo $prenom;
echo '<br>';
echo $age;
echo '<br>';
echo $ville;
echo '<br>';

// Exercice 7
echo PHP_EOL;
$number1 = 10;
$number2 = 2;
echo $number1 . ' + ' . $number2 . ' = ' . $number1 + $number2;
echo PHP_EOL;
echo $number1 . ' - ' . $number2 . ' = ' . $number1 - $number2;
echo PHP_EOL;
echo $number1 . ' x ' . $number2 . ' = ' . $number1 * $number2;
echo PHP_EOL;
echo $number1 . ' / ' . $number2 . ' = ' . $number1 / $number2;
echo PHP_EOL;

//exercice 8
echo '<br>';
echo '<ul>';
echo '<li>' . $number1 . ' + ' . $number2 . ' = ' . $number1 + $number2 . '</li>';
echo '<li>' . $number1 . ' - ' . $number2 . ' = ' . $number1 - $number2 . '</li>';
echo '<li>' . $number1 . ' x ' . $number2 . ' = ' . $number1 * $number2 . '</li>';
echo '<li>' . $number1 . ' / ' . $number2 . ' = ' . $number1 / $number2 . '</li>';
echo '</ul>';
// Autre méthode
?>

<ul>
    <li><?php echo $number1 . ' + ' . $number2 . ' = ' . $number1 + $number2 ?></li>
    <li><?php echo $number1 . ' - ' . $number2 . ' = ' . $number1 - $number2 ?></li>
    <li><?php echo $number1 . ' x ' . $number2 . ' = ' . $number1 * $number2 ?></li>
    <li><?php echo $number1 . ' / ' . $number2 . ' = ' . $number1 / $number2 ?></li>
</ul>

<?php
// Exercice 9
$animal = 'chien';
$color = 'rouge';
$object = 'balle';

echo 'Le ' . $animal . ' joue à la ' . $object . ' ' . $color;
echo '<br>';

// Exercice 10
echo "Le " . $animal . " joue à la " . $object . " " . $color;
echo '<br>';
echo "Le $animal joue à la $object $color";
echo '<br>';

/* Exercice suplémentaire
Créer les variables : $nom, $solde, $transaction
Afficher la  phrase : « Le compte de … après un débit de  … € a un solde de … € ».
*/
$nom = 'Camile';
$solde = 100;
$transaction = 30;

$newSolde = $solde - $transaction;

echo 'Le compte de ' . $nom . ' après un débit de ' . $transaction . '€ a un solde de ' . $newSolde. '€.';
echo '<br>';
echo "Le compte de $nom après un débit de $transaction € a un solde de $newSolde €";


