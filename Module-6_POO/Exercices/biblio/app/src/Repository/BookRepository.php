<?php

class BookRepository
{
    public function findAll()
    {
        require_once('src/Entity/Book.php');
        $pdo = new \PDO('mysql:host=mysql; dbname=librairy', 'user', 'pass');
        $sql = "SELECT * FROM book";
        $request = $pdo->prepare($sql);
        $request->execute();
        $books = $request->fetchAll(\PDO::FETCH_CLASS, 'Book');

        return $books;
    }

    public function find($id)
    {
        require_once('src/Entity/Book.php');
        $pdo = new \PDO('mysql:host=mysql; dbname=librairy', 'user', 'pass');
        $sql = "SELECT * FROM book WHERE id=:id";
        $request = $pdo->prepare($sql);
        $request->execute(['id' => $id]);
        $request->setFetchMode(\PDO::FETCH_CLASS, 'Book');
        $book = $request->fetch();

        return $book;
    }
}