<?php
// 查询与替换
// array_slice
// $stu = ['id' => 101, 'name' => '无忌', 'age' => 20, 'course' => 'php', 'grade' => 80];
// printf('<pre>%s</pre>', print_r($stu, true));
// 前2个
// $res = array_slice($stu, 0, 2);
// printf('<pre>%s</pre>', print_r($res, true));
// 后2个
// $res = array_slice($stu, -2, 2);
// $res = array_slice($stu, -2);
// printf('<pre>%s</pre>', print_r($res, true));

// array_splice
$arr = [10, 28, 9, 33, 56, 21, 82, 47];
printf('<pre>%s</pre>', print_r($arr, true));
// 删除： 第2个位置删除2个
// $res = array_splice($arr, 1, 2);
// printf('<pre>%s</pre>', print_r($res, true));
// printf('<pre>%s</pre>', print_r($arr, true));

// 更新： 第2个位置删除2个，使用新的数据来替换掉它
// $res = array_splice($arr, 1, 2, ['hello', 'world']);
// printf('<pre>%s</pre>', print_r($res, true));
// printf('<pre>%s</pre>', print_r($arr, true));

// 添加: 第2个位置删除0个，传入的新数据会追加到当前位置的后面
$res = array_splice($arr, 1, 0, ['hello', 'world']);
printf('<pre>%s</pre>', print_r($res, true));
printf('<pre>%s</pre>', print_r($arr, true));
