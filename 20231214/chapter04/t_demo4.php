<?php

// ! 字符串常用函数

// ? 1. string <-> array
// explode: string -> array
// $str = 'mysql:dbname=phpedu;root;root';
// $arr = explode(';', $str);
// printf('<pre>%s</pre>', print_r($arr, true));

// join: array->string , js中也有一个join,功能与php中的join一样
// $colors = ['red', 'green', 'blue'];
// echo join(', ', $colors) . '<br>';
// echo implode(', ', $colors) . '<br>';

// ? 2. 查询与替换

// $str = 'php.cn';

// "php"
// substr(string $string, int $offset, ?int $length): string
// echo substr($str, 0, 3) . '<br>';
// "cn"
// echo substr($str, -2, 2) . '<br>';
// echo substr($str, -2) . '<br>';

// strstr
// $img = 'banner.png';
// ".png"
// echo strstr($img, '.') . '<br>';
// "banner"
// echo strstr($img, '.', true) . '<br>';
// $email = '498668472@qq.com';
// echo 'QQ: ' . strstr($email, '@', true) . '<hr>';

// strpos
// 0: 索引, 表示第一个字符就是,找到了
// echo strpos('php.cn', 'p') . '<br>';
// 可以指定查询起点
// echo strpos('php.cn', 'p', 1) . '<br>';
// echo strpos('php.cn', 'p', 3) ? 'OK' : '没找到' . '<hr>';

// str_replace
// 带有命名空间的完整的类名
// $class = '\admin\controllers\User';
// 类的自动加载器
// 将这个类名->类的路径上, 然后用require
// '\admin\controllers\User' => '/admin/controllers/User.php';

// windows: / \,  linux/macos: /
// $path = str_replace('\\', '/', $class) . '.php';
// DIRECTORY_SEPARATOR: 能动识别操作系统,使用适当的路径分隔符
// $path = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
// echo $path . '<br>';

// 违禁词
// echo str_replace(['交友', '异性', '带货'], '**', '我用交友软件找了一个会带货的异性女友') . '<hr>';
// echo str_replace(['交友', '异性', '带货'], ['JY', 'YX', 'DH'], '我用交友软件找了一个会带货的异性女友') . '<hr>';


// ? 3. 删除指定字符

$str = 'php.cn';
echo strlen($str) . '<br>';

$str = '       php.cn  ';
echo strlen($str) . '<br>';
echo strlen(trim($str)) . '<br>';
// trim(string $string, string $characters = " \t\n\r\0\x0B"): string { }
$path = '/0421/';
echo $path, ' => ', trim($path, '/') . '<br>';
echo $path, ' => ', ltrim($path, '/') . '<br>';
echo $path, ' => ', rtrim($path, '/') . '<br>';
$tags = '<h1>Hello world</h1><?php echo "给我一百万, 否则黑了你的服务器" ?>';
echo strip_tags($tags) . '<hr>';

// ? 4. url相关
// printf('<pre>%s</pre>', print_r($_SERVER, true));
//  [QUERY_STRING] => a=1&b=2&c=3
echo $_SERVER['QUERY_STRING'] . '<br>';
$arr = explode('&', $_SERVER['QUERY_STRING']);
// printf('<pre>%s</pre>', print_r($arr, true));
// queryString -> array
parse_str($_SERVER['QUERY_STRING'], $arr);
// printf('<pre>%s</pre>', print_r($arr, true));

$userArr = ['id' => 1, 'username' => 'admin', 'role' => 'manager'];
// id=1&username=admin&role=manage 
// echo http_build_query($userArr) . '<br>';

// printf('<pre>%s</pre>', print_r($_GET, true));

$url = 'http://php.edu/0421/demo4.php?a=1&b=2&c=3&id=1';

$arr = parse_url($url);
printf('<pre>%s</pre>', print_r($arr, true));

echo $_SERVER['QUERY_STRING'];

echo '<hr>';

echo parse_url($url)['query'];

echo  parse_url($url)['query'] === $_SERVER['QUERY_STRING'] ? '相等' : '不等';
