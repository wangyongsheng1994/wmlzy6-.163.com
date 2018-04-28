<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Email extends Controller
{
	public function index(){
		$username = Session::get("username");
		db("email")->where("receive_id",3)->where("send_id",3)->delete();
		$data = db("email")->where("receive",$username)->where("receive_id",1)->select();
		$arr=["1"=>"接收成功"];
		return view("index",['data'=>$data,"arr"=>$arr]);
	}
	public function add(){
		$data = getList(model('role')->with('Users')->select());
		if(request()->post()){
			$id = request()->param("id");
			$res = db("user")->where("role_id",$id)->select();
			return $res;
		}
		return view("add",['data'=>$data]);
	}
	public function insert(){
		$name= request()->param("name");
		$send = Session::get("username");
		$username = request()->param("username");
		$data = db("user")->where("role_id",$name)->where("id",$username)->find();
		$res = request()->param();
		$res['receive'] = $data['username'];
		$res['send'] = $send;
		$res['state'] = 0;
		$res['status'] = 1;
		$res['send_id'] = 1;
		$res['receive_id'] = 1;
		$res['time'] = time();
		if(model("email")->allowField(true)->save($res)){
			return "邮件发送成功";
		}else{
			return "邮件发送失败";
		}
		// dump($data['username']);exit;
	}
	//标记为已读
	public function start(){
		$id = request()->param("id");
		if(model("email")->update(['id'=>$id,'state'=>1])){
			return "111";
		}else{
			return "222";
		}
	}
	// 标记为未读
	public function stop(){
		$id = request()->param("id");
		if(model("email")->update(['id'=>$id,'state'=>0])){
			return "111";
		}else{
			return "222";
		}
	}
	// 发送历史
	public function send(){
		$username = Session::get("username");
		$data = db("email")->where("send",$username)->where("send_id",1)->select();
		$arr = ['0'=>"已送达","1"=>"已读取"];
		return view("send",['data'=>$data,"arr"=>$arr]);
	}
	//查看详情 
	public function detail($id){
		$data = db("email")->find($id);
		model("email")->update(['id'=>$id,'state'=>1]);
		return view("detail",['data'=>$data]);
	}
	/* **********************
		发送邮件的删除
		以及批量删除	
	************************ */
	public function senddel($id){
		if(model("email")->update(['id'=>$id,'send_id'=>0])){
			return "success";
		}else{
			return "error";
		}
	}
	public function alldel(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		// return $arr;
		foreach($arr as $k=>$v){
			db("email")->update(['id'=>$v,'send_id'=>0]);
		}
		return "success";
	}
	/* *************************************************发邮件****************************************** */
	// 发邮件
	public function lastdeletes(){
		$data = db("email")->where("send_id",0)->select();
		$arr = ['0'=>"已送达","1"=>"已读取"];
		return view("lastdeletes",['data'=>$data,"arr"=>$arr]);
	}
	//彻底删除
	public function deletes($id){
		if(db("email")->update(['id'=>$id,'send_id'=>3])){
			return "success";
		}else{
			return "error";
		}
	}
	//彻底的批量删除
	public function alldels(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		// return $arr;
		foreach($arr as $k=>$v){
			db("email")->update(['id'=>$v,'send_id'=>3]);
		}
		return "success";
	}
	/* ********************************************************************************************** */


	/* *****************************************
		接收邮件的删除
		以及批量删除
	 **************************************** */
	public function receivedel($id){
		if(model("email")->update(['id'=>$id,'receive_id'=>0])){
			return "success";
		}else{
			return "error";
		}
	}
	public function allredel(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		// return $arr;
		foreach($arr as $k=>$v){
			db("email")->update(['id'=>$v,'receive_id'=>0]);
		}
		return "success";
	}
	/* ******************************************************************************************* */
	public function lastdelete(){
		$data = model("email")->where("receive_id",0)->select();
		return view("lastdelete",['data'=>$data]);
	}
	// 彻底删除
	public function delete($id){
		if(db("email")->update(['id'=>$id,'receive_id'=>3])){
			return "success";
		}else{
			return "error";
		}
	}
	public function alldelete(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		// return $arr;
		foreach($arr as $k=>$v){
			db("email")->update(['id'=>$v,'receive_id'=>3]);
		}
		return "success";
	}
}
?>