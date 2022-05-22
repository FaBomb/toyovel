<?php

namespace Illuminate\Foundation;

use ReflectionClass;

class Application {

    // サービスコンテナの依存関係解消機能を実装
    public function make($class) {



        $reflection = new ReflectionClass($class);
        $constructor = $reflection->getConstructor();
        
        if (!isset($constructor)) {

            return new $class;

        }

        $parameters = $constructor->getParameters();

        if (count($parameters) === 0) {

            return new $class;

        }

        foreach($parameters as $param) {

            $paramClass = $this->make($param->getType()->getName());
            return new $class($paramClass);

        }
    }

}
