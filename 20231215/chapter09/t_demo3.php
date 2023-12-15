<!DOCTYPE html>
<html lang="zh-CN">

<?php
// $_FILES: PHP超全局变量数量, 保存着上传文件的全部信息
printf('<pre>%s</pre>', print_r($_FILES, true));

if (isset($_FILES['my_pic'])) {
    // 这时只需要遍历 $_FILES['my_pic']['error'] 这个数组
    foreach ($_FILES['my_pic']['error'] as $key => $error) {
        if ($error === 0) {
            // 临时文件名
            $tmpName = $_FILES['my_pic']['tmp_name'][$key];
            // 原始文件名
            $name = $_FILES['my_pic']['name'][$key];
            // 目标文件名
            $destFile = 'uploads/' . $name;
            move_uploaded_file($tmpName, $destFile);
            echo "<img src='$destFile' width='200'>";
        }
    }
}




?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>多文件上传2</title>


</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>多文件上传:逐个上传2</legend>
            <!-- 数组来表示每个要上传的表单域的名称  -->
            <input type="file" name="my_pic[]">
            <input type="file" name="my_pic[]">
            <input type="file" name="my_pic[]">
            <button>上传</button>
        </fieldset>
    </form>
</body>

</html>
