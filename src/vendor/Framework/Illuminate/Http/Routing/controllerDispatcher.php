<?php

namespace Illuminate\Http\Routing;

class ControllerDispatcher {

    public function dispatch($controller, $action, $parameters, $request) {

        $controller = new $controller;

        $result = $controller->callAction($action, $parameters, $request->request);

        return $result;
        
    }

}
