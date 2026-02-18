<?php

function connection()
{
    $message ='';

    if (isset($_GET['register']) && $_GET['register'] === '1') {
        $message = 'Votre enregsitrement a été réalisé avec succès !<br> Vous pouvez maintenant vous connecter.';
    }

    // si le formulaire a été soumis --> On stocker les données du formulaire dans des variables PHP
    if(!empty($_POST)) {
        $name = $_POST['name'];
        $password = $_POST['pwd'];

        // On récupère de la BDD le password du name saisi par l'utilisateur
        require_once('src/model/user.php');
        $user = getOneByName($name);
        
        // si les mot de passe concordent [fonnction php password_verify($pwdSaisi, $pwdFromBdd)]
        if ($user && password_verify($password, $user['password'])) {
            // on enregistre en session $_SESSION['name'] = $name
            $_SESSION['name'] = $name;
            header('Location: index.php');
            exit;
        } else {
            // Sinon on affiche un message d'erreur
            $message = 'Les identifiants sont incorrects !';
        }    
    }    

    require('src/view/security/connection.phtml');
}

function deconnection() 
{
    $_SESSION = [];
    session_destroy();
    header('Location: index.php');
    exit;
}

function register()
{
    $name='';
    $error = '';

    if(!empty($_POST)) {
        $name = $_POST['name'];
        $pwd = $_POST['pwd'];
        $pwdVerif = $_POST['pwdVerif'];

        // On verifie s'il ya des erreurs dans la saisie
        $error = verifCredentials($name, $pwd, $pwdVerif);

        // S'il n y'a pas d'erreur on enregistre en BDD le name et le mot de passe hashé
        if(!$error) {
            $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);

            require_once('src/model/user.php');
            add($name, $pwdHash);

            header('Location: index.php');
            exit;
        }
    }

    require('src/view/security/register.phtml');
}


// Fonction qui vérifie la saisie des des champs par l'utilisateur.
function verifCredentials(string $name, string $pwd, string $pwdVerif)
{
    // On vérifie que tous les champs ont été remplis
    if (empty($name) || empty($pwd) || empty($pwdVerif)) {
        return 'Tous les champs doivent être remplis.';
    }

    // On vérifie si les mots de passe sont identiques
    if ($pwd !== $pwdVerif) {
        return 'Les mots de passe doivent être identiques.';
    }

    // On vérifie que le mot de passe à au moins 12 carcatères
    // if (strlen($pwd) < 12) {
    //     return "Le mot de passe doit être d'au mons 12 caractères";
    // }

    // Pour etre encore plus rigoureux précis on peut vérifier que le mot de passe à au moins 1 chiffre, 1 minuscule, 1 majuscule, un caractère spécial et au moins 12 caractères
    // if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{12,}$/', $pwd)) {
    //             return "Le mot de passe contenir au mons 12 caractères et au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial.";
    // }

    // On vérifie si le name existe dans la BDD
    require_once('src/model/user.php');
    $user = getOneByName($name);

    if($user) {
        return 'Ce nom existe déjà.';
    }
}