<?php 
namespace app\common\model;

use think\Model;

class Asides extends Model
{
   public function Aside(){
   		return $this->hasMany('Aside','cid','id');
   }
}
?>