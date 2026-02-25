<?php

namespace Biblio\App\Repository;

use Biblio\App\Entity\Book;
use PDO;

class BookRepository extends Repository
{
    public function findAll($author)
    {
        $where = $author ? "WHERE author='$author'" : NULL;
        $sql = "SELECT Bk.*, Bw.id as id_borrow FROM book Bk LEFT JOIN borrow Bw ON Bk.id=Bw.id_book " . $where;
        $request = $this->pdo->prepare($sql);
        $request->execute();
        $books = $request->fetchAll(PDO::FETCH_CLASS, Book::class);

        return $books;
    }

    public function find($id)
    {
        $sql = "SELECT Bk.*, Bw.id as id_borrow FROM book Bk LEFT JOIN borrow Bw ON Bk.id=Bw.id_book WHERE Bk.id=:id";
        $request = $this->pdo->prepare($sql);
        $request->execute(['id' => $id]);
        $request->setFetchMode(PDO::FETCH_CLASS, Book::class);
        $book = $request->fetch();

        return $book;
    }

    public function search($search)
    {
        $sql = "SELECT distinct(author) FROM book WHERE author LIKE :search";
        $request = $this->pdo->prepare($sql);
        $request->execute(['search' => "%$search%"]);

        return $request->fetchAll(PDO::FETCH_CLASS, '\Biblio\App\Entity\Book');
    }
}
