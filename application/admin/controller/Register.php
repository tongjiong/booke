<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\AdminModel;

class Register extends Controller
{
	// 注册
    public function registered_account_number()
    {	
    	$data = [
    		[
    			'username' => 'superAdmin',
    			'password' => md5('p0o9i8'),
    			'auth'	   => '1'
    		],
    		[
    			'username' => 'userAdmin',
    			'password' => md5('q1w2e3'),
    			'auth'	   => '0'
    		]
    	];
    	$res = AdminModel::insertAll($data);
    	if($res){
    		return $this->success('添加成功');
    	}else{
    		return $this->error('添加失败');
    	}
    }
}
