<?php

namespace php_edu;

use PDO;

// 1. 连接数据库
require __DIR__ . '/config/connect.php';

// 2. CURD: SELECT 多条查询
// SELECT 字段列表 FROM 表名 WHERE 查询条件
$sql = 'SELECT `id`,`name` FROM `staff` WHERE `id` > :id';

$stmt = $db->prepare($sql);


$stmt->execute(['id' => 10]);

// fetchAll: 返回全部满足条件的记录集合，二维数组
$staffs = $stmt->fetchAll();

// print_r($staffs);

foreach ($staffs as $staff) {
    printf('<pre>%s</pre>', print_r($staff, true));
}
