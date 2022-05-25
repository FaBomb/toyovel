<?php

namespace App\Models;

use Illuminate\Database\Model as BaseModel;

class Users extends BaseModel {

    protected static $fillable = ['name', 'birthday', 'sex'];

}
