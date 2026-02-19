<h1>Exercice 2 : Hydrater un objet</h1>
<p>Dans le fichier <strong>objectBook.php</strong> du repertoire <strong>MyCode</strong>, écrire du code permettant de créer un objet <strong>$book</strong>.</p>
<h3> Caractéristiques de l'objet :</h3>
<ul>
    <li>titre : Chroniques du monde émergé</li>
    <li>auteur : Licia Troisi</li>
    <li>genre : Heroic fantasy</li>
    <li>description : Chroniques du monde émergé (titre original : Cronache del Mondo Emerso) est une trilogie de romans de fantasy de Licia Troisi. La trilogie comprend Nihal de la Terre du Vent, La Mission de Sennar et Le Talisman du pouvoir. Elle raconte l'histoire de Nihal, demi-elfe orpheline dont le peuple a été exterminé par un mage noir, le Tyran.</li>
</ul>

<?php if (!isset($errors)) : ?>
    <p>Une fois le code écrit, cliquez sur test : <a href="?page=test2" role="button" class="btn btn-success">test</a></p>
<?php endif ?>

<?php if (isset($errors) && $errors === []) : ?>
    <div class="alert alert-dismissible alert-success">
        <strong>Bravo !</strong> L'exercice est réussi avec brio, vous pouvez passer à <a href="?page=ex3" class="alert-link btn btn-success">l'exercice 3</a>
    </div>
<?php elseif (isset($errors) && $errors !== []) : ?>
    <div class="alert alert-dismissible alert-danger">
        <p><strong>Dommage !</strong> </p>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?> </li>
            <?php endforeach ?>
        </ul>
        <p> Essaye encore une fois <a href="?page=ex2" class="alert-link btn btn-danger">l'exercice 2</a></p>
    </div>
<?php endif ?>