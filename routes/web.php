<?php
$route->add('', ['controller' => 'HomeController', 'action' => 'index']);
$route->add('home', ['controller' => 'HomeController', 'action' => 'index']);

$route->add('task/create', ['controller' => 'TaskController', 'action' => 'create']);
$route->add('task/store', ['controller' => 'TaskController', 'action' => 'store']);
$route->add('admin/task/{id:\d+}/edit', ['controller' => 'TaskController', 'action' => 'edit']);
$route->add('admin/task/{id:\d+}/update', ['controller' => 'TaskController', 'action' => 'update']);

//admin
$route->add('admin', ['controller' => 'AdminController', 'action' => 'login']);
$route->add('admin/auth', ['controller' => 'AdminController', 'action' => 'auth']);
$route->add('admin/dashboard', ['controller' => 'AdminController', 'action' => 'index']);
$route->add('admin/logout', ['controller' => 'AdminController', 'action' => 'logout']);