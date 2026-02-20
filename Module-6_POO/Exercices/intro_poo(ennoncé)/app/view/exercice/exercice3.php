<h1>Exercice 3 : Ecrire un constructeur</h1>
<p>Dans la classe <strong>Book</strong> créée à l'exercice 1, ajoutez un constructeur qui permet d'initialiser un nouvel attribut <strong>$dateInstanciation</strong> (sans oublier d'écrire le setter et le getter correspondant).</p>
<p><strong>$dateInstanciation</strong> devra avoir pour valeur l'heure et la date au moment de l'instanciation de l'objet <strong>$book</strong>.</p>
<h3> Aide :</h3>
<p>Pour créer la date et l'heure du moment, utilisez la fonction <strong>date()</strong> comme ci-dessous :</p>
<div class="card bg-light mb-3" style="max-width: 20rem;">
  <div class="card-body">
    <h4 class="card-title">date('d/m/Y à h:i:s')</h4>
  </div>
</div>

<?php if (!isset($errors)) : ?>
    <p>Une fois le code écrit, cliquez sur test : <a href="?page=test3" role="button" class="btn btn-success">test</a></p>
<?php endif ?>

<?php if (isset($errors) && $errors === []) : ?>
    <div class="alert alert-dismissible alert-success">
        <strong>Bravo !</strong> L'exercice est réussi avec brio, vous pouvez passer à <a href="?page=ex4" class="alert-link btn btn-success">l'exercice 4</a>
    </div>
<?php elseif (isset($errors) && $errors !== []) : ?>
    <div class="alert alert-dismissible alert-danger">
        <p><strong>Dommage !</strong> </p>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?> </li>
            <?php endforeach ?>
        </ul>
        <p> Essaye encore une fois <a href="?page=ex3" class="alert-link btn btn-danger">l'exercice 3</a></p>
    </div>
<?php endif ?>