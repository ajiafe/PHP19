<?php

namespace php_edu;

echo '<h3>CURD: INSERT  插入操作</h3>';
/**
 * 数据库常用操作
 * 1. 读操作: select
 * 2. 写操作: insert,update,delete
 * 简称: CURD, 增删改查
 */

// 1. 连接数据库
require __DIR__ . '/config/connect.php';


// 表名
$tableName = 'staff';

// 检查表是否存在
$tableExistsQuery = "SHOW TABLES LIKE '$tableName'";
$tableExistsResult = $db->query($tableExistsQuery);


if ($tableExistsResult->rowCount() == 0) {
    // 表不存在，创建表
    $createTableQuery = "CREATE TABLE $tableName (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        sex VARCHAR(10) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $db->exec($createTableQuery);
    echo "表创建成功<br>";
}

// 2. CURD: INSERT  插入

/**
 * PDO预处理
 * 为什么要用预处理?
 * 1. 防止SQL注入攻击, 2. 数据延迟绑定
 * (编程时只写SQL语句模板,执行SQL时再给占位符绑定真实数据)
 * 预处理过程:
 * 1. 创建SQL语句模板对象: 数据使用占位符表示
 * 2. 执行SQL语句,根据操作类型(写/读),读返回结果集/数组, 写返回受影响的记录数量
 */

// INSERT 插入
// INSERT 表名 SET 字段1=值1, 字段2=值2, ....
// SQL语句的推荐规范:
// 1. 关键字全大写
// 2. 表名,字段名使用反引号做为定界符
$sql = 'INSERT `staff` SET `name` = ?, `sex` = ?, `email` = ?';


// 1. 创建SQL语句模板对象
// 使用预处理语句防止 SQL 注入
$stmt = $db->prepare($sql);
// 2. 执行SQL语句

$stmt->execute(['小龙女', 1, 'xiaolongnv@php.cn']);
$stmt->execute(['洪七公', 0, 'hongqigong@php.cn']);
$stmt->execute(['黄蓉', 0, 'huangrong@php.cn']);
$stmt->execute(['杨过', 0, 'yangguo@php.cn']);
$stmt->execute(['猪老师', 0, 'zhulaoshi@php.cn']);
$stmt->execute(['灭绝', 0, 'miejue@php.cn']);
// 成功
// $stmt->rowCount(): 返回受影响的记录数量
if ($stmt->rowCount() > 0) {
    echo '新增成功, 新增记录的主键ID = ' . $db->lastInsertId();
} else {
    echo '新增失败';
    print_r($stmt->errorInfo()); // 新增失败Array ( [0] => 42S02 [1] => 1146 [2] => Table 'phpdev.staff' doesn't exist )
}


// INSET INTO table (字段列表) VALUES (值列表)
