<?php

// Ceci est un commentaire sur une ligne

/*
Ceci est 
un commentaire
sur plusieurs lignes
*/

// En ligne de commande pour ouvrir le serveur interne de php :
// php -S localhost:8000

// Affichage
echo "hello word !";
echo "<br>";

// Une variable permet de stocker des valeurs de différents types 
// variable = nom + valeur + type

$var1 = 2; // type integer
$var2 = "Hello !"; // type string
$var3 = true; // type boolean

echo $var1, "<br>", $var2, "<br>", $var3, "<br>";

// var_dump() permet d'afficher le type et la valeur d'une variable
var_dump($var1);
echo "<br>";
var_dump($var2);
echo "<br>";
var_dump($var3);
echo "<hr>";
// die();

//Opérateur arithmétique
$number1 = 20;
$number2 = 10;

$addition = $number1 + $number2;
echo $addition;
echo "<br>";
$soustraction = $number1 - $number2;
echo $soustraction;
echo "<br>";
$multiplication = $number1 * $number2;
echo $multiplication;
echo "<br>";
$division = $number1 / $number2;
echo $division;
echo "<br>";

// Quel sera le résultat affiché ?
$number1 = 20;
$number2 = 10;
$number1 += $number2; // $number1 = $number1 + $number2 = 20 +10 = 30
$number1 -= $number2; // $number1 = 30 - 10 = 20
$number1 *= $number2; // $number1 = 20 * 10 = 200
$number1 /= 2; // $number1 = 200 / 2 = 100
echo $number1; // 100
echo "<hr>";

// Opérateurs de chaine (concaténation)
$nom = "Ghastine";
$prenom = "Camile";

// Afficher : Je suis Camile (2 méthodes).
echo "je suis " . $prenom . "<br>";
echo "je suis $prenom <br>";
// Afficher : Je suis Camile Ghastine (2 méthodes)
echo "je suis " . $prenom . " " . $nom . "<br>";
echo "je suis $prenom $nom <br>";
// Afficher : Il a dit "Hello !" (2 méthodes)
echo 'il a dit "hello !"<br>';
echo "il a dit \"hello !\"<br>";

echo $nom . "<br>";
$nom .= $prenom;
echo $nom . "<hr>";

// Condition
$condition = false;

if ($condition) {
    echo "C'est vrai !" . "<br>";
}

if ($condition) {
    echo "C'est vrai !" . "<br>";
} else {
    echo "C'est faux !<br>";
}

$number = 2;

if ($number < 0) {
    echo "Je suis plus petit que 0";
} elseif ($number > 0) {
    echo "Je suis plus grand que 0";
} else {
    echo " je suis égal à 0";
}
echo "<hr>";


// boucle while (définir la variable d'incrémentation hors de la boucle et l'incrémenter dans la boucle)
$i = 0;
while ($i <= 10) {
    echo $i . "<br>";
    $i++;
}
echo "<hr>";

// Exercice : afficher la table de 9 (opération + résultat)
$a = 0;
while ($a <= 10) {
    echo "9 x " . $a . " = " . $a * 9 . "<br>";
    $a++;
}

echo "<hr>";

// boucle for
echo "boucle for<br>";
for ($i = 0; $i <= 10; $i++) {
    echo $i . "<br>";
}
echo "<hr>";

// Exercice : compter à rebours
for ($i = 10; $i >= 0; $i--) {
    echo $i . "<br>";
}

echo "<hr>";
echo 'suite ...<br>';
?>


<!-- 
Structure d'un URL (Uniform Ressource Locator)

https://www.monSite.com/blog/article1?parametre=valeur&autreParametre=valeur#ancre

https : protocole (http, ftp, mailto, ...)

www.monSite.com : nom de domaine = sous-domaine (www).domaine-principal (monSite).domaine-de-deuxième-niveau (com)

/blog/article1 : chemin vers la ressource

après ? : paramètres = données que l'on fait transiter dans l'URL

après # : ancre dans la page

On peut récupérer les valeurs des paramètrespassé après ? dans la varaibles $_GET['parametre']

exemple :
Si on à l'url : www.monsite.com?param1=true&param2=Paris&param3=50
On pourra récupérer ces parmètres dans les variables :
$_GET['param1'] = "true";
$_GET['param2'] = "Paris";
$_GET['param3'] = "50";
-->

<a href="?prenom=camile">mon lien</a>
<br>

<?php
if (isset($_GET['prenon'])) {
    echo $_GET['prenon'];       //$_GET['prenom'] = "camile"
}
?>