<?php 
// 1. 连接数据库
require __DIR__ . '/config/connect.php';

// 获取输入的 id，确保是一个有效的整数
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// 验证 id 是否有效
if ($id === false) {
    // 处理无效的输入，比如输出错误消息或者采取其他措施
    echo '无效的 ID';
    exit();
}


// 2. CURD: SELECT 单条查询
// SELECT 字段列表 FROM 表名 WHERE 查询条件
$sql = 'SELECT `id`,`name` FROM `staff` WHERE `id` > :id';

// 准备预处理语句
$stmt = $db->prepare($sql);

// 绑定参数
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

// 执行查询
$stmt->execute();

// 获取结果集
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 处理结果集
foreach ($result as $row) {
    echo 'ID: ' . $row['id'] . ', Name: ' . $row['name'] . '<br>';
}