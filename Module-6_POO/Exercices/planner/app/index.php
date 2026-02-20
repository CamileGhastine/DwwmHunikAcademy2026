<?php

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

require('src/controller/TaskController.php');
$taskController = new TaskController;

if ($route === 'index') {
    $taskController->index();
} elseif ($route === 'change') {
    $taskController->changeStatus();
} elseif ($route === 'show') {
    $taskController->show();
} elseif ($route === 'delete') {
    $taskController->delete();
}else {
    echo 'Erreur 404 : page demandée inconnue !';
}
