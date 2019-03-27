<?php
namespace app\admin\controller;
use app\common\controller\Base;
use app\common\model\BoweModel;
use think\facade\Request;

class Bowe extends Base
{
    public function bowe_index(){
       $bowe_index = BoweModel::order("sort desc")->paginate(10,false);
        // dump($list);die;
       $this->assign('empty','<tr><td style="position: absolute;width: 98%;">对不起,没有找到数据!</td></tr>');
       $this->assign('list', $bowe_index);
       return $this->fetch();
    }

    public function bowe_add(){

        // dump(BoweModel::find());
       return $this->fetch();
    }

    public function bowe_insert(){
    	$param_add = Request::param();
    	// dump($param_add);die;
        unset($param_add['file']);//排除字段 
        // dump($param_add);die;

        $data = BoweModel::create($param_add);

        
        if($data){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        } 
    }
    public function bowe_content(){
       $id = Request::param('id');
       $bowe_content = BoweModel::where(['id'=>$id])->value('content');
        // dump($list);die;
       $this->assign('empty','<tr><td style="position: absolute;width: 98%;">对不起,没有找到数据!</td></tr>');
       $this->assign('list', $bowe_content);
       return $this->fetch();
    }

}
