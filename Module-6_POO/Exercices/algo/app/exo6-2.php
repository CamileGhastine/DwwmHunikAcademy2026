<?php

// Anagramme : vérifier si deux mots sont des anagrammes ("chien" / "niche" → true)

function estAnagramme(string $mot1, string $mot2): bool {

    // Coder ici ...

}

var_dump(estAnagramme("chien", "niche"));   // → true
echo '<br>';
var_dump(estAnagramme("bonjour", "bijoux")); // → false
echo '<br>';
var_dump(estAnagramme("listen", "silent"));  // → true
