<?php

/**
 * Exercice 5
 */

//Ecrire la classe Rectangle ici
class Rectangle
{
    private $length;
    private $width;

    public function __construct($length, $width)
    {
        $this->setLength($length);
        $this->setWidth($width);
    }

    public function is_square()
    {
        // if ($this->getLength() === $this->getWidth()) {
        //     $result = true;
        // } else {
        //     $result = false;
        // }

        // return $result;

        return $this->getLength() === $this->getWidth();
    }

    public function area()
    {
        return $this->getLength() * $this->getWidth();
    }


    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }


    /**
     * Get the value of width
     */ 
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set the value of width
     *
     * @return  self
     */ 
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }
}
