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

    public function seeMoreAjax()
    {
        $commentBatch = $_GET['commentBatch'];
        $comment = $this->repository->findAll( 10 * $commentBatch, 10, true);
        echo json_encode($comment);
    }

    public function likeAjax() {

    }
}
