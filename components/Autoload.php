<?php

function __autoload($classname)
{
    $array_path=array(
        '/components/',
        '/model/',
    );

    foreach($array_path as $path){
        $path = ROOT . $path . $classname . '.php';
        if(is_file($path)){
            include_once($path);
        }
    }
}