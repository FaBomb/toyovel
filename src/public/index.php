<?php 

use Illuminate\Http\Kernel\Kernel;
use Illuminate\Http\Message\Request;

//autoloaderの呼び出し
require_once __DIR__."/../vendor/autoload.php";

//サービスコンテナの呼び出し
$app = require_once __DIR__."/../bootstrap/app.php";


$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

include "test.html";

?>
