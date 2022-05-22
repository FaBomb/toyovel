<?php

namespace Illuminate\Http\Routing;

use Illuminate\Http\Message\Request;

class Route {

    public $uri;

    public $method;

    public $action;

    public $controller;

    public $wheres = [];

    public $parameters;

    protected $router;

    public function __construct($method, $uri, $action) {

        $this->method = $method;
        $this->uri = $uri;
        $this->action = $action;

    }

    public function run() {

        return $this->runController();

    }

    protected function runController() {

        return $this->controllerDispatcher()->dispatch($this, $this->getController, $this->getAction());
    }

    public function getController() {

        return $this->controller;

    }

    protected function getAction() {

        return $this->action;

    }

    public function controllerDispatcher() {

        return new ControllerDispatcher();

    }

    public function match(Request $request) {

        
    }

}
