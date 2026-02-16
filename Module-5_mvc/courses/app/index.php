<?php
// Token csrf
session_start();
if(!isset($_SESSION['token_csrf'])) {
    $_SESSION['token_csrf'] = bin2hex(random_bytes(32));
}
$tokenCsrf = $_SESSION['token_csrf'];

// Récupérer dans la BDD tous les produits. Vérifier avec un var_dump($products)
require('src/model/product.php');
$products = getProducts();

// Afficher tous les produits dans le HTML ci-dessous avec un foreach
require('src/view/index.phtml');
