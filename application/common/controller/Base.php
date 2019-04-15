<?php

// 基础控制器
namespace app\common\controller;

use think\Controller;//导入控制器
use app\common\model\AdminModel;
use think\facade\Session;
use think\facade\Request;


class Base extends Controller
{
	// 初始化方法 创建产量,公共方法
    public function initialize()
    {
        //判断有无auser这个session，如果没有，跳转到登陆界面
        if(!Session::get('auser')){
            echo "<script>window.location.href ='admin/Login/index';</script>";          
        }
    }

    //获取Session 管理员id
    public function seuid(){
    	return Session::get('aid');
    }

    //获取Session 管理员信息
    public function semsg(){
        return AdminModel::where('admin_id',$this->seuid())->find();
    }
}

