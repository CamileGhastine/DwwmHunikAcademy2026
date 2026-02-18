<?php
session_start();

// Annalyse la route route demandée
if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route = 'index';
}

// on appelle la bonne fonction suivant la route demandée
require_once('src/controller/productController.php');

if ($route === 'index') {
    index();
} elseif ($route === 'add') {
    addProduct();
} elseif ($route === 'delete') {
    deleteProduct();
} elseif ($route === 'update') {
    updateProduct();
} else {
    echo 'Erreur 404 : page non trouvée!<br><a href="../index.php">Retour à l\'accueil</a>';
}