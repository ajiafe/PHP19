<?php 
$users = [
    0=> ['id'=>5,'name'=>'zhangsan', 'gender'=>0,'age'=>18,],
    1=> ['id'=>6,'name'=>'lisi', 'gender'=>1,'age'=>17,],
    2=> ['id'=>7,'name'=>'wangwu', 'gender'=>0,'age'=>23,],
];
// foreach(数组 as 键名=>值)

$table = '<table border="1" cellspaceing="0" cellpadding="4">';
$table .= '<caption>用户信息表</caption>';
$table .= '<thead><tr><th>id</th><th>name</th><th>gender</th><th>age</th></tr></thead>';
$table .= '<tbody>';


// foreach($users as $key => $user) {
foreach($users as $user) {
    print_r($user);
    $table .= '<tr>';
    $table .= '<td>'. $user['id'] . '</td>';
    $table .= '<td>'. $user['name'] . '</td>';
    $table .= '<td>'. ($user['gender'] ? '女' : '男') . '</td>';
    $table .= '<td>'. $user['age'] . '</td>';
    $table .= '</tr>';

};
$table .='</tbody></table>';

echo $table;