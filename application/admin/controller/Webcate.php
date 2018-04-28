<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Webcate extends Controller
{
	public function index(){
		$count = db("webcate")->count();
		$data = getList(db("webcate")->select());
		// dump($data);
		// die;
		return view("index",['data'=>$data,'count'=>$count]);
	}
	// 添加
	public function add(){
		if(request()->post()){
			$data = request()->param();
			// dump($data);exit;
			if(db("webcate")->insert($data)){
				return "添加成功";
			}else{
				return "添加失败";
			}
		}
		$data = getList(db("webcate")->select());
		return view("add",['data'=>$data]);
	}
	// 更新
	public function edit($id){
		$data = getList(db("webcate")->select());
		$cate = db("webcate")->find($id);
		return view("edit",['data'=>$data,'cate'=>$cate]);
	}
	public function update(){
		$id = request()->param("id");
		$data = request()->except("id");
		if(db("webcate")->where("id",$id)->update($data)){
			return "修改成功";
		}else{
			return "修改失败";
		}
	}
	// 单个删除
	public function delete($id){
		$cate = db("webcate")->where("pid",$id)->count();
		// return $cate;
		if($cate>0){
			return "201";
		}
		if(db("webcate")->where("id",$id)->delete()){
			return "200";
		}
	}
	// 批量删除
	public function alldel(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		if($arr == ""){
			return "请至少选中一条数据";
		}
		$arr = implode(",",$arr);
		$mydate = db("webcate")->where("id","in",$arr)->delete();
		if($mydate){
			return "success";
		}else{
			return "2222";
		}
	}
}

?>