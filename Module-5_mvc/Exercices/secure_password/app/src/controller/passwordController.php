<?php

function index()
{
    $user = $_SESSION['user'];

    require('src/model/password.php');
    $passwords = getPasswordsByUserId($user['id']);

    require('src/view/password/index.phtml');
}

function show()
{
    $id = $_GET['id'];

    require('src/model/password.php');
    $password = getPasswordById($id);

    require('src/view/password/show.phtml'); 
}

function add()
{
    $user = $_SESSION['user'];
    $error = '';

    if (!empty($_POST)) {
        $title = $_POST['title'];
        $secret = $_POST['secret'];

        if(empty($title) || strlen($title) > 100 || empty($secret) || strlen($secret) > 255) {
            $error = 'Problème de saisie.';
        }

        if (!$error) {
            // Enregsitrer les saisies dans la bdd
            require('src/model/password.php');
            addPassword($title, $secret, $user['id']);

            header('Location: index.php');
            exit; 
        }
    }

    //Appel la vue qui contient le formulaire
    require('src/view/password/add.phtml');
}
