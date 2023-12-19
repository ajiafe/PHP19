<?php

namespace phpcn;

use PDO;

class Model
{
    // 连接对象
    protected $db;

    // 模型实例化时,应该将数据库连接上,为后面的操作做好准备
    public function __construct($dsn, $username, $password)
    {
        $this->db =  new PDO($dsn, $username, $password);
    }

    // 通常模型类中,会预置一些公共方法,供用户进行数据库操作
    // 获取分页数据(多条)
    public function getAll($n = 10)
    {
        $stmt = $this->db->prepare('SELECT * FROM `staff` LIMIT ?');
        // 默认绑定的都是字符串类型
        $stmt->bindParam(1, $n, PDO::PARAM_INT);
        $stmt->execute();
        // print_r($stmt->debugDumpParams());
        return $stmt->fetchAll();
    }
}

// 测试语句
// print_r((new Model('mysql:dbname=phpedu', 'root', 'root'))->getAll());
