<?php

// Affiche toutes les tâches
function index()
{
    require('src/model/task.php');
    $tasks = getAll();

    require('src/view/index.phtml');
}

//Change le status de la tâche
function changeStatus()
{
    // Récupérer l'id et is_done
    $id = $_GET['id'];   
    $isDone = (int)$_GET['is_done'];

    // Inverser la valeur de is_done
    $isDoneUpdated = (int)!$isDone;

    // Updater la tâche
    require('src/model/task.php');
    updateStatus($id, $isDoneUpdated);

    header('Location: index.php');
    exit;    
}

//Affiche une seule tâche
function show()
{
    $id = $_GET['id'];

    require('src/model/task.php');
    $task = getOneById($id);

    $date = new DateTime($task['deadline']);
    $date = $date->format('d/m/Y');

    require('src/view/show.phtml');
}

// Supprimmer une tâche
function delete()
{
    $id = $_GET['id'];

    // Appeler le modèle
    require('src/model/task.php');
    deleteTask($id);

    header('Location: index.php');
    exit;   
}