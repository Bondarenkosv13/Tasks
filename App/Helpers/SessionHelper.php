<?php

namespace App\Helpers;

class SessionHelper
{
    public static function isUserLoggedIn()
    {
        return empty($_SESSION['user_data']);
    }

    public static function setUser(array $value)
    {
        $_SESSION['user_data'] = $value;
    }

    public static function destroyUserData()
    {
        session_destroy();
    }
}