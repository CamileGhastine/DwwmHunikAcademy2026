<?php

// 1) Lancer docker desktop sur votre ordinateur
// 2) Ouvrir le dossier docker-php dans VScode
// 3) Lancer vos conteneurs : docker compose up -d

// Vous pouvez voir le résultat dans le navigateur à l'adresse : localhost:8080

// Pour voir le résultat dans le terminal, saisir dans le terminal de VScode: docker exec -ti app_php sh
// puis dans le terminal lancer le fichier php souhaité : php index.php (ou un autre fichier)


// Exercice 1
echo "Hello world !";
echo PHP_EOL;       //EOL = End Of Line pour sauter une ligne dans le terminal

echo '<br>';  
//Exercice 2
echo "Hello world !";

echo '<br>';        // pour sauter une ligne dans le navigateur

// Exercice 3
$a = 10;
$b = 5;
$prenom = 'Camile';
$nom = 'Ghastine';
$c = true;

// Exercice 4
echo $a;
echo '<br>';
echo $prenom;
echo '<br>';

// Exercice 5
echo $prenom . ' ' . $nom;
echo '<br>'; 

// Exercice 6
echo $a + $b;
echo '<br>'; 
echo $a - $b;
echo '<br>'; 
echo $a * $b;
echo '<br>'; 
echo $a / $b;
echo '<br>'; 

// Exercice 7
echo $a. ' + ' . $b . ' = ' . $a + $b;
echo '<br>'; 
echo $a . ' - ' . $b . ' = ' . $a - $b;
echo '<br>'; 
echo $a . ' x ' . $b . ' = ' . $a * $b;
echo '<br>'; 
echo $a . ' / ' . $b . ' = ' . $a / $b;
echo '<br>'; 

// Exercice 8
var_dump($c);           // $c est un boolean de valeur true.
echo '<br>'; 


// Exercice 9
$objet = 'arbre';

echo 'L\'' . $objet . ' de ' . $prenom . ' mesure ' . $b .'m.';
echo '<br>';
echo "L'" . $objet . ' de ' . $prenom . ' mesure ' . $b .'m.';     // Pour éviter l'échappement du guillement dans l'arbre
echo '<br>';

// Exercice 10
echo "L'$objet de $prenom mesure $b m.";            // Pour injecter les variables directement dans la string
echo '<br>';

