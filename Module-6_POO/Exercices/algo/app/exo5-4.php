<?php

// Mail caché : Affiché les 3 premiers caractères d'un email et remplacer les lettres qui suivent par une étoile, sauf @
// donald.duck@gmail.com -> don********@*********

$email = "donald.duck@hotmail.com";

$tab = explode('@', $email);
$nom = $tab[0];
$domain = $tab[1];

$domaineCache = str_repeat('*', mb_strlen($domain));

$nomCache = substr($nom, 0, 3) . str_repeat('*', mb_strlen($nom) - 3);

$emailCache = $nomCache . '@' . $domaineCache;


echo "Votre email : $emailCache";