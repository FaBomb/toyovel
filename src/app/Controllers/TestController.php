<?php

namespace App\Controllers;

use Illuminate\Http\Routing\Controller as BaseController;
use App\Models\Testmodel;

class TestController extends BaseController {

    public function index() {

        $test1 = 'nunokawa';
        $test2 = '豊海';
        $test3 = '宮本'; 


        return view("hello", compact('test1', 'test2', 'test3'));

    }
    
    public function show() {

        return view("test");

    }

    public function create() {


        //Testmodel::create(['yamada'=>'engineer', 'toyomi'=>'hen']);

    }

}
