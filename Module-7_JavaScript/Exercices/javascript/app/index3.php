<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <script src="js/script3.js" defer></script>
</head>
<body>
    <form method="post">

        <label for="firstname">Nom :</label><br>
        <input type="text" id="firstname" name="firstname"><br><br>

        <label for="age">Âge :</label><br>
        <input type="number" id="age" name="age"><br><br>

        <label for="level">Niveau :</label><br>
        <select id="level" name="level">
            <option value="beginner">Débutant</option>
            <option value="intermediate">Intermédiaire</option>
            <option value="advanced">Avancé</option>
        </select><br><br>

        <label>Pourquoi veux-tu apprendre le JavaScript ?</label><br>

        <input type="checkbox" id="job" name="motivation" value="job">
        <label for="job">Trouver un nouveau travail</label><br>

        <input type="checkbox" id="rich" name="motivation" value="rich">
        <label for="rich">Être riche</label><br>

        <input type="checkbox" id="fun" name="motivation" value="fun">
        <label for="fun">Pour le plaisir</label><br><br>

        <label for="zip">Code postal :</label><br>
        <input type="number" id="zip" name="zip"><br><br>
        <strong></strong>
        <button>Envoyer</button>
    </form>

</body>
</html>

