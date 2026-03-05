<?php

// Mot caché : Remplacer chaque lettre d'un mot par une étoile
// toto123 -> *******
$mdp = 'toto123';

// *** Methode 1 ***
//$mdpCache = '';
//for ($i=0; $i < mb_strlen($mdp); $i++) { 
//    $mdpCache .= '*';
//}  

// *** Méthode 2 ***
$mdpCache = str_repeat('*', mb_strlen($mdp));

echo "Votre mot de passe : $mdpCache";
echo '<br>';

