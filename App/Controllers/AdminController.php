<?php

namespace App\Controllers;

use App\Helpers\Paginator;
use App\Helpers\SessionHelper;
use App\Helpers\SortTasks;
use App\Models\Task;
use App\Models\User;
use App\Validation\LoginValidator;
use Core\Controller;
use Core\View;

include_once dirname(__DIR__, 2) . "/config/functions.php";
include_once dirname(__DIR__, 2) . "/config/constants.php";

class AdminController extends Controller
{
    private $task;

    public function __construct()
    {
        $this->task = new Task();
    }

    public function login()
    {
        View::renderAdmin('admin/login.php', 'Login admin');
        die();
    }

    public function auth()
    {
        checkToken();

        $loginValidator = new LoginValidator();
        $this->data = $loginValidator->trim($_POST);
        unset($this->data['token']);
        unset($_SESSION['token']);

        if (!$loginValidator->storeValidation($this->data)) {
            $error = $loginValidator->getErrors();

            View::renderAdmin('admin/login.php', 'Login admin   ', [
                'data' => $this->data,
                'error' => $error
            ]);
            die();
        }

        $user = new User();

        if (!$user = $user->checkUser($this->data['login'])) {
            $_SESSION['notification'] = 'Invalid email or password';
            redirect('/admin');
            die();
        };

        if (password_verify($this->data['password'], $user['password'])) {
            SessionHelper::setUser($this->data);
            redirect('admin/dashboard');
            die();
        }

        $_SESSION['notification'] = 'Invalid email or password';
        redirect('/admin');
        die();

    }

    public function index()
    {
        $this->before();

        $name = trim(!empty($_GET['name']) ? $_GET['name'] : 'name');
        $filter = trim(!empty($_GET['filter']) ? $_GET['filter'] : 'asc');

        if ($name == null) {
            $name = 'name';
        } elseif ($filter == null) {
            $filter = 'asc';
        } elseif (!($filter == 'asc' || $filter == 'desc')) {
            $filter = 'asc';
        }

        $orderBy = SortTasks::sort($name, $filter);


        $paginate = new Paginator();
        $countPages = $this->task->getCountTasks()['count'];

        $paginate = $paginate->paginate(3, $countPages);

        $tasks = $this->task->getPaginateTasksWithSort($paginate['start'], $paginate['limit'], $orderBy);

        View::renderAdmin('admin/index.php', 'Home', [
            'tasks' => $tasks,
            'name' => $name,
            'filter' => $filter,
            'countPages' => $countPages,
            'paginate' => $paginate
        ]);
        die();

    }

    public function logout()
    {
        SessionHelper::destroyUserData();
        redirect('home');
        die();
    }

}