<?php

// Renvoyer la moyenne et la mention (>10: insuffissant, [10-12[ : passable, [12,14[ : assez bien, [14, 16[ : bien, >16 : très bien)
$notes = [15, 11, 13, 13, 18, 8];
   
// je veux additionner toutes les notes (les éléments du tableau $notes) et le diviser par le nombre de notes
$total = 0;
$count = 0;

foreach ($notes as $note) {
    $total += $note;
    $count ++;
}

$moyenne = $total / $count;

if ($moyenne >= 16) {
    $mention = 'Trés bien';
} elseif($moyenne >= 14) {
    $mention = 'Bien';
} elseif($moyenne >= 12) {
    $mention = 'Assez bien';
} elseif($moyenne >= 10) {
    $mention = 'Passable';
} else {
    $mention = 'Insuffisant';
}

echo "Moyenne : $moyenne ($mention)";
echo '<br>';

// Autre méthode
$notes = [15, 11, 13, 13, 18, 8];
   
$moyenne = array_sum($notes) / count($notes);

if ($moyenne >= 16) {
    $mention = 'Trés bien';
} elseif($moyenne >= 14) {
    $mention = 'Bien';
} elseif($moyenne >= 12) {
    $mention = 'Assez bien';
} elseif($moyenne >= 10) {
    $mention = 'Passable';
} else {
    $mention = 'Insuffisant';
}

echo "Moyenne : $moyenne ($mention)";
echo '<br>';


// Autre méthode pour optimiser la condition
$notes = [15, 11, 13, 13, 18, 8];
   
$moyenne = array_sum($notes) / count($notes);

$mention = match(true) {
    $moyenne >= 16 => 'Trés bien',
    $moyenne >= 14 => 'Bien',
    $moyenne >= 12 => 'Assez bien',
    $moyenne >= 10 =>  'Passable',
    default =>  'Insuffisant'
};

echo "Moyenne : $moyenne ($mention)";
echo '<br>';
