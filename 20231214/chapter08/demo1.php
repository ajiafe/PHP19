<?php
namespace pdo_edu;

// 1. 连接数据库
// 2. 增删改查
// 3. 关闭连接数据库

// Use of unknown class: 'pdo_edu\PDO'PHP(PHP0413)
// Undefined type 'pdo_edu\PDO'.intelephense(P1009)
// new PDO($dsn,$username,$password);
// 解决报错第一种方案
// new \PDO($dsn,$username,$password);
// 第二种方案

// use PDO as PDO;
// 上面这行代码可以简写
use PDO;
// Name '\PDO' can be simplified with 'PDO'PHP(PHP6601)
$username = 'root';
$password = 'root';
$dsn = 'mysql:host=localhost;dbname=phpdev;port=3306;charset=utf8';
$db = new PDO($dsn,$username,$password);
// var_dump($db); 
if($db) echo '数据库连接成功';


// 关闭连接 两种方式 【可选择】
$db = null;
unset($db);