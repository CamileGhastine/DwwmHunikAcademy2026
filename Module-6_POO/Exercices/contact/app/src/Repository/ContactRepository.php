<?php

namespace Contact\App\Repository;

use Contact\App\Entity\Contact;
use Contact\App\Repository\Repository;
use PDO;

class ContactRepository extends Repository
{
    public function findall()
    {
        $sql = "SELECT * FROM contact";
        $request = $this->pdo->prepare($sql);
        $request->execute();

        return $request->fetchall(PDO::FETCH_CLASS, Contact::class);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM contact WHERE id=:id";
        $request = $this->pdo->prepare($sql);
        $request->execute(['id' => $id]);
        $request->setFetchMode(PDO::FETCH_CLASS, Contact::class);

        return $request->fetch();
    }

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

