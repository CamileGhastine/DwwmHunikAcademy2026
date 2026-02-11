<?php
//Si le formaulaire a été soumi
if(!empty($_POST)) {
// On récupère les saisies utilisateurs ($_POST)
$title = $_POST['title'];
$description = $_POST['description'];
$urlGit = $_POST['url_git'];
$userId = 1;

// On vérifie si les chmaps comportenet des erreurs
$message = fieldsVerify($title, $description, $userId);

// Si pas d'erreur sur les chamsp on enregistre dans la BDD
if (!$message) {
    // 2) On les envoie dans la BDD
    $pdo = new PDO('mysql:dbname=my_portfolio;host=mysql;charset=UTF8', 'user', 'pwd');
    $sql = "INSERT INTO projects(title, description, url_git, user_id) VALUES (:title, :description, :urlGit, :userId)";
    $request = $pdo->prepare($sql);
    $request->execute([
        'title' => $title,
        'description' => $description,
        'urlGit' => $urlGit,
        'userId' => $userId
    ]);
}



// 3) Quand vous aura réussi le 1 et le 2. Il faudra vérifier les données saisies avant de les erngistrées.
//    si les données sont valides alors on enregistre en bdd, sinon on envoie un message pour expliquer l'erreur.


// 3) Une fois les données enregistrée dans la BDD on rediriges vers la liste des projets.

var_dump($message);


}


function fieldsVerify($title, $description, $userId) {
    // Vérifier que les chmaps ne sont pas vides
    if(empty($title) || empty($description) || empty($userId)) {
        return 'Tous le champs doivent être renseignés.';
    }

    //  Vérifier que le titre à moins de 100 caractères

    // Vérifier que la description à moins de 1000 caractère

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add-style.css">
    <title>Portfolio - Projets</title>

</head>

<body>
    <header>
        <img src="../image/photo-profil.jpg" alt="photo de profil" class="photo-profil">
        <div class="name">Camile Ghastine</div>
        <nav>
            <ul class="nav-links">
                <li><a href="/index.php">Accueil</a></li>
                <li><a href="projects.php">Projets</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    
    <section class="form-section">
        <h2>Ajouter un projet</h2>

       <form action="" method="post">
            <label for="title">Titre du projet</label>
            <input type="text" name="title" maxlength="100">
            <label for="description">Description du projet</label>
            <textarea name="description" rows="10" maxlength="1000"></textarea>
            <label for="url_git">URL github</label>
            <input type="url" name="url_git">
            <label for="user_id">Auteur du projet</label>
            <input type="text" name="user_id">
            <input type="submit" value="Ajouter" class="button">
       </form>
    </section>

</body>

</html>