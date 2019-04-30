<?php
namespace app\admin\controller;
use app\common\controller\Base;
use app\common\model\AdminModel;
use think\facade\Request;
use think\facade\Session;

class Management extends Base
{
	public function management_account()
	{

		$list = AdminModel::select();
		// dump($list);
		$userid = Session::get('aid');

		$this->assign('userid',$userid);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function management_account_exdit()
	{
		$id = Request::param('id');
		$userMsg = AdminModel::where(['admin_id' => $id])->find();
		$this->assign('userMsg',$userMsg);
		return $this->fetch();
	}

	public function management_account_add(){
		// dump(md5('tong369'));
		return $this->fetch();
	}

	public function management_account_insert()
	{
		$paramAdd = Request::param();
		$key = $paramAdd['show'];

	 //  	//检测密令操作
        if(md5($key) != 'eff6db4f82958155f074d54820ba7f4e' || !$key || empty($key)){
            return json([
            	'code' => 5,
            	'msg' => '错误,请输入正确的密令!',
            ]);
        }
		
		if(strlen($paramAdd['password']) != 6){
			return json([
            	'code' => 4,
            	'msg' => '错误,请输入六位数密码!',
            ]);
		}

		$paramAdd['password'] = md5($paramAdd['password']);

		$res = AdminModel::insert($paramAdd);

		if(!$res){
			return json([
            	'code' => 2,
            	'msg' => '添加账号失败，请重新再试!',
            ]);
		}

		return json([
            	'code' => 1,
            	'msg' => '添加成功!',
        ]);

	}

	public function management_account_update()
	{
		$paramUp = Request::param();

		$key = $paramUp['show'];
	 //  	//检测密令操作
        if(md5($key) != 'eff6db4f82958155f074d54820ba7f4e' || !$key || empty($key)){
            return json([
            	'code' => 5,
            	'msg' => '错误,请输入正确的密令!',
            ]);
        }

		if(strlen($paramUp['password']) != 6){
			return json([
            	'code' => 4,
            	'msg' => '错误,请输入六位数密码!',
            ]);
		}

		$dataPassword = md5($paramUp['password']);
		$res = AdminModel::where('admin_id',$paramUp['id'])->setField('password',$dataPassword);
		
		if(!$res){
			return json([
            	'code' => 2,
            	'msg' => '修改失败，请重新再试!',
            ]);
		}

		return json([
            	'code' => 1,
            	'msg' => '修改成功!',
        ]);
	}


	public function management_account_delect()
	{
		$id = Request::param('id');
		// dump($id);die;
		$res = AdminModel::where('admin_id',$id)->delete();

		if(!$res){
			return json([
            	'code' => 2,
            	'msg' => '删除失败，请重新再试!',
            ]);
		}

		return json([
            	'code' => 1,
            	'msg' => '删除成功!',
        ]);
	}
}