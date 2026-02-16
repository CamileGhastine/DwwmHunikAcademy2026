<?php
// dans index.php mettre un lien sur ✏️ qui redirige ici (src/update.php) en envoyant l'id du produit à updater
// Récupérer l'id du produit à updater
$id = $_GET['id'];

// Récupérer ce produit dans la BDD
$pdo = new PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');
$sql = "SELECT * FROM product WHERE id=$id";
$request = $pdo->prepare($sql);
$request->execute();
$product = $request->fetch(PDO::FETCH_ASSOC);
var_dump($product);

// Injecter la nom du produit dans le formulaire

// Si le formulaire est soumis, récupérer la saisie de l'utilisateur
// updater la saisie dans la BDD
// Rediriger vers la index.php
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
</head>
<body>
    <h1>Modifier le produit</h1>
    <form action="update.php?id=????" method="post">            <!-- Il faut ici renseigner dynamiquement id -->
        <label for="product">Produit : </label>
        <input type="text" name="item" value="<?php echo $product['name'] ?>">
        <input type="submit" value="Modifier">
    </form>
    <a href="../index.php">Retour à l'accueil</a>
</body>
</html>