# 📋 Application de gestion de bibliothèque

## A faire
1) Créer l'entité (la classe) Book en vous basant sur les champs de la table book de la BDD. [X]
2) Créer la classe BookController [X]
3) Créer la function index (en laissant vide dans un premier temps)
avec la méthode index() [X]
4) Créer la function show (en laissant vide dans un premier temps) [X]
5) On va afficher tous les livres en respectant l'architecture MVC
    a. Instancie le BookRepository [X]
    b. On appele la methode findAll de cet objet [X]
    c. On créer le BookRepository et sa méthode findAll [X]
    d. On code la méthode findall qui récupère tous les livres [X]
6) On appelle la vue index.phtml qui affiche tous les titres des livres.[X]
7) Créer une fonction de rechecrhe qui affiche tous les auteurs. []
8) Quand on clique sur un auteur, une nouvelle page s'ouvre qui affiche tous les livres de cet auteur.
9) Quand on clique sur un livre on a la possibilité de noté le nom de son emprunteur et l'id du livre emprunté. la date de retour est calculé automatique à J+7. Le tout est enregistré dans la table borrow.
10) Quand on clique sur Emrpunt dans le menu, on arrive sur une page qui affiche tous les livres emprunté avec la date de retour et un bouton "retour du livre" sur chaque ligne.
11) Dans show, le fomrulaire est remplacé par un bouton "retour du livre". Lorsqu'on clique sur le  bouton "retour du livre" la ligne correspondante dans borrow est supprimmée.
12) lorsqu'un livre est emprunté ce signe 🚫 doit apparaitre en face du livre dans index.phtml 


## Objectif

Travailler le CRUD et le modèle MVC en POO
