<?php
namespace app\appqd\controller;
use think\Controller;
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
            $data['time'] =time(); 
            $data['status'] = 0 ; 
            
            // return json_encode(array($data));
            $updata = Db('log')->insert($data);
			if(!empty($updata)){ 
				return json_encode(array('state'=>200,'msg'=>'提交成功'));
			}else{
				return json_encode(array('state'=>400,'msg'=>'提交失败，请重新提交'));
			}
		}
	}
	public function alllog(){
		if(request()->post()){ 
            $data =input('id'); 
            $act =input('act');   
            if($act != 'myrz' ){  
            	return json_encode(array('sadas'=>'132')); 
            }
			$dats=Db("log")->where('user_id',$data)->paginate(5);
			if($dats){
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$dats));
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败'));
			}
		}
	}
	public function alllogs(){
		if(request()->post()){ 
            $data =input('id'); 
            $act =input('act');   
            if($act != 'myrz' ){  
            	return json_encode(array('sadas'=>'132')); 
            }
			$dats=Db("log")->where('user_id',$data)->paginate(5);
			if(!empty($dats)){ 
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$dats));
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败')); 
			} 
		}
	}

}
