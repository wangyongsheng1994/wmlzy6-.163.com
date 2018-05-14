<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Banner extends Controller
{
	// 展示页面
	public function index(){
		$data = db("banner")->select();
		$tot = db("banner")->count();
		foreach($data as $k=>$v){
			// dump($v);
			$ima = explode(",",$v['url']);
			foreach($ima as $k1=>$v1){
				$data[$k]['url'] = $ima[0];
			}
		}
		return view("index",['data' => $data,"tot" => $tot]);
	}
	// 图片上传
	public function imageadd(){
		$file= request()->file();
		foreach ($file as $key => $value) {
			$info=$file[$key]->move( './images');
			$savename=$info->getSaveName();
			$path = str_replace('\\','/',$savename);
			echo '/images/'.$path;exit;
		}
	}
	/*添加图片*/
	public function add(){
		if(request()->post()){
			$image = request()->param("image");
			$time = time();
			$is_show = 0;
			$res = db("banner")->insert([
					"url" => $image,
					"time" => $time,
					"is_show" => $is_show
				]);
			if($res){
				return array("state" => 200, "msg" => "添加成功");
			}else{
				return array("state" => 201, "msg" => "添加失败");
			}
		}
		return view("add");
	}
	/*删除图片*/
	public function alldel(){
		$arr = isset($_POST['arr'])?$_POST['arr']:"";
		if(db("banner")->where("id","in",$arr)->delete()){
			return array("state" => 200,"msg" => "删除成功");
		}else{
			return array("state" => 200, "msg" => "删除失败");
		}
	}
	public function check(){
		$id = $_POST['id'];
		$show = $_POST['show'];
		switch ($show){
			case 1:
				$show = 0;
			break;
			case 0:
				$show = 1;
			break;
		}
		if(db("banner")->where("id",$id)->update(['is_show' => $show])){
			return array("state" => 200, "msg" => "修改成功");
			// return 200;
		}else{
			// return 201;
			return array("state" => 201, "msg" => "修改失败");
		}
	}
}
?>