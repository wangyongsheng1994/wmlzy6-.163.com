<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Seal extends Controller
{
	public function index(){
		$data = model("seal")->with("User")->select();
		foreach($data as $k=>$v){
			$ima = explode(",",$v['image']);
			foreach($ima as $k1=>$v1){
				$data[$k]['image'] = $ima[0];
			}
		}
		return view("index",['data'=>$data]);
	}
	// 案例图片添加
	public function imageadd(){
		$file= request()->file();
		foreach($file as $key=>$value){
			$info=$file[$key]->move( './images');
			$savename=$info->getSaveName();
			$path = str_replace('\\','/',$savename);
			echo '/images/'.$path;exit;
		}	
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
		$data = request()->except("image");
		$image = request()->param("image");
		$uid = Session::get("islogin");
		$data['image'] = substr($image,0,strlen($image)-1);
		$data['use_uid'] = $uid;
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
	/*
		以下是图片内部的处理
	 */
	// 图片的修改
	public function picedit(){
		$id = input("id");
		$data=db("seal")->where("id",$id)->find();
		$images=explode(",",$data['image']);
		$count = count($images);
		$this->assign([
			"data" => $data,
			"images" => $images,
			"count" => $count
			]);
		return view("picedit");
	}
	/*图片内部的添加*/
	public function picupdate($id){
		$data=db("seal")->where("id",$id)->find();
		if(request()->post()){
			$data = request()->except("id");
			$id = request()->param("id");
			$oldimage = $data['img'];
			$data['images'] = substr($data['file'],0,strlen($data['file'])-1);
			$data['image'] = $data['images'].",".$oldimage;
			// dump($data);exit;
			if(model("seal")->allowField(true)->save($data,["id"=>$id])){
				echo "添加成功";exit;
			}else{
				echo "添加失败";exit;
			}
		}
		$imagess=explode(",",$data['image']);
		$this->assign([
			'data'=>$data,
			'imagess'=>$imagess
			]);
		return view("picupdate");
	}
	/*图片内部的删除*/
	public function picdelete(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		$id=$_POST['id'];
		$data=model("seal")->where("id",$id)->find();
		$arr2=explode(",",$data['image']);
		$arr3=array_diff($arr2,$arr);
		$str=implode(",",$arr3);
		if(model("seal")->where("id",$id)->update(['image' => $str])){
			return 200;
		}else{
			return "添加失败";
		}
	}

}