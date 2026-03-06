<?php

// Créer une fonction sommeTableau qui :
    // Paramètre : tableau de nombres
    // Retour : somme de tous les nombres du tableau
    // Typer les paramètres d'entrées et de sortie de la fonction


echo sommeTableau([1, 2, 3, 4]); // Résultat : 10


function sommeTableau(array $tab) : float
{
    $somme = 0;
    foreach ($tab as $number) {
        $somme += $number;
    }

    return $somme;
}