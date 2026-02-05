<?php
$pseudo='';
$error = '';

// On vérifie que le fomrulaire a été soumis
if(!empty($_POST)) {
    // On stocke les champs saisis dans des variables
    $pseudo = $_POST['pseudo'];
    $pwd = $_POST['pwd'];
    $pwdVerif = $_POST['pwdVerif'];

    // On verifie s'il ya des erreurs dans la saisie
    $error = verifCredentials($pseudo, $pwd, $pwdVerif);

    // S'il n y'a pas d'erreur on enregistre en BDD le pseudo et le mot de passe hashé
    if(!$error) {
        // On hash le mot de passe
        $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);

        // On ernegistre en BDD avec une requête préparé pour se protéger de l'injection SQL
        $pdo = new PDO('mysql:host=mysql;dbname=my_first_db', 'user', 'pwd');
        $sql = "INSERT INTO user(pseudo, password) VALUES (:pseudo, :password)";
        $request = $pdo->prepare($sql);
         $request->execute([
            'pseudo' => trim($pseudo),
            'password' => $pwdHash
        ]);

        // On redirige vers la connection pour que le nouvel utilisateur puisssex'enregistrer.
        header('Location: connection.php?register=1');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Enregistrement</h1>
    <form action="" method="post">
        Pseudo <input type="text" name="pseudo" value="<?php echo $pseudo ?>" required><br>
        Mot de passe <input type="password" name="pwd" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{12,}$" required><br>
        Vérification du mot de passe <input type="password" name="pwdVerif" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{12,}$" required><br>
        <?php echo $error . '<br>'; ?>
        <input type="submit" value="Enregistrement">
        <tex></tex>
    </form>
    <p><a href="/">Retour à l'accueil</a></p>
</body>
</html>


<?php

// Fonction qui vérifie la saisie des des champs par l'utilisateur.
function verifCredentials(string $pseudo, string $pwd, string $pwdVerif)
{
    // On vérifie que tous les champs ont été remplis
    if (empty($pseudo) || empty($pwd) || empty($pwdVerif)) {
        return 'Tous les champs doivent être remplis.';
    }

    // On vérifie si lesm ot de passe sont identique
    if ($pwd !== $pwdVerif) {
        return 'Les mots de passe doivent être identiques.';
    }

    // On vérifie que le mot de passe à au moins 12 carcatères
    if (strlen($pwd) < 12) {
        return "Le mot de passe doit être d'au mons 12 caractères";
    }

    // Pour etre encore plus rigoureux précis on peut vérifier que le mot de passe à au moins 1 chiffre, 1 minuscule, 1 majuscule, un caractère spécial et au moins 12 caractères
    // if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d]).{12,}$/', $pwd)) {
    //             return "Le mot de passe contenir au mons 12 caractères et au moins 1 chiffre, 1 minuscule, 1 majuscule et 1 caractère spécial.";
    // }

    // On vérifie si le pseudo existe dans la BDD
    $pdo = new PDO('mysql:host=mysql;dbname=my_first_db', 'user', 'pwd');
    $sql = "SELECT * FROM user WHERE pseudo=:pseudo";
    $request = $pdo->prepare($sql);
    $request->execute([
        'pseudo' => $pseudo
    ]);
    $user = $request->fetch(PDO::FETCH_ASSOC);

    if($user) {
        return 'Ce pseudo existe déjà.';
    }
}

