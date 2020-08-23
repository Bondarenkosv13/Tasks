<?php

namespace App\Models;

use Core\Model;
use PDO;

class Task
{
    private $table = 'tasks';

    public function addTask($fields)
    {
        $sql = "INSERT INTO `{$this->table}`(`name`, `email`, `task`) 
                VALUES (:name, :email, :task)";
        $user = Model::getInstance()->prepare($sql);
        $user->execute($fields);
    }

    public function getCountTasks()
    {
        $tasks = Model::getInstance()->prepare("SELECT count(*) as count FROM `{$this->table}`");
        $tasks->execute();
        $dataTask = $tasks->fetch(PDO::FETCH_ASSOC);
        return $dataTask;
    }

    public function getPaginateTasksWithSort($start, $limit, $orderBy)
    {
        $tasks = Model::getInstance()->prepare("SELECT * FROM `{$this->table}` {$orderBy} LIMIT :start, :limit ");
        $tasks->bindValue(':start', $start, PDO::PARAM_INT);
        $tasks->bindValue(':limit', $limit, PDO::PARAM_INT);
        $tasks->execute();
        $dataTask = $tasks->fetchAll(PDO::FETCH_ASSOC);
        return $dataTask;
    }

    public function getTasksForId($id)
    {
        $tasks = Model::getInstance()->prepare("SELECT * FROM `{$this->table}` WHERE id=:id");
        $tasks->execute([':id' => $id]);
        $dataTask = $tasks->fetch(PDO::FETCH_ASSOC);
        return $dataTask;
    }

    public function updateTask($fields)
    {
        $sql = "UPDATE `{$this->table}` 
                SET `task`=:task,`status`=:status 
                WHERE id=:id";
        $user = Model::getInstance()->prepare($sql);
        $user->execute($fields);
    }
}