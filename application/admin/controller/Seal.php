<?php
namespace app\admin\controller;
use think\Controller;
class Seal extends Controller
{
	public function index(){
		$data = model("seal")->with("User")->select();
		// dump($data);die;
		// $data = db("seal")->select();
		return view("index",['data'=>$data]);
	}
	public function add(){
		/* 获取到部门角色 */
		$role = getList(db("role")->select());
		/*获取到部门角色并指定到个人*/
		$personal = getList(model('role')->with('Users')->select());
		if(request()->post()){
			$id = request()->param("id");
			$res = db("user")->where("role_id",$id)->select();
			return $res;
		}
		return view("add",['role'=>$role,'personal'=>$personal]);
	}
	// 执行添加
	public function insert(){
		$data = request()->param();
		// dump($data);exit;
		$res = model("seal")->allowField(true)->save($data);
		if($res){
			return "提交成功";
		}else{
			return "提交失败";
		}
	}
	//查看详情
	public function detail($id){
		// 查询出来印章表数据
		$data = model("seal")->where("id",$id)->find();
		// dump($data['seal_use_name']);
		// 查询出来印章使用人
		$use_name = db("user")->where("id",$data['seal_use_name'])->find();
		// dump($use_name['username']);
		//查询出来印章审批人 
		$roval_name = db("user")->where("id",$data['seal_roval_name'])->find();
		// dump($roval_name['username']);
		// 用印部门
		$role = db("role")->where("id",$data['role_id'])->find();

		// dump($role['name']);
		$this->assign([
			'use_name' => $use_name['username'],
			'roval_name' => $roval_name['username'],
			'role_name' => $role['name'],
			'data' =>$data
			]);
		return view("detail");
	}
	// 修改
	public function edit($id){
		// 查询出来印章表数据
		$data = model("seal")->where("id",$id)->find();
		// dump($data['seal_use_name']);
		// 查询出来印章使用人
		$use_name = db("user")->where("id",$data['seal_use_name'])->find();
		// dump($use_name['username']);
		//查询出来印章审批人 
		$roval_name = db("user")->where("id",$data['seal_roval_name'])->find();
		// dump($roval_name['username']);
		// 用印部门
		$role = db("role")->where("id",$data['role_id'])->find();
		$roles = getList(db("role")->select());
		// dump($roles);
		$user = db("user")->select();
		// dump($user);
		// die;
		$this->assign([
			'use_name' => $use_name['id'], 			/* 印章使用人 */
			'roval_name' => $roval_name['id'], 		/* 印章审批人 */
			'role_name' => $role['id'], 			/* 所属部门   */
			'data' => $data,  						/* 印章表数据 */
			'roles' => $roles,
			'user' => $user
			]);
		return view("edit");
	}
	// 执行更新
	public function update(){
		$id = request()->param("id");
		$data = request()->except("id");
		// dump($data);
		if(model("seal")->allowField(true)->update($data,['id' => $id])){
			return "恭喜您!修改成功";
		}else{
			return "很遗憾!修改失败";
		}
	}
	// 执行删除
	public function delete($id){
		if(model("seal")->where("id",$id)->delete()){
			return "success";
		}else{
			return "error";
		}
	}
	// 批量删除
	public function alldel(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		if(db("seal")->where("id","in",$arr)->delete()){
			return "success";
		}else{
			return "error";
		}
	}
}