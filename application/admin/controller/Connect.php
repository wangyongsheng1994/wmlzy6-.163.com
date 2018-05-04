<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Connect extends Controller
{
	/*
		1, connect_id 1 正常

		2, connect_id 2 已删除
	 */
	public function index(){
		$tot = db("user")->count();
		$data = db("user")->select();
		$this->assign([
			"tot" => $tot,
			"data" => $data
			]);
		// dump($data);die;
		return view("index");
	}
}

?>