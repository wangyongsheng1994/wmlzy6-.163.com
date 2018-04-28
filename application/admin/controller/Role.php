<?php
namespace app\admin\controller;
use think\Controller;
class Role extends Controller
{
	public function index(){
		$data = getList(db("role")->select());
		// dump($data);exit;
		return view("index",['data'=>$data]);
	}
	public function add(){
		if(request()->isAjax()){
			$data = request()->param();
			$data['time'] = time();
			if(db("role")->insert($data)){
				return "添加成功";
			}else{
				return "添加失败";
			}
		}
		$data = getList(db("role")->select());
		return view("add",['data'=>$data]);
	}
	public function role($id){
		$role = model("role")->find($id);
		$limit = explode(",",$role['limit']);
		$data = getcatebypid(0);
		$this->assign("limit",$limit);
		// dump($limit[0]);
		return view("role",["data"=>$data,"role"=>$role]);
	}
	public function update(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		$sid = $_POST['sid'];
		$str = implode(",",$arr);
		if(!empty($arr)){
			if(db("role")->where("id",$sid)->update(["limit"=>$str])){
				return "节点分配成功";
			}else{
				return "节点分配失败";
			}
		}else{
			return "请至少选择一条数据";
		}
	}
	public function delete($id){
		$role = db("role")->where("pid",$id)->count();
		if($role > 0){
			return "201";
		}
		if(db("role")->where("id",$id)->delete()){
			return "200";
		}
	}
	//修改
	public function edit($id){
		$data = db("role")->where("id",$id)->find();
		return view("edit",['data'=>$data]);
	}
	// 执行更新
	public function updates(){
		$id = request()->param("id");
		$data = request()->except("id");
		if(model("role")->allowField(true)->update($data,['id' => $id])){
			return "修改成功";
		}else{
			return "修改失败";
		}
		// dump($data);
	}
}