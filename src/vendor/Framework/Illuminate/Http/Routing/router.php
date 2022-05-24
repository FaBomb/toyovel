<?php

namespace Illuminate\Http\Routing;

use Illuminate\Http\Message\Response;
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

        return $this->toResponse($request, $route->run());

    }

    public static function toResponse($request, $content) {

        $response = new Response($request, $content);

        return $response;

    }

}
