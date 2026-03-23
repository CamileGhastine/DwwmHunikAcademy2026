const maxAttempts = 5;
let check = document.getElementById('check');
let restartButton = document.getElementById('restart');
let attempts = 0;
let span = document.getElementById('attempts');
let result = document.getElementById('result');
let input = document.querySelector('input');
let answer = document.getElementById('answer');
let begin = document.getElementById("begin");
let game = document.getElementById("game");
let difficulty = document.querySelector('select');
let displayLevel = document. getElementById('level');
let history = document.getElementById("hystory");
let listAnswer = "Historique des réponses : ";

secretNumber = generateSecretNumber(difficulty.value);
game.hidden = true;

document.addEventListener('keydown', (event) => {
    if (event.key == "Enter") {
        game.hidden = false;
        begin.hidden = true;
    }
})

check.addEventListener('click',(event) => {
    answerValue = answer.value
    attempts++;
    span.textContent = attempts;
    displayHistory(answerValue);
    checkNumber(answerValue);
    checkLoose(attempts);
})

restartButton.addEventListener('click', () => {
    check.disabled = false;
    input.disabled = false;
    restart();
})

difficulty.addEventListener('change', () => {
    displayLevel.textContent = difficulty.value;
    generateSecretNumber(difficulty.value)
})

function restart() {
    attempts = 0;
    span.textContent = 0;
    secretNumber = generateSecretNumber(difficulty.value);
    result.textContent = "";
    answer.value = "";
    listAnswer = "Historique des réponses : ";
    hystory.hidden = true;
    result.setAttribute('class', 'error');
}

function generateSecretNumber(level) {
    secretNumber = Math.floor(Math.random()*level +1);
    console.log(secretNumber);
    return secretNumber;
}

function displayHistory(answer) {
    hystory.hidden = false;
    listAnswer += answer + ", ";
    hystory.textContent = listAnswer.slice(0, -2);
}

function checkNumber(answer) {
    if (answer == secretNumber) {
        result.textContent = "Bravo ! C’est gagné en " + attempts + " tentatives !";
        result.setAttribute('class', 'success');
        check.disabled = true;
        input.disabled = true;
        return;
    } else if (answer > secretNumber) {
        result.textContent = "Le nombre secret est plus petit.";
    } else {
        result.textContent = "Le nombre secret est plus grand.";
    }
}

function checkLoose(attempts) {
    if (attempts == maxAttempts) {
        setTimeout(() => {
            alert('Vous avez perdu ! Recommencez !');
        }, '10');
        restart();
    }
}