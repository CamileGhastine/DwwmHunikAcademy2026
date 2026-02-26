<?php

use Contact\App\Controller\ContactController;

require 'vendor/autoload.php';

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

$contactController = new ContactController;

if ($route === 'index') {
    $contactController->index();
} elseif($route === 'add') {
    $contactController->add();
} elseif($route === 'show') {
    $contactController->show();
}

