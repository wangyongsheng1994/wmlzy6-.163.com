<?php
namespace app\appqd\controller;
use think\Controller;
class Pwd extends Controller 
{
	public function index(){
		if (request()->post()) {
			$id = input('id');
			$pwd = input('pwd');
			// return json_encode(array('status'=>$id,'xx'=>$pwd)); 
			$user = model('user')->where('id',$id)->setField('password',$pwd);  

			if (!empty($user)) {
				return json_encode(array('status'=>200,'xx'=>$user));		
			}else{
				return json_encode(array('status'=>400,'xx'=>'网络繁忙'));		
			}
		}
    	 
	}
}
