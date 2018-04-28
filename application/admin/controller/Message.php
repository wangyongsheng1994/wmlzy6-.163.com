<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Message extends Controller
{
	// 列表页面
	public function index(){
		$count = model("webcate")->count();
		$data = model("webcate")->with("Message")->select();
		return view("index",['data'=>$data,'count'=>$count]);
	}
	public function add(){
		$data = getList(db("webcate")->select());
		if(request()->post()){
			$industrys = request()->param("industrys");
			$name = request()->param("name");
			$username = request()->param("username");
			$u = request()->param("url");
			$url = 'http://'.$u;
			$data = ['industrys' => $industrys, 'name' => $name,'url'=>$url];
			if(db('message')->insert($data)){
				return "添加成功";
			}else{
				return "添加失败";
			}
		}
		return view("add",["data"=>$data]);
	}
	public function delete($id){
		if(db("message")->where("id",$id)->delete()){
			return "success";
		}else{
			return "error";
		}
	}
	public function edit($id){
		$mydata = db("message")->find($id);
		$data = getList(db("webcate")->select());
		return view("edit",['data'=>$data,'mydata'=>$mydata]);
	}
	public function update(){
		$data = request()->except("id");
		$id = request()->param("id");
		if(db("message")->where("id",$id)->update($data)){
			return "恭喜您 修改成功";
		}else{
			return "很遗憾 修改失败";
		}
	}
}

?>