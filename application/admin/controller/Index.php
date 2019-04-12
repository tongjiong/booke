<?php
namespace app\admin\controller;
use app\common\controller\Base;
// use app\common\model\ClassModel;
// use think\facade\Request;
use think\facade\Request;
use think\facade\Session;

class Index extends Base

{
    public function index()
    {
    	$admin_info = [
    		'userid' => Session::get('aid'),		
    		'username' => Session::get('auser'),
    		'userimage' => Session::get('aimage'),
    		'userauth' => Session::get('auth'),
    	];

    	$this->assign('admin_info',$admin_info);
        return $this->fetch();
    }


    public function out(){
    	Session::clear();
    	return $this->fetch();
    }
}
