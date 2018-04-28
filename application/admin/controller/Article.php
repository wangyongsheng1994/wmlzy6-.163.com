<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Article extends Controller
{
	public function index(){
		$data = model("article")->with("Webcate")->select();
		// dump($data);die;
		return view("index",['data'=>$data]);
	}
	public function add(){
		$webcate = getList(db("webcate")->select());
		return view("add",['webcate'=>$webcate]);
	}
	// 文章的添加
	public function insert(){
		if(request()->isAjax()){
			$data = request()->param();
			$file = request()->file('image');
			$info = $file->move( './image');
			$savename = $info->getSaveName();
			$path = str_replace('\\','/',$savename);
			$data['time'] = time();
			$data['image'] = '/image'.'/'.$path;
			// dump($data);exit;
			if(model("article")->allowField(true)->save($data)){
				return "文章添加成功";
			}else{
				return "文章添加失败";
			}
		}
	}
	public function edit($id){
		$data = db("article")->where("id",$id)->find();
		$webcate = getList(db("webcate")->select());
		// dump($webcate);exit;
		return view("edit",["data"=>$data,"webcate"=>$webcate]);
	}
	// 文章的修改
	public function update(){
		$file = request()->file('image');
		if($file == null){
			// 未执行文件上传
			$id = request()->param("id");
			$data = request()->except("id,image");
			$data['image'] = $data['images'];
			if(model("article")->allowField(true)->save($data,['id'=>$id])){
				return "恭喜您!修改成功";
			}else{
				return "很遗憾!修改失败";
			}
			
		}
		// 图片的处理
		$id = request()->param("id");
		$images = request()->param("images");
		$data = request()->except("id,images");
		$info = $file->move( './image');
		$savename = $info->getSaveName();
		$path = str_replace('\\','/',$savename);
		$data['image'] = '/image'.'/'.$path;
		if(model("article")->allowField(true)->save($data,['id'=>$id])){
			if(isset($images)){
				unlink(".".$images);
			}
			return "恭喜您!修改成功";
		}else{
			return "很遗憾!修改失败";
		}
	}
	// 文章的删除
	public function delete($id){
		// echo $id;
		$data = db("article")->find($id);
		$image = $data['image'];
		if(model("article")->where("id",$id)->delete()){
			if(isset($image)){
				unlink(".".$image);
			}
			return "success";
		}else{
			return "删除失败";
		}
	}
				

}
?>