<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TP MySQL - 3 heures</title>
    <style>
        .reponse {
            border: 1px dashed #999;
            min-height: 40px;
            padding: 8px;
            margin: 6px 0 14px 0;
            background-color: #fafafa;
        }
        .reponse:focus {
            outline: none;
            border-color: #333;
            background-color: #fff;
        }
    </style>
</head>
<body>

<h1>TP MySQL</h1>

<h2>Liste d'élèves Promo DWWM Hunik Academy 2026 </h2>

<?php
$pdo = new \PDO(
    'mysql:host=mysql;dbname=my_first_db;charset=utf8mb4',
    'user',
    'pwd'
);

$requete = $pdo->query('SELECT lastname, firstname FROM student');
$students = $requete->fetchAll();

foreach ($students as $student) {
    echo $student['lastname'] . ' ' . $student['firstname'] . '<br>';
}
?>

<br>

<fieldset>
    <legend>Remarque</legend>
    La liste d'élèves ci-dessus a été généré dynamniquement en récupérant les valeurs depuis une base de données.<br>
    Regarder le code php qui a généré l'affichage de cette liste.
</fieldset>

<h2>Contexte</h2>

<p>Ce TP va vous apprendre à manipuler cette base depuis phpMyAdmin puis depuis PHP.</p>


<hr>

<h2>Partie 1 — Explorer le dossier docker</h2>

<p>Avant de commencer, regardez la structure de votre dossier projet et répondez aux questions suivantes directement dans le code HTML.</p>

<h3>Exercice 1 — Structure du projet</h3>

<p>Quels sont les dossiers présents à la racine du projet ?</p>
<div class="reponse" contenteditable="true">
    On a deux dossiers : app (contient l'application web de notre projet) et docker (infrastructure de notre projet). On a aussi un fichier docker-compose (qui sert à orchestrer la mise en place de l'infrastructure de notre projet)   
</div>

<p>Combien de dossiers y a-t-il dans le dossier <code>docker/</code> ?</p>
<div class="reponse" contenteditable="true">
    Il y en a trois : nginx, php et mysql.
</div>

<p>Quel fichier se trouve dans le dossier <code>docker/php/</code> ? À quoi sert-il ?</p>
<div class="reponse" contenteditable="true">
    Dockerfile : il sert à créé le conteneur PHP (téléchargement de l'image) et à le paramétré.
</div>

<p>Quel fichier se trouve dans le dossier <code>docker/nginx/</code> ? À quoi sert-il ?</p>
<div class="reponse" contenteditable="true">
    nginx.conf : pour configurer le serveur.
</div>

<p>Quel fichier se trouve dans le dossier <code>docker/mysql/</code> ? À quoi sert-il ?</p>
<div class="reponse" contenteditable="true">
    init.sql : il sert à entrée des données dans la BDD
</div>

<h3>Exercice 2 — Le docker-compose.yml</h3>

<p>Ouvrez le fichier <code>docker-compose.yml</code>. Combien de services y a-t-il définis ?</p>
<div class="reponse" contenteditable="true">
    Il ya 4 services (donc 4 containeurs) : nginx, php, mysql, phpmayadmin.
</div>

<p>Sur quel port votre site web est-il accessible ?</p>
<div class="reponse" contenteditable="true">
    sur le port 8080. Le site est donc accessible à l'URL http://localhost:8080/
</div>

<p>Sur quel port est accessible phpMyAdmin ?</p>
<div class="reponse" contenteditable="true">
    sur le port 8081. Le site est donc accessible à l'URL <a href="http://localhost:8081/">http://localhost:8081/</a> 
</div>

<p>Quel est le nom de la base de données définie dans le service MySQL ?</p>
<div class="reponse" contenteditable="true">
    MYSQL_DATABASE: my_first_db => la BDD s'appelle my_first_db
</div>

<p>Quel utilisateur sera utilisé pour se connecter à MySQL ?</p>
<div class="reponse" contenteditable="true">
    MYSQL_USER: user => l'utilisateur s'appelle user
</div>

<p>Pourquoi le service <code>php</code> dépend de <code>mysql</code> ?</p>
<div class="reponse" contenteditable="true">
    depends_on: - mysql => il faut lancer le containeur mysql avant le containeur php sinon on risque d'avori des erreur, car PHp peut avoir besoin de mysql pour fonctionner.
</div>

<p>Pourquoi le service <code>nginx</code> dépend de <code>php</code> ?</p>
<div class="reponse" contenteditable="true">
    depends_on: - php => il faut lancer le containeur php avant le containeur nginx sinon on risque d'avoir des erreurs, car nginx a besoin de php pour fonctionner.
</div>

<h3>Exercice 3 — Le Dockerfile PHP</h3>

<p>Pourquoi le Dockerfile php installe <code>pdo</code> et <code>pdo_mysql</code> ?</p>
<div class="reponse" contenteditable="true">
    Ce sont des extension php pour communiquer avec le serveur mysql.
</div>

<p>Le service MySQL a-t-il un Dockerfile ? Pourquoi ?</p>
<div class="reponse" contenteditable="true">
    Il n'a pas de Dockerfile, car l'image est installé tel quel sans extension ou modification. 
</div>

<h3>Exercice 4 — Le fichier init.sql</h3>

<p>Que faont les deux premières lignes de init.sql ?</p>
<fieldset>
    <legend>Aide</legend>
    Pour répondre à la question, supprimer ces deux lignes et faites les commandes ci-dessous :<br>
    Pour fermer les containeur et supprimer les volumes : <code>docker compose down --volumes</code> <br>
    Pour relancer les conatineur : <code>docker compose up -d</code>
</fieldset>
<div class="reponse" contenteditable="true">
    Elles servent à définir l'encodage des caractères.
</div>
<fieldset>
    <legend>Attention</legend>
    Remettre les deux lignes et refaites les commandes : <code>docker compose down --volumes</code> & <code>docker compose up -d</code>
</fieldset>

<p>Ouvrez le fichier <code>init.sql</code>. Expliquez les 4 actions réalisez par ce fichier dans la base</p>
<div class="reponse" contenteditable="true">
    Cela créé un teable student et insère dedans 3 entrées (3 élèves).
</div>

<p>Quand ce fichier <code>init.sql</code> est-il exécuté par MySQL ?</p>
<div class="reponse" contenteditable="true">
    Ce fichier est éxecuté une seul fois au premier démarrage du conteneur MySQL, quand le volume n'existe pas encore.

</div>

<hr>

<h2>Partie 2 — phpMyAdmin</h2>

<h3>Exercice 5 — Explorer la base</h3>

<p>Ouvrez la base <code>my_first_db</code> et donnez le nom de la table qu'elle contient.</p>
<div class="reponse" contenteditable="true">
    Elle contient la table <code>studente</code>.
</div>

<p>Cliquez sur la table. Combien de champs contient cette table ? Quels sont leurs noms ?</p>
<div class="reponse" contenteditable="true">
    Il ya 3 champs : id, firstname et lastname.
</div>

<p>Combien y-a-t-il d'entrées enregistrées dans cette tables ?</p>
<div class="reponse" contenteditable="true">
    Il ya 3 entrées. 
</div>

<p>Que représente chaque entrée de cette table ?</p>
<div class="reponse" contenteditable="true">
    Chaque entrée représente un élève.
</div>

<p>Cliquez sur l'onglet <strong>structure</strong>. Décrire et expliquer les propriétés de chaque champs.</p>
<div class="reponse" contenteditable="true">
    id est de type integer. Il ne peut pas être NULL. Il s'incrémente automatiquement.<br>
    firstname est de type varchar (maximum 100 caractères), c'est l'équivalent de string en PHP. Encodage en UTF-8. il peut être NULL. <br>
    lastname est de type varchar (maximum 100 caractères). Encodage en UTF-8. il peut pas être NULL. <br>

</div>

<h3>Exercice 6 — Ajouter des données</h3>

<p>Ajoutez deux élèves manquants (seulement deux) dans la table via l'onglet <strong>Insérer</strong> de phpMyAdmin. Vérifiez que les nouveaux élèves apparaissent bien dans la table.</p>
<p>Vérifiez qu'ils apapraissent également dans le navigateur.</p>

<h3>Exercice 7 — Modifier des données</h3>

<p>Remplacez le prénom de l'élève avec l'id 1 par son prénom entier. Ajoutez le prénom de l'élève avec l'id 3. Vérifiez les modifications dans la table.</p>
<p>Vérifiez également les modifications dans le navigateur.</p>

<h3>Exercice 8 — Supprimer des données</h3>

<p>Supprimez l'intrus de cette table. Vérifiez qu'il n'apparaît plus dans la table et dans le navigateur.</p>

<h3>Exercice 9 — Comportement de l'id</h3>

<p>Ajoutez le dernier élève manquant dans la table. Vérifiez qu'il apparait dans la table et dans le navigateur.</p>
<p>Regarder les id des élèves. Que constatez-vous lorsqu'on créé ou supprime une nouvelle entrée ?</p>
<div class="reponse" contenteditable="true">
    L'id de l'élève supprimé n'a pas été remplacé par le nouvel élève créé. L'élève créé a été autoincrementé à la suite de la dernière entrée. L'id supprimé ne sera jamais réutilisé.
</div>

<hr>

<h2>Partie 3 — Requêtes SQL</h2>

<p>Vous allez maintenant écrire des requêtes SQL directement dans phpMyAdmin via l'onglet <strong>SQL</strong>.</p>
<p>Sous la boite de requêtes, vous pouvez voir qu'on peut réalsier 4 types de requête : 
    <li>
        <ul><code>SELECT</code> : pour séléctionner des données</ul>
        <ul><code>INSERT</code> : pour créer des nouvelles entrées (Exercice 6)</ul>
        <ul><code>UPDATE</code> : pour modifier des entrées existantes (Exercice 7)</ul>
        <ul><code>DELETE</code> : pour supprimer une entrées (Exercice 8)</ul>
    </li>
</p>
<h3>Exercice 10 — SELECT</h3>

<p>Écrivez la requête pour récupérer tous les élèves de la table (aidez-vous en cliquant sur le bouton <code>SELECT *</code> ) :</p>
<div class="reponse" contenteditable="true">SELECT * FROM student;</div>

<p>Écrivez la requête pour récupérer uniquement les prénoms des élèves (aidez-vous en cliquant sur <code>SELECT</code> ) :</p>
<div class="reponse" contenteditable="true">SELECT firstname FROM student;</div>

<p>Écrivez la requête pour récupérer tous les élèves triés par nom dans l'ordre alphabétique (recherche Google) :</p>
<div class="reponse" contenteditable="true">SELECT * FROM student ORDER BY lastname ASC;</div>

<p>Même question par ordre alphabétique inversé :</p>
<div class="reponse" contenteditable="true">SELECT * FROM student ORDER BY lastname DESC;</div>

<p>Écrivez la requête pour récupérer tous les élèves dont le nom commence par la lettre "a" (recherche Google) :</p>
<div class="reponse" contenteditable="true">SELECT * FROM student WHERE lastname LIKE 'a%';</div>

<p>Même question pour récupérer tous les élèves dont le prénom contient lettre "h" (recherche Google) :</p>
<div class="reponse" contenteditable="true">SELECT * FROM student WHERE firstname LIKE '%h%';</div>

<h3>Exercice 11 — INSERT</h3>

<p>Écrivez la requête pour insérer un nouvel élève : prénom "Lucas", nom "Petit" (aidez-vous en cliquant sur <code>INSERT</code> ) :</p>
<div class="reponse" contenteditable="true">INSERT INTO eleves (firstname, lastname) VALUES ('Lucas', 'Petit');</div>

<h3>Exercice 12 — UPDATE</h3>

<p>Écrivez la requête pour changer le nom de l'élève "Lucas" en "Grand" (aidez-vous en cliquant sur <code>UPDATE</code> ) :</p>
<div class="reponse" contenteditable="true">UPDATE eleves SET lastname='Grand' WHERE firstname='Lucas' AND lastname='Petit';</div>

<h3>Exercice 13 — DELETE</h3>

<p>Écrivez la requête pour supprimer l'élève "Lucas Grand" (aidez-vous en cliquant sur <code>DELETE</code> ) :</p>
<div class="reponse" contenteditable="true">DELETE FROM eleves WHERE firstname='Lucas' AND lastname='Grand';
...</div>


</body>
</html>
    
