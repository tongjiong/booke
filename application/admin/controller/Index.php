<?php
namespace app\admin\controller;
use app\common\controller\Base;
// use app\common\model\ClassModel;
// use think\facade\Request;

class Index extends Base

{
    public function index()
    {
        return $this->fetch();
    }

}
