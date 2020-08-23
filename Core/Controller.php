<?php
namespace Core;

use App\Helpers\SessionHelper;

abstract class Controller
{
    protected $data = [];

    /**
     * link at home if user doesn't login
     */
    public function before()
    {
        if(SessionHelper::isUserLoggedIn())
        {
            $_SESSION['notification'] = 'To view this page you need to log in!';
            redirect('');
        }
    }

}