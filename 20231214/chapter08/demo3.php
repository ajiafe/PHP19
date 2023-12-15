<?php

namespace php_edu;

echo '<h3>CURD: UPDATE  更新操作</h3>';


// 首先连接数据库
require __DIR__ . '/config/connect.php';
// 然后更新
// UPDATE 表名 SET 字段1=值1 ... WHERE 更新条件
$sql = 'UPDATE `staff` SET `name` = ? WHERE `id` = ?';

$stmt = $db->prepare($sql);

$stmt->execute(['黄药师', 6]);

if ($stmt->rowCount() > 0) {
    echo '更新成功';
} else {
    echo '更新失败';
    print_r($stmt->errorInfo());
}

/**
 *
你的代码片段使用了 PHP 的 PDO 类执行一个 UPDATE 操作，将 staff 表中 id 为 6 的记录的 name 更新为 '黄药师'。

让我解释一下你的代码：

$sql = 'UPDATE staffSETname= ? WHEREid = ?';: 这是一个 SQL UPDATE 语句，用于更新 staff 表中符合条件的记录。? 是参数占位符，将在后续的执行中被具体的值替代。

$stmt = $db->prepare($sql);: 使用 PDO 的 prepare 方法准备 SQL 语句，创建一个预处理语句对象 $stmt。

$stmt->execute(['黄药师', 6]);: 使用 execute 方法执行预处理语句，将参数数组 ['黄药师', 6] 中的值分别绑定到 ? 的位置上，然后执行更新操作。

这样，该代码片段会将 staff 表中 id 为 6 的记录的 name 更新为 '黄药师'。请确保数据库连接 $db 已经正确建立，并且相应的表和字段存在。
 */
