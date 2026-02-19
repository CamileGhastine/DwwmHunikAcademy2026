<?php

function getPasswordsByUserId($userId)
{
    $pdo = new \PDO('mysql:dbname=secure_password;host=mysql', 'user', 'pwd');
    $sql = "SELECT * FROM password WHERE id_user=:userId";
    $request = $pdo->prepare($sql);
    $request->execute(['userId' => $userId]);
    $passwords = $request->fetchAll(\PDO::FETCH_ASSOC);

    return $passwords;
}

function getPasswordById($id)
{
    $pdo = new \PDO('mysql:dbname=secure_password;host=mysql', 'user', 'pwd');
    $sql = "SELECT * FROM password WHERE id=:id";
    $request = $pdo->prepare($sql);
    $request->execute(['id' => $id]);
    $password = $request->fetch(\PDO::FETCH_ASSOC);

    return $password;
}

function addPassword($title, $secret, $userId)
{
    $pdo = new \PDO('mysql:dbname=secure_password;host=mysql', 'user', 'pwd');
    $sql = "INSERT INTO password (title, secret, id_user) VALUES (:title, :secret, :userId)";
    $request = $pdo->prepare($sql);
    $request->execute([
        'title' => $title,
        'secret' => $secret,
        'userId' => $userId
    ]);
}