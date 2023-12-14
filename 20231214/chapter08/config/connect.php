<?php

namespace pdo_edu;

use PDO;

$dbConfig = require 'database.php';
extract($dbConfig);
// 1. dsn
$tpl = '%s:host=%s;dbname=%s;port=%s;charset=%s';
$args = [$type, $host, $dbname, $port, $charset];
$dsn = sprintf($tpl, ...$args);
// echo $dsn;

// 2. 创建数据对象
$db = new PDO($dsn, $username, $password);
// 设置结果集的默认获取模式：只要关联部分
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
