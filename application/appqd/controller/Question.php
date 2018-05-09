<?php
namespace app\appqd\controller;
use think\Controller;
class Question extends Controller
{
	public function index(){
		if (request()->post()) {
			$data['uid'] = input('id');
			$data['department'] = input('role');
			$data['content'] = input('content');
			$data['time'] = time();
			$user = Db('problem')->insert($data);
			if ($user) {
				return json_encode(array('status'=>200,'msg'=>'提交成功'));		
			}else{
				return json_encode(array('status'=>400,'msg'=>'网络繁忙，请重试'));		
			}
		}
    	 
	}
}
