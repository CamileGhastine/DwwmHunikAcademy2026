<?php

namespace Notes\App\Repository;

use Notes\App\Repository\Repository;
use Notes\App\Entity\User;
use PDO;

class UserRepository extends Repository
{
    public function findall()
    {
        $sql = "SELECT * FROM user";
        $request = $this->pdo->prepare($sql);
        $request->execute();

        return $request->fetchall(PDO::FETCH_CLASS, User::class);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM user WHERE id=:id";
        $request = $this->pdo->prepare($sql);
        $request->execute([
            'id' => $id
            ]);
        $request->setFetchMode(PDO::FETCH_CLASS, User::class);

        return $request->fetch();
    }
}
