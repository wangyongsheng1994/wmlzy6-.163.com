<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Document extends Controller
{
	public function index(){
		$data = model("project")->where("status",2)->where("gui",2)->select();
		$count = model("project")->where("status",2)->where("gui",2)->count();
		$arr = [1 => "未完成",2 => "已完成",3 => "未知"];
		$this->assign([
			"data" => $data,
			"count" => $count,
			"arr" => $arr
			]);
		// dump($data);
		return view("index");
	}
	public function delete($id){
		if(model("project")->where("id",$id)->delete()){
			return ["state" => "200", "msg" => "恭喜您删除成功"];
		}else{
			return ["state" => "404", "msg" => "很遗憾删除失败"];
		}
	}
}