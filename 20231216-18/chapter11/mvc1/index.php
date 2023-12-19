<?php
// 1. 连接数据库,创建连接对象
$db = new PDO('mysql:dbname=phpedu', 'root', 'root');

// 2. 创建预处理对象(SQL语句对象)
$stmt = $db->prepare('SELECT * FROM `staff` LIMIT 10');

// 3. 执行SQL
$stmt->execute();

// 4. 获取结果集
$staffs = $stmt->fetchAll();
// print_r($staffs);

// 5. 断开连接[可选]
// $db = null;


?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>员工管理系统</title>
</head>

<body>
    <table border="1" cellspacing="0" cellpadding="5" width="400">
        <caption style="font-size: 1.2em;">员工信息表</caption>
        <thead bgcolor="lightcyan">
            <tr>
                <th>id</th>
                <th>姓名</th>
                <th>性别</th>
                <th>邮箱</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody align="center">
            <?php foreach ($staffs as [$id, $name, $sex, $email]) : ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $name ?></td>
                    <td><?= $sex ? '女' : '男' ?></td>
                    <td><?= $email ?></td>
                    <td>
                        <a href="">编辑</a>
                        <a href="">删除</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>

<?php
// 数组解构,像ES6中也有
// list($a, $b, $c) = [100, 200, 300];
// 像ES6中一样,左边使用模板
// [$a, $b, $c] = [100, 200, 300];
// echo $a, $b, $c;
?>
