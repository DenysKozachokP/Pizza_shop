<?php
namespace core;

class Router{
    protected $route;
    function __construct($route)
    {
        $this->route = $route;
    }
    public function run(){
        $parth = explode('/', $this->route);
        if (strlen($parth[0]) == 0){
            $parth[0] = 'site';
            $parth[1] = 'index';
        }
        if (count($parth) == 1){
            $parth[1] = 'index';
        }
        Core::get()->moduleName = $parth[0];
        Core::get()->actionName = $parth[1];

        $controller = 'controllers\\'.ucfirst($parth[0]).'Controller';
        $method = 'action'.ucfirst($parth[1]);
        if (class_exists($controller)){
            $controllerObject = new $controller();
            Core::get()->controllerObject = $controllerObject;
            if (method_exists($controller, $method))
            {
                array_splice($parth, 0 ,2);
                return $controllerObject->$method($parth);
            }else
                $this->error(404);
        }else{
            $this->error(404);
        }
        
    }
    public function done(){
        
    }
    public function error($code){
        http_response_code($code);
        echo $code;
    }   
}
?>