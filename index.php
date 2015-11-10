<?php

//ошибки
ini_set('display_errors', 1);
error_reporting(E_ALL);

//запуск сессии
session_start();

//Подключение классов
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Autoload.php');

//Вызов роутера
$router= new Router();
$router->run();