<?php
// Toujours placer session_start au début du code
session_start();

require '../env.php';

if (!empty($_POST)) {
    $day = $_POST['day'];
    $day = strtolower($day); // On transforme totu en minuscule pour que Dimanche ou DIMANCHE ou dimAnche SOit valide
    $day = trim($day);  // On retire tous les espaces au début et à la fin

    if ($day === 'dimanche') {
        $points = 20;
    } else {
        $points = 0;
    }

    // avec le ternaire : $point = $_POST['day'] === 'dimanche' ? 20 : 0;
    
    $_SESSION['points'] = $points;
} else {
    header('location:' . $host);
}

$title = 'Question 2';
require '../shared/openHtml.php';
?>

<main>
    <h2>Question 2</h2>
    <p>Qu'est ce qu'un quart de deux tiers de 9000 ?</p>
    <form action="question3.php" method="post">
        <label for="result">Réponse : <input type="number" name="result" min="1000" max="3000" step ="500" required></label><br>
        <input type="submit" value="Valider">
    </form>
</main>

<?php require '../shared/closeHtml.php'; ?>