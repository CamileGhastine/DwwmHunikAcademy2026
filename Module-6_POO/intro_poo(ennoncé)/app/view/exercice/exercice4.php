<h1>Exercice 4 : Utiliser l'héritage</h1>
<p>Travail à réaliser : </p>
<ol>
    <li>  Créez une classe <strong>Manga</strong> dans le fichier <strong>Manga.php</strong> du repertoire <strong>Model/Entity</strong>, héritant de la clase Book créée à l'exercice 1.</li>
    <li>Ajouter à cette classe l'attribut <strong>$illustrator</strong> (dessinateur), sans oublier son setter et son getter.</li>
    <li>Dans le fichier objectBook.php, ajouter du code à la suitede l'existant permettant de créer un objet <strong>$manga</strong>.</li>
</ol>
<h3> Caractéristiques de l'objet :</h3>
<ul>
    <li>titre : Hunter X Hunter</li>
    <li>auteur : Yoshihiro Togashi</li>
    <li>illustrateur : Yoshihiro Togashi</li>
    <li>genre : Shōnen</li>
    <li>desription : Gon Freecss a douze ans, et rêve de devenir hunter. Les hunters sont des aventuriers d'élite qui peuvent être chasseurs de prime, chefs-cuisinier, archéologues, zoologues, justiciers ou consultants dans divers domaines.</li>
</ul>

<?php if (!isset($errors)) : ?>
    <p>Une fois le code écrit, cliquez sur test : <a href="?page=test4" role="button" class="btn btn-success">test</a></p>
<?php endif ?>

<?php if (isset($errors) && $errors === []) : ?>
    <div class="alert alert-dismissible alert-success">
        <strong>Bravo !</strong> L'exercice est réussi avec brio, vous pouvez passer à <a href="?page=ex5" class="alert-link btn btn-success">l'exercice 5</a>
    </div>
<?php elseif (isset($errors) && $errors !== []) : ?>
    <div class="alert alert-dismissible alert-danger">
        <p><strong>Dommage !</strong> </p>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?> </li>
            <?php endforeach ?>
        </ul>
        <p> Essaye encore une fois <a href="?page=ex4" class="alert-link btn btn-danger">l'exercice 4</a></p>
    </div>
<?php endif ?>