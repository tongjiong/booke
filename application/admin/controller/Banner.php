<?php
namespace app\admin\controller;
use app\common\controller\Base;
use app\common\model\banner_surface;

class Banner extends Base
{
    public function banner_index()
    {
        return $this->fetch();
    }

    public function banner_add()
    {
        return $this->fetch();
    }
}
