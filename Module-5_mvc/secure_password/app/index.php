<?php
session_start();

if(isset($_GET['route'])) {
    $route = $_GET['route'];
} else {
    $route ='index';
}

if ($route === 'index') {
    require_once('src/controller/passwordController.php');
    index();
} elseif($route === 'register') {
    require_once('src/controller/securityController.php');
    register();
} elseif($route === 'connection') {
    require_once('src/controller/securityController.php');
    connection();
} elseif ($route === 'deconnection') {
    require_once('src/controller/securityController.php');
    deconnection();
}
