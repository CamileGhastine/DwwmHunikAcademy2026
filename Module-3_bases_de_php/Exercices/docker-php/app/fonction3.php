<?php

/*
function calculAverage($listNotes)
{
    // Calculer la somme
    $sum = 0;
    foreach ($listNotes as $key => $value) {
        $sum = $sum + $value;
    }

    // Calculer le nombre d'elements
    $nbreElements = 0;
    foreach($listNotes as $key => $value) {
        $nbreElements++;
    }

    return $sum / $nbreElements;
}
*/

function calculAverage($listNotes)
{
    // Calculer la somme et le nombre d'éléments
    $sum = 0;
    $nbreElements = 0;

    foreach ($listNotes as $value) {
        $sum = $sum + $value;
        $nbreElements++;
    }

    return $sum / $nbreElements;
}

$b = [12, 10, 20, 8];

echo calculAverage($b);
