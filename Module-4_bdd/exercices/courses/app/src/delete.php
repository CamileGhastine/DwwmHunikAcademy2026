<?php
session_start();
$tokenCsrfSession = $_SESSION['token_csrf'];
// dans index.php mettre un lien sur ❌ qui redirige ici (src/delete.php) en envoyant l'id du produit à supprimer
// Récupérer l'id du produit à supprimer
$id = (int)$_GET['id'];
$tokenCsrf = $_GET['token_csrf'];

// Vérification du token CSRF
if ($tokenCsrf !== $tokenCsrfSession) {
    header('Location: /index.php');
    exit;
}
// Supprimer la saisie dans la BDD
$pdo = new PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');
$sql = "DELETE FROM product WHERE id=:id";
$request = $pdo->prepare($sql);
$request->execute(['id' => $id]);

// Rediriger vers la index.php
header('Location: /index.php');
exit;
