<?php

$eleves = [
    ["nom" => "Alice", "sex" => "F", "note" => 15],
    ["nom" => "Bob", "sex" => "M", "note" => 8],
    ["nom" => "Charlie", "sex" => "M", "note" => 13],
    ["nom" => "Émilie", "sex" => "F", "note" => 18],
    ["nom" => "David", "sex" => "M", "note" => 9],
    ["nom" => "Fiona", "sex" => "F", "note" => 12],
];

// 1) afficher le nombre de notes supérieures à 10 et le nombre de notes inférieures à 10.
$notesSup10 = 0;
$notesInf10 =0;
$totalF = 0;
$totalM = 0;
$countF = 0;
$countM = 0;
foreach ($eleves as $eleve) {
    if ($eleve['note'] >= 10) {
        $notesSup10 ++;
    } else {
        $notesInf10 ++;
    }

    if($eleve['sex'] === 'F') {
        $totalF += $eleve['note'];
        $countF ++;
    } else {
        $totalM += $eleve['note'];
        $countM ++;
    }

}

$moyenne = ($totalF + $totalM) / ($countF + $countM);
$moyenneF = $totalF / $countF;
$moyenneM = $totalM / $countM;


echo "Nombre de notes > ou égales 10 : $notesSup10\n<br>";
echo "Nombre de notes < 10 : $notesInf10\n<br>";


// 2) Adapter le code pour afficher la moyenne générale de toutes les notes, la moyenne des filles et la moyenne des garçons.

echo "Moyenne générale : $moyenne\n<br>";
echo "Moyenne filles : $moyenneF\n<br>";
echo "Moyenne garçons : $moyenneM\n<br>";
echo '<br>';