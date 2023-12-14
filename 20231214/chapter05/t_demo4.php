<?php
// ! 值
$arr = [30, 4, 82, 15, 20, 'abc', 'hello', 2, 46];
// printf('原始:<pre>%s</pre>', print_r($arr, true));
// 升序
// sort($arr);
// 确保原关系不变， 原来的键与值的对应不发生变化 
// asort($arr);
// printf('升序:<pre>%s</pre>', print_r($arr, true));
// 降序
// rsort($arr);
// arsort($arr);
// printf('升序:<pre>%s</pre>', print_r($arr, true));

// ! 键
$arr = ['e' => 10, 'a' => 30, 'p' => 50];
// ksort($arr);
krsort($arr);
printf('降序:<pre>%s</pre>', print_r($arr, true));

// 打乱

$blue = range(1, 16); // [1,2,3,4,5,6....... 16]
shuffle($blue);
printf('<pre>%s</pre>', print_r($blue, true));
