<?php

function getPasswords()
{
    $pdo = new \PDO('mysql:dbname=secure_password;host=mysql', 'user', 'pwd');
    $sql = "SELECT * FROM password";
    $request = $pdo->prepare($sql);
    $request->execute();
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