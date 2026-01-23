<?php
$user = 'Jean';
$pwd= 'toto123';

/*
if (empty($_POST)) {
    $pseudo = '';
} else {
    $pseudo = $_POST['pseudo'];
}
*/

// Concdition ternaire qui équivaut au code de la ligne 6 à 10.
$pseudo = empty($_POST) ? '' : $_POST['pseudo'];

$form = '
    <form action="" method="post" class="<?php echo $class ?>">
        <p>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" value="' . $pseudo . '">
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password">
        </p>
        <p><input type="submit" value="Connexion"></p>
    </form>
';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .alert {
            color: red;
        }
    </style>
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php 
        if (empty($_POST)) {
            echo $form;
        } else {
            if ($user === $_POST['pseudo'] && $pwd === $_POST['password']) {
                echo "connexion réussie !";
            } else {
                echo $form;
                echo '<div class="alert">Le pseudo ou le mot de passe n’est pas valide.</div>';
            }
        }
    ?>


<!-- question 3 -->

<!--
    <form action="" method="post" class="<?php echo $class ?>">
        <p>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo">
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password">
        </p>
        <p><input type="submit" value="Connexion"></p>
    </form>
-->
    
    <?php
    /*
    if(!empty($_POST)) {
        if ($user === $_POST['pseudo'] && $pwd === $_POST['password']) {
        echo "connexion réussie !";
        } else {
            echo "Le pseudo ou le mot de passe n’est pas valide.";
        }
    }
    */
    ?>


</body>
</html>



