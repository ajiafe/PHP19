<?php
// 数组函数
// ! 1. 与值相关
$arr = [3 => 10, 9 => 20, 0 => 'html', 'id' => 'css', 20 => 20, 30];
// printf('<pre>%s</pre>', print_r($arr, true));
// array_values
// printf('<pre>%s</pre>', print_r(array_values($arr), true));
// in_array
// var_dump(in_array('html', $arr));
// echo '<hr>';

// array_search
// $key = array_search('20', $arr);
// echo $arr[$key] . '<br>';

// array_unique: 去重
// printf(
//     '<pre>%s</pre>',
//     print_r(array_unique($arr), true)
// );

// ! 2. 统计
// echo count($arr);

function sum(...$args)
{
    // return array_reduce($args, function ($acc, $cur) {
    //     return $acc + $cur;
    // }, 0);

    return array_sum($args);
}

echo sum(1, 2, 3, 4, 5, 6, 7);  // 15

echo '<hr>';

function mul(...$args)
{
    // return array_reduce($args, function ($acc, $cur) {
    //     return $acc * $cur;
    // }, 1);

    return array_product($args);
}

echo mul(2, 3, 4, 5);  // 24
