<?php

namespace Illuminate\Http\Routing;

use Illuminate\Http\Routing\Route;
use Illuminate\Http\Routing\ControllerDispatcher;
use Routes\Web as Routes;

class Router {

    protected $routes;

    protected $current;

    protected $currentRequest;

    protected $patterns;

    public function __construct() {
        
        $this->routes = Routes::getRoutes();
        
    }

    public function dispatch($request) {

        $this->currentRequest = $request;
        $this->current= $this->getRoute($this->routes);

        return $this->dispatchToRoute($request);

    }

    protected function getRoute($routes) {

        $method = $this->currentRequest->method;    
        $uri = $this->currentRequest->pathInfo;    
        $action = $this->currentRequest->action;    
        $parameters = $this->currentRequest->parameters;

        $route = new Route($method, $uri, $action, $routes, $parameters);

        return $route;

    }

    public function dispatchToRoute($request) {

        return $this->runRoute($request, $this->current);

    }

    protected function runRoute($request, $route) {
        
        $route->run();
       // return $this->prepareResponse($request, $route->run());

    }

    public function prepareResponse($request, $response) {

        return static::toResponse($request, $response);

    }

    public static function toResponse($request, $response) {

        

    }

}
