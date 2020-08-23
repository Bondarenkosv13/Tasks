<?php

namespace App\Controllers;

use App\Models\Task;
use App\Validation\CreateTaskValidator;
use Core\Controller;
use Core\View;

include_once dirname(__DIR__, 2) . "/config/functions.php";

class TaskController extends Controller
{
    private $task;

    public function __construct()
    {
        $this->task = new Task();
    }

    public function create()
    {
        View::render('home/task/create.php', 'Create task');
        die();
    }

    public function store()
    {
        checkToken();
        $taskValidator = new CreateTaskValidator();
        $this->data = $taskValidator->trim($_POST);
        unset($this->data['token']);

        if (!$taskValidator->storeValidation($this->data)) {
            $error = $taskValidator->getErrors();

            View::render('home/task/create.php', 'Create task', [
                'data' => $this->data,
                'error' => $error
            ]);
            die();
        }

        $this->data['email'] = mb_strtolower($this->data['email']);

        $this->task->addTask($this->data);
        unset($_SESSION['token']);
        redirect('');
        die();
    }

    public function edit($id)
    {
        $this->before();

        if (!$this->data = $this->task->getTasksForId($id)) {
            View::getView('/parts/404.php');
            die();
        };

        View::renderAdmin('admin/task/edit.php', 'Update task', [
            'data' => $this->data,
            'id' => $id
        ]);
        die();
    }

    public function update($id)
    {
        $this->before();
        checkToken();
        if (!$this->task->getTasksForId($id)) {
            View::getView('/parts/404.php');
            die();
        };

        $taskValidator = new CreateTaskValidator();
        $this->data = $taskValidator->trim($_POST);
        unset($this->data['token']);
        unset($_SESSION['token']);

        if (empty($this->data['status'])) {
            $this->data['status'] = 'off';
        }
        $this->data['id'] = $id;

        $this->task->updateTask($this->data);

        redirect('admin/dashboard');
        die();
    }
}