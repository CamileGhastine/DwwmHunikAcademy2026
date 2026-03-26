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

    public function findAll($offset = 0, $quantity = 10, $returnArray = false)
    {
        $sql = "SELECT * FROM comment ORDER BY created_at DESC LIMIT :offset, :quantity";
        $request = $this->pdo->prepare($sql);
        $request->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $request->bindValue(':quantity', (int)$quantity, PDO::PARAM_INT);
        $request->execute();
        $request->setFetchMode(PDO::FETCH_CLASS, Comment::class);

        if ($returnArray) {
            $request->setFetchMode(PDO::FETCH_ASSOC);
        }

        return $request->fetchall();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM comment where id=:id";
        $request = $this->pdo->prepare($sql);
        $request->execute(['id' => $id]);
        $request->setFetchMode(PDO::FETCH_ASSOC);

        return $request->fetch();
    }

    public function like($id) {
        $sql = "UPDATE comment SET liked = liked + 1 WHERE id=:id";
        $request = $this->pdo->prepare($sql);
        $request->execute(['id' => $id]);
    }

    public function add($content)
    {
        $sql = "INSERT INTO comment(content) VALUES(:content);";
        $request = $this->pdo->prepare($sql);
        $request->execute(['content' => $content]);

        $lastId = $this->pdo->lastInsertId();
        $sql2 = "SELECT * FROM comment WHERE id = :id";
        $request2 = $this->pdo->prepare($sql2);
        $request2->execute(['id' => $lastId]);
        $request2->setFetchMode(PDO::FETCH_ASSOC);

        return $request2->fetch();
    }
}
