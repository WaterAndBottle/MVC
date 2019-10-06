<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//Front Controller
//1.Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);
//2.Подключение файлов системы
define('ROOT',dirname(__FILE__));
require_once (ROOT.'/components/Router.php');
//3.Установка связи с БД
//4.Вызов Router
$router=new Router();
$router->run();
?>
</body>
</html>