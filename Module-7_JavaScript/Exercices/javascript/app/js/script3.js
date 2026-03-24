const authorisedLevels = ['beginner', 'intermediate', 'advanced'];
const authorisedMotivations = ['job', 'rich', 'fun']

let motivationsUser = [];

let form = document.querySelector('form');
let inputFirstname = document.getElementById('firstname');
let inputZip = document.querySelector('#zip');
let inputLevel = document.getElementById('level')
let inputsMotivations = document.getElementsByName('motivation');
let inputAge = document.getElementById('age');

// Gère la valdiation du nom à la volée
inputFirstname.addEventListener('input', (event) => {
    if (document.getElementById('firstnameMessage')) {
        document.getElementById('firstnameMessage').remove();
    }
    if (event.target.value.length > 10) {
        let firstnameMessage = document.createElement('p');
        firstnameMessage.setAttribute('id', 'firstnameMessage')
        firstnameMessage.textContent = "Le nom ne peut pas dépasser 10 caractères";
        inputFirstname.after(firstnameMessage);
    }
})

// Gère la validation e l'age au changement d'input
inputAge.addEventListener('change', (event) => {
    if (document.getElementById('ageMessage')) {
        document.getElementById('ageMessage').remove();
    }    if (event.target.value < 0 || event.target.value > 150) {
        let ageMessage = document.createElement('p');
        ageMessage.setAttribute('id', 'ageMessage')
        ageMessage.textContent = "L'age doit être compris entre 0 et 150";
        inputAge.after(ageMessage);
    }
})

// Gère tous les champs à la soumission
form.addEventListener('submit', (event) => {
    event.preventDefault();

    let message = "";
    let error = document.getElementById('error');
    let motivations = [ ...authorisedMotivations];

    if (error) error.remove();
    let name = inputFirstname.value;
    let age = inputAge.value;
    let level = inputLevel.value;

    message = handleZipCode();

    //GERE LES MOTIVATIONS
    inputsMotivations.forEach((motivation) => {
        if (motivation.checked) {
            let index = authorisedMotivations.indexOf(motivation.value);
            if (index < 0) {
                message = "Vos motivations pour apprendre le JavaScript ne sont pas autorisées."
            } else {
                motivations.splice(index, 1)
                motivationsUser.push(motivation.value);
            }
        }
    })

    if (authorisedLevels.indexOf(level) < 0) {
        message = "Le niveau choisi n'est pas autorisé."
    }

    // GERE AGE
    if (age === "") {
        message = "L'age doit être rempli";
    } else if (!Number(age)) {
        message = "L'age doit être un nombre";
    } else if (Number(age) < 0 || Number(age) > 150) {
        message = "L'age doit être compris entre 0 et 150";
    }

    // GERE LE NOM
    if (name === "") {
        message = "Le nom doit être rempli";
    } else if (name.length > 10) {
        message = "Le nom ne peut pas dépasser 10 caractères";
    }

    // GERE LES ERREURS
    if (message != "") {
        let errorMessage = document.createElement('p');
        errorMessage.textContent = message;
        errorMessage.setAttribute('id', 'error')
        document.querySelector('button').after(errorMessage)
    }
})

function handleZipCode() {
    let regex = new RegExp("^[0-9]{5}$");
    if(!regex.test(inputZip.value)) {
        return "Le code postal n'est pas valide."
    }
}