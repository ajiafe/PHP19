<?php
// ! 作用域

// * php只有函数作用域,没有块作用, 函数之外全是全局作用域
if (true) {
    $a = 10;
    //js
    // let $a = 10;
}

echo $a, '<br>';

$name = '猪老师';

// $hello = function (): string {
// 函数中不能访问到外部的变量,这和js不一样
// return 'Hello , ' . $name;
// };

echo $hello() . '<hr>';

// ? 1.  global
$hello = function (): string {
    // 使用关键字 global引用一下外部变量
    global $name;
    return 'Hello , ' . $name;
};

echo $hello() . '<hr>';

// ? 2.  use ()
$hello = function () use ($name): string {
    return 'Hello , ' . $name;
};

echo $hello() . '<hr>';

// 'name' => $name
// print_r($GLOBALS['name']);


// ? 3.  $GLOBALS
$hello = function (): string {
    return 'Hello , ' . $GLOBALS['name'];
};

echo $hello() . '<hr>';

$hello = function (): string {
    // 私有变量 会覆盖全局中的同名变量
    $name = '牛老师';
    return 'Hello , ' . $name;
};

echo $hello() . '<hr>';
