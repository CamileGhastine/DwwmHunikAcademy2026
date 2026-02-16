<?php

// dans index.php rediriger le formulaire ici (src/add.php)
if (!empty($_POST)) {
   // Si le formulaire est soumis, récupérer la saisie de l'utilisateur
    $name = $_POST['item'];

    // Enregistrer la saisie dans la BDD
    $pdo = new PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');
    $sql = "INSERT INTO product(name) VALUES (:name)";
    $request = $pdo->prepare($sql);
    $request->execute(['name' => $name]);
    var_dump(0);
    // Rediriger vers la index.php
}


