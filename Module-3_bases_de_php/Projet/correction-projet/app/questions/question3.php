<?php
// Toujours placer session_start au début du code
session_start();

require '../env.php';

if (!empty($_POST)) {
    $points = $_POST['result'] === '1500' ? 20 : 0;
 
    $_SESSION['points'] = $_SESSION['points'] + $points;
    // $_SESSION['points'] += $points
} else {
    header('location:' . $host);
}

$title = 'Question 3';
require '../shared/openHtml.php';
?>

<main>
    <h2>Question 3</h2>
    <div class="question3">   
        <img src="../images/dice.jpg" alt="dès à jouer">
        <div class="ennonce3">
            <p>A quoi resemblera le cube fini ?</p>
            <form action="question4.php" method="post">
                <input type="radio" name="letter" value="A"/>
                <label for="huey">A</label><br>
                <input type="radio" name="letter" value="B"/>
                <label for="dewey">B</label><br>
                <input type="radio" name="letter" value="C"/>
                <label for="huey">C</label><br>
                <input type="radio" name="letter" value="D"/>
                <label for="dewey">D</label><br>
                <input type="submit" value="Valider">
            </form>
        </div>
    </div>
</main>

<?php require '../shared/closeHtml.php'; ?>