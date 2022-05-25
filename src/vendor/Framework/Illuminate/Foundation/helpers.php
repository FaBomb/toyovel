<?php

use Illuminate\View\ViewFactory;

if (! function_exists('redirect')) {

    function redirect($path) {

        header('Location: '.$path);

    }

}
if (! function_exists('compact')) {

    function compact(...$params) {

        return $params;

    }

}
if (! function_exists('view')) {

    function view($view=null, $data=[]) {

        $factory = new ViewFactory();

        return $factory->make($view, $data);

    }

}
