<?php
namespace Core;

class Router
{
    private $routes = [];

    private $params = [];


    /**
     * Creat the regular generation for find controller in the method match.
     *
     * @param string $route - onto files routes/web/php
     * @param array $params - onto files routes/web/php
     */
    public function add(string $route, array $params =[])
    {
        $route = preg_replace('/\//', '\/', $route);
        $route = preg_replace('/\{([a-z]+):([\a-z]+)\}/', '(?P<\1>\2)', $route);
        $route = '/^' . $route . '$/i';
        $this->routes[$route] = $params;
    }

    /**
     * Fill in the $params = []
     *
     * @param  $url
     * @return bool
     */

    public function match($url)
    {
        foreach ($this->routes as $route => $params) {

            if (preg_match($route, $url, $matches)) {
                $this->params = $params;

                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $this->params[$key] = $value;
                    }
                }
                return true;
            }
        }
        return false;
    }

    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('?', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }


    public function dispatch(string $url)
    {
        $url = trim($url, '/');
        $url = $this->removeQueryStringVariables($url);

        if($this->match($url))
        {
            $controller = $this->params['controller'];
            unset($this->params['controller']);
            $controller = "App\Controllers\\" . $controller;

                if(class_exists($controller)) {
                    $action = $this->params['action'];
                    unset($this->params['action']);
                    $controller = new $controller;


                    call_user_func_array(
                    array (
                        $controller,
                        $action
                    ),

                    $this->params
                    );
                } else {
                    http_response_code(422);
                    die();
                }
        } else {

            View::getView('/parts/404.php');
            die();
        }
    }
}