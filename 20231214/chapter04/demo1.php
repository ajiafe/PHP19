<?php
// php 只有函数作用域 没有块作用域 函数之外都是全局作用域

if(true) {
    $a =10;
};

echo $a . '<br/>';
// 奇葩  '' 空串这个变量名是合法的
define('','我爱PHP');
// 拿不到这个常量
echo '' . '<hr>';
// 使用 constant()
echo constant('') . '<hr>';
// 定义常量方法
define('PHP_VERSION','8.0.0');
// const PHP_VERSION = '9.0.0';
echo 'PHP版本'. PHP_VERSION . '<br/>';

const USRE_NAME = "PHP-KING";
echo USRE_NAME . '<br/>';

define('USER_AGE',20);
echo USER_AGE . '<br/>';

// 预定义常量
echo PHP_OS . '<br/>';

// 魔术常量 总是有一个特定的值 可以更新 但是不是用户更新而是系统更新

echo '当前代码的行数是：' . __LINE__ . '<br/>';
echo '当前文件 ' . __FILE__ . '<br/>';
echo '当前文件路径 ' . __DIR__ . '<br/>';

echo '<h3>Nowdoc和Heredoc是PHP中两种不同的字符串处理方式。 Nowdoc就像单引号，不会解析字符块中的变量。 Heredoc就像双引号，执行时会解析字符块中的变量</h3>';

