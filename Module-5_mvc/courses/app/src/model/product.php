<?php

// Récupére dans la BDD tous les produits.
function getProducts()
{
    $pdo = new \PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');
    $sql = "SELECT * FROM product";
    $request = $pdo->prepare($sql);
    $request->execute();
    $products = $request->fetchAll(\PDO::FETCH_ASSOC);

    return $products;
}

// Ajoute un produit
function add($name)
{
    $pdo = new \PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');
    $sql = "INSERT INTO product(name) VALUES (:name)";
    $request = $pdo->prepare($sql);
    $request->execute(['name' => $name]);
}

// Supprimme un produit
function delete($id)
{
    $pdo = new \PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');
    $sql = "DELETE FROM product WHERE id=:id";
    $request = $pdo->prepare($sql);
    $request->execute(['id' => $id]);
}

// Récupère un produit 
function getProduct($id) 
{
    $pdo = new \PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');
    $sql = "SELECT * FROM product WHERE id=:id";
    $request = $pdo->prepare($sql);
    $request->execute(['id' => $id]);
    $product = $request->fetch(\PDO::FETCH_ASSOC);

    return $product;
}

// Update un produit
function update ($id, $name)
{
    $pdo = new \PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');
    $sql = "UPDATE product SET name=:name WHERE id=:id";
    $request = $pdo->prepare($sql);
    $request->execute([
        'id' => $id,
        'name' => $name
    ]);
}

function getProductsQty()
{
    $pdo = new \PDO('mysql:dbname=courses;host=mysql', 'user', 'pwd');
    $sql = "SELECT count(*) FROM product";
    $request = $pdo->prepare($sql);
    $request->execute();
    $qty = $request->fetchcolumn();

    return $qty;
}
