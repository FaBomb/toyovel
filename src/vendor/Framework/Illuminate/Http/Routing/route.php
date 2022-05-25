<?php

namespace Illuminate\Http\Routing;

use Illuminate\Http\Message\Request;

class Route {

    public $uri;

    public $method;

    public $action;

    protected $controller;

    protected $parameters;

    protected $container;

    public $routes;

    public function __construct($method, $uri, $action, $routes, $parameters) {

        $this->method = $method;
        $this->uri = preg_split('/\{/', $uri)[0];
        $this->action['all'] = $action;
        $this->routes = $routes;
        $this->parameters = $parameters;

    }

    public function run() {

        return $this->runController();

    }

    protected function runController() {

        $this->setContainer();
        return $this->controllerDispatcher()->dispatch($this->getController(), $this->getAction(), $this->getParameters());
        
    }

    protected function getParameters() {

        return $this->parameters;

    }

    protected function setContainer() {

        $this->container = $this->routes->match($this->method, $this->uri);

    }

    public function getController() {

        if (array_key_exists(0, $this->container)) {

            $this->controller = $this->container[0];

        }

        return $this->controller;

    }

    protected function getAction() {


        if (array_key_exists(1, $this->container)) {

            $this->action = $this->container[1];

        }

        return $this->action;

    }

    public function controllerDispatcher() {

        return new ControllerDispatcher();

    }

}
