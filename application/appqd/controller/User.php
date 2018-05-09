<?php
namespace app\appqd\controller;
use think\Controller;
class User extends Controller
{
	public function index(){
		if (request()->post()) {
			$id = input('id');
			$user = model('user')->where('id',$id)->with('Role')->find();

			if (!empty($user)) {
				return json_encode(array('status'=>200,'xx'=>$user));		
			}else{
				return json_encode(array('status'=>400,'msg'=>'网络繁忙'));		
			}
		}
    	 
	}
}
