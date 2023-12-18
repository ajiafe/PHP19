<!-- 控制器 -->
<?php
// echo 'handle' . '<br>';

// echo $_GET['action']  . '<br>';

// printf('<pre>%s</pre>',print_r($_POST,true)). '<br>';

// echo $_POST['password']  . '<br>';

// $action = $_GET['action'];
// 开启会话
session_start();
// 根据用户的不同请求,执行不同的操作

// 比如:登录 , 注册, 退出

// 连接数据并获取用户表中的数据
$conn = new PDO('mysql:dbname=phpdev', 'root', 'root');
$stmt = $conn->prepare('SELECT * FROM `user`');
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

printf('<pre>%s</pre>', print_r($user, true)) . '<br>';

$action = $_GET['action'];

echo $action . '<br>';

switch (strtolower($action)) {
    // 登录  需要校验 用户名和密码是否正确 登录成功跳转到首页
    case 'login':
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 结构登录用户数据
            // extract($_POST);
            $email = $_POST['email'];
            $password = $_POST['password'];
            // 校验密码和邮箱是否正确

            $result = array_filter($users, function ($user) use ($email, $password) {
                return $email === $user['email'] && $password === $user['password'];

            });

            formatPrint($result);

            if(count($result) === 1) {
                // 将用户信息序列化之后保存到SESSION中
                $_SESSION['user'] = serialize(array_pop($result));
                exit('<script>alert("登录成功！");location.href="index.php"</script>');
            }

        } else {
            die('非法的请求方法');
        };
        break;
        // 注册 需要链接数据库 创建新用户 注册成功并跳转到首页 前提校验是否存在该用户
    case 'register':
        // 1. 获取到新用户的信息
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $register_time = time();

        formatPrint($_POST);

        // 2. 将新用户添加到表中
        $sql = 'INSERT user SET name=?,email=?,password=?,register_time=?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $email, $password, $register_time]);


        if ($stmt->rowCount() === 1) {
            echo '<script>alert("注册成功");location.href="index.php"</script>';
        } else {
            exit('<script>alert("注册失败");location.href="index.php"</script>');
        }
        break;
        // 退出 清除用户的登录信息 跳转到首页
    case 'logout':
        if (isset($_SESSION['user'])) {
            session_destroy();
            exit('<script>alert("退出成功");location.assign("index.php")</script>');
        }
        break;
}


function formatPrint(array $arr)
{
    printf('<pre>%s</pre>', print_r($arr, true)) . '<br>';
}
