<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__) . '/vendor/autoload.php';
use Core\Router;

session_start();

$route = new Router();
require_once dirname(__DIR__) . '/routes/web.php';

try
{
    $route->dispatch($_SERVER['REQUEST_URI']);
} catch (Exception $exception) {
    $str = $exception->getFile() . ", " .$exception->getLine(). ", " .$exception->getCode(). ", " .$exception->getMessage();
    echo $str;
    die();
}