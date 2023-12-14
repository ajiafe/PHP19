<?php
// 文件包含
// 本质: 将目录文件复制到当前位置

// 1. include
include __DIR__ . '/inc/f1.php';
// $username = '猪老师';
// 被包含文件共享作用域
echo $username . '<br>';

// echo $email . '<br>';
$email = include __DIR__ . '/inc/f1.php';
echo $email . '<hr>';

// 2. require
require __DIR__ . '/inc/f1.php';

echo $username . '<br>';

$email = require __DIR__ . '/inc/f1.php';
echo $email . '<br>';

// 3. include,require区别 
// 区别1
// include: 用到时再加载, 动态
// require: 应该写到顶部, 静态

// if (false) include __DIR__ . '/inc/f2.php';
// echo $site . '<br>';
// if (false) require __DIR__ . '/inc/f2.php';
// echo $site . '<br>';

//  区别2
// include: 加载失败,继续执行不中断
// requrie: 加载失败,中断退出

// include __DIR__ . '/inc/hello.php';
@include __DIR__ . '/inc/hello.php';

echo 'include后面的代码' . '<br>';

require __DIR__ . '/inc/hello.php';

echo 'require后面的代码' . '<br>';

// include_once: 只包含一次
// require_once: 只包含一次
