<?php

function add($name, $pwdHash)
{
    $pdo = new PDO('mysql:host=mysql;dbname=secure_password', 'user', 'pwd');
    $sql = "INSERT INTO user(name, password) VALUES (:name, :password)";
    $request = $pdo->prepare($sql);
    $request->execute([
        'name' => trim($name),
        'password' => $pwdHash
    ]);
}

function getOneByName($name)
{
    $pdo = new PDO('mysql:host=mysql;dbname=secure_password', 'user', 'pwd');
    $sql = "SELECT * FROM user WHERE name=:name";
    $request = $pdo->prepare($sql);
    $request->execute([
        'name' => $name
    ]);
    $user = $request->fetch(PDO::FETCH_ASSOC);

    return $user;
}