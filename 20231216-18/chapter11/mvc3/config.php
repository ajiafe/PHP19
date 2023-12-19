<?php

// 数据库连接参数
define('DATABASE', [
    'type' => 'mysql',
    'host' => 'localhost',
    'dbname' => 'phpedu',
    'port' => '3306',
    'charset' => 'utf8',
    'username' => 'root',
    'password' => 'root'
]);

// 应用相关
define('APP', [
    // 默认控制器
    'default_controller' => 'index',

    // 默认方法
    'default_action' => 'index'
]);

// 项目根路径
define('ROOT_PATH', __DIR__);
