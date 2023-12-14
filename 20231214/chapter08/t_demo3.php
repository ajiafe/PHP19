<?php

namespace php_edu;


// 1. 连接数据库
require __DIR__ . '/config/connect.php';

// 2. CURD: UPDATE 更新
// UPDATE 表名 SET 字段1=值1 ... WHERE 更新条件
$sql = 'UPDATE `staff` SET `name` = ? WHERE `id` = ?';

$stmt = $db->prepare($sql);


$stmt->execute(['老顽童', 6]);


if ($stmt->rowCount() > 0) {
    echo '更新成功';
} else {
    echo '更新失败';
    print_r($stmt->errorInfo());
}
