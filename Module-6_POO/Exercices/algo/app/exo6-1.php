<?php 
// Compression de chaine : écrire une fonction qui compresse une chaîne "aaabbbccddddee" → "a3b3c2d4e2"

function compresser(string $chaine): string {
    $tab = str_split($chaine);
    $charCourant = null;
    $result = '';
    $count = 0;
    foreach ($tab as $letter) {
        if($letter === $charCourant) {
            $count++;
            continue;
        }
        if ($charCourant) {
            $result .= $charCourant . $count;
        }
        $charCourant = $letter;
        $count = 1;
    }

    return $result . $charCourant . $count;
}

echo compresser("aaabbbccddddee"); // → a3b3c2d4e2
echo '<br>';
echo compresser("abcd");           // → a1b1c1d1
