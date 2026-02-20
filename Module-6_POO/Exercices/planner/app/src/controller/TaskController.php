<?php

class TaskController 
{
    // Affiche toutes les tâches
    function index()
    {
        require('src/Repository/TaskRepository.php');
        $taskRepository = new TaskRepository;
        $tasks = $taskRepository->getAll();

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
        require('src/Repository/TaskRepository.php');
        $taskRepository = new TaskRepository;

        $taskRepository->updateStatus($id, $isDoneUpdated);

        header('Location: index.php');
        exit;    
    }

    //Affiche une seule tâche
    function show()
    {
        $id = $_GET['id'];

        require('src/Repository/TaskRepository.php');
        $taskRepository = new TaskRepository;
        $task = $taskRepository->getOneById($id);

        require('src/view/show.phtml');
    }

    // Supprimmer une tâche
    function delete()
    {
        $id = $_GET['id'];

        // Appeler le modèle
        require('src/Repository/TaskRepository.php');
        $taskRepository = new TaskRepository;
        $taskRepository->deleteTask($id);

        header('Location: index.php');
        exit;   
    }
}
