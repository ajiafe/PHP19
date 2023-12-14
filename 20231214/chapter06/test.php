<?php

// 字面量
// 10, 'abc', [1,2,3]

// 变量: 数据的复用
$a = 10;
$b = 20;

// echo $a + $b;
// echo $a + $b;
// echo $a + $b;
// echo $a + $b;
// echo $a + $b;

// 函数: 操作的复用
function add($a, $b)
{
    return $a + $b;
}


// echo add(1, 2);
// echo add(3, 5);

echo add($a, $b);

// 将一组相关的变量和函数进行组合,形成一个新的编码单元,来简单化代码,实现"代码复用"

// 对象  = 变量 + 函数 

// $obj = {
//     x:1,
//     y:2,
//     add(){
//         //....
//     }
// }

// php对象是基于'类", 类是对象的模板
class A
{
}

new A;
