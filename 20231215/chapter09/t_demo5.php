<?php
// 1. 连接数据库
$db = new PDO('mysql:dbname=phpedu', 'root', 'root');

// 2. 当前页, 在GET参数中
// https://www.php.cn/course.html?p=5
// $page = isset($_GET['p']) ? $_GET['p'] : 1;
// null合并
$page = $_GET['p'] ?? 1;
echo "当前页: p= $page <br>";

// 3. 每页显示数量
$num = 5;

// 4. 记录总数
$sql = 'SELECT COUNT(`id`) AS `total` FROM `staff`';
$stmt = $db->prepare($sql);
$stmt->execute();
// 将某列的仠与php变量绑定 , `total` => $total
$stmt->bindColumn('total', $total);
$stmt->fetch(PDO::FETCH_ASSOC);
echo "总记录数量: $total <br>";

// 5. 总页数
// 10.1 => 11 ceil: 向上取整,不丢数据
$pages = ceil($total / $num);
echo "总页数: $pages <br>";

// 6. 偏移量
// offset = (page - 1) * num
$offset = ($page - 1) * $num;
echo "偏移量: $offset <br>";

// 7. 分页数据
// $sql = "SELECT * FROM `staff` LIMIT $num OFFSET $offset";
$sql = "SELECT * FROM `staff` LIMIT $offset, $num";
$stmt = $db->prepare($sql);
$stmt->execute();
$staffs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 遍历
echo '<hr>';
if (count($staffs) === 0) {
    echo '查询结果为空';
} else {
    foreach ($staffs as $staff) {
        extract($staff);
        printf('$d-%s-%s-%s<br>', $id, $name, $sex, $email);
    }
}
echo '<hr>';
