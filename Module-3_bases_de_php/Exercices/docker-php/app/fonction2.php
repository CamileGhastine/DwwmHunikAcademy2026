<?php

echo calculIMC(175, 1.8);

/*
function calculIMC($poids, $taille)
{
    $imc = $poids / ($taille * $taille);

    return $imc  ;
}
*/

function calculIMC($poids, $taille)
{
    $imc = $poids / ($taille * $taille);

    if ($imc < 18.5) {
        $conclusion = 'Maigreur';
    } elseif ($imc >= 18.5 && $imc <= 25) {
        $conclusion = 'Normale';
    } else {
        $conclusion = 'Surpoids';
    }

    return 'IMC : ' . $imc . ' - ' . $conclusion ;
}

