<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Goods extends Allow
{
	// 列表
	public function index(){
		$data = getList(db("goods")->select());
		$tot = db("goods")->count();
		// dump($data);die;
		$this->assign([
			"data" => $data,
			"tot" => $tot
			]);
		return view("index");
	}
	// 添加
	public function add(){
		$data = getList(db("goods")->select());
		if(request()->post()){
			$pid = $_POST['pid'];
			$name = $_POST['name'];
			if(db("goods")->insert(["pid" => $pid,"name" => $name])){
				return array("state" => 1,"msg" => "添加成功");
			}else{
				return array("state" => 2,"msg" => "添加失败");
			}
		}
		// dump($data);
		$this->assign([
			"data" => $data
			]);		
		return view("add");
	}
	// 修改
	public function edit(){
		if(request()->post()){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$res = db("goods")->where("id",$id)->update(["name" => $name]);
			if($res){
				return array("state" => 1,"msg" => "修改成功");
			}else{
				return array("state" => 2,"msg" => "修改失败");
			}
		}
		$id = input("id");
		$need_edit = db("goods")->find($id);
		$data = getList(db("goods")->select());
		$this->assign([
			"need_edit" => $need_edit,
			"data" => $data
			]);
		return view("edit");
	}
	// 删除
	public function delete($id){
		$res = db("goods")->where("pid",$id)->find();
		if($res){
			return array("state" => 3,"msg" => "请先删除子类别");
		}else{
			if(db("goods")->where("id",$id)->delete()){
				return array("state" => 1,"msg" => "删除成功");
			}else{
				return array("state" => 1,"msg" => "删除失败");
			}

		}
	}
	/*
	 全部删除
	*/
	 public function alldel(){
	 	$arr = isset($_POST['arr'])?$_POST['arr']:"";
	 	if(db("goods")->where("pid","in",$arr)->select()){
	 		return array("state" => 3,"msg" => "请先删除子类别");
	 		// return "请先删除子类别";
	 	}
 		if(db("goods")->where("id",'in',$arr)->delete()){
 			return array("state" => 1,"msg" => "删除成功");
 			// return "删除成功";
 		}else{
 			return array("state" => 2,"msg" => "删除失败");
 			// return "删除失败";
 		}
	 }
}