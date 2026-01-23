<?php

// Exercice 1 
$age = 33;

if ($age >= 18) {
    echo 'Vous êtes majeur'; 
} else {
    echo 'Vous êtes mineur';
}
echo '<br>';

// Exercice 2
$note = 15;

if ($note >= 16) {
    echo 'Excellent'; 
} elseif ($note >= 14) {
    echo 'Bien'; 
} elseif ($note >= 12) {
    echo 'Assez bien'; 
} elseif ($note >= 10) {
    echo 'Passable'; 
} else {
    echo 'Insuffisant'; 

}
echo '<br>';

//exercice 3
$a = 10;
$b = 20;

if ($a < $b) {
    echo $a;
} else {
    echo $b;
}

