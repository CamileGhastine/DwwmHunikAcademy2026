<?php

// Le mot le plus long : Trouver le mot le plus long d'un tableau de mots.
$mots = ["chat", "éléphant", "oiseau", "papillon", "chien"];

$motLePlusLong = '';
foreach ($mots as $mot) {
    if(mb_strlen($mot) > mb_strlen($motLePlusLong)) {
        $motLePlusLong = $mot;
    }
}

echo "Le mot le plus long est : $motLePlusLong";
echo '<br>';

