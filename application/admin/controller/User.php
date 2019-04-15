<?php
namespace app\admin\controller;
use app\common\controller\Base;
use app\common\model\AdminModel;
use think\facade\Request;
use think\facade\Session;

class User extends Base

{
    public function admin_details()
    {
    	$semsg = $this->semsg();
    	$this->assign('semsg',$semsg);
    	return $this->fetch();
    }

    public function admin_details_insert()
    {
    	$semsg = $this->seuid();
    	$paramAdmin = Request::param();

    	unset($paramAdmin['file']);//排除字段 
    	$res = AdminModel::where('admin_id',$this->seuid())->update($paramAdmin);

    	if($res){
    		return $this->success('资料修改成功!');
    	}else{
    		return $this->error('资料修改失败!');
    	}
    	// dump($param);
    	return $this->fetch();
    }

    public function admin_pass()
    {
        return $this->fetch();
    }

    public function admin_pass_update()
    {
        $paramPass = Request::param();

        $passwordrow = AdminModel::where('admin_id',$this->seuid())->value('password');

        if(md5($paramPass['phoneprimary']) != $passwordrow){
            return json([
                'code'  => 3,
                'msg'   => '请检测原密码是否有误!',
            ]);
        }
        
        if($paramPass['phoneprimary'] == $paramPass['phone']){
            return json([
                'code'  => 6,
                'msg'   => '原密码跟修改密码不能重复',
            ]);
        }

        if(strlen($paramPass['phone']) != 6){
            return json([
                'code'  => 4,
                'msg'   => '请设置6位数密码!',
            ]);
        }

        if(is_numeric($paramPass['phone'])){
            return json([
                'code'  => 5,
                'msg'   => '请使用数字跟字母组合密码6位数密码',
            ]);
        }

        $res = AdminModel::where('admin_id',$this->seuid())->setField('password',md5($paramPass['phone']));

        if($res){
            return json([
                'code'  => 1,
                'msg'   => '修改密码成功!',
            ]);
        }else{
            return json([
                'code'  => 2,
                'msg'   => '修改密码失败,请重新再试!',
            ]);
        }
        // dump($paramPass);
        // dump($res);
    }
}
