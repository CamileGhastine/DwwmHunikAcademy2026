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
    try {
        event.preventDefault();

        // Suppression des erreurs précement affichées (s'il y en avait)
        let error = document.getElementById('error');
        if (error) error.remove();

        // Validation des champs
        handleZipCode();
        motivationsUser = handleMotivations();
        handleLevel()
        handleAge();
        handleFirstname();

        // A faire : Envoyer toutes ces données à la BDD 
    } catch (error) {
        let errorMessage = document.createElement('p');
        errorMessage.textContent = error.message;
        errorMessage.setAttribute('id', 'error')
        document.querySelector('button').after(errorMessage)
    }
})

function handleZipCode() {
    let regex = new RegExp("^[0-9]{5}$");
    if(!regex.test(inputZip.value)) {
        throw new Error("Le code postal n'est pas valide.");
    }
}

// Renvoie le tableau des motivation checkée ou le message d'erreur
function handleMotivations() {
    let motivations = [ ...authorisedMotivations];
    inputsMotivations.forEach((motivation) => {
        if (motivation.checked) {
            let index = authorisedMotivations.indexOf(motivation.value);
            if (index < 0) {
               throw new Error("Vos motivations pour apprendre le JavaScript ne sont pas autorisées.");
            } else {
                motivations.splice(index, 1)
                motivationsUser.push(motivation.value);
                return motivationsUser;
            }
        }
    })
}

function handleLevel() {
    if (authorisedLevels.indexOf(inputLevel.value) < 0) {
        throw new Error("Le niveau choisi n'est pas autorisé.");
    }
}

function handleAge() {
    let age = inputAge.value.trim()
    if (age === "") {
        throw new Error("L'age doit être rempli");
    } else if (!Number(age)) {
        throw new Error("L'age doit être un nombre");
    } else if (Number(age) <= 0 || Number(age) > 150) {
        throw new Error("L'age doit être compris entre 0 et 150");
    }
}

function handleFirstname() {
    let name = inputFirstname.value
    if (name === "") {
        throw new Error("Le nom doit être rempli");
    } else if (name.length > 10) {
        throw new Error("Le nom ne peut pas dépasser 10 caractères");
    }
}
