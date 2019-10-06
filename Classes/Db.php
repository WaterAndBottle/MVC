<?php

require_once ROOT.'/config/db_params.php';

class Db
{
    public static function getConnection()
    {
        $paramsPath=ROOT.'/config/db_params.php';
        $params=include ($paramsPath);

        $dsn="mysqli:host={$params['host']};dbname={$params['dbname']}";
        $db=new PDO ($dsn,$params['user'],$params['password']);
        return $db;
    }
}