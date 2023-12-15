<?php

namespace php_edu;

// 连接数据库 这个代码里面封装了连接数据库的操作
require __DIR__ . '/config/connect.php';

// 准备sql语句 删除
$sql = 'DELETE FROM `staff` WHERE `id`= :id';

$stmt = $db->prepare($sql);

$stmt->execute([':id' => $_GET['id']]);
// 如果条件来自外部， 例如 url 中 get 参数
// echo $_GET['id'];
if ($stmt->rowCount() > 0) {
    echo 'id = ' . $_GET['id'] . ' 删除成功';
} else {
    echo '删除失败';
    print_r($stmt->errorInfo());
}
