<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Allow extends Controller
{
	public function initialize(){
		if(!Session::get("islogin")){
           $this->error("请先登录","admin/login/index");
        }
	}
}
?>