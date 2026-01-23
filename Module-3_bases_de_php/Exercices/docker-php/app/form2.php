<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
    <form action="" method="post">
        <p>Prénom <input type="text" name="prenom"></p>
        <p>Nom <input type="text" name="nom"></p>
        <p><input type="submit" value="Soumettre"></p>
    </form>

    <?php
    if (!empty($_POST)) {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];

        echo 'Bonjour, ' . $prenom . ' ' . $nom .' !';
    }
    ?>

</body>
</html>