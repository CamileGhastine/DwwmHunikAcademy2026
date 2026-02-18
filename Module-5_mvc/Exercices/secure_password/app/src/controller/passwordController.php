<?php

function index()
{
    require('src/model/password.php');
    $passwords = getPasswords();

    require('src/view/password/index.phtml');
}

function show()
{
    $id = $_GET['id'];

    require('src/model/password.php');
    $password = getPasswordById($id);

    require('src/view/password/show.phtml');
    
}