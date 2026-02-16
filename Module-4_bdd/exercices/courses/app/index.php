<?php
// Créer l'objet $pdo en récupérant les infos de connexion à la BDD dans le docker_compose
$pdo = new PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');

// Récupérer dans la BDD tous les produits. Vérifier avec un var_dump($products)
$sql = "SELECT * FROM product";
$request = $pdo->prepare($sql);
$request->execute();
$products = $request->fetchAll(PDO::FETCH_ASSOC);

// Afficher tous les produits dans le HTML ci-dessous avec un foreach
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de courses</title>
</head>
<body>
    <h1>Liste de courses :</h1>
    <form action="src/add.php" method="post">
        <label for="product">Produit : </label>
        <input type="text" name="item">
        <input type="submit" value="Ajouter">
    </form>
    <ul>
        <?php foreach ($products as $product) { ?>
        <li>
            <?php echo htmlspecialchars($product['name']) ?>
            <a href="src/delete.php?id=<?php echo $product['id'] ?>">❌</a>      
            <a href="">✏️</a>
        </li>
        <?php } ?>
    </ul>

    <script>
        
    </script>
</body>
</html>