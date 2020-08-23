<?php

namespace Core;

use PDO;
use App\Config;

abstract class Model
{
    protected static $dbh = null;

    protected static function connectDB()
    {
        $dsn = "mysql:host=" . Config::host . ";dbname=" . Config::db_name . ";charset=" . Config::charset;

        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => true
        );

        self::$dbh = new PDO($dsn, Config::user, Config::pass, $opt);
    }

    public static function getInstance()
    {
        if (self::$dbh == null) {
            self::connectDB();
        }

        return self::$dbh;
    }
}