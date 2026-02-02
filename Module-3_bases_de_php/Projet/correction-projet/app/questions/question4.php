<?php
session_start();

require '../env.php';

if (!empty($_POST)) {
    $points = $_POST['letter'] === 'C' ? 20 : 0;
    $_SESSION['points'] += $points;
} else {
    header('location:' . $host);
}

$title = 'Question 4';
require '../shared/openHtml.php';
?>

<main>
    <h2>Question 4</h2>

    <p>Kate, Joanna  et nathalie sont toutes les trois soeurs. Si les informations sont vraies, laquelle d'entre-elle est la plus jeune ?</p>
    <ul>
        <li>Kate est la plus âgée</li>
        <li>Nathalie n'est pas la plus âgée</li>
        <li>Joanna n'est pas la plus jeune</li>
    </ul>

    <form action="question5.php" method="post">
        <select name="firstname" id="pet-select">
            <option value="">--Choisir la bonne réponse--</option>
            <option value="kate">Kate</option>
            <option value="nathalie">Nathalie</option>
            <option value="joanna">Joannna</option>
        </select>
        <br>
        <input type="submit" value="Valider">
    </form>
  </main>

<?php require '../shared/closeHtml.php'; ?>