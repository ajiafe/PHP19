<?php
// 再谈数组遍历
// ! 1. 指针遍历
$stu = ['id' => 1, 'name' => 'Jack', 'course' => 'php', 'score' => 90];
// key(), current()
// printf('[%s]=>%s<br>', key($stu), current($stu));
// 后移
// next($stu);
// printf('[%s]=>%s<br>', key($stu), current($stu));
// next($stu);
// printf('[%s]=>%s<br>', key($stu), current($stu));
// next($stu);
// printf('[%s]=>%s<br>', key($stu), current($stu));
// 前移
// prev($stu);
// printf('[%s]=>%s<br>', key($stu), current($stu));
// 复位, 第一个
// reset($stu);
// printf('[%s]=>%s<br>', key($stu), current($stu));
// 最后
// end($stu);
// printf('[%s]=>%s<br>', key($stu), current($stu));

// ! 2. 自动遍历
// $stu = [];
// if (count($stu) > 0) {
//     while (true) {
//         printf('[%s]=>%s<br>', key($stu), current($stu));
//         if (next($stu)) continue;
//         else break;
//     }
// } else {
//     echo '空数组';
// }

// ! 3. 快捷遍历
// foreach ($stu as $key => $value) {
//     printf('[%s]=>%s<br>', $key, $value);
// }
// foreach 还能遍历对象

// ! 4. 解构遍历
// 索引数组
list($id,  $name) = [10, 'Tony'];
// list 不是函数，因为函数不能放在等号左边， 不能用在“左值” 
printf('$id = %s, $name = %s<br>', $id, $name);

// 关联数组
list('id' => $id, 'name' => $name) = ['id' => 10, 'name' => 'Tony'];
printf('$id = %s, $name = %s<br>', $id, $name);
echo '<hr>';

// 解构通常用来遍历二维或以上的数组
$users = [
    ['id' => 10, 'name' => 'Tony'],
    ['id' => 11, 'name' => 'John'],
    ['id' => 12, 'name' => 'Jerry'],
];
// foreach
foreach ($users as list('id' => $id, 'name' => $name)) {
    // print_r($user);
    // printf('$id = %s, $name = %s<br>', $user['id'], $user['name']);
    printf('$id = %s, $name = %s<br>', $id, $name);
}
