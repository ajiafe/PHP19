<!DOCTYPE html>
<html lang="zh-CN">

<?php
session_start();
// 判断用户是否已经登录?
if (isset($_SESSION['user'])) echo '<script>alert("不要重复登录");locatoin.href="index.php"</script>';

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户登录表单</title>
</head>

<body>

    <form action="handle.php?action=login" method="POST">
        <fieldset style="display: inline-block;background:lightcyan">


            <legend>用户登录</legend>
            <p>
                <input type="email" name="email" placeholder="user@email.com" require>
            </p>
            <p>
                <input type="password" name="password" placeholder="不少于6位" require>
            </p>

            <p>
                <button>提交</button>
            </p>

        </fieldset>

        <a href="register.php">如果没有帐号,请先登录</a>
    </form>


</body>

</html>
