<?php

namespace Biblio\App\Entity;

use DateTime;

class Borrow
{
    private $id;
    private $user;
    private $date_return;
    private $id_book;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of date_return
     */ 
    public function getDate_return()
    {
        return $this->date_return;
    }

    /**
     * Set the value of date_return
     *
     * @return  self
     */ 
    public function setDate_return()
    {
        $dateReturn = new DateTime();
        $dateReturn->modify('+7 days');
        $dateReturn = $dateReturn->format('Y-m-d');

        $this->date_return = $dateReturn;

        return $this;
    }

    /**
     * Get the value of id_book
     */ 
    public function getId_book()
    {
        return $this->id_book;
    }

    /**
     * Set the value of id_book
     *
     * @return  self
     */ 
    public function setId_book($id_book)
    {
        $this->id_book = $id_book;

        return $this;
    }
}
