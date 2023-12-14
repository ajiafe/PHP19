<?php

namespace php_edu;

use PDO;

// 1. 连接数据库
require __DIR__ . '/config/connect.php';

// 2. CURD: SELECT 单条查询
// SELECT 字段列表 FROM 表名 WHERE 查询条件
$sql = 'SELECT `id`,`name` FROM `staff` WHERE `id` > :id';

$stmt = $db->prepare($sql);


$stmt->execute(['id' => 10]);

// 单条查询
// $staff = $stmt->fetch(PDO::FETCH_ASSOC);
// printf('<pre>%s</pre>', print_r($staff, true));
// $staff = $stmt->fetch(PDO::FETCH_ASSOC);
// printf('<pre>%s</pre>', print_r($staff, true));
// $staff = $stmt->fetch(PDO::FETCH_ASSOC);
// printf('<pre>%s</pre>', print_r($staff, true));
// $staff = $stmt->fetch(PDO::FETCH_ASSOC);
// var_dump($staff);

// PDO::FETCH_ASSOC: 结果集获取模式，只返回关联部分
while ($staff = $stmt->fetch()) {
    printf('<pre>%s</pre>', print_r($staff, true));
}
