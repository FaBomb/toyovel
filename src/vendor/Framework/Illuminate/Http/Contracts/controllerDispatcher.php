<?php

namespace Illuminate\Http\Contracts;

use Illuminate\Http\Routing\Route;


interface ControllerDispatcher {

    public function dispatch($controller, $action, $parameters);

}
