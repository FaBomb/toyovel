<?php

namespace Illuminate\Database;

use Closure;
use Illuminate\Database\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schema {

    public static function create($table, Closure $callback) {

        $blueprint = new Blueprint($table);

        $callback($blueprint);

        $blueprint->query();

    }   

}
