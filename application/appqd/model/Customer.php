<?php 
namespace app\common\model;
use think\Model;
class Customer extends Model{
   // 设置返回数据集的对象名
    protected $resultSetType = 'collection';
	//关联部门
	public function Role(){
		return $this->hasOne('Role','id','role_id');
	}
}
?>