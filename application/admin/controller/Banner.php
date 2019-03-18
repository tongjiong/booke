<?php
namespace app\admin\controller;
use app\common\controller\Base;
use app\common\model\BannerModel;
use think\facade\Request;
use think\facade\Session;

class Banner extends Base
{

    public function banner_edit()
    {   
        $id = Request::param('id');
        $list = BannerModel::where(['id'=>$id])->find();
        // dump($list);
        $this->assign('list', $list);
        return $this->fetch();
    }
    
    //主页banner
    public function banner_index()
    {   
        $list = BannerModel::order("sort desc")->paginate(10,false);
        // dump($list);die;
        $this->assign('list', $list);
        return $this->fetch();
    }

    //添加页面渲染
    public function banner_add()
    {   
        return $this->fetch();
    }
    
    // 添加操作
    public function banner_insert(){
    	$param_data = Request::param();

    	$data = BannerModel::create($param_data);
        if($data){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }	
}
