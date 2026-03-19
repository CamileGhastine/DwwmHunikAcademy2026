import {getAge, getGenre, displaySkills} from './tools.js';

let firstname = 'John';
let lastname = 'Doe';
let yearOfBirth = 2000;
let currentYear = 2026;
const country = 'Fance';

// let sentence1 = 'Bonjour, je suis ' + firstname + ' ' + lastname + ", j'ai " + (currentYear - yearOfBirth) + ' ans et je vis en ' + country + '.';
let sentence1 = 'Bonjour, je suis ' + firstname + ' ' + lastname + ", j'ai " + getAge(yearOfBirth) + ' ans et je vis en ' + country + '.';
console.log(sentence1);

// let sentence2 = `Bonjour, je suis ${firstname} ${lastname}, j\'ai ${currentYear - yearOfBirth} ans et je vis en ${country}.`;
let sentence2 = `Bonjour, je suis ${firstname} ${lastname}, j\'ai ${getAge(yearOfBirth)} ans et je vis en ${country}.`;
console.log(sentence2);

let person = {
    firstname: firstname,
    lastname: lastname,
    yearOfBirth: yearOfBirth
};

// let sentence3 = 'Bonjour, je suis ' + person.firstname + ' ' + person.lastname + ', j\'ai ' +  (currentYear - person.yearOfBirth) + ' ans.';
let sentence3 = 'Bonjour, je suis ' + person.firstname + ' ' + person.lastname + ', j\'ai ' +  getAge(person.yearOfBirth) + ' ans.';

console.log(sentence3);

console.log(person);
person.male = true;
console.log(person);

const skills = ["Photoshop", "HTML", "CSS"];
console.log(skills);
skills.push("JavaScript");
console.log(skills);
skills.shift();
console.log(skills);

person.skills = skills;
console.log(person);

// ecrire du code savoir s'il est majeur ou pas et l'injecter dans sentence4
let ageStatus = 'mineur';

// if ((currentYear - Number(person.yearOfBirth)) >= 18) {
if (getAge(person.yearOfBirth) >= 18) {
    ageStatus = "majeur";
}


let sentence4 = 'Bonjour, je suis ' + person.firstname + ' ' + person.lastname + ', je suis ' + ageStatus + ' et je suis ' + (person.male ? 'un homme' : 'une femme') + '.' ;
console.log(sentence4);

let listSkills ='';
person.skills.forEach(function(skill) {
    listSkills += skill + ', '
});
listSkills = listSkills.slice(0, -2);

let sentence5 = 'Bonjour, je suis ' + person.firstname + ' ' + person.lastname + ', je suis expert ' +  listSkills + '.' ;
console.log(sentence5);

let sentence6 = 'Bonjour, je suis' + person.firstname + ' ' + person.lastname +  ', ' + getGenre(person.male) + ' de ' + getAge(person.yearOfBirth) + ' ans et je suis expert' + displaySkills(person.skills) + '.';
console.log(sentence6);

let sentence7 = `Bonjour, je suis ${person.firstname} ${person.lastname}, ${getGenre(person.male)} de ${getAge(person.yearOfBirth)} ans et je suis expert ${displaySkills(person.skills)}.`;
console.log(sentence7);

let name = prompt('Quel est votre nom ?');
let year = prompt('Quelle est votre année de naissance ?');
const user = {
    name: name,
    yearOfBirth: year
}

let age = currentYear - user.yearOfBirth;

let confirmation = confirm(`Avez-vous bien ${age} ans ?`);

if(confirmation && age >= 18) {
    alert('Bienvenue sur le site des adultes coquins !');
} else {
    alert('Désolé, vous êtes trop jeune pour accéder à ce contenu.');
}


