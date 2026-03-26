<?php

namespace Ajax\App\Controller;

use Ajax\App\Entity\Comment;
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
        $id = $_GET['id'];
        $this->repository->like($id);
        $comment = $this->repository->find($id);
        echo json_encode($comment);
    }

    public function addAjax()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $comment = $this->repository->add($data['content']);
        echo json_encode($comment);
    }
}


