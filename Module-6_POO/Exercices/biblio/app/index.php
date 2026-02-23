<?php

use Biblio\App\Controller\BookController;

require 'vendor/autoload.php';

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

$bookController = new BookController;

if ($route === 'index') {
    $bookController->index();
} elseif ($route === 'show') {
    $bookController->show();
} elseif($route === 'search') {
    $bookController->search();
} elseif ($route === 'borrow') {
    $bookController->borrow();
} else {
    echo 'Erreur 404 : page demandée inconnue !';
}
