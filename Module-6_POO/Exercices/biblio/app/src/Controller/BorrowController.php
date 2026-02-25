<?php

namespace Biblio\App\Controller;

use Biblio\App\Entity\Borrow;
use Biblio\App\Repository\BorrowRepository;

class BorrowController
{
    private $borrowRepo;

    public function __construct()
    {
        $this->borrowRepo = new BorrowRepository;
    }

    public function borrow()
    {
        if(!empty($_POST)) {
            if(empty($_POST['user']) || strlen($_POST['user']) > 50) {
                header('Location: index.php?route=show&id=' . $_POST['id_book']);
                exit;  
            }
            
            $borrow = new Borrow;
            $borrow->setUser($_POST['user'])
            ->setId_book((int)$_POST['id_book'])
            ->setDate_return();

            $borrowRepo = new BorrowRepository;
            $borrowRepo->add($borrow);

            header('Location: index.php');
            exit;         
        }
    }

    public function index()
    {
        $borrows = $this->borrowRepo->findAllWithBooks();

        require 'src/view/borrow/index.phtml';
    }

    public function delete()
    {
        $id = (int)$_GET['id'];

        $this->borrowRepo->delete($id);

        header('Location: index.php?route=listBorrow');
        exit;
    }
}