<?php

use Biblio\App\Controller\BookController;
use Biblio\App\Controller\BorrowController;

require 'vendor/autoload.php';

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

$bookController = new BookController;
$borrowController = new BorrowController;

if ($route === 'index') {
    $bookController->index();
} elseif ($route === 'show') {
    $bookController->show();
} elseif($route === 'search') {
    $bookController->search();
} elseif ($route === 'borrow') {
    $borrowController->borrow();
} elseif ($route === 'listBorrow') {
    $borrowController->index();
} elseif ($route === 'return') {
    $borrowController->delete();
} else {
    echo 'Erreur 404 : page demandée inconnue !';
}
