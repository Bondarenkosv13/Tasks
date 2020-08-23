<?php
include_once 'constants.php';

function dd($value = '')
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";

    die();
}

function redirect($path)
{
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/' . $path);
    exit();
}


function route($route)
{
    return ROUTE . $route;
}

function csrf()
{
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['token'];
}

function checkToken()
{
    if (empty($_SESSION['token'])) {
        http_response_code(400);
        die();
    }

    if ($_SESSION['token'] != $_POST['token']) {
        http_response_code(401);
        die();
    }
}
