<?php 
$secret = 'toto123';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe</title>
</head>
<body>
    <form action="" method="post">
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd"><br>
        <input type="submit" value="Envoyer">
    </form>

    <?php
    if(!empty($_POST)) {
        if ($_POST['pwd'] === $secret) {
            echo 'mot de passe correct.';
        } else {
            echo'Essaye encore !';
        }
    }
    ?>
    
</body>
</html>