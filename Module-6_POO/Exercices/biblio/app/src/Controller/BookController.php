<?php

namespace Biblio\App\Controller;

use Biblio\App\Entity\Borrow;
use Biblio\App\Repository\BookRepository;
use Biblio\App\Repository\BorrowRepository;

class BookController
{
    public function index()
    {
        $author = isset($_GET['author']) ? $_GET['author'] : NULL;
        // Même chose que $author = $_GET['author'] ?: NULL;
    
        $bookRepo = new BookRepository;
        $books = $bookRepo->findAll($author);  

        require('src/view/book/index.phtml');
    }

    public function show()
    {
        $id = $_GET['id'];

        $bookRepo = new BookRepository;
        $book = $bookRepo->find($id);

        require('src/view/book/show.phtml');   
    }

    public function search()
    {
        if (!empty($_POST)) {
            $search = $_POST['author'];
            
            $bookRepo = new BookRepository;
            $books = $bookRepo->search($search);

            require('src/view/author/index.phtml');
        }
    }

    public function borrow()
    {
        if(!empty($_POST)) {
            if(empty($user) || strlen($user) > 50) {
                header('Location: index.php?route=show&id=' . $_POST['id_book']);
                exit;  
            }
            
            $borrow = new Borrow;
            $borrow->setUser($_POST['user'])
            ->setId_book((int)$_POST['id_book'])
            ->setDate_return();

            $bookRepo = new BorrowRepository;
            $bookRepo->add($borrow);

            header('Location: index.php');
            exit;         
        }
    }
}
