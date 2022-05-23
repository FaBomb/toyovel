<?php

namespace Illuminate\Http\Routing;

abstract class Controller {

    public function callAction($method, $parameters) {

        return $this->$method(...array_values($parameters));

    }

}
