<?php
use Ajax\App\Controller\Controller;

require __DIR__ . '/../vendor/autoload.php';

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

$controller = new Controller;

if ($route === 'index') {
    $controller->index();
}