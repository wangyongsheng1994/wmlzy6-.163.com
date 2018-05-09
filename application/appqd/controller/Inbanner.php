<?php
namespace app\appqd\controller;
use think\Controller;
class Inbanner extends Controller
{
	public function index(){ //新闻列表
			$arr=Db("banner")->order('id', 'desc')->paginate(3);  
			return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));  
	}

}
