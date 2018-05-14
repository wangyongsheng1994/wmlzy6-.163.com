<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Log extends Allow
{
	public function index(){
		$uid = Session::get("islogin");
		 //当前用户
	    $user = model('user')->with('Logts')->find($uid);
	    // dump($user);exit;
	    //用户的角色
	    $roles = model('roles')->find($user['roles_id']);
	    // // dump($roles);
	    return view("index",["user"=>$user['logts'],"use"=>$user]);
	}
	// 用户日志详细内容
	public function detail($id){
		$data = model("log")->find($id);
		return view("detail",["content"=>$data['content']]);
	}
	//日志的审批查看 待审批
	public function correct(){
    /*审批人的id*/
    $uid = Session::get("islogin");
    $user = model("user")->where("id",$uid)->find();
    $data = model("role")->where("pid",$user['role_id'])->select();          		/*查询出来所有下级的角色*/
    $arr = [];
    foreach($data as $k=>$v){
    	$arr[] = $v['id'];
    }
   	$row = model("user")->where("role_id","in",$arr)->select();  					      /*查询出来待审批人*/
  	$arrs = [];
  	foreach($row as $k1=>$v1){
  		$arrs[] = $v1['id'];
  	}
  	$res = model("log")->where("user_id","in",$arrs)->where("state",0)->select();  /*查询出来待审批人的日志*/
  	// dump($res);
  	return view("correct",["res" => $res]);
  }
  // 日志的添加
  public function add(){
  	if(request()->post()){
  		$id = Session::get("islogin");           
  		$username = Session::get("username");      
  		$rolename = Session::get("rolename");       
  		$row = model("role")->where("name",$rolename)->find();
  		$pid = $row['pid'];							
  		$data['title'] = $rolename;													              /*添加日志人的角色*/
        $data['name'] = $username;													           /*添加日志人的用户名*/
        $data['content'] = request()->param("content");								 /*日志内容*/
        $data['time'] = time();                       								  /*时间*/
        $data['user_id'] = $id;														             /*日志发表人的id*/
        $data['status'] = $pid;														             /*该日志发表人的父级id*/
        $data['state'] = 0;															                /*日志是否审核过,0未审核*/
        if(model("log")->allowField(true)->save($data)){
        	return array("state" => 200, "msg" =>"日志添加成功");
        }else{
        	return array("state" => 201, "msg" =>"日志添加失败");
        }
  	}
  	return view("add");
  }
  // 日志的审批
  public function shenpi(){
  	$id = $_POST['id'];
    $uid = Session::get("islogin");
    $data = model("log")->where("id",$id)->find();
    $log_id = $data['user_id'];
    $dataw['time'] = time();                                    /*审批时间*/
    $dataw['log_id'] = intval($id);                              /*日志id*/
    $dataw['shenpi_id'] = $uid;                                  /*审批人id*/  
  	$dataw['user_log_id'] = $log_id;                             /*用户日志id*/
    // $data = model("log")->where("id",$id)->find();
  	if(model("log")->where("id",$id)->update(["state" => 1])){
      db("loghostory")->insert($dataw);
  		return array("state" => 200, "msg" => "批阅完成");
  	}else{
  		return ["state" => 201, "msg" => "批阅失败"];
  	}
  }
  // 批阅历史
  public function history(){
  	$id = Session::get("islogin");
  	$user = model("user")->where("id",$id)->find();											                      /*查询出来当前用户*/
	$role_next = model("role")->where("pid",$user['role_id'])->select();  					            /*查询出来当前部门的下一个部门*/
  	$arrs = [];  
  	foreach($role_next as $k=>$v){
  		$arrs[] = $v['id'];
  	}
  	$user_next = model("user")->where("role_id","in",$arrs)->select();						             /*查询出来当前用户所管辖的用户*/
  	$arrs_log = [];
  	foreach($user_next as $k1 => $v1){
  		$arrs_log[] = $v1['id'];
  	}
  	$log_one = model("log")->where("user_id","in",$arrs_log)->where("state",1)->select();	   /*查询出来当前用户管辖的所有审批过的日志*/
  	$role_all = getList(model("role")->where("pid","in",$arrs)->select());
  	// dump($role_all);
  	$this->assign([
  		"log_one" => $log_one,
  		]);
  	return view("history");
  }
  /*全部日志的便利*/
  public function all(){
  	$uid = Session::get("islogin");
  	$user = model("user")->where("id",$uid)->find();
  	// dump($user);
  	$role = getList(model('role')->select(),$user['role_id']);
  	// dump($role);
  	$arr = [];
  	foreach($role as $k=>$v){
  		$arr[] = $v['id'];
  	}
  	$user_all = model("user")->where("role_id","in",$arr)->select();
  	$arrs = [];
  	foreach($user_all as $k1=>$v1){
  		$arrs[] = $v1['id'];
  	}
  	$log_all = model("log")->where("user_id","in",$arrs)->select();
  	// dump($log_all);
  	return view("all",['log_all' =>$log_all]);
  }
}

?>