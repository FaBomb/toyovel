<?php

namespace Illuminate\Http\Routing;

class ControllerDispatcher {

    public function dispatch($controller, $action, $parameters) {

        $controller = new $controller;

        $result = $controller->callAction($action, $parameters);

        return $result;
        
    }

}
