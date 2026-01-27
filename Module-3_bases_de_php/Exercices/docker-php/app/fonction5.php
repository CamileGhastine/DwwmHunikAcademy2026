<?php

$notes = [8, 6, 11, 2, 19, 20, 16.5, 18.5];

// 1

// var_dump(increaseNotes($notes));

/*
function increaseNotes(array $notes) : array
{
    $newNotes = [];

    foreach ($notes as $note) {
        $newNotes[] = $note + 2;
    }

    return $newNotes;
}
*/

// 2 : on a un problème pour les notes de 19/20 et 20/20

// 3 
/*
// var_dump(increaseNotes($notes));


function increaseNotes(array $notes) : array
{
    $newNotes = [];

    foreach ($notes as $note) {
        if ($note > 18) {
            $newNotes[] = 20;
        } else {
            $newNotes[] = $note + 2;
        }
    }

    return $newNotes;
}
*/

// 4

var_dump(increaseNotes($notes, 4));

function increaseNotes(array $notes, int $point) : array
{
    $newNotes = [];

    foreach ($notes as $note) {
        if ($note > 20 - $point) {
            $newNotes[] = 20;
        } else {
            $newNotes[] = $note + $point;
        }
    }

    return $newNotes;
}