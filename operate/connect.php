<?php
// 如果你使用php的依赖安装。可以使用以下方法自动载入
require 'vendor/autoload.php';

//导入命名空间
use Medoo\Medoo as Db;

// 配置数据库
$config = [
    'database_type' => 'mysql',
    'database_name' => 'test',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8'
];

//实例化Medoo类，创建db对象
$db = new Db($config);

