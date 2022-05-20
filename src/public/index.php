<?php 
require_once __DIR__."/../vendor/autoload.php";


$message = new App\Models\Message();
echo $message->hello();

$route = new Illuminate\Http\Route();
echo $route->hello();
?>
