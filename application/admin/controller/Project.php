<?php
namespace app\admin\controller;
use think\Controller;
class Project extends Controller
{
	public function index(){
		$data = db("project")->select();
		$count = db("project")->count();
		// dump($count);die;
		$this->assign([
			"data" => $data,
			"count" => $count
			]);
		return view("index");
	}
	public function add(){
		return view("add");
	}
}
?>