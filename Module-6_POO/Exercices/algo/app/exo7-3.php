<?php

// Créer une fonction appelée compterOccurrences qui :
    // prend en paramètre un tableau de nombres
    // prend en paramètre un nombre à chercher
    // retourne combien de fois ce nombre apparaît dans le tableau
    // Typer les paramètres d'entrées et de sortie de la fonction

$tab = [2, 4, 2, 5, 2, 7, 7];

echo compterOccurrences($tab, 7);  // résultat : 3


function compterOccurrences(array $tab,int $number): int
{
    $count = 0;
    foreach ($tab as $element) {
        if ($number === $element) {
            $count++;
        }
    }

    return $count;
}
