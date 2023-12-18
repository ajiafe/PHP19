<?php
// 开启会话
session_start();
// 根据用户的不同请求,执行不同的操作

// 比如:登录 , 注册, 退出

// 连接数据并获取用户表中的数据
$db = new PDO('mysql:dbname=phpedu', 'root', 'root');
$stmt = $db->prepare('SELECT * FROM `user`');
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// print_r($users);

$action = $_GET['action'];

switch (strtolower($action)) {
        // 登录
    case 'login':
        //要保证数据是通用POST请求发送的
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // 先拿到登录数据
            extract($_POST);
            // $email = $_POST['email'];
            // $password = sha1($_POST['password']);

            // $result 是数组 
            $result =  array_filter($users, function ($user) use ($email, $password) {
                return  $user['email'] === $email && $user['password'] === md5($password);
            });





            if (count($result) === 1) {
                // 验证成功,将用户信息写到SESSION
                // print_r(serialize(array_pop($result)));
                // $a = serialize(array_pop($result));
                // print_r(unserialize($a));

                // 将用户信息序列化之后保存到SESSION中
                $_SESSION['user'] = serialize(array_pop($result));
                exit('<script>alert("验证通过");location.href="index.php"</script>');
            } else {
                exit('<script>alert("邮箱或密码错误");location.href="index.php"</script>');
            }
        } else {
            die('请求错误');
        }
        break;

        // 退出
    case 'logout':
        if (isset($_SESSION['user'])) {
            session_destroy();
            exit('<script>alert("退出成功");location.assign("index.php")</script>');
        }

        break;

        // 注册
    case 'register':
        // 1. 获取到新用户的信息
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['psw1']);
        $register_time = time();

        // 2. 将新用户添加到表中
        $sql = 'INSERT user SET name=?,email=?,password=?,register_time=?';
        $stmt = $db->prepare($sql);
        $stmt->execute([$name, $email, $password, $register_time]);
        if ($stmt->rowCount() === 1) {
            echo '<script>alert("注册成功");locaton.href="index.php"</script>';
        } else {
            exit('<script>alert("注册失败");locaton.href="index.php"</script>');
        }

        break;
}
