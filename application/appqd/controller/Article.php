<?php
namespace app\appqd\controller;
use think\Controller;
class Article extends Controller
{
	public function index(){ //新闻列表
		if(request()->post()){  
			$arr=Db("article")->paginate(5);  
			if(!empty($arr)){
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));  
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败'));
			}
		} 
	}
	public function contant(){  //一篇新闻介绍
		if(request()->post()){ 
            $data =input('id');  
			$arr=Db("article")->where('id',$data)->find();

			if(!empty($arr)){
				$arr['times'] = date('Y/m/d',$arr['time']);
				$arr['address']='野人新闻'; 
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));  
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败'));
			}
		} 
	}

	public function notic(){    //野人通知列表
		if(request()->post()){   
			$arr=Db("notic")->paginate(5);   
			if(!empty($arr)){
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));  
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败'));
			}
		} 
	}
	public function content(){   // 野人通知内容  
		if(request()->post()){ 
            $data =input('id'); 
			$arr=Db("notic")->where('id',$data)->find();

			if(!empty($arr)){
				$arr['times'] = date('Y/m/d',$arr['time']); 
				$arr['address']='野人通知'; 
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));  
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败'));
			}
		} 
	}
	public function search(){     //搜索  
		if(request()->post()){ 
            $data =input('id'); 
            $word =input('data'); 
			$arr=Db('private')->where('name|phone','like','%'.$word.'%')->where('uid',$data)->select();  
			if(!empty($arr)){
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));  
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败','xx'=>''));   
			}
		} 
	}

	public function indexxw(){   //首页野人新闻
			$arr=Db("article")->order('id', 'desc')->paginate(4);  
			return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));   
	}
	public function indextz(){   //首页野人新闻
			$arr=Db("notic")->order('id', 'desc')->paginate(4);  
			return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));    
	}
}
