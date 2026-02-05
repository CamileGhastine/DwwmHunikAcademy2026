<?php
// Créer un objet PDO $pdo capable de se connecter à la BDD
$pdo = new \PDO(
    'mysql:host=mysql;dbname=my_first_db;charset=utf8mb4',
    'user',
    'pwd'
);

if (!empty($_POST) && isset($_POST['content'])) {
    $content = $_POST['content'];
    // On utilise une requête préparée pour se protéger de l'injetcion SQL.
    $sql = "INSERT INTO comment(content) VALUES (:content)";
    $request = $pdo->prepare($sql);
    $request->execute(['content' => $content]);
}

// Charger dans cet objet $pdo la requête SQL pour récupérer tous les commentaires
$request = $pdo->query('SELECT * FROM comment ORDER BY id DESC');

// Récupérer tou les commentaires dans $comments
$comments = $request->fetchall(PDO::FETCH_ASSOC);

$request->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <a href="register.php">Enregistrement</a> / <a href="connection.php">Connexion</a>
    </p>
   
    <h1>La phrase du jour</h1>
        <form action="" method="post">
            <input type="text" name ="content" placeholder="Ecrire ici votre phrase du jour">
            <input type="submit" value="Valider">
        </form>
<br>
<!-- Afficher ici tous les commentaires un par un avec un foreach -->
    <?php

    foreach ($comments as $comment) {
        echo $comment['content'];
        echo '<hr>';
    }

    ?>
</body>
</html>
