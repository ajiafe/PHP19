<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件上传和超全局变量 $_FILES</title>
</head>
<body>

<?php
// $_FILES php 超全局变量 这个是一个二维数组
printf('<pre>%s</pre>', print_r($_FILES, true));
/**
 * Array
(
    [fileToUpload] => Array
        (
            [name] => img-green.png
            [type] => image/png
            [tmp_name] => /Applications/MAMP/tmp/php/phpdXGzRe
            [error] => 0
            [size] => 31555
        )

)
 * 每个图片都是一个数组 包含了 名字 类型 php服务器临时目录 错误状态码 文件大小
 */
// printf('<pre>%s</pre>',print_r($_SERVER,true));
// 处理文件上传
/**
 * 上传的文件必须是post请求
 * 保证文件必须存在
 */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDir = "uploads/"; // 上传目录
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    // 把字符串全部变成小写格式 获取文件的扩展名PATHINFO_EXTENSION
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    printf('<pre>%s</pre>', print_r($_POST, true));

    /**
     * 文件上传 错误原因 官方文档
     * https://www.php.net/manual/zh/features.file-upload.errors.php
     * */
    $error = $_FILES['fileToUpload']['error'];
    if($error > 0) {

        switch($error) {
            case 1:
                $tips = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值';
                break;
            case 4:
                $tips = '没有文件被上传';
                break;

        }
        echo "<p>$tips</p>";

    } else {
        echo '<span style="color:green;font-weight:500;">文件上传成功</span>';

    }

    // 检查文件是否已存在
    if (file_exists($targetFile)) {
        echo "抱歉，文件已存在.";
        $uploadOk = 0;
    }

    // 检查文件大小
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "抱歉，文件太大.";
        $uploadOk = 0;
    }

    // 允许特定文件格式
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "抱歉，仅支持 JPG, JPEG, PNG, GIF 文件.";
        $uploadOk = 0;
    }

    // 检查 $uploadOk 是否为 0
    if ($uploadOk == 0) {
        echo "抱歉，文件未上传.";
    } else {
        // 如果一切都正常，尝试上传文件
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "文件 " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " 已成功上传.";
        } else {
            echo "抱歉，文件上传过程中发生错误.";
        }
    }
}
?>

<!-- HTML 表单 -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    选择要上传的文件:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="上传文件" name="submit">
</form>

</body>
</html>
