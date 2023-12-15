<?php require 'demo5.php' ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>页面展示分页数据</title>
    <style>
        table {
            width: 400px;
            border-collapse: collapse;
            text-align: center;
        }

        table th,
        table td {
            border: 1px solid;
            padding: 5px;
        }

        table thead {
            background-color: lightcyan;
        }

        table caption {
            font-size: larger;
            margin-bottom: 8px;
        }

        p>a {
            text-decoration: none;
            color: #555;
            border: 1px solid;
            padding: 5px 10px;
            margin: 10px 2px;
        }

        .active {
            background-color: seagreen;
            color: white;
            border: 1px solid seagreen;
        }
    </style>
</head>

<body>
    <table>
        <caption>员工信息表</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>性别</th>
                <th>邮箱</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staffs as $staff) : extract($staff) ?>
                <tr>
                    <td><?= $id ?></td>
                    <td><?= $name ?></td>
                    <td><?= $sex ?></td>
                    <td><?= $email ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <p>
        <?php for ($i = 1; $i <= $pages; $i++) : ?>
            <!-- <a href="<?= $_SERVER['PHP_SELF'] . '?p=' . $i ?>" class="<?= ($i == $_GET['p']) ? 'active' : null ?>"><?= $i ?></a> -->

            <?php
            $url = $_SERVER['PHP_SELF'] . '?p=' . $i;
            $active = $i == $_GET['p'] ? 'active' : null;
            ?>
            <a href="<?= $url ?>" class="<?= $active ?>"><?= $i ?></a>

        <?php endfor ?>
    </p>
</body>

</html>
