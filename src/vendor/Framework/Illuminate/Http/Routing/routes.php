<?php

namespace Illuminate\Http\Routing;

use Illuminate\Http\Contracts\Registrar;

class Routes implements Registrar {

    // public array $routes = ['GET'=>[], 'POST'=>[], 'PUT'=>[], 'PATCH'=>[], 'DELETE'=>[]];
    public array $routes; 

    public function __construct() {

    }

    public function get($uri, $action) {

        // array_push($this->routes['GET'], [$uri=>$action]);
        $this->routes['GET'][$uri] = $action;

    }

    public function post($uri, $action) {

        $this->routes['POST'][$uri] = $action;

    }

    public function put($uri, $action) {

        $this->routes['PUT'][$uri] = $action;

    }

    public function patch($uri, $action) {

        $this->routes['PATCH'][$uri] = $action;

    }
    
    public function delete($uri, $action) {
        
        $this->routes['DELETE'][$uri] = $action;

    }

    public function match($method, $uri) {

        if (isset($this->routes[$method][$uri])) {

            return $this->routes[$method][$uri];

        }

        return [0 => 'App\Controllers\404', 'index'];

    }

}
