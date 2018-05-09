<?php
namespace app\appqd\controller;
use think\Controller;
class Contant extends Controller
{
	public function index(){
		if(request()->post()){  
            // $data =input('id'); 
			$arr=Db("private")->paginate(5); //->where('uid',$data)
			if(!empty($arr)){
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));  
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败'));
			}
		} 
	}
	public function contant(){ 
		if(request()->post()){ 
            $data =input('id'); 
			$arr=Db("private")->where('id',$data)->find(); 
			if(!empty($arr)){
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));  
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败'));
			}
		} 
	}
	public function search(){  
		if(request()->post()){ 
            $data =input('id'); 
            $word =input('data'); 
			$arr=Db('private')->where('name|phone','like','%'.$word.'%')->select();  //->where('uid',$data)   
			if(!empty($arr)){
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));  
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败','xx'=>''));   
			}
		} 
	}
}
