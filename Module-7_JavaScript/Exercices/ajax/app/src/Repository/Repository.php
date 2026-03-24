<?php

namespace Ajax\App\Repository;

use Ajax\App\Entity\Comment;
use PDO;

class Repository
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=mysql; dbname=ajax', 'user', 'pwd');
    }

    public function findAll($offset = 0, $quantity = 10)
    {
        $sql = "SELECT * FROM comment ORDER BY created_at DESC LIMIT :offset, :quantity";
        $request = $this->pdo->prepare($sql);
        $request->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $request->bindValue(':quantity', (int)$quantity, PDO::PARAM_INT);
        $request->execute();

        return $request->fetchall(PDO::FETCH_CLASS, Comment::class);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM comment where id=:id";
        $request = $this->pdo->prepare($sql);
        $request->execute(['id' => $id]);
        $request->setFetchMode(PDO::FETCH_CLASS, Comment::class);

        return $request->fetch();
    }
}