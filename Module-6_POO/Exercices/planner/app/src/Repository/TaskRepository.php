<?php

require('src/Entity/Task.php');

class TaskRepository
{
    // Récupére dans la BDD toutes les tâches.
    function getAll()
    {
        $pdo = new \PDO('mysql:dbname=planner;host=mysql', 'user', 'pwd');
        $sql = "SELECT * FROM tasks ORDER BY deadline ASC";
        $request = $pdo->prepare($sql);
        $request->execute();
        $tasks = $request->fetchAll(\PDO::FETCH_CLASS, 'Task');

        return $tasks;
    }

    // Récupère la tache selon son id
    function getOneById($id)
    {
        $pdo = new \PDO('mysql:dbname=planner;host=mysql', 'user', 'pwd');
        $sql = "SELECT * FROM tasks WHERE id=:id";
        $request = $pdo->prepare($sql);
        $request->execute([
            'id' => $id
        ]);
        $request->setFetchMode(\PDO::FETCH_CLASS, 'Task');
        $task = $request->fetch();

        return $task;
    }

    // Change le status (fait/à faire) de la tâche selon son id
    function updateStatus($id, $isDone)
    {
        $pdo = new \PDO('mysql:dbname=planner;host=mysql', 'user', 'pwd');
        $sql = "UPDATE tasks SET is_done=:isDone WHERE id=:id";
        $request = $pdo->prepare($sql);
        $request->execute([
            'id' => $id,
            'isDone' => $isDone
        ]);
    }

    function deleteTask($id)
    {
        $pdo = new \PDO('mysql:dbname=planner;host=mysql', 'user', 'pwd');
        $sql = "DELETE FROM tasks WHERE id=:id";
        $request = $pdo->prepare($sql);
        $request->execute([
            'id' => $id
        ]);
    }
}
