<?php 
namespace app\common\model;
use think\Model;
class Task extends Model{
   public function User(){
   		return $this->hasOne('user','id','task_start');
   }
   public function Head(){
   		return $this->hasOne('user','id','task_head');
   }
   // public function Group(){
   // 		return $this->hasOne('user','id','task_head');
   // }
   // 任务发起人
   public function Start(){
   	return $this->hasMany("user","id","task_start");
   }
}
?>