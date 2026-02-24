<?php

namespace Biblio\App\Controller;

use Biblio\App\Repository\BorrowRepository;

class BorrowController
{
    public function index()
    {
        $borrowRepo = new BorrowRepository;
        $borrows = $borrowRepo->findAllWithBooks();

        require 'src/view/borrow/index.phtml';
    }
}