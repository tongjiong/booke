<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return '<h2 style="color:red;">猴子借钱同炯钱，不借直杰，天理不容！</h2>';
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
