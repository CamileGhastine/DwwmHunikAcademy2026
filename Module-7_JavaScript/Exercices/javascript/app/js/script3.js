let form = document.querySelector('form');
let firstname = document.getElementById('firstname');
let zip = document.querySelector('#zip');
let level = document.getElementById('level')
let motivations = document.getElementsByName('motivation');
let job = document.getElementById('job')
let motivationsUser = [];


form.addEventListener('submit', (event) => {
    event.preventDefault();
    let message = "";
    let error = document.getElementById('error');

    if (error) error.remove();
    let name = firstname.value
    let age = form.age.value

    console.log(zip.value)
    console.log(level.value)
    if(job.checked) {
        console.log(job.value)
    }
    motivations.forEach((motivation) => {
        if (motivation.checked) {
            motivationsUser.push(motivation.value);
        }
    })
    console.log(motivationsUser)

    

    if (age === "") {
        message = "L'age doit être rempli";
    } else if (!Number(age)) {
        message = "L'age doit être un nombre";
    } else if (Number(age) < 0 || Number(age) > 150) {
        message = "L'age doit être compris entre 0 et 150";
    }

    if (name === "") {
        message = "Le nom doit être rempli";
    } else if (name.length > 10) {
        message = "Le nom ne peut pas dépasser 10 caractères";
    }


    if (message != "") {
        let errorMessage = document.createElement('p');
        errorMessage.textContent = message;
        errorMessage.setAttribute('id', 'error')
        document.querySelector('button').after(errorMessage)
    }

})

