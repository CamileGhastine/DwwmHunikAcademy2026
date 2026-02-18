<?php

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

require('src/controller/taskController.php');

if ($route === 'index') {
    index();
} elseif ($route === 'change') {
    changeStatus();
} elseif ($route === 'show') {
    show();
} elseif ($route === 'delete') {
    delete();
}else {
    echo 'Erreur 404 : page demandée inconnue !';
}
