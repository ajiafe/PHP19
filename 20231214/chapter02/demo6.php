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
    <title>php的模板语法</title>
    <style>
        .red{
            color: red;
        }
        .green {
            color:green;
        }
    </style>
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
        <!-- php模板语法的目标就是让php和html代码分离 -->
        <?php foreach ($stus as $stu): ?>
            <!-- 开始标记： 冒号  结束标记 end+语法命令 -->
             <!-- 使用短标签简化写法 使用条件： 只打印一个变量的时候 -->
                <!-- 把 ?php echo  简化成 ?= -->
            <!-- <tr>
                <td><?php echo $stu['id'] ?></td>
                <td><?= $stu['name'] ?></td>
                <td><?= $stu['course'] ?></td>
                <td><?= $stu['score'] ?></td>
            </tr> -->

            <!-- 条件判断 只输出成绩大于90分的 -->
            <!-- <?php if($stu['score'] > 90): ?>
                <tr>
                    <td><?= $stu['id'] ?></td>
                    <td><?= $stu['name'] ?></td>
                    <td><?= $stu['course'] ?></td>
                    <td><?= $stu['score'] ?></td>
                </tr>
            <?php endif ?> -->

            <!-- 成绩判断 -->

            <!-- <tr>
                <td><?php echo $stu['id'] ?></td>
                <td><?= $stu['name'] ?></td>
              
               <td><?= $stu['course'] ?></td>
               <?php if($stu['score'] > 90): ?>
                <td class="green"><?= $stu['score'] ?></td>
                <?php endif ?>
                <?php if($stu['score'] <= 90): ?>
                <td class="red"><?= $stu['score'] ?></td>
                <?php endif ?>
            </tr> -->

            <!-- 再简洁一些 -->

            <tr>
                <td><?php echo $stu['id'] ?></td>
                <td><?= $stu['name'] ?></td>
              
               <td><?= $stu['course'] ?></td>
               <td class="<?= $stu['score'] > 90 ? 'green' : 'red' ?>  " >
                <?= $stu['score'] ?>
                </td>
               
             
               
            </tr>



        
        <?php endforeach ?>
        
    </tbody>
   </table>
</body>
</html>