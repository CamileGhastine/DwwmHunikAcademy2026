<?php 
session_start();

if (!empty($_POST)) {
    $_SESSION['age'] = $_POST['age'];
    
    if ($_POST['age'] >= 18) {
        header('Location: ../questions/question1.php');
    } else {
        header('Location: forbidenAge.php');
    }
}

$title = 'Vérification de l\'âge';
require '../shared/openHtml.php'; 
?>

<main>
    <form action="" method="post">
        <label for="age">Quel âge avez-vous ?</label><br>
        <input type="number" name="age"><br>
        <input type="submit" value="Valider">
    </form>
</main>

<?php require '../shared/closeHtml.php'; ?>
