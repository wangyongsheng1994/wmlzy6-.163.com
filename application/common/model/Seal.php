<?php 
namespace app\common\model;
use think\Model;
class Seal extends Model{
   // 关联user表
    public function User(){
        return $this->hasone('user','id','seal_use_name');
    } 
}
?>