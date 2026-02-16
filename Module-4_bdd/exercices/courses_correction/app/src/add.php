<?php
session_start();
$tokenCsrfSession = $_SESSION['token_csrf'];

// dans index.php rediriger le formulaire ici (src/add.php)
if (!empty($_POST)) {
    // faille CSRF sur formulaire
    $tokenCsrf = $_POST['token_csrf'];
    if ($tokenCsrf !== $tokenCsrfSession) {
        header('Location: /index.php');
        exit;
    }
    
    // Si le formulaire est soumis, récupérer la saisie de l'utilisateur
    $name = $_POST['item'];

    if (empty($name) || strlen($name) > 50) {
        header('Location: /index.php');
        exit;
    }

    // Enregistrer la saisie dans la BDD
    $pdo = new \PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');
    $sql = "INSERT INTO product(name) VALUES (:name)";
    $request = $pdo->prepare($sql);
    $request->execute(['name' => $name]);

    // Rediriger vers la index.php
    header('Location: /index.php');
    exit;
}
