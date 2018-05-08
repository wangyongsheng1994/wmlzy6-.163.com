<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Task extends Controller
{
	/*
		全部任务列表
	 */
	public function index(){
		$tot = model("task")->count();
		$data = model("task")->select();
		/*
			*任务发起人  start
			*任务组长    head
			*任务小组成员 group
		 */
		$start = model("task")->with("User")->select();
		$head = model("task")->with("Head")->select();
		$arr=[1=>"未完成",2=>"已完成"];
		// $group = model("task")->with("")->select();
		// dump($head);
		$this->assign([
			"data" => $data,
			"tot" => $tot,
			'start' => $start,
			'head' => $head,
			'arr' => $arr
			]);
		return view("index");
	}
	/*
		任务的添加
	 */
	public function add(){
		$data = getList(model('role')->with('Users')->select());
		if(request()->post()){
			$id = request()->param("id");
			$res = db("user")->where("role_id",$id)->select();
			return $res;
		}
		// dump($data);
		return view("add",["data"=>$data]);
	}
	// 任务列表执行添加
	public function insert(){
		$task_start = Session::get("islogin");
		$title = $_POST['title'];
		$content = $_POST['content'];
		$task_head = $_POST['username'];
		$task_group = $_POST['task_group'];
		$arr = explode("--",$task_group);
		// dump($arr);exit;
		$arrs = [];
		for($i = 0;$i < count($arr);$i++){
			// echo $arr[$i];
			$data = db("user")->where("username",$arr[$i])->select();
			foreach($data as $k=>$v){
				$arrs[] = $v['id'];
			}
		}
		$arrs = implode(",",$arrs);
		$data = [
			'task_start' => $task_start,
			'title' => $title,
			'content' => $content,
			'task_head' => $task_head,
			'task_group' => $task_group,
			'task_unfinish' => $arrs,
			'task_compale' => $arrs,
			'status' => 1
		];
		$data['time'] = time();
		if(model("task")->allowField(true)->save($data)){
			return "添加任务成功";
		}else{
			return "添加失败";
		}
	}
	// 任务列表内容详情
	public function detail($id){
		$data = model("task")->find($id);
		// dump($data);
		return view("detail",["data"=>$data]);
	}
	// 任务列表的修改
	public function edit(){
		$id = input("id");
		$data = model("task")->find($id);
		$user = db("user")->select();
		$this->assign([
				"data" => $data,
				"user" => $user
			]);
		if(request()->post()){
			$data = request()->except("id");
			$id = request()->param("id");
			if(model("task")->allowField(true)->save($data,["id"=>$id])){
				return "恭喜您!修改成功";
			}else{
				return "很遗憾!修改失败";
			}
		}
		return view("edit");
	}
	// 任务列表的删除
	public function delete($id){
		if(db("task")->delete($id)){
			return "200";
		}else{
			return "101";
		}
	}
	/* ********
		以下是我发起的任务

	******* */
	public function start(){
		$id = Session::get("islogin");
		$data = model("task")->where("task_start",$id)->select();
		$tot = model("task")->where("task_start",$id)->count();
		$arr=[1=>"未完成",2=>"已完成"];
		$this->assign([
			"data" => $data,
			"tot" => $tot,
			"arr" =>$arr
			]);
		return view("start");
	}
	/* 
		未完成的任务 
	*/
	public function unfinish(){
		$username = Session::get("username");
		$id = Session::get("islogin");
		$user = model("task")->where("task_head",$id)->find();
		$data = model("task")->where("task_group|task_head",'like',"%{$username}%")->where("status",1)->select();
		$arr = [1=>"未完成",2=>"已完成"];
		return view("unfinish",["data" => $data,"arr"=>$arr]);
	}
	/*
		已经完成的任务
	 */
	public function compale(){
		$username = Session::get("username");
		$data = model("task")->where("task_group|task_head",'like',"%{$username}%")->where("status",2)->select();
		$arr = [1=>"未完成",2=>"已完成"];
		return view("compale",["data" => $data,"arr"=>$arr]);
	}
	// 状态的修改
	public function com(){
		$id = $_POST['id'];
		$uid = Session::get("islogin");
		$head = db("task")->where("id",$id)->find();
		if($uid == $head['task_head'] && $uid == $head['task_start']){
			if(model("task")->where("id",$id)->update(["status" => 2])){
				return array('state'=>'200',"msg"=>"恭喜您!该任务已经完成");
			}else{
				return array('state'=>'201','msg'=>'很遗憾!修改失败');
			}
		}else{
			return array('state'=>'202','msg'=>'很遗憾!您没有权利做修改');
		}
			
	}
}
?>