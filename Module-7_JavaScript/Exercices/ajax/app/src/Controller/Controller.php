<?php

namespace Ajax\App\Controller;

use Ajax\App\Repository\Repository;

class Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new Repository;
    }

    public function index()
    {
        $comments = $this->repository->findAll();

        require '../src/view/index.phtml';
    }
}
