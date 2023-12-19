<?php

namespace phpcn;

// 框架的入口文件 
// 访问入口文件, 实际上执行某个控制器中的某个方法,实现某种功能
// 执行入口文件,实际上就是调用控制器中的方法

// 加载模型类: M
require __DIR__ . '/model/Model.php';

// 加载视图类: V
require __DIR__ . '/view/View.php';

// 加载控制器类: C
require __DIR__ . '/controller/Controller.php';

// 实例化模型类
$model = new Model('mysql:dbname=phpedu', 'root', 'root');

// 实例化视图类
$view = new View();

// 实例化控制器类
$controller  = new Controller($model, $view);

// 执行控制器中的index
echo $controller->index();
