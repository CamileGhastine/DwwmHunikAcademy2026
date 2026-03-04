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



class CompteBancaire
{
    private $titulaire;
    private $solde;
    const PLAFOND_RETRAIT = 500;

    public function __construct($titulaire, $solde)
    {
       $this->titulaire = $titulaire;
       $this->solde = $solde;
    }

    public function __toString()
    {
        return  "Compte de $this->titulaire — Solde : $this->solde €";
    }

    public function deposer(int $montant)
    {
        if ($montant < 0 || is_null($montant)) {
            echo "❌ Merci de saisir un montant qui doit être positif <br>";
        } else {
            $this->solde += $montant;   
        }


    }

    public function retirer($montant)
    {
        if ($montant > self::PLAFOND_RETRAIT) {
            echo "❌ Retrait refusé : dépasse le plafond de 500 €";
            return;
        }

        if ($montant > $this->solde) {
            echo "❌ Retrait refusé : solde insuffisant";
            return;
        } 
        
        $this->solde -= $montant;  
    }
}





// Tester le scénario suivant :

$compte = new CompteBancaire("Alice", 300);

echo $compte . "<br>";       // Compte de Alice — Solde : 300 €

$compte->deposer(-200);
echo $compte . "<br>";       // Solde : 500 €

$compte->retirer(400);
echo $compte . "<br>";       // Solde : 100 €

$compte->retirer(600);       // ❌ Dépasse le plafond de 500 €
echo $compte . "<br>";       // Solde inchangé : 100 €

$compte->retirer(200);      // ❌ Solde insuffisant
echo $compte . "<br>";       // Solde inchangé : 100 €


