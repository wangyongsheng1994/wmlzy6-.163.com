<?php 
namespace app\common\model;
use think\Model;
class Webcate extends Model{
    public function Message(){

    	return $this->hasMany('Message','industrys','id');
    }
    // public function Messages(){
    // 	return $this->hasMany('Message','industrys','id')->where("industrys",input('id'));
    // }
}
?>