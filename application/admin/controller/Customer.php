<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Customer extends Controller
{
	/*
		客户列表
	 */
	public function index(){
		$data = model("user")->with("Customer")->select();
		// dump($data);
		// die;
		$arr = ['m'=>'男','w'=>'女'];
		return view("index",['data'=>$data,'arr'=>$arr]);
	}
	/*
		客户添加
	 */
	public function add(){
		if(request()->post()){
			$uid = Session::get('islogin');
			$data = request()->except("s_province,s_city,s_county");
			$data['time'] = time();
			$data['contact'] = 1;
			$data['uid'] = $uid;
			$sheng = $_POST['s_province'];
			$shi = $_POST['s_city'];
			$xiang = $_POST['s_county'];
			$data['address'] = $sheng.$shi.$xiang;
			if(db("customer")->insert($data)){
				return "客户添加成功";
			}else{
				return "很遗憾！添加失败";
			}
		}
		return view("add");
	}
	 /*查看详情*/
	public function detail($id){
		$data = model("customer")->where("id",$id)->find();
		// dump($data);
		return view("detail",["data"=>$data]);
	}
	//客户的修改
	public function edit(){
		if(request()->post()){
			$id = request()->param("id");
			$data = request()->param();
			if(model("customer")->allowField(true)->save($data,['id'=>$id])){
				return "恭喜您!更新成功";
			}else{
				return "很遗憾!更新失败";
			}
		}
		$id = input("id");
		$data = db("customer")->where("id",$id)->find();
		return view("edit",['data'=>$data]);
	}
	// 客户的删除
	public function delete($id){
		if(model("customer")->where("id",$id)->delete()){
			return "200";
		}else{
			return "删除失败";
		}
	}
	// 批量删除
	public function alldel(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		$arr = implode(",",$arr);
		if(db("customer")->where("id","in",$arr)->delete()){
			return "200";
		}else{
			return "删除失败";
		}
	}
	/*
		全部客户的增删改查
	 */
	public function all_index(){
		// $data = model("customer")->select();
		$data = model("user")->with("Customers")->select();
		$arr = ['m'=>'男','w'=>'女'];
		// dump($data);die;
		return view("all_index",['data'=>$data,"arr"=>$arr]);
	}
}

?>