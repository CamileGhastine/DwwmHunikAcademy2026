<?php

namespace Notes\App\Controller;

use Notes\App\Entity\Appreciation;
use Notes\App\Repository\AppreciationRepository;
use Notes\App\Repository\NoteRepository;
use Notes\App\Repository\UserRepository;

class ReportController
{
    private $userRepository;
    private $appreciationRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->appreciationRepository = new AppreciationRepository;
    }

    public function index()
    {
        $users = $this->userRepository->findall();

        require 'src/view/index.phtml';
    }

    public function show()
    {
        $id = $_GET['id'] ?? NULL;
        $user = $this->userRepository->findById((int)$id);

        $noteRepo = new NoteRepository();
        $notes = $noteRepo->findallByIdUser((int)$id);

        $appreciation = $this->appreciationRepository->findByUserId((int)$id);

        require 'src/view/show.phtml';
    }

    public function add()
    {
                
        if(!empty($_POST)) {
            $appreciation = new Appreciation;
            $appreciation->setComment($_POST['comment'])
            ->setMention($_POST['mention'] ?? NULL)
            ->setId_user($_POST['id_user'])
            ;

            $this->appreciationRepository->add($appreciation);

            header('Location: ?route=show&id=' . $appreciation->getId_user());
            exit;
        }

        $id_user = $_GET['id_user'] ?? NULL;  

        require 'src/view/add.phtml';
    }

    public function delete()
    {
        $id = $_GET['id'] ?? NULL;
        $id_user = $_GET['id_user'] ?? NULL;

        $this->appreciationRepository->delete($id);

        header('Location: ?route=show&id=' . $id_user);
        exit;
    }

    public function update()
    {
        if(!empty($_POST)) {
            $appreciation = new Appreciation;
            $appreciation->setComment($_POST['comment'])
            ->setMention($_POST['mention'] ?? NULL)
            ->setId_user($_POST['id_user'])
            ;

            $this->appreciationRepository->update($appreciation);

            header('Location: ?route=show&id=' . $appreciation->getId_user());
            exit;
        }

        $id = $_GET['id'] ?? NULL;

        $appreciation = $this->appreciationRepository->findById($id);

        require 'src/view/update.phtml';
    }
}
