<?php
namespace app\admin\controller;
use app\common\controller\Base;
use app\common\model\BoweModel;
use think\facade\Request;

class Bowe extends Base
{
    public function Bowe_index(){
       return $this->fetch();
    }

    public function Bowe_add(){
       return $this->fetch();
    }

    public function Bowe_insert(){
    	$param_update = Request::param();
    	dump($param_update);
    }
}
