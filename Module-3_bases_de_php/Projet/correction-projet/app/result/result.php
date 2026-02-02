<?php
session_start();

require '../env.php';

if (!empty($_POST)) {
    $correctAnswer = [
        "proposition3"=> "18",
        "proposition5" => "116",
        "proposition6" => "1000"
    ];

    $points = $_POST === $correctAnswer ? 20 : 0;
    $_SESSION['points'] += $points;
} else {
    header('location:' . $host);
}

$qi = $_SESSION['points'] + 60;

if ($qi === 60) {
    $message = "Vous avez un quotient intellectuel de $qi.<br> Si vous avez répondu au hasard, vous n'avez vraiment pas eu de chance.";
} elseif ($qi === 80) {
        $message = "Vous avez un quotient intellectuel de $qi.<br>  Il est temps de remettre votre cerveau au travail !";
} elseif ($qi === 100) {
        $message = "Vous avez un quotient intellectuel de $qi.<br>  Vous êtes pile dans la moyenne !";
} elseif ($qi === 120) {
        $message = "Vous avez un quotient intellectuel de $qi.<br>  Vous êtes doté d'une intéligence superieure. ";
} elseif ($qi === 140) {
        $message = " Vous avez un quotient intellectuel de $qi.<br>  Un tel score est rare, vous êtes HPI !";
} else {
        $message = "Vous avez un quotient intellectuel de $qi.<br>  Vous pouvez vous assoir à la table des Einstein et consort ! ";
}

$title = 'Resultat';
require '../shared/openHtml.php';
?>

<main>
    <h2>Résultat</h2>
    <p><?php echo $message ?></p>
    <p>Pour passer un tesd eQI grandeur nature, n'hésitez pas à contacter M. Cuy psychologue de l'esprit au 06.01.01.01.01</p>
    <p><a href="../index.php">Retour à l'accueil</a></p>
</main>