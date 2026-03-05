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

class Chien
{
    private $race;
    private $sex;
    private $age;
    private $nom;
    private $estVaccine;

    public function __construct($race, $age, $sex, $nom, $vaccine)
    {
        $this->race = $race;
        $this->age = $age;
        $this->sex = $sex;
        $this->nom = $nom;
        $this->estVaccine = $vaccine;
    }
    
    public function __toString()
    {
        return "{$this->getNom()} est un {$this->getRace()} de {$this->getAge()} an" . ($this->getAge() > 1 ? 's' : '');
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
     * Get the value of estVaccine
     */ 
    public function estVaccine()
    {
        return $this->estVaccine;
    }

    /**
     * Set the value of estVaccine
     *
     * @return  self
     */ 
    public function setEstVaccine($estVaccine)
    {
        $this->estVaccine = $estVaccine;

        return $this;
    }
}


// 2) Partir d’un tableau $chienTableau contenant 6 tableaux associatifs (avec les mêmes clés que la classe), créer un tableau d’objets Chien.
$chiensObjet = [];
foreach ($chiensTableau as $chien) {
    $chiensObjet[] = new Chien($chien['race'], $chien['age'], $chien['sex'], $chien['nom'], $chien['vaccine']);
}


// 3) Afficher grâce à la fonction __tostring tous les chiens vaccinés sous la forme : Rex est un Labrador de 3 ans (penser au S si besoin)

foreach ($chiensObjet as $chien) {
    if($chien->estVaccine()) {
        echo $chien . '<br>';
    }
}

