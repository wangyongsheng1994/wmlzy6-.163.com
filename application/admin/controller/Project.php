<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Project extends Controller
{
	// 项目管理模块的展示
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
	// 项目管理模块的添加
	public function add(){
		if(request()->isAjax()){
			$data = request()->param();
			$data['time'] = time();
			$data['create_name'] = Session::get('username');
			if(db("project")->insert($data)){
				return "恭喜您！添加成功";
			}else{
				return "很遗憾!添加失败";
			}
		}
		return view("add");
	}
	// 仙女公墓管理模块的修改
	public function edit(){
		if(request()->post()){
			$id = request()->param("id");
			$data = request()->param();
			if(db("project")->where("id",$id)->update($data)){
				return "恭喜您！修改成功";
			}else{
				return "很遗憾！修改失败";
			}
		}
		$id = input("id");
		$data = db("project")->where("id",$id)->find();
		return view("edit",['data'=>$data]);
		// return $id;
	}
	// 项目管理的删除
	public function delete($id){
		if(db("project")->where("id",$id)->delete()){
			return "200";
		}else{
			return "222";
		}
	}
	public function alldel(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		$arr = implode(",",$arr);
		if(db("project")->where("id","in",$arr)->delete()){
			return "200";
		}else{
			return "删除失败";
		}
	}
	/* ****************
		以下是项目模块我参与项目
	********************* */
	public function about(){
		$username = Session::get('username');
		// 查询出来项目小组里参与的成员
		$group = db("project")->where('item_group', 'like', "%{$username}%")->select();
		$count = db("project")->where('item_group', 'like', "%{$username}%")->count();
		$this->assign([
			'count' => $count,                         /*数量*/
			'group' => $group                          /*项目成员*/
			]);
		// die;
		return view("about");
	}
	/*
			项目发起人

	 */
	public function create(){
		$username = Session::get('username');
		/*我发起的项目*/
		$create_name = db("project")->where("create_name", 'like', "%{$username}%")->select();
		$count = db("project")->where("create_name", 'like', "%{$username}%")->count();
		$this->assign([
			"create_name" => $create_name,
			"count" => $count
			]);
		return view("create");
		// dump($create_name);
	}
	/*
		项目组长
	 */
	public function head(){
		$username = Session::get('username');
		/*查询出来组长*/
		$group_head = db("project")->where("item_vip", 'like', "%{$username}%")->select();
		$count = db("project")->where("item_vip", 'like', "%{$username}%")->count();
		return view("head",["group_head" => $group_head,"count" => $count]);
	}
	public function detail($id){
		$data = db("project")->where("id",$id)->find();
		// dump($data);
		// die;
		$this->assign("data",$data);
		return view("detail");
	}	
}
?>