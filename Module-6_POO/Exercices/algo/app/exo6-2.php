<?php

// Anagramme : vérifier si deux mots sont des anagrammes ("chien" / "niche" → true)

function estAnagramme(string $mot1, string $mot2): bool 
{
    $tab1 = str_split($mot1);
    $tab2 = str_split($mot2);
    foreach ($tab1 as $letter) {
        $position = array_search($letter, $tab2);
        if ($position === false) return false;
        unset($tab2[$position]);
    }

    return $tab2 === []  ;
}

var_dump(estAnagramme("chien", "niche"));   // → true
echo '<br>';
var_dump(estAnagramme("bonjour", "bijoux")); // → false
echo '<br>';
var_dump(estAnagramme("listen", "silent"));  // → true




// function estAnagramme(string $mot1, string $mot2): bool 
// {
//     $tab1 = str_split($mot1);
//     foreach ($tab1 as $letter) {
//         if(!str_contains($mot2, $letter)) {
//             return false;
//         }

//         $mot2 = preg_replace("/$letter/", '', $mot2, 1);
//     }
//     return $mot2 === '';
// }



// function estAnagramme(string $mot1, string $mot2): bool 
// {

//     $tab1 = str_split($mot1);
//     $tab2 = str_split($mot2);
//     sort($tab1);
//     sort($tab2);

//     return $tab1 === $tab2;
// }