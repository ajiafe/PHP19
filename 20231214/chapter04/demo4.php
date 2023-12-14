<?php
echo '<h3>字符串转数组: explode()</h3>' .'<br/>';

$str = 'abcd';
$arr = str_split($str);
print_r($arr) ;
echo '<br/>';
echo $arr;

// $str1 = 'a,b,c,d,e';
// $arr1 = explode(',',$str1);
$str1 = 'mysql:dbname=php19;root:root';
$arr1 = explode(';',$str1);

// print_r($arr1);
printf('<pre>%s</pre>',print_r($arr1,true));
echo '<br/>';

echo '<h3>数组转字符串: join() 和js中的一样</h3>' .'<br/>';
$colors = ['red','green','pink'];

$color_str = join(';',$colors);
echo $color_str . '<hr>';

echo implode(',',$colors) . '<hr>';

echo 'implode() 和 join() 方法完全一样' . '<hr>';

echo '<h3>查询与替换</h3>' .'<br/>';

$domain_url = 'php19.test';
$domain_name = substr($domain_url,0,5);
echo $domain_name . '<br>';
$domain_dot = substr($domain_url,-4);
echo $domain_dot . '<br>';

echo '<h3>strstr() 获取某个字符首次出现的位置 然后把这个字符以及后面的字符全部拿到  实际应用获取文件的扩展名 之类的</h3>' .'<br/>';

$img = 'banner.png';
// ".png"
echo '获取文件banner.png 的扩展名'. strstr($img, '.') . '<br>';

echo '获取文件banner.png 的扩展名前面的内容'. strstr($img, '.',true) . '<br>';

$email = '498668472@qq.com';
echo 'QQ: ' . strstr($email, '@', true) . '<hr>';

echo '<h3>strpos() /h3>' .'<br/>';

echo strpos('我爱学习编程，我爱PHP','我') . '<br>';
// 注意这里的一个中文字符占三个索引相对于英文来讲
echo strpos('我爱学习编程，我爱PHP','P') . '<br>';
echo strpos('HAH我爱学习编程，我爱PHP','H') . '<br>';
echo strpos('HAH我LOVE爱学习编程，我爱PHP','H',1) . '<br>';
echo strpos('我LOVE爱学习编程，我爱PHP','L') . '<br>';


// 违禁词
echo str_replace(['交友', '异性', '带货'], '**', '我用交友软件找了一个会带货的异性女友') . '<hr>';
echo str_replace(['交友', '异性', '带货'], ['JY', 'YX', 'DH'], '我用交友软件找了一个会带货的异性女友') . '<hr>';