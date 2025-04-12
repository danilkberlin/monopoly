<?php

use app\public\AppContainer\AppContainer;
use app\src\Support\Router;

$uri = $_SERVER["REQUEST_URI"];

spl_autoload_register(function ($class){
    $push = str_replace("\\", '/', $class) . ".php";
    $baseDir = "../";
    $file = $baseDir . $push;
    if(file_exists($file)){
        require $file;
    }
});

$app = new AppContainer();

// Create a Routing Request =======
//
// 
//  
$router = new Router($uri);