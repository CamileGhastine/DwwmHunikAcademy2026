<?php

/**
 * Exercice 4
 */

// Ecrire la classe Manga ici
class Manga extends Book
{
    private $illustrator;

    /**
     * Get the value of illustrator
     */ 
    public function getIllustrator()
    {
        return $this->illustrator;
    }

    /**
     * Set the value of illustrator
     *
     * @return  self
     */ 
    public function setIllustrator($illustrator)
    {
        $this->illustrator = $illustrator;

        return $this;
    }
}