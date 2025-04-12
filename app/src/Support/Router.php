<?php 

namespace app\src\Support;

abstract class Router {
    protected $routes = [];

    public function __construct()
    {
        $this->router = new RouterCollection();
    }

     
    public static get(string $uri, array|string|callable|null $action = null): Route {
        return $this->addRouter(["GET", "HEAD"], $uri, $action);
    }


    //  _______________________________________________________________________________________________________
    //  |This methons has undefaunt calls                                                                     |
    //  | -> Refactoring add, actionReferences, convertToCounrollerAction, newRoute, prifix, hasGroupStack,   | 
    //  |    mergeGroupAttributesIntoRoute, addWhereClausesToRoute                                            | 
    //  _______________________________________________________________________________________________________




    public function addRouter(array $methods, string $uri, array|string|callable|null $action = null){
        return $this->router->add($this->creacteRouter($methods, $uri, $action));
    }

    protected function creacteRouter(array $methods, string $uri, array|string|callable|null $action = null){
        if($this->actionReferences($action)){
            $action = $this->convertToCounrollerAction($action);
        }
        $route = $this->newRoute($methods, $this->prifix($uri), $action);
        if($this->hasGroupStack()){
            $this->mergeGroupAttributesIntoRoute($route);
        }
        $this->addWhereClausesToRoute($route);
        
        return $route;
    }
}
