<?php 

$uri = $_SERVER["REQUEST_URI"];

spl_autoload_register(function ($class){
    $push = str_replace("\\", '/', $class) . ".php";
    $baseDir = "../";
    $file = $baseDir . $push;
    if(file_exists($file)){
        require $file;
    }
});

