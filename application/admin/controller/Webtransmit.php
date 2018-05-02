<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Webtransmit extends Controller
{
	public function index(){
		$article = db("article")->select();
		$webcate = getList(db("webcate")->select());
		$message = db("message")->select();
		// dump($message);
		// die;
		return view("index",['article'=>$article,'webcate'=>$webcate,'message'=>$message]);
	}
	/* ************************************************************************************** */
	//使用curl 发送get/post请求 第二个参数有值是是post请求
    public function curl($url,$fields=[]){
        $ch = curl_init();
        //设置我们请求的地址
        curl_setopt($ch, CURLOPT_URL, $url);
        //数据返回都不要直接显示
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //禁止证书校验
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        //判断是否是post请求
        if($fields){
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        $data = '';
        if(curl_exec($ch)){
            //发送成功，获取数据
            $data = curl_multi_getcontent($ch);
          
        }
        curl_close($ch);
        return $data;
    }

}