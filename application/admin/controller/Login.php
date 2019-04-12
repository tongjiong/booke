<?php
namespace app\admin\controller;
use think\Controller;
use app\common\model\AdminModel;
use think\facade\Request;
use think\facade\Session;

class Login extends Controller
{
	// 登录页
    public function index()
    {	
    	// $auser = Session::get('auser');
    	// dump($auser);
    	// Session::clear();
        return $this->fetch();
    }

    public function get_into(){
		

    	$userMsg = Request::param();
    	//检测非法操作
    	$key = substr($userMsg['key'], 0, 5);
        if(md5($key) != 'ec732ac001f46cdc75d4bbc308b58f99' || !$key || empty($key)){
           return dump();
        }

        $userFind = AdminModel::where(['username'=> $userMsg['username']])->find();

		if(!$userFind){
            return json([
                'code'  => 3,
                'msg'   => '请检查账号是否正确!',
            ]);
        }

    	if(md5($userMsg['password']) != $userFind['password']){
	        return json([
                'code'  => 4,
                'msg'   => '请检查密码是否正确!',
	        ]);
    	}

    	if(!captcha_check($userMsg['tell'])){
	        return json([
                'code'  => 5,
                'msg'   => '请检查验证码是否正确!',
	        ]);
		};

    	Session::set('aid',$userFind['admin_id']);
    	Session::set('auser',$userFind['username']);
    	Session::set('aimage',$userFind['image']);
    	Session::set('auth',$userFind['auth']);
    	$res = [
            'code'  => 1,
            'msg'   => '登录成功!',
	    ];
            
    	return json($res);
    }
}
