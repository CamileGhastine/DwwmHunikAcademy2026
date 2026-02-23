<?php

require_once('src/Repository/BookRepository.php');

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
}