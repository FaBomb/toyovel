<?php
namespace Routes;

use Illuminate\Http\Routing\Routes as Route;
use App\Controllers\TestController;

class Web {

    public static function getRoutes() {

        $route = new Route();

        $route->get('/', [TestController::class, 'index']);
        $route->get('/show', [TestController::class, 'show']);

        return $route;

    }

}
