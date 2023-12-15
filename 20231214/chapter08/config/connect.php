<?php

namespace pdo_edu;

use PDO;

$dbConfig = require 'database.php';
// extract作用是把数组的key作为变量引入到当前作用域
// 返回值是成功引入变量的个数
extract($dbConfig);
// 1. dsn
$tpl = '%s:host=%s;dbname=%s;port=%s;charset=%s';
$args = [$type, $host, $dbname, $port, $charset];
// 分开写更清晰简介一些
$dsn = sprintf($tpl, ...$args);
// echo $dsn; // mysql:host=127.0.0.1;dbname=phpedu;port=3306;charset=utf8

// 2. 创建数据对象
$db = new PDO($dsn, $username, $password);
// 设置结果集的默认获取模式：只要关联部分
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
