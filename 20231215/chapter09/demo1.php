<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文件上传</title>
</head>
<body>

<?php
// 处理文件上传
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDir = "uploads/"; // 上传目录
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // 检查文件是否为图像
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "文件是一个图像 - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "文件不是一个图像.";
            $uploadOk = 0;
        }
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
