<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/script2.js" defer></script>
    <style>
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <h1>Devine le nombre secret</h1>
    <p id="begin">Presser la touche ENTER pour commencer</p>
    <div id="game">
        <select id="difficulty">
            <option value="10">Facile (1-10)</option>
            <option value="50">Moyen (1-50)</option>
            <option value="100">Difficile (1-100)</option>
        </select>
        <p>Choisis un nombre entre 1 et <span id="level">10</span></p>
        <input type="number" id="answer" min="1" max="100">
        <button id="check">Essayer</button>
        <p>Tentatives : <span id="attempts">0</span></p>

        <p id="result" class="error"></p>
        <p id="hystory"></p>
        <button id="restart">Rejouer</button>
    </div>
</body>
</html>

