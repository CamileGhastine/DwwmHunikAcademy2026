<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>Prénom <input type="text" name="firstanme" placeholder="Saisir votre prénom ici"></p>
        <p>Nom <input type="text" name="lastname" required></p>
        <p>Date de naissance <input type="date" name="birthDate"></p>
        <p>Email <input type="email" name="email"></p>
        <p>Téléphone <input type="tel" name="phone" value="0000000000"></p>
        <p>Abonnez-vous à la newsletter <input type="checkbox" name="newsletter" checked></p>
        <p><textarea name="text" rows="10" cols="100" placeholder="saisir ici votre prénom"></textarea></p>
        <p><input type="submit" value="Envoyer"></p>
    </form>
</body>
</html>