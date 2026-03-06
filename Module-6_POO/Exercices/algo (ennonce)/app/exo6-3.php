<?php
function motLePlusFrequent(string $phrase): string {
    // Coder ici...

    return '';
}

var_dump(motLePlusFrequent("le chat mange le chat"));         // → "le" (2 fois)
var_dump(motLePlusFrequent("bonjour tout le monde bonjour")); // → "bonjour"
var_dump(motLePlusFrequent("un deux trois"));                 // → "un" (ou n'importe lequel, tous à 1)


function lesMotLePlusFrequent(string $phrase): array {
    // Coder ici...

    return [];
}



var_dump(motLePlusFrequent("le chat mange le chat"));         // → ["le", "chat"]
var_dump(motLePlusFrequent("bonjour tout le monde bonjour")); // → ["bonjour"]
var_dump(motLePlusFrequent("un deux trois"));                 // → ["un", "deux", "trois"]