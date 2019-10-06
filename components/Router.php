<?php


class Router
{
private $routes;

    /**
     * Router constructor.
     */
public function __construct()
    {
     $routesPath=ROOT.'/config/routes.php';
     $this->routes=include($routesPath);
    }

    /**
     * @return string
     * Returns request string
     */

private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'],'/');
        }
    }

    /**
     * Router run
     */
public function run()
    {
        //Get URI string
        $uri=$this->getURI();

         //Check existance of route
        foreach ($this->routes as $uriPattern=>$path)
        {
            //Comparing of uri inserted by user and routes
            if (preg_match("~$uriPattern~", $uri))
            {
                //Check witch controller and action  making this process
                $segments = explode('/', $path);
                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $actionName =  ucfirst(array_shift($segments)).'Action';
                //Include controller files
                $controllerFile = ROOT . '/Controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile))
                {
                    include_once($controllerFile);
                }
                //Make an object and realize method (action)
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if ($result != null)
                {
                    break;
                }

            }
        }

    }
}