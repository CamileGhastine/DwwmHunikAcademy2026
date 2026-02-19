<?php

/**
 * Exercice 1
 */

//Définir la classe Book ici
class Book
{
    private $title;
    private $author;
    private $genre;
    private $description;
    private $dateInstanciation;

    public function __construct()
    {
        $this->setDateInstanciation(date('d/m/Y à h:i:s'));
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of dateInstanciation
     */ 
    public function getDateInstanciation()
    {
        return $this->dateInstanciation;
    }

    /**
     * Set the value of dateInstanciation
     *
     * @return  self
     */ 
    public function setDateInstanciation($dateInstanciation)
    {
        $this->dateInstanciation = $dateInstanciation;

        return $this;
    }
}
