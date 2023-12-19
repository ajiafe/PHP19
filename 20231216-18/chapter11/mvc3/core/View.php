<?php

namespace phpcn;

class View
{
    public function display($data)
    {
        // 1. 模型赋值
        $staffs = $data;

        // 2. 渲染模型
        include ROOT_PATH . '/view/' . 'show.php';
    }
}
