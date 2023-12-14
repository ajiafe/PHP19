<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 和 HTML 的关系</title>
</head>
<body>
    <h2>这是html写的h2标签</h2>
    <div>
        <?php
        echo "<h2 style='color:pink;'>这是PHP代码输出的h2标签</h2>"
        ?>
    </div>
   <p>
   观察源码,发现二者无任何区别,从而得到出以下结论:
    <ol>
        <li>html中所有元素必须以标签形式出现</li>
        <li>php做为元素嵌入到html中也要使用标签</li>
        <li>php与html混编时,必须使用双标签</li>
        <li>html代码中嵌入php代码,则扩展必须改为'php'</li>
        <li>html中的php代码,由服务器安装的php解析器执行</li>
        <li>php执行结果,最终以文本形式嵌入到html中,与为html一部分</li>
        <li>嵌入到html中的php执行结果, 就和普通html代码一样可以被浏览器识别,解析</li>
        <li>php代码对前端浏览器来说是不可见的,安全的</li>
    </ol>
   </p>
   
</body>
</html>