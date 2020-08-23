<?php

namespace App\Controllers;

use App\Helpers\Paginator;
use App\Helpers\SortTasks;
use App\Models\Task;
use Core\Controller;
use Core\View;

include_once dirname(__DIR__, 2) . "/config/functions.php";
include_once dirname(__DIR__, 2) . "/config/constants.php";

class HomeController extends Controller
{
    private $task;

    public function __construct()
    {
        $this->task = new Task();
    }

    public function index()
    {

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

        View::render('home/index.php', 'Home', [
            'tasks' => $tasks,
            'name' => $name,
            'filter' => $filter,
            'countPages' => $countPages,
            'paginate' => $paginate
        ]);
        die();

    }

}