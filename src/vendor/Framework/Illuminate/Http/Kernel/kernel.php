<?php

namespace Illuminate\Http\Kernel;

use Illuminate\Http\Contracts\Kernel as KernelContract;
use Illuminate\Http\Routing\Router;


class Kernel implements KernelContract {

    protected $router;
    
    function __construct(Router $router) {
    
        $this->router = $router;

    }

    function handle($request) {

        $response = $this->sendRequestThroughRouter($request);

        return $response;

    }

    private function sendRequestThroughRouter($request) {

        //時間があればミドルウェア処理まで
        return $this->dispatchToRouter($request);

    } 

    protected function dispatchTorouter($request) {

        return $this->router->dispatch($request);

    }

    function terminate($request, $response) {

    }
}
