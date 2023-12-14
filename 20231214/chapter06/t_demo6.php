<?php

/**
 * 类的扩展/抽象/最终
 * 1. protected: 受保护/可继承
 * 2. extends: 扩展/继承
 * 3. parent: 父类引用
 * 4. abstract: 抽象
 * 5. final: 最终类
 */

// 父类, 基类, 超类
class Person
{
    // protected: 成员可继承,可以在子类中使用
    protected $name;
    // private: 私有, 仅限当前类, 子类,外部都不可见
    private $id = 12345;
    // public: 类中,子类, 类外都可见
    public function __construct($name)
    {
        $this->name = $name;
    }

    // getInfo::protected
    // 比protected再严格的是 private, 比它更宽松的是: public
    protected function getInfo()
    {
        return $this->name;
    }
}

// 学生类
// extends: Stu这个类,扩展了Person类的功能 
class Stu extends Person
{
    // 1. 属性扩展
    private $lesson;
    private $score;

    // 2. 方法扩展/重写
    public function __construct($name, $lesson, $score)
    {
        // 引用了父类的构造方法
        // parent: 父类引用 Person
        parent::__construct($name);
        $this->lesson = $lesson;
        $this->score = $score;
    }

    public function getInfo()
    {
        // $this->name 
        // return $this->name . "同学, ($this->lesson : $this->score 分)";
        return parent::getInfo() . "同学, ($this->lesson : $this->score 分)";
    }
}

$stu = new Stu('小狗', 'PHP', 88);
echo $stu->getInfo();

echo '<hr>';
$person = new Person('小猪');
// var_dump只打印属性
var_dump($person);
echo '<hr>';

// 如果不想让用户直接使用父类,而必须通过继承/扩展的子类来间接使用
// 将父类声明为一个抽象类
abstract class Demo1
{
}

// (new Demo1);

class Demo2 extends Demo1
{
}
echo 'Demo2的父类是: ' . get_parent_class(new Demo2);

echo '<hr>';

abstract class Demo3
{
    // hello 方法已经被实现了
    // protected function hello()
    // {
    //     // ...
    // }

    // 抽象方法: 只有方法名,参数列表,没有具体实现(大括号)
    abstract protected function hello($name);
}

class Demo4 extends Demo3
{
    // 工作类Demo4中必须实现父类中的抽象成员
    public function hello($name)
    {
        return 'Hello , ' . $name;
    }
}

echo call_user_func([new Demo4, 'hello'], '牛老师');

echo '<hr>';

// 如果一个类不用扩展,直接当成工作类/直接干活的,直接new
// 为了防止被继承, 可声明为最终类
// final class Demo5
// {
// }

// class Demo6 extends Demo5
// {
// }
