<h1>Exercice 5 : Problème plus complexe</h1>
<?php if (!isset($_GET['skakespeare']) && !isset($_GET['area'])) : ?>

    <h5>Etape 1</h5>
    <p> Créez une classe <strong>Rectangle</strong> dans le fichier <strong>Rectangle.php</strong> du repertoire <strong>Model/Entity</strong>,  possédant les attribuuts ci-dessous :</p>
    <ul>
        <li><strong>$length</strong></li>
        <li><strong>$width</strong></li>
    </ul>
    <p>Ajouter les getters et les setters correspondants à ces attributs.</p>
    <hr>

    <h5>Etape 2</h5>
    <p>Ajouter à la classe Rectangle les méthodes ci-dessous :</p>
    <ul>
        <li><strong>is_square()</strong> : cette méthode renvoie <strong>true</strong> si le rectangle est un carré, sinon renvoie <strong>false</strong>.</li>
        <li><strong>area() :</strong> cette méthode renvoie un nombre repésentant l'aire du rectangle (rappel : Aire = longeur x largeur)</li>
    </ul>
    <hr>
    <h5>Etape 3</h5>
    <p>Mettre en place un constructeur qui permet d'initialiser automatiquement à son instanciation les attributs de la classe Rectangle .</p>
    <hr>

    <h5>Etape 4</h5>
    <p>Compléter le fichier <strong>objectRectangle.php</strong> du repertoire <strong>MyCode</strong> pour afficher l'air du rectangle et vérifier si c'est un carré. </p>
    <hr>
    <h5>Vérification</h5>
    <p>Une fois les 4 étapes réalisée remplir le formulaire ci-dessous pour tester votre code :</p>

    <div class="row align-items-center ">
        <div class="col-6">
            <form method="POST" action="index.php?page=test5#submit">
                <fieldset>
                    <h6>Saisissez les dimensions du rectangle</h6>

                    <div class="form-group">
                        <label for="length" class="form-label">Longueur en cm :
                            <input type="text" name="length" value="<?= isset($_POST['length']) ? $_POST['length'] : '' ?>" class="form-control" id="length" aria-describedby="length" placeholder="Entrez la longueur">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="width" class="form-label">Largeur en cm :
                            <input type="text" name="width" value="<?= isset($_POST['width']) ? $_POST['width'] : '' ?>" class="form-control" id="width" aria-describedby="width" placeholder="Entrez la largeur">
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary mb-5" id="submit">Tester</button>
                </fieldset>
            </form>
        </div>
        <div class="col-6 justify-content-center">
            <p>Le rectangle <strong>### $shakespeare ###</strong> un carré.</p>
            <p>L'air du rectangle est de <strong>### $area ###</strong> cm².</p>
        </div>
    </div>
<?php else : ?>
    <div class="alert alert-dismissible alert-success">
        <strong>Bravo !</strong>
        <p>Le rectangle <strong><?= $_GET['shakespeare'] ?></strong> un carré.</p>
        <p>L'air du rectangle est de <strong><?= $_GET['area'] ?></strong> cm².</p>
        <p>Vous avez reussi le dernier exercice avec brio, cliquez-ici pour voir votre récompense : <a href="?page=end" class="alert-link btn btn-success" role="button">Je suis trop préssé de voir ma récopense</a></p>
    </div>
<?php endif ?>


<?php if (isset($errors) && $errors !== []) : ?>
    <div class="alert alert-dismissible alert-danger">
        <p><strong>Dommage !</strong> </p>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?> </li>
            <?php endforeach ?>
        </ul>
        <p> Essaye encore une fois <a href="?page=ex5" class="alert-link btn btn-danger">l'exercice 5</a></p>
    </div>
<?php endif ?>