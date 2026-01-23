<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <ul>
        <li><a href="?page=accueil">accueil</a></li>
        <li><a href="?page=projets">projets</a></li>
        <li><a href="?page=contacts">contacts</a></li>
    </ul>

    <?php
    if (empty($_GET)) {
        $_GET['page'] = 'accueil';
    }

    if($_GET['page'] === 'accueil') {
        echo 'Bienvenu sur la page d\'accueil';
    } elseif ($_GET['page'] === 'projets') {
        echo 'page projets';
    } elseif ($_GET['page'] === 'contacts') {
        echo 'page contact';
    } else {
        echo 'erreur 404';
    }

    ?>



    
</body>
</html>