<?php
namespace app\admin\controller;
use app\common\controller\Base;
use app\common\model\BannerModel;
use think\facade\Request;
use think\facade\Session;

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
    
    // 添加操作
    public function banner_insert(){
    	$param_data = Request::param();
    	$data = BannerModel::create($param_data);
    	// dump($data);
    }	
}
