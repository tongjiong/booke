<?php
namespace app\admin\controller;
use app\common\controller\Base;
use app\common\model\BannerModel;
use think\facade\Request;
use think\facade\Session;

class Banner extends Base
{
    public function banner_delect(){
        $id = Request::param('id');
        // dump($id);
        $data = BannerModel::destroy($id);
        if($data){
            $res = [
                'code'  => 1,
                'msg'   => '删除成功',
            ];
        }else{
            $res = [
                'code'  => 2,
                'msg'   => '删除失败',
                'error' => BannerModel::getError(),
            ];
        }
        return json($res);
    }

    //更新操作
    public function banner_update(){
        $param_update = Request::param();
        unset($param_update['file']);//排除字段
        // dump($param_update['id']);die;
        $data = BannerModel::where('id',$param_update['id'])->update($param_update);
        if($data){
            $this->success('更新成功');
        }else{
            $this->error('更新失败');
        }
    }
    //编辑页显示
    public function banner_edit()
    {   
        $id = Request::param('id');
        $list_edit = BannerModel::where(['id'=>$id])->find();
        // dump($list);
        $this->assign('list', $list_edit);
        return $this->fetch();
    }
    
    //主页banner
    public function banner_index()
    {   
        $list_index = BannerModel::order("sort desc")->paginate(10,false);
        // dump($list);die;
        $this->assign('list', $list_index);
        return $this->fetch();
    }

    //添加页面渲染
    public function banner_add()
    {   
        return $this->fetch();
    }
    
    // 添加操作
    public function banner_insert(){
    	$param_add = Request::param();

    	$data = BannerModel::create($param_add);
        if($data){
            $this->success('添加成功');
        }else{
            $this->error('添加失败');
        }
    }	
}
