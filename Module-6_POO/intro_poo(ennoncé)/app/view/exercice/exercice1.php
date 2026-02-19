<h1>Exercice 1 : Créer une classe</h1>
<p>Créez la classe <strong>Book</strong> dans le fichier <strong>Book.php</strong> du répertoire <strong>Model/Entity</strong>.</p>

<h3>Attributs de la classe :</h3>
<ul>
    <li>title</li>
    <li>author</li>
    <li>genre</li>
    <li>description</li>
</ul>
<h3>Méthodes de la classe :</h3>
<ul>
    <li>setter & getter de title</li>
    <li>setter & getter de author</li>
    <li>setter & getter de genre</li>
    <li>setter & getter de description</li>
</ul>

<?php if (!isset($errors)) : ?>
    <p>Une fois votre classe écrite, cliquez sur test : <a href="?page=test1" role="button" class="btn btn-success">test</a></p>
<?php endif ?>

<?php if (isset($errors) && $errors === []) : ?>
    <div class="alert alert-dismissible alert-success">
        <strong>Bravo !</strong> L'exercice est réussi avec brio, vous pouvez passer à <a href="?page=ex2" class="alert-link btn btn-success">l'exercice 2</a>
    </div>
<?php elseif (isset($errors) && $errors !== []) : ?>
    <div class="alert alert-dismissible alert-danger">
        <p><strong>Dommage !</strong> </p>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?> </li>
            <?php endforeach ?>
        </ul>
        <p> Essaye encore une fois <a href="?page=ex1" class="alert-link btn btn-danger">l'exercice 1</a></p>
    </div>
<?php endif ?>