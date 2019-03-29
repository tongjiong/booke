<?php

// 基础控制器
namespace app\common\controller;

use think\Controller;//导入控制器
use think\facade\Session;
use think\facade\Request;

class Base extends Controller
{
	// 初始化方法 创建产量,公共方法
    public function initialize()
    {
        //判断有无admin_username这个session，如果没有，跳转到登陆界面
        if(!session('admin_id')){
            echo "<script>window.location.href ='./admin/Login/login_index';</script>";          
        }
    }
}

