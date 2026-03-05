<?php
// Créer une classe `FileAttente` qui simule une file de patients dans une salle d'attente :
    // la méthode arriver(string $nom) — ajoute le patient en fin de file
    // la méthode afficher() — affiche tous les patients dans l'ordre d'attente
    // la méthode appeler() — retire et retourne le **premier** patient, ou `"Salle vide"` si personne

class FileAttente
{
    private $fileAttente = [];

    public function arriver(string $nom)
    {
        $this->fileAttente[] = $nom;
    }

    public function afficher()
    {
        if ($this->fileAttente === []) {
            echo 'Salle vide <br>';
            return;
        }

        // *** méthode 1 ***
        //$affichage = '';
        //$taille = count($this->fileAttente);
        //$count = 0;
        //foreach ($this->fileAttente as $patient) {
        //    $affichage .= $patient;

            //$count ++;
            //if ($count < $taille) {
            //    $affichage .= ',';
            //}
        //}
        // echo $affichage;


        // *** Methode 2 ***
        //$affichage = '';
        //$taille = count($this->fileAttente);
        //$count = 0;
        //foreach ($this->fileAttente as $patient) {
        //    $affichage .= $patient . ',';
        //}

        //$affichage = rtrim($affichage, ',');
        // ou
        //$affichage = substr($affichage, 0, -1);
        // echo $affichage;

        // *** Methode 3 ***
        echo implode(', ', $this->fileAttente) . '<br>';
    }

    public function appeler()
    {
        if ($this->fileAttente === []) {
            echo 'salle vide';
            return;
        }

        // *** Méthode 1 ***
        //$count = 0;
        //$fileAttenteActualisee = [];
        //foreach ($this->fileAttente as $patient) {
        //    $count++;
        //    if($count === 1) {
        //        $patientAppele = $patient;
        //    } else {
        //        $fileAttenteActualisee[] = $patient;
        //    }
        //}
        //$this->fileAttente = $fileAttenteActualisee;
        //echo $patientAppele;

        // *** Méthode 2 ***
        echo array_shift($this->fileAttente);
    }
}
  



// Tester le scénario suivant :

$file = new FileAttente();
$file->afficher();  // Salle vide
$file->arriver("Alice");
$file->arriver("Bob");
$file->arriver("Clara");
$file->afficher();  // Alice, Bob, Clara
echo $file->appeler(); // Alice
echo '<br>';
$file->afficher();  // Bob, Clara
echo $file->appeler(); // Bob
