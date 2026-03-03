<?php

// Gestion d'un compte bancaire
// Créer une classe CompteBancaire avec les propriétés privées: titulaire, solde et la constante PLAFOND_RETRAIT fixée à 500
// Les méthodes suivantes seront ajoutées :
    // deposer($montant) — ajoute de l'argent au solde, renvoie un message d'erreur si le montant est négatif ou nul
    // retirer($montant) — retire de l'argent uniquement si le solde est suffisant ET que le montant ne dépasse pas PLAFOND_RETRAIT. 
        // Dans les cas contraires, renvoie un message d'erreur en précisant la raison :
                // "❌ Retrait refusé : dépasse le plafond de 500 €"
                // "❌ Retrait refusé : solde insuffisant"
    // __toString() — affiche sous la forme : "Compte de Alice — Solde : 1500 €"



// Coder ici ...







// Tester le scénario suivant :

$compte = new CompteBancaire("Alice", 300);

echo $compte . "<br>";       // Compte de Alice — Solde : 300 €

$compte->deposer(200);
echo $compte . "<br>";       // Solde : 500 €

$compte->retirer(400);
echo $compte . "<br>";       // Solde : 100 €

$compte->retirer(600);       // ❌ Dépasse le plafond de 500 €
echo $compte . "<br>";       // Solde inchangé : 100 €

$compte->retirer(200);      // ❌ Solde insuffisant
echo $compte . "<br>";       // Solde inchangé : 100 €


