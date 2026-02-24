<?php

namespace Biblio\App\Repository;

use Biblio\App\Entity\Borrow;

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
}
