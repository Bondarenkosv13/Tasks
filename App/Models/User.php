<?php

namespace App\Models;

use Core\Model;
use PDO;

class User
{
    private $table = 'users';

    public function addUser($fields)
    {
        $sql = "INSERT INTO `{$this->table}`(`login`, `password`) 
                VALUES (:login, :password)";
        $user = Model::getInstance()->prepare($sql);
        $user->execute($fields);
    }

    public function checkUser($login)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE login=:login";
        $user = Model::getInstance()->prepare($sql);
        $user->execute([':login' => $login]);
        $dataUser = $user->fetch(PDO::FETCH_ASSOC);
        return $dataUser;
    }

}