<?php

namespace Core;

class View
{
    protected static $path = "/App/views/";

    /**
     * @param $view - path is view
     * @param array $params - variables is for view
     * @return  - require view
     * @throws \Exception - if view don't find
     */
    public static function getView($view, $params = [])
    {
        extract($params);

        $file = dirname(__DIR__) . View::$path . $view;

        if (is_readable($file)) {
            require $file;
        } else {
            echo "$file не найден!";
        }
    }

    public static function render($view, $title = 'Home', $params = [])
    {
        self::getView('home/layout/header.php', ['title' => $title]);
        self::getView($view, $params);
        self::getView('home/layout/footer.php');
        die();
    }

    public static function renderAdmin($view, $title = 'Admin', $params = [])
    {
        self::getView('admin/layout/header.php', ['title' => $title]);
        self::getView($view, $params);
        self::getView('admin/layout/footer.php');
        die();
    }
}