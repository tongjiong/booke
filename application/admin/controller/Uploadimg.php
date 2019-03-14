<?php
namespace app\admin\controller;
use app\common\controller\Base;

class Uploadimg extends Base
{
	//单图片上传操作
    public function upload_fun()
    {
    	$file = request()->file('file');
    	$info = $file->move( './uploads');
    	if($info){
    		//反斜杠替换
    		$getSaveName=str_replace("\\","/",$info->getSaveName());
	        $data = [
	        	'code' => '1',
	        	'msg'  => '上传成功',
	        	'img_oute' => 'uploads/'.$getSaveName,//图片路径保存
	        ];
	    }else{
	    	$data = [
	        	'code' => '2',
	        	'msg'  => '上传失败,'.$file->getError(),
	        ];
	        // 上传失败获取错误信息
	    }
     	return json($data);//返回json格式
    }

}
