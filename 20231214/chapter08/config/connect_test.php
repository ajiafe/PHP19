<?php

namespace pdo_edu;

use PDO;

$dbConfig = require 'database.php';
print_r($dbConfig);

// 将关联数组中的每一个成员,打散成独立变量
extract($dbConfig);
// heredoc
echo <<< SHOW
$type;
$host;
$dbname;
$port;
$charset;
$username;
$password;
<br>
SHOW;

// pdo: 连接三要素

// 1. dsn
// mysql:host=127.0.0.1;dbanme=phpedu;port=3306;charset=utf8;
$tpl = '%s:host=%s;dbanme=%s;port=%s;charset=%s';
$args = [$type, $host, $dbname, $port, $charset];
$dsn = sprintf($tpl, ...$args);

// 2. 创建数据对象
$db = new PDO($dsn, $username, $password);
// var_dump($db);
if ($db)  echo '<h2>连接成功</h2>';
