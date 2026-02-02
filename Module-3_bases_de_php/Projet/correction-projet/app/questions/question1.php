<?php 
session_start();

if (!isset($_SESSION['age']) || $_SESSION['age'] < 18) {
    header('Location: ../index.php');
}

$title = 'Question 1';
require '../shared/openHtml.php';
?>

<main>
    <h2>Question 1</h2>
    <p>Quel jour seront-nous demain si mercredi était il y a trois jours ?</p>
    <form action="question2.php" method="post">
        <label for="day">Réponse : <input type="text" name="day" required></label><br>
        <input type="submit" value="Valider">
    </form>
</main>

<?php require '../shared/closeHtml.php'; ?>

