<?php


function load(string $controller, string $action){

    try{

    

    //se o controller existe 
    $controllerNamespace = "app\\controllers\\{$controller}";
    
    if (!class_exists($controllerNamespace)){
        throw new Exception("O controller {$controller} não existe");
    }

    $controllerInstance = new $controllerNamespace();

    if(!method_exists($controllerInstance, $action)){
        throw new Exception ("O metodo {$action} não existe no controller {$controller} ");
    }

    $controllerInstance->$action((object)$_REQUEST);

}catch(Exception $e){
    echo $e->getMessage();
}

}

$router = [
    "GET"=>
    [
        
        "/triangle"=> fn() => load("TriangleController","index"),
        "/rectangle"=> fn() => load("RectangleController","index"),
        "/soma"=> fn() => load("SomaController","index"),
        
        
    ],
    "POST"=>
     [
        "/triangle"=> fn() => load("TriangleController", "store"),
        "/rectangle"=> fn() => load("RectangleController","store"),
     ],
    "DELETE"=>
     [
       
        "/triangle"=> fn() => load("TriangleController", "destroy"),
        "/rectangle"=> fn() => load("RectangleController","destroy"),
     ],
    ];