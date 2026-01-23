<h1>Les boucles</h1>
<p>3 types de boucle</p>
<ul>
    <li>while</li>
    <li>for</li>
    <li>foreach</li>
</ul>

<h2>Boucle while</h2>
whyle = tant que
<br>

<?php
$i = 0;
while ($i < 5) {
    echo 'hello-' . $i;
    echo '<br>';    
    $i++;
}

// on est sortie de la boucle car la condition $a <= 3
// n'est plus resectée. C'est vrai quand $a = 4.
?>

<h2>Boucle for</h2>

for = pour

<br>

<?php

for ($i=0; $i < 5 ; $i++) { 
    echo 'hello-'. $i;
    echo'<br>';
}

?>

<h2>Boucle foreach</h2>

foreach = pour chaque (élement du tableau)
<br>
<h3>Tableau numéroté</h3>
<?php
$array1 = [2, 5, 12];

foreach ($array1 as $value) {
    echo $value;
    echo '<br>';
}

?>

<h3>Tableau associatif</h3>

<?php
$user =[
    'nom' => 'camile',
    'prenom' => 'ghastine',
    'email' => 'camile@free.fr'

];

foreach ($user as $key => $value) {
    echo $key .' : ' . $value . '<br>';
}
