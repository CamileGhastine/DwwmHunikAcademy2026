<?php 
// Compression de chaine : écrire une fonction qui compresse une chaîne "aaabbbccddddee" → "a3b3c2d4e2"

function compresser(string $chaine): string 
{
    $prevChar = null;
    $result = '';
    
    foreach (str_split($chaine) as $letter) {
        if ($letter === $prevChar)
        {
            $count++;
            continue;
        }
        if($prevChar !== null) $result .= $prevChar . $count;
        $count = 1;
        $prevChar = $letter;
    }

    return $result . $letter . $count;
}

echo compresser("aaabbbccddddee"); // → a3b3c2d4e2
echo '<br>';
echo compresser("abcd");           // → a1b1c1d1
