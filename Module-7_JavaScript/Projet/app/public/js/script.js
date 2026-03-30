const combos = [[1, 2, 3], [4, 5, 6], [7, 8, 9], [1, 4, 7], [2, 5, 8], [3, 6, 9], [1, 5, 9], [3, 5, 7]];

let cells = document.querySelectorAll('td');
let msg = document.getElementById('msg');
let xPlays = [];
let oPlays = [];
let xTurn = true
let isWinner = false;
let numberOfPlay = 0;

cells.forEach((cell) => {
    cell.addEventListener('click', () => {
        if (isWinner || cell.className === 'marked') return;

        cell.textContent = xTurn ? 'X' : 'O';
        cell.classList.add('marked');
        (xTurn ? xPlays : oPlays).push(Number(cell.id));
        numberOfPlay ++;

        if (numberOfPlay >= 5) {
            isWinner = hasWinner();
        }
        
        if(isWinner) {
            msg.textContent = (xTurn ? 'X' : 'O') + ' a gagné !!!';
            msg.classList.add('green');     
            isWinner.forEach(id => cells[id - 1].style.backgroundColor = 'green')     
            xTurn = !xTurn;
            return;
        }

        xTurn = !xTurn;
        
        if (numberOfPlay === 9) {
            msg.textContent = 'Partie nulle !!!';
            msg.style.color = 'red'
            return;
        }

        
        msg.textContent = 'Tour de ' + (xTurn ? 'X' : 'O');
    })
})

function hasWinner() {
    let plays = xTurn ? xPlays : oPlays;

    for (let i = 0; i < 8; i++) {
        let aligns = 0;
        for (let j = 0; j < 3 ; j++) {
            if (!plays.includes(combos[i][j])) {
                break;
            }
            aligns++;
            if (aligns === 3) {
                return combos[i];
            }
        }
    }
    return false;
}

function replay() {
    cells.forEach(cell => {
        cell.textContent = '';
        cell.style.backgroundColor = '';
        cell.classList.remove('marked');
    })
    numberOfPlay = 0;
    xPlays = [];
    oPlays = [];
    isWinner = false;
    msg.classList.remove('green');
    msg.style.color = '';
    msg.textContent = 'Tour de ' + (xTurn ? 'X' : 'O');
}