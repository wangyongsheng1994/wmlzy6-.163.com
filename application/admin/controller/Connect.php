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
	// 公司内部联系人
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
	/* **********
	 公司外部联系人
		customer
	******** */
	public function out_index(){
		$uid = Session::get("islogin");
		$tot = db("customer")->count();
		$data = db("customer")->select();
		// dump($data);
		// die;
		$this->assign([
			"tot" => $tot,
			"data" => $data
			]);
		return view("out_index");
	}
	/*
		私有联系人

	 */
	public function private_index(){
		$tot = db("private")->count();
		$data = db("private")->select();
		$this->assign([
			"tot" => $tot,
			"data" => $data
			]);
		return view("private_index");
	}
	/*
		添加私有联系人
	 */
	public function add(){
		if(request()->post()){
			$uid = Session::get("islogin");
			$data = request()->except("s_province,s_city,s_county");
			$s_province = $_POST['s_province'];
			$s_city = $_POST['s_city'];
			$s_county = $_POST['s_county'];
			$data['address'] = $s_province.$s_city.$s_county;
			$data['time'] = time();
			$data['uid'] = $uid;
			// dump($data);
			// die;
			if(db("private")->insert($data)){
				return "添加成功";
			}else{
				return "添加失败";
			}
		}
			
		return view("private_add");
	}
	/*
		修改私有联系人
	 */
	public function edit($id){
		$data = db("private")->where("id",$id)->find();
		// $this->assign(['data'=>$data]);
		return view("private_edit",['data'=>$data]);
	}
	public function update(){
		$res = request()->except("id");
		$id = request()->param("id");
		if(db("private")->where("id",$id)->update($res)){
			return "修改成功";
		}else{
			return "修改失败";
		}
	}
	// 私有联系人删除
	public function delete($id){
		if(db("private")->where("id",$id)->delete()){
			return "200";
		}else{
			return "300";
		}
	}
}

?>