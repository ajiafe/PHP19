<?php

/**
 * 类与实例
 * 1. class
 * 2. new
 */


// 类声明
// 1. class
class Goods
{
    // ...
}

// 类的实例化: 创建对象的过程, new
$goods = new Goods;
var_dump($goods);

// 车: class
// 轿车: obj

echo '<hr>';

echo get_class($goods) . '<br>';


// 动态类
$str = 'goods';

// 大驼峰/帕斯卡
$class = ucfirst('goods');
// echo $class;

$o = new $class;
var_dump($o);

var_dump($o instanceof Goods);

// typeof 
