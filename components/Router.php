<?php

class Router
{

    private $routes;


    public function __construct()
    {
        $routesPath=ROOT.'/config/routes.php';
        $this->routes=include($routesPath);
    }

    /**
     * Return request string
     * @return string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }



    public function run()
    {
       //Получаем строку запроса
       $uri = $this->getURI();

        //Проверяем наличие роута в $routes
        foreach ($this->routes as $uriPattern => $path) {

            //Сравниваем $uriPattern and $uri
            if (preg_match("~$uriPattern~", $uri)) {

                //Получаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                //Определяем какой контроллер и action обрабатывает запрос
                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters=$segments;

                //Подключить класс контроллера
                $controllerFile = ROOT . '/controller/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result = !null){
                    break;
                }

                }
            }

    }


}
