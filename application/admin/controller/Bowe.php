<?php
namespace app\admin\controller;
use app\common\controller\Base;
use app\common\model\BoweModel;
use think\facade\Request;

class Bowe extends Base
{
    public function bowe_index(){
       return $this->fetch();
    }

    public function bowe_add(){
       return $this->fetch();
    }

    public function bowe_insert(){
    	$param_add = Request::param();
    	// dump($param_add);die;
        $data = BoweModel::create($param_add);

        dump($data);
        if($data){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        } 
    }
}
