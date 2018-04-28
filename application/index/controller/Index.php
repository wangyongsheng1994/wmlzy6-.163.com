<?php
namespace app\index\controller;
use think\Controller;
use think\facade\Session;
class Index extends Controller
{
    public function index()
    {
    	if(!Session::get("islogin")){
    		$this->error("请先登录","admin/login/index");
    	}else{
    		$this->redirect("/admin/index/index");
    	}
    }
}
