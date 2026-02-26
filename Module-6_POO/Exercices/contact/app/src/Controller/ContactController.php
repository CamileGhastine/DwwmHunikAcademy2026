<?php

namespace Contact\App\Controller;

use Contact\App\Entity\Contact;
use Contact\App\Repository\ContactRepository;

class ContactController
{
    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository;
    }

    public function index()
    {
        $contacts = $this->contactRepo->findall();

        require ('src/view/index.phtml');
    }

    public function show()
    {
        $id = $_GET['id'];

        $contact = $this->contactRepo->findById($id);

        require 'src/view/show.phtml';

    }

    public function add()
    {
        if (!empty($_POST)) {
            $contact = new Contact;
            $contact->setNom($_POST['nom'])
            ->setPrenom($_POST['prenom'])
            ->setEmail($_POST['email'])
            ->setTelephone($_POST['telephone'])
            ->setAdresse($_POST['adresse'])
            ;
        
            $this->contactRepo->add($contact);

            header('Location: index.php');
            exit;
        } 

        require 'src/view/add.phtml';        
    }
}
