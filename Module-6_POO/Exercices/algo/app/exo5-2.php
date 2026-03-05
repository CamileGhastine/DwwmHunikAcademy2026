<?php

// Phrase cachée : remplacer "chien" par des étoiles dans la phrases "Il fait un temps de chien."
// Il fait un temps de chien. -> Il fait un temps de *****.

$phrase = "Il fait un temps de chien tout les jours.";
$recherche = 'chien';

// *** Méthode 1 ***
// $tab = explode(' ', $phrase);
// $phraseCachee = '';
// foreach ($tab as $mot) {
//    if ($mot === $recherche) {
//        $phraseCachee .= str_repeat('*', mb_strlen($recherche)) . ' ';
//    } else {
//        $phraseCachee .= $mot . ' ';
//    }
// }


//*** Méthode 2 ***
// $tab = explode(' ', $phrase);

// foreach ($tab as $key => $mot) {
//     if ($mot === $recherche) {
//         $tab[$key] = str_repeat('*', mb_strlen($recherche)) . ' ';
//     }
// }

// $phraseCachee = implode(' ', $tab);

// *** Méthode 3 ***
$phraseCachee = str_replace($recherche, str_repeat('*', mb_strlen($recherche)), $phrase);


echo "Phrase cachée : $phraseCachee";
echo '<br>';
