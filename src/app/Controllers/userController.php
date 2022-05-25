<?php

namespace App\Controllers;

use Illuminate\Http\Routing\Controller as BaseController;
use App\Models\Users;
use Illuminate\Http\Message\Request;

class UserController extends BaseController {

    public function index() {

        return view("index");

    }
    
    public function show($request, $parameters) {

        $data = Users::get($parameters['id']);

        $name = $data['name'];
        $birthday = $data['birthday'];
        $sex = $data['sex'];

        return view("show", compact('name', 'birthday', 'sex'));

    }

    public function create($request) {

        $id = Users::create(['name'=>$request['name'], 'birthday'=>$request['birthday'], 'sex'=>$request['sex']]);

        redirect('/show?id='.$id);

    }

}
