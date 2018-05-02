<?php
namespace app\appqd\controller;
use think\Controller;
use think\facade\Session;
class Login extends Controller
{
	public function login(){
		if(request()->post()){
            $data['username'] =input('phone');
            $data['password'] = input('pwd');

			$dats=Db("user")->where($data)->find();
			if($dats){
				return json_encode(array('state'=>200,'msg'=>'欢迎回来','xx'=>$dats));
			}else{
				return json_encode(array('state'=>400,'msg'=>'账号密码错误'));
			}
		}
	}
	public function logout(){
		Session::clear();
        $this->success("退出成功","/admin/login/index");
	}
	public function role(){
		if(request()->post()){
            $id =input('id');
           
			$dats=Db("role")->where('id',$id)->field('id,name')->find();
			if($dats){
				return json_encode(array('state'=>200,'msg'=>'','xx'=>$dats));
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，请稍候重试'));
			}
		}
	}
	public function addlog(){
		if(request()->post()){
            $data['user_id'] =input('id');
            $data['title'] =input('title');
            $data['content'] =input('content');
            $data['name'] =input('name');
           return json_encode($data);
			$dats=Db("log")->add();
			if($dats){
				return json_encode(array('state'=>200,'msg'=>'','xx'=>$dats));
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，请稍候重试'));
			}
		}
	}

}
