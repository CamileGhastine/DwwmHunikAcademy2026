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
        $isNewContact = true;

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

        require 'src/view/add-update.phtml';        
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];

            $this->contactRepo->delete($id);

            header('Location: index.php');
            exit;
        }
    }

    public function update()
    {
        $isNewContact = false;
        
        $id = $_GET['id'] ?? NULL;

        /** @var Contact $contact */
        $contact = $this->contactRepo->findById($id);

        if (!empty($_POST)) {
            // On hydrate l'objet contact de manière dynamique
            foreach ($_POST as $key => $value) {
                $action = 'set'. ucFirst($key);
                $contact->$action($value);
            }
      
            $this->contactRepo->update($contact);

            header('Location: index.php');
            exit;
        }

        require ('src/view/add-update.phtml');
    }
}
