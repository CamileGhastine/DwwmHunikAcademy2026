<?php

use Notes\App\Controller\ReportController;

require 'vendor/autoload.php';

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

$reportController = new ReportController;

if ($route === 'index') {
    $reportController->index();
} elseif($route === 'show') {
    $reportController->show();
} elseif($route === 'add') {
    $reportController->add();
} elseif ($route === 'delete') {
    $reportController->delete();
} elseif ($route === 'update') {
    $reportController->update();
}