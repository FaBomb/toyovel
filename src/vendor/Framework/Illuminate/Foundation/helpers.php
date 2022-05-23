<?php

use Illuminate\View\ViewFactory;

if (! function_exists('view')) {

    function view($view=null, $data=[]) {

        $factory = new ViewFactory;

        return $factory->make($view, $data);

    }

}
