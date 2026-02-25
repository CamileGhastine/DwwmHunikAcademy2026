<?php

namespace Biblio\App\Controller;

use Biblio\App\Repository\BookRepository;

class BookController
{
    private $bookRepo;

    public function __construct()
    {
        $this->bookRepo = new BookRepository;
    }
    public function index()
    {
        $author = isset($_GET['author']) ? $_GET['author'] : NULL;
        // Même chose que $author = $_GET['author'] ?: NULL;
    
        $books = $this->bookRepo->findAll($author);  

        require('src/view/book/index.phtml');
    }

    public function show()
    {
        $id = $_GET['id'];

        $book = $this->bookRepo->find($id);

        require('src/view/book/show.phtml');   
    }

    public function search()
    {
        if (!empty($_POST)) {
            $search = $_POST['author'];

            if (empty($search)) {
                header('Location: index.php');
                exit;
            }
            
            $books = $this->bookRepo->search($search);

            require('src/view/author/index.phtml');
        }
    }
}
