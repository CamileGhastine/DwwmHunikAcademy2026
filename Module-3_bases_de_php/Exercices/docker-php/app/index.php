<?php

// CalculMoyenne

function displayCalculMoyenne($note1, $note2, $note3, $note4)
{
    $moyenne = ($note1+$note2+$note3+$note4)/4;

    echo $moyenne;
}

displayCalculMoyenne(10, 8, 12, 10);
