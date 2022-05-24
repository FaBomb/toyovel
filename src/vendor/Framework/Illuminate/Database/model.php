<?php

namespace Illuminate\Database;

class Model {

    public function __construct() {

    }

    public function callAction($method, $parameters) {

        return $this->$method(...array_values($parameters));

    }

}
