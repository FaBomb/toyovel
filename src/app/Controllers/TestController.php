<?php

namespace App\Controllers;

use Illuminate\Http\Routing\Controller as BaseController;

class TestController extends BaseController {

    public function index() {

        return view("hello");

    }
    
    public function show() {

        return view("test");

    }

}
