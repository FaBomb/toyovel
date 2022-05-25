<?php

namespace Illuminate\Http\Routing;

abstract class Controller {

    public function callAction($method, $parameters, $request) {

        //parametersの意味がなしてない。。。取り合えずリクエストから
        return $this->$method($request);

    }

}
