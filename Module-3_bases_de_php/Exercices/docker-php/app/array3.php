<?php
$user =[
    "firstname" => "John",
    "lastname" => "Doe",
    "birthDate" => "01/02/2010",
    "email" => "john@free.fr",
    "inscription" => false,
];

if(!empty($_GET)) {
    $user['inscription'] = (bool)$_GET['inscription'];
}

/*
if ($user['inscription']) {
    $inscription = 'Inscrit';
} else {
    $inscription = 'Non-inscrit';
}
*/

// Ternaire qui équivaut au code de la ligne 11 à 15
$inscription = $user['inscription'] ? 'Inscrit' : 'Non-inscrit';

if(!empty($_POST)) {
    $user['firstname'] = $_POST['firstname'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Profil de <?php echo $user['firstname'] . ' ' . $user['lastname'] ?></h1>
    <ul>
        <li>Nom : <?php echo $user['lastname'] ?></li>
        <li>Prénom : <?php echo $user['firstname'] ?></li>
        <li>Email : <?php echo $user['email'] ?></li>
        <li>Statut : <?php echo $inscription ?></li>
    </ul>
    <form action="" method="post">
        <label for="firstname">Changer le prénom : </label>
        <input type="text" name="firstname"><br>
        <input type="submit" value="Changer">
    </form>

    <p><a href="?inscription=1">Cliquez ici pour vous inscrire</a></p>

</body>
</html>