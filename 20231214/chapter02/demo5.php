<!-- 使用二维数组来模拟数据表查询结果 -->
<?php
    $stus = [
         ['id' => 5,'name' => 'zhangsan', 'course' => 'js','score' => 68,],
         ['id' => 6,'name' => 'lisi', 'course' => 'php','score' => 97,],
         ['id' => 7,'name' => 'wangwu', 'course' => 'java','score' => 93,],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php 和 html 混编</title>
</head>
<body>
   <table border='1'>
    <caption>学生成绩表</caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>课程</th>
            <th>成绩</th>
        </tr>
    </thead>
    <tbody>
        <?php

foreach($stus as $stu) {
    // echo '<tr>';
    // echo '<td>' . $stu['id'] . '</td>';
    // echo '<td>' . $stu['name'] . '</td>';
    // echo '<td>' . $stu['course'] . '</td>';
    // echo '<td>' . $stu['score'] . '</td>';
    // echo '</tr>';

    //上面的写法echo t太麻烦 heredoc  写模版 可以解析内部变量
    // echo <<< STU
    //     <tr>
    //         <td>{$stu['id']}</td>
    //         <td>{$stu['name']}</td>
    //         <td>{$stu['course']}</td>
    //         <td>{$stu['score']}</td>
    //     </tr>
    // STU;

    // 查询 只输出php

    if($stu['course'] === 'php') {
        echo <<< STU
            <tr>
                <td>{$stu['id']}</td>
                <td>{$stu['name']}</td>
                <td>{$stu['course']}</td>
                <td>{$stu['score']}</td>
            </tr>
        STU;
    };
}
?>
        
    </tbody>
   </table>
</body>
</html>