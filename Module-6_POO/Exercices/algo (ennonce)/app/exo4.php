<?php
// Créer une classe `FileAttente` qui simule une file de patients dans une salle d'attente :
    // la méthode arriver(string $nom) — ajoute le patient en fin de file
    // la méthode afficher() — affiche tous les patients dans l'ordre d'attente
    // la méthode appeler() — retire et retourne le **premier** patient, ou `"Salle vide"` si personne

// Coder ici ...

  



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