<?php

namespace phpcn;

class Controller
{
    // 模型对象
    protected $model;
    // 视图对象
    protected $view;

    // 控制器类实例时,要确保模型和视图对象可用
    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function index()
    {
        // 1. 模型: 获取数据
        $data = $this->model->getAll(2);

        // 2. 视图: 渲染模板
        $this->view->display($data);
    }
}
