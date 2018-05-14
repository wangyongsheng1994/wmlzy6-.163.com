<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
use think\facade\Cookie;
class Login extends Controller
{
	public function index(){
		return view("index");
	}
	public function dologin(){
		$request = request();
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$code = $_POST['code'];
		Cookie::set('names',$username,3600);
		$data=db("user")->where('username',$username)->where('password',$password)->find();
		// dump($data);
		// die;
		$id = $data['id'];
		// echo $username.":".$password.":".$code;
		if(!captcha_check($code)){
			$this->error("验证码输入错误!",'admin/login/index');
		}
		if($data){
			Session::set('islogin',$id);
			Session::set('oldlogip',$data['logip']);
			Session::set('oldtime',$data['time']);
			Session::set('username',$data['username']);
			$row['number']=$data['number']+1;
			$row['time']=time();
            $row['logip']=$request->ip();
            db("user")->where("id",$id)->update($row);
            $datas = model("user")->where('id',$data['id'])->with('Role')->find();
            Session::set('user_limit',$datas['role']['limit']);
            Session::set("rolename",$datas['role']['name']);
			$this->success("登录成功!!!",'/admin/index/index');
		}else{
			$this->error("账号或密码错误!",'admin/login/index');
		}
	}
	public function logout(){
		Session::clear();
        $this->success("退出成功","/admin/login/index");
	}
}