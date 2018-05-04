<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class User extends Allow
{
	public function index(){
		$data = model("user")->with("role")->select();
		return view("index",['data'=>$data]);
	}
	 // 状态禁用
    public function stop(){
        $id=$_POST['id'];
        $res=db("user")->update(['id'=>$id,'status'=>2]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    // 状态的启用
    public function start(){
        $id=$_POST['id'];
        $res=db("user")->update(['id'=>$id,'status'=>1]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function add(){
    	if(request()->post()){
    		$data = request()->except("s_province,s_city,s_county");
            $sheng = $_POST['s_province'];
            $shi = $_POST['s_city'];
            $xiang = $_POST['s_county'];
            $data['address'] = $sheng.$shi.$xiang;
    		$data['status'] = 1;
    		$data['time'] = time();
    		if(model("user")->allowField(true)->save($data)){
    			return "恭喜您!添加成功";
    		}else{
    			return "400";
    		}
    	}
    	return view("add");
    }
    public function edit($id){
    	if(request()->post()){
    		$id = request()->param("id");
    		$data = request()->except("id");
    		if(model("user")->allowField(true)->save($data,['id'=>$id])){
    			return "恭喜您!修改成功";
    		}else{
    			return "400";
    		}
    	}
    	$data = model("user")->find($id);
    	return view("edit",['data'=>$data]);
    }
    public function role($id){
        $user = db("user")->where("id",$id)->find();
        // dump($user);die;
        $roles = db("role")->where("id",$user['role_id'])->find();
        $role = getList(db("role")->select());
        // dump($role);die;
        // $role = getLogBypids(0);
        // dump($role);die;
    	return view("role",['user'=>$user,'role'=>$role,'roles'=>$roles]);
    }
    public function update(){
        // 获取到需要更新的数据
        $ids = request()->param("ids");
        // 获取到部门id
        $id = request()->param("id");
        // 获取到部门角色id
        $rsid = request()->param("rsid");
        if(db("user")->update(['id'=>$ids,'role_id'=>$id,'roles_id'=>$rsid])){
            return "更改成功";
        }else{
           return "更改失败";
        }
    }
    public function delete($id){
       $res = db("user")->where("id",$id)->delete();
        if($res){
            return "200";
        }else{
            return "删除失败";
        }
    }
}