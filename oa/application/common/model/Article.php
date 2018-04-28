<?php 
namespace app\common\model;

use think\Model;

class Article extends Model
{
  public function Webcate(){
  	return $this->hasOne('webcate','id','webcate_id');
  }
}
?>