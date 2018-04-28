<?php 
namespace app\common\model;
use think\Model;
class Role extends Model{
  // 设置返回数据集的对象名
    // protected $resultSetType = 'collection';
    //protected $resultSetType = 'collection';

     //关联用户
   	// public function User(){
    // 	return $this->hasMany('User','role_id','id')->with('Log');
    // }
    public function Users(){
    	return $this->hasMany('User','role_id','id')->with('Logs');
    }
    public function User(){
    	return $this->hasMany('User','role_id','id')->with('Log');
    }
    public function Usersa(){
      return $this->hasMany('User','role_id','id'));
    }
}
?>