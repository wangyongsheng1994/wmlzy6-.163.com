<?php 
namespace app\common\model;
use think\facade\Session;
use think\Model;

class User extends Model
{
	// 设置返回数据集的对象名
    protected $resultSetType = 'collection';
	//关联部门
	public function Role(){
		return $this->hasOne('Role','id','role_id');
	}
	  //关联日志 同时获取日志今天的数据
	public function Logs(){

		$date = strtotime(date("Y-m-d",time()));

		$dates = strtotime(date('Y-m-d',strtotime('+2 day')))-1;
		// dump(date("Y-m-d H",$date));
		//dump(date("Y-m-d H",$dates));exit;
		return $this->hasMany('Log','user_id','id')->where("time",'>=',$date)->where("time",'<=',$dates);

	}
	// 关联角色
    public function Roles(){
    	return $this->hasOne('Roles','id','roles_id');
    }
    // 关联日志表
    public function Log(){
    	return $this->hasMany('Log','user_id','id');
    }
     public function Logts(){
    	return $this->hasMany('Log','user_id','id');
    }
    // 关联客户表
    public function Customer(){
    	$uid = Session::get('islogin');
    	return $this->hasMany('customer','uid','id')->where("uid",$uid);
    }
    //关联客户表 
    public function Customers(){
        return $this->hasMany('customer','uid','id');
    }
    // 关联seal表
    public function Seal(){
        return $this->hasmany('seal','seal_use_name','id');
    }

}
?>