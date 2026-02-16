<?php
session_start();
if(!isset($_SESSION['token_csrf'])) {
    $_SESSION['token_csrf'] = bin2hex(random_bytes(32));
}
$tokenCsrf = $_SESSION['token_csrf'];

// Créer l'objet $pdo en récupérant les infos de connexion à la BDD dans le docker_compose
$pdo = new \PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');

// Récupérer dans la BDD tous les produits. Vérifier avec un var_dump($products)
$sql = "SELECT * FROM product";
$request = $pdo->prepare($sql);
$request->execute();
$products = $request->fetchAll(\PDO::FETCH_ASSOC);

// Afficher tous les produits dans le HTML ci-dessous avec un foreach
require('src/view/index.phtml');
