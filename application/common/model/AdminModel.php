<?php

namespace app\common\model;
use think\Model; //加载模型

class AdminModel extends Model
{
	protected $pk = 'admin_id';//默认主键
	protected $table = 'admin';//默认数据表

	protected $autoWriteTimestamp = true;//自动时间戳
	protected $createTime = 'create_time'; //创建时间变量
	// protected $updateTime = 'update_time';	//更新时间变量
	protected $dateFormat = 'Y-m-d h:i'; //设置时间的格式 
	// protected $field = true;
}

