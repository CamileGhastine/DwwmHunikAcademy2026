<?php

function index()
{
    // Token csrf
    if(!isset($_SESSION['token_csrf'])) {
        $_SESSION['token_csrf'] = bin2hex(random_bytes(32));
    }
    $tokenCsrf = $_SESSION['token_csrf'];

    // Récupérer dans la BDD tous les produits. Vérifier avec un var_dump($products)
    require_once('src/model/product.php');
    $products = getProducts();
    $productQty = getProductsQty();

    // Afficher tous les produits dans le HTML ci-dessous avec un foreach
    require('src/view/index.phtml');
}

function addProduct()
{
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
        require_once('src/model/product.php');
        add($name);

        // Rediriger vers la index.php
        header('Location: /index.php');
        exit;
    }
}

function deleteProduct()
{
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
    require_once('src/model/product.php');
    delete($id);

    // Rediriger vers la index.php
    header('Location: /index.php');
    exit;
}

function updateProduct()
{
    $tokenCsrfSession = $_SESSION['token_csrf'];

    // dans index.php mettre un lien sur ✏️ qui redirige ici (src/update.php) en envoyant l'id du produit à updater
    // Récupérer l'id du produit à updater
    $id = (int)$_GET['id'];

    // Récupérer le produit dans la BDD
    require_once('src/model/product.php');
    $product = getProduct($id);

    // Injecter la nom du produit dans le formulaire

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
            header('Location: update.php?id=' . $id);
            exit;
        }

        // updater la saisie dans la BDD
        update($id, $name);

        // Rediriger vers la index.php
        header('Location: /index.php');
        exit;
    }

    require('src/view/update.phtml');
}
