<?php

namespace Contact\App\Repository;

use Contact\App\Entity\Contact;
use Contact\App\Repository\Repository;

class ContactRepository extends Repository
{
    public function add(Contact $contact)
    {
        $sql = "INSERT INTO contact (nom, prenom, email, telephone, adresse) VALUES (:lastname, :firstname, :email, :phone, :adress)";
        $request = $this->pdo->prepare($sql);
        $request->execute([
            'lastname' => $contact->getNom(),
            'firstname' => $contact->getPrenom(),
            'email' => $contact->getEmail(),
            'phone' => $contact->getTelephone(),
            'adress' => $contact->getAdresse()
        ]);
    }
}

