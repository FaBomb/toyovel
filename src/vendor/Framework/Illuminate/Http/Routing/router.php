<?php

namespace Illuminate\Http\Routing;

use Illuminate\Http\Contracts\Registrar;
use Illuminate\Http\Routing\Route;
use Illuminate\Http\Routing\ControllerDispatcher;

class Router implements Registrar {

    public static $verbs = ['GET', 'HEAD', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTION'];

    protected $route;

    protected $currentRequest;

    protected $patterns;

    public function addRoute($methods, $uri, $action) {

    }

    public function get($uri, $action) {

    }

    public function post($uri, $action) {

    }

    public function put($uri, $action) {

    }

    public function patch($uri, $action) {

    }
    
    public function delete($uri, $action) {

    }

    public function match($methods, $uri, $action) {

    }

    public function view($uri, $data, $status) {

    }

    public function dispatch($request) {

        $this->currentRequest = $request;

        $method = $request->method();
        $uri = $request->pathInfo();
        $action = $request->action();
        
        $this->route = new Route($method, $uri, $action);

        //return $this->dispatchToRoute($request);

    }

    public function dispatchToRoute($request) {

        return $this->runRoute($request, $this->findRoute($request));

    }

    protected function findRoute($request) {

        $this->current = $route = $this->route->match($request);

        return $route;

    }

    protected function runRoute($request, $route) {

        return $this->prepareResponse($request, $route->run());

    }

    public function prepareResponse($request, $response) {

        return static::toResponse($request, $response);

    }

    public static function toResponse($request, $response) {

        

    }

}
