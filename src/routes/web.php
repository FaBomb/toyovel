<?php
namespace Routes;

use Illuminate\Http\Routing\Routes as Route;
use App\Controllers\UserController;

class Web {

    public static function getRoutes() {

        $route = new Route();

        // ルート記述
        $route->get('/', [UserController::class, 'index']);
        $route->get('/show', [UserController::class, 'show']);
        $route->put('/create', [UserController::class, 'create']);

        // ---------

        return $route;

    }

}
