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
    // coder ici
}

// Supprimme un produit
function delete($id)
{
    // coder ici
}

// Récupère un produit 
function getProduct($id) 
{
    // coder ici
}

// Update un produit
function update ($id, $name)
{
    // coder ici
}