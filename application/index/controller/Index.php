<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return '<h2 style="color:red;">弘德 请他吃饭 请他睡觉 请他抽烟 叫帮我做张图都不给我做，天理不容!</h2>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
