<?php

namespace Illuminate\Http\Contracts;

interface Registrar {
    
    public function get($uri, $action);

    public function post($uri, $action);

    public function put($uri, $action);

    public function delete($uri, $action);
    
    public function patch($uri, $action);
    
}
