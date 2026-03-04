<?php

$chiensTableau = [
    ["race" => "Labrador",        "sex" => "M", "age" => 3, "nom" => "Rex",     "vaccine" => true],
    ["race" => "Beagle",          "sex" => "F", "age" => 5, "nom" => "Bella",   "vaccine" => false],
    ["race" => "Berger Allemand", "sex" => "M", "age" => 4, "nom" => "Max",     "vaccine" => true],
    ["race" => "Bulldog",         "sex" => "F", "age" => 2, "nom" => "Luna",    "vaccine" => false],
    ["race" => "Cocker",          "sex" => "M", "age" => 6, "nom" => "Charlie", "vaccine" => true],
    ["race" => "Shih Tzu",        "sex" => "F", "age" => 1, "nom" => "Daisy",   "vaccine" => true],
];

// 1) Créer une classe Chien avec les propriétés : race, sex, age, nom, les getters et les setters et un constructeur  pour initialiser toutes les propritées

$chien1 =new Chien('caniche', NULL, 'F', 'toto', true);
var_dump($chien1);
echo '<br>';
$chien2 =new Chien('doberman', 1, 'M', 'dober', false);
var_dump($chien2);
echo '<br>';

class Chien
{
    private $race;
    private $sex;
    private $age;
    private $nom;
    private $vaccine;

    public function __construct($race, $age, $sex, $nom, $vaccine)
    {
        $this->race = $race;
        $this->age = $age;
        $this->sex = $sex;
        $this->nom = $nom;
        $this->vaccine = $vaccine;
    }
    
    /**
     * Get the value of race
     */ 
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set the value of race
     *
     * @return  self
     */ 
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of sex
     */ 
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */ 
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of vaccine
     */ 
    public function getVaccine()
    {
        return $this->vaccine;
    }

    /**
     * Set the value of vaccine
     *
     * @return  self
     */ 
    public function setVaccine($vaccine)
    {
        $this->vaccine = $vaccine;

        return $this;
    }
}


// 2) Partir d’un tableau $chienTableau contenant 6 tableaux associatifs (avec les mêmes clés que la classe), créer un tableau d’objets Chien.

// Coder ici ...


// 3) Afficher grâce à la fonction __tostring tous les chiens vaccinés sous la forme : Rex est un Labrador de 3 ans (penser au S si besoin)

// Coder ici ...

