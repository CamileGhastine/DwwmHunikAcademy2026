<?php
$message ='';

if (isset($_GET['register']) && $_GET['register'] === '1') {
    $message = 'Votre enregsitrement a été réalisé avec succès !<br> Vous pouvez maintenant vous connecter.';
}

// si le formulaire a été soumis --> On stocker les données du formulaire dans des variables PHP

// On récupère de la BDD le password du pseudo saisi par l'utilisateur

// si les mot de passe concordent [fonnction php password_verify($pwdSaisi, $pwdFromBdd)]
        // on enregistre en session $_SESSION['pseudo'] = $pseudo
        // Sinon on affiche un message d'erreur

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php echo $message ?>
    <form action="" method="post">
        Pseudo <input type="text" name="pseudo" required><br>
        Mot de passe <input type="texte" name="pwd" required><br>
        <input type="submit" value="Connexion">
    </form>
    <p><a href="/">Retour à l'accueil</a></p>
</body>
</html>