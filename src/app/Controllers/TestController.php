<?php

namespace App\Controllers;

use Illuminate\Http\Routing\Controller as BaseController;
use App\Models\Testmodel;
use Illuminate\Http\Message\Request;

class TestController extends BaseController {

    public function index() {

        $test1 = 'nunokawa';
        $test2 = '豊海';
        $test3 = '宮本'; 


        return view("hello", compact('test1', 'test2', 'test3'));

    }
    
    public function show($request, $parameters) {

        $data = Testmodel::get($parameters['id']);

        $yamada = $data['yamada'];
        $toyomi = $data['toyomi'];

        return view("test", compact('yamada', 'toyomi'));

    }

    public function create($request) {

        $id = Testmodel::create(['yamada'=>$request['yamada'], 'toyomi'=>$request['toyomi']]);

        redirect('/show?id='.$id);

    }

}
