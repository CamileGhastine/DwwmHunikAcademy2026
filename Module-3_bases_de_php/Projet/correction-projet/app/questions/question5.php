<?php
session_start();

require '../env.php';

if (!empty($_POST)) {
    $points = $_POST['firstname'] === 'nathalie' ? 20 : 0;
    $_SESSION['points'] += $points;
} else {
    header('location:' . $host);
}

$title = 'Question 5';
require '../shared/openHtml.php';
?>

<main>
    <h2>Question 5</h2>

    <p>Quelle sont les nombres qui n'ont pas de racine carrée entière ?</p>

    <form action="../result/result.php" method="post">
        <label for="proposition1"><input type="checkbox" name="proposition1" value="1"/>1</label><br>
        <label for="proposition2"><input type="checkbox" name="proposition2" value="9"/>9</label><br>
        <label for="proposition3"><input type="checkbox" name="proposition3" value="18"/>18</label><br>
        <label for="proposition4"><input type="checkbox" name="proposition4" value="49"/>49</label><br>
        <label for="proposition5"><input type="checkbox" name="proposition5" value="116"/>116</label><br>
        <label for="proposition6"><input type="checkbox" name="proposition6" value="1000"/>1000</label><br>
        <input type="submit" value="Valider">
    </form>
  </main>

<?php require '../shared/closeHtml.php'; ?>