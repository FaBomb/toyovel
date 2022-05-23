<?php

namespace App\Controllers;

use Illuminate\Http\Routing\Controller as BaseController;

class TestController extends BaseController {

    public function index() {

        $test1 = 'variavle1';
        $test2 = 'variavle1';
        $test3 = 'variavle1'; 

        return view("hello", compact('test1', 'test2', 'test3'));

    }
    
    public function show() {

        return view("test");

    }

}
