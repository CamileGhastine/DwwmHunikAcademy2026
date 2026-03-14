<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/../.env.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'like') {
    header('Content-Type: application/json');
$id = $_GET['id'];
    // Ici tu pourrais mettre à jour une base de données
    echo json_encode(['likes' => rand(1,100)]); // juste un exemple aléatoire
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
    if ($data['action'] === 'panier') {
        $id = $data['id'];
        // Ajouter au panier dans la session ou base
        echo json_encode(['total' => rand(1,5)]); // exemple
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Exemple AJAX</title>
<style>
  .produit { margin: 10px; padding: 10px; border: 1px solid #ccc; width: 200px; }
  button { margin-right: 5px; }
</style>
</head>
<body>

<div class="produit" data-id="1">
    <p>Produit A</p>
    <button class="panier">Ajouter au panier</button>
    <span class="likeA">❤️23</span>
</div>

<div class="produit" data-id="1">
    <p>Produit B</p>
    <button class="panier">Ajouter au panier</button>
    <span class="likeB">❤️15</span>
</div>

<div id="panier">
    <p>Panier</p>
    <div class="article"></div>
    
</div>

<script>
document.querySelectorAll('.produit').forEach(produit => {
  // Bouton Like
  produit.querySelector('.like').addEventListener('click', () => {
    const id = produit.dataset.id;
    fetch(`ajax.php?action=like&id=${id}`) // GET pour simplifier
      .then(res => res.json())
      .then(data => alert(`Likes produit ${id} : ${data.likes}`))
      .catch(err => console.error(err));
  });

  // Bouton Ajouter au panier
  produit.querySelector('.panier').addEventListener('click', () => {
    const id = produit.dataset.id;
    fetch('ajax.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ action: 'panier', id: id })
    })
      .then(res => res.json())
      .then(data => alert(`Produit ${id} ajouté au panier ! Total : ${data.total}`))
      .catch(err => console.error(err));
  });
});
</script>

</body>
</html>



