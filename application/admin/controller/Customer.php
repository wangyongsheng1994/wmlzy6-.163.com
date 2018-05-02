<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Customer extends Controller
{
	public function index(){
		$data = model("user")->with("Customer")->select();
		$arr = ['m'=>'男','w'=>'女'];
		return view("index",['data'=>$data,'arr'=>$arr]);
	}
	public function add(){
		return view("add");
	}
}

?>