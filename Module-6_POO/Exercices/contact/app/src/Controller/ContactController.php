<?php

namespace Contact\App\Controller;

use Contact\App\Entity\Contact;
use Contact\App\Repository\ContactRepository;

class ContactController
{
    public function index()
    {
        require ('src/view/index.phtml');
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
        
            $contactRepo = new ContactRepository;
            $contactRepo->add($contact);

            header('Location: index.php');
            exit;
        } 

        require 'src/view/add.phtml';        
    }
}
