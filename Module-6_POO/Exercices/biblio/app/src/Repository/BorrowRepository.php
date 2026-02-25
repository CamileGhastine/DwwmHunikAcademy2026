<?php

namespace Biblio\App\Repository;

use Biblio\App\Entity\Borrow;
use PDO;

class BorrowRepository extends Repository
{
    public function add(Borrow $borrow)
    {
        $sql = "INSERT INTO borrow(user, id_book, date_return) VALUES (:user, :id_book, :date_return) ";
        $request = $this->pdo->prepare($sql);
        $request->execute([
            'user' => $borrow->getUser(),
            'id_book' => $borrow->getId_book(),
            'date_return' => $borrow->getDate_return()
        ]);
    }

    public function findAllWithBooks()
    {
        $sql = "SELECT Bw.*, Bk.title FROM borrow Bw INNER JOIN book Bk ON Bw.id_book=Bk.id";
        $request = $this->pdo->prepare($sql);
        $request->execute();
        $borrows = $request->fetchAll(PDO::FETCH_CLASS, Borrow::class);

        return $borrows;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM borrow WHERE id=:id";
        $request = $this->pdo->prepare($sql);
        $request->execute(['id' => $id]);
    }
}
