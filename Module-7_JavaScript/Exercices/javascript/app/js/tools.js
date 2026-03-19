let currentYear = 2026

export function getAge(yearOfBirth) {
    return currentYear - yearOfBirth;
}

export function getGenre(isMale) {
    return isMale ? 'un homme' : 'une femme';
}

export function displaySkills(skills) {
    let listSkills ='';
    skills.forEach(function(skill) {
        listSkills += skill + ', '
    });
    return listSkills.slice(0, -2);
}