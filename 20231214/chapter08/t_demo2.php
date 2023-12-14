<?php

namespace php_edu;

/**
 * 数据库常用操作
 * 1. 读操作: select
 * 2. 写操作: insert,update,delete
 * 简称: CURD, 增删改查
 */

// 1. 连接数据库
require __DIR__ . '/config/connect.php';

// 2. CURD: INSERT

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
    print_r($stmt->errorInfo());
}


// INSET INTO table (字段列表) VALUES (值列表)
