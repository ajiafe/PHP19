<?php

/**
 * 类成员
 * (一) 常规成员
 *  1. 属性: 可以被其它方法所共享
 *  2. 方法: 自定义, 魔术方法
 * 
 * 访问限制符:
 *  1. private: 私有,仅限在当前类中使用
 *  2. protected: 继承, 可在本类或子类中使用, 不对外公开
 *  3. public: 公共/公共,默认
 * 
 * (二) 静态成员
 *  1. static, 静态属性, 静态方法
 *  2 . 与类实例无关, 静态成员 不要用$this
 *  3 . 内部用self, 外部用类名
 *  
 */

class User1
{
    // 常规成员
    // 1. 属性
    // 语法: 访问限制符 类成员声明
    // 声明为私有, 实现封装
    private $username;

    // 2. 方法
    // 2.1 自定义方法: 用户自己声明自己调用
    public function getUsername()
    {

        // -> 对象成员访问符
        // 当前实例的引用, $this 与实例绑定的
        return $this->username;
    }

    // 2.2 魔术方法: 由系统来调用,用户不能直接调用
    // 构造方法: 实例化进自动调用
    public function __construct(string $username)
    {
        $this->username = $username;
    }
}


// 实例化
$user1 = new User1('张老师');
echo $user1->getUsername();


echo '<hr>';

class User2
{
    // 静态属性
    private static $username = 'admin';


    // 类常量: 与实例无关,用类访问
    const APP = '商城';

    // 方法
    public static function getUsername()
    {

        // self: 功能与$this类似, 与当前类 User2 绑定
        return self::$username;
    }
}

// 实例访问静态方法是一个兼容bug, 能成功,但不要再用了
// echo (new User2)->getUsername();
// 应该永远用类来访问静态成员
echo User2::getUsername();
echo User2::APP;
