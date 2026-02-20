<?php

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

require('src/controller/BookController.php');
$bookController = new BookController;

if ($route === 'index') {
    $bookController->index();
} elseif ($route === 'show') {
    $bookController->show();
} else {
    echo 'Erreur 404 : page demandée inconnue !';
}
