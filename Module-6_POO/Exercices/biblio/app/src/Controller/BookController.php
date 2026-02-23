<?php

namespace Biblio\App\Controller;

use Biblio\App\Repository\BookRepository;

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
        // Récupérer les infos du formulaire : $id_book, $user
        // Calculer la date_return à J+7
        // Enregsitrer les infos (id_book, user, date_return) en BDD (grace au BorrowRepository)
        // Rédirger vers l'accueil
    }
}