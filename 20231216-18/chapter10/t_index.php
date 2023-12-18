<?php
session_start();
// 判断用户是否已经登录?
if (isset($_SESSION['user'])) $user = unserialize($_SESSION['user']);
// print_r($user);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <nav>
        <?php if (isset($user)) : ?>
            <a href="" id="logout">退出</a>

        <?php else : ?>
            <a href="login.php">登录</a>
        <?php endif ?>
    </nav>
    <script>
        document.querySelector('#logout').addEventListener('click', function(event) {
            if (confirm('是否退出?')) {
                // 禁用默认跳转行为
                event.preventDefault();
                // 跳转到处理器
                location.assign('handle.php?action=logout');
            }
        });
    </script>
</body>

</html>
