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
    	Session::clear();
        return $this->fetch();
    }

    public function get_into(){
        
        if(!Request::isAjax()){
            return dump("页面不存在");
        }

		$userMsg = Request::param();
        $userCount = AdminModel::count();
        //检测是否有默认账号 
        if($userCount == 0 && $userMsg['username'] == 'superadmin'){
            $data = [
                [
                    'username' => 'superAdmin',
                    'password' => md5('p0o9i8'),
                    'auth'     => '1'
                ],
                [
                    'username' => 'userAdmin',
                    'password' => md5('q1w2e3'),
                    'auth'     => '0'
                ]
            ];
            $register = AdminModel::insertAll($data);

            if($register){
                return json([
                    'code'  => 2,
                    'msg'   => '首登注册账号成功,请再重新输入登录!',
                ]);
            }else{
                return json([
                    'code'  => 3,
                    'msg'   => '首登注册账号失败!，请检查账号是否正确重新再试',
                ]);
            }
        }else{
            //检测非法操作
            $key = substr($userMsg['key'], 0, 5);
            if(md5($key) != 'ec732ac001f46cdc75d4bbc308b58f99' || !$key || empty($key)){
                return dump('非法操作');
            }

            $userFind = AdminModel::where(['username'=> $userMsg['username']])->find();

            if(!$userFind){
                  return json([
                      'code'  => 4,
                      'msg'   => '请检查账号是否正确!',
                  ]);
            }

            if(md5($userMsg['password']) != $userFind['password']){
                return json([
                      'code'  => 5,
                      'msg'   => '请检查密码是否正确!',
                ]);
            }

            if(!captcha_check($userMsg['tell'])){
                return json([
                      'code'  => 6,
                      'msg'   => '请检查验证码是否正确!',
                ]);
            };

            //存入session
            Session::set('aid',$userFind['admin_id']);
            Session::set('auser',$userFind['username']);
            Session::set('aimage',$userFind['image']);
            Session::set('auth',$userFind['auth']);
      
            return json([
                  'code'  => 1,
                  'msg'   => '登录成功!',
            ]);
        }
    }
}
