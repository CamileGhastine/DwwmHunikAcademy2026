<?php
session_start();

if(isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
    echo "Salut " . $pseudo;
}

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


// Récupérer tou les commentaires dans $comments
if (!isset($_GET['id_user'])) {
    $sql = 'SELECT c.content, u.pseudo 
    FROM comment c 
    INNER JOIN user u 
    ON c.id_user=u.id 
    ORDER BY c.id DESC';
    $param = NULL;
} else {
    $sql ="SELECT c.content, u.pseudo 
    FROM comment c 
    INNER JOIN user u 
    ON c.id_user=u.id 
    WHERE c.id_user=:id
    ORDER BY c.id DESC";
    $param = ['id' => $_GET['id_user']];
}

$request = $pdo->prepare($sql);
$request->execute($param);
$comments = $request->fetchall(PDO::FETCH_ASSOC);
$request->closeCursor();

//Récupérer tous les users dans $users
$sql = 'SELECT id, pseudo FROM user ORDER BY pseudo ASC';
$request = $pdo->prepare($sql);
$request->execute();
$users = $request->fetchall(PDO::FETCH_ASSOC);
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
    <?php if (!isset($pseudo)) { ?>
    <p>
        <a href="register.php">Enregistrement</a> / <a href="connection.php">Connexion</a>
    </p>
    <?php } else { ?>
    <p>
        <a href="deconnection.php">Déconnexion</a>
    </p>
    <?php } ?>
   
    <h1>La phrase du jour</h1>
        <form action="" method="post">
            <input type="text" name ="content" placeholder="Ecrire ici votre phrase du jour">
            <input type="submit" value="Valider">
        </form>
<br>
<?php
foreach ($users as $user) {
    echo '<a href="?id_user=' . $user['id'] . '">' . ucfirst($user['pseudo']) . '</a>  ';
}
?>
<a href="index.php">Tout</a>

<br>
<!-- Afficher ici tous les commentaires un par un avec un foreach -->
    <?php
    foreach ($comments as $comment) {
        echo '<br>';
        echo '<strong>' . ucfirst($comment['pseudo']) . '</strong> : ' . $comment['content'];
        echo '<hr>';
    }
    ?>
</body>
</html>
