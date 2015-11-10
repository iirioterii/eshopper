<?php

class Db
{

    public static function getConnection()
    {
        $paramPath = ROOT . '/config/db_set.php';
        $param = include($paramPath);

        $dsn = "mysql: host={$param['host']}; dbname={$param['dbname']}";
        $db = new PDO($dsn, $param['user'], $param['pass']);
        $db->exec("set names utf8");

        return $db;
    }


}