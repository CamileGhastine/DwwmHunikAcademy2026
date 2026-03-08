<?php
function motLePlusFrequent(string $phrase): string {
    $tab = explode(' ', $phrase);

    $tabCountOccurancy = [];
    foreach ($tab as $mot) {
        $count = isset($tabCountOccurancy[$mot]) ? $tabCountOccurancy[$mot] : 0;
        $tabCountOccurancy[$mot] = $count + 1 ;    
    }

    $count = 0;
    $result = '';
    foreach ($tabCountOccurancy as $key => $value) {
        if($value > $count) {
            $result = $key;
            $count = $value;
        }
    }

    return $result;
}

var_dump(motLePlusFrequent("le chat mange le chat"));  // → "le" (2 fois)
echo '<br>';       
var_dump(motLePlusFrequent("bonjour tout le monde bonjour")); // → "bonjour"
echo '<br>';  
var_dump(motLePlusFrequent("un deux trois"));                 // → "un" (ou n'importe lequel, tous à 1)
echo '<br>';  

function MotsLesPlusFrequent(string $phrase): array {
    $tab = explode(' ', $phrase);

    $tabCountOccurancy = [];
    foreach ($tab as $mot) {
        $count = isset($tabCountOccurancy[$mot]) ? $tabCountOccurancy[$mot] : 0;
        $tabCountOccurancy[$mot] = $count + 1 ;    
    }

    $count = 0;
    $result = [];
    foreach ($tabCountOccurancy as $key => $value) {
        if($value >= $count) {
            $result[] = $key;
            $count = $value;
        }
    }

    return $result;
}


var_dump(MotsLesPlusFrequent("le chat mange le chat"));         // → ["le", "chat"]
echo '<br>';  
var_dump(MotsLesPlusFrequent("bonjour tout le monde bonjour")); // → ["bonjour"]
echo '<br>';  
var_dump(MotsLesPlusFrequent("un deux trois"));                 // → ["un", "deux", "trois"]

