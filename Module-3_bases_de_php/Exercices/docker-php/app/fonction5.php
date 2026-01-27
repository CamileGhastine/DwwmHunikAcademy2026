<?php

$notes = [8, 6, 11, 2];

var_dump(increaseNotes($notes));


function increaseNotes(array $notes) : array
{
    $newNotes = [];
    foreach ($notes as $value) {
        $newNotes[] = $value + 2;
    }

    return $newNotes;
}