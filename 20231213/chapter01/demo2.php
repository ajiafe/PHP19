<?php
echo "纯php文件,不要加结束标签,除非与html混编" . "<br/>";
echo "<h2>一个页面就是一个应用程序, 相当于exe, 可以被执行,只不过在服务器执行</h2>" . "<br/>";

echo "<h3>变量与函数</h3>";

// 变量和函数组成
$username = "张三";

echo "$username" . "<br/>";

$age = 18;

var_dump($username); // string(6) "张三" utf-8 一个中文占3个字符
echo '<hr>';
var_dump($age); // int(18)
echo '<hr>';
function getMsg(string $username, string $msg): string
{
    global $age;
    return "hello! 我是$username,今年$age 岁, $msg";
};
echo getMsg($username, '我爱学习PHP') . '<br/>';


function totalMoney(float $price, int $count=1) : float {
    return $price * $count;
};

echo totalMoney(2.5,4) . '元<br/>';

echo totalMoney(2.5) . '元<br/>';

echo "1. 变量不用声明,直接用" . "<br/>" .
"2. 使用双号号声明字符串模板中可嵌入变量" . "<br/>" .
"3. 函数先声明,再调用" . "<br/>" .
"4. 函数参数不足: 默认值" . "<br/>" .
"5. 函数参数过多: 剩余参数...rest" . "<br/>" . 
"6. 函数默认单值返回,返回多值请用数组或对象" . "<br/>";

