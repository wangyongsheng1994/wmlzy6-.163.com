<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
use think\Db;
class Node extends Allow
{
	public function index(){
		$data = Db::query('select *,concat(path,",",id) as paths from oa_aside order by paths');
		$count = db("aside")->count();
		foreach($data as $k=>$v){
			$length=substr_count($v['path'],',');
			$data[$k]['name'] = str_repeat("---||-",$length).$v['name'];
		}
		// dump($data);
		return view("index",['data'=>$data,"count"=>$count]);
	}
	public function getadd(){
		$data = Db::query('select *,concat(path,",",id) as paths from oa_aside order by paths');
		foreach($data as $key=>$value){
			$length=substr_count($value['path'],',');
			//str_repeat 重复字符串
			$data[$key]['name'] = str_repeat("---||-",$length).$value['name'];
		}
		return $data;
	}
	public function add(){
		if(request()->post()){
			$data = request()->except(['action']);
			$pid = request()->param("pid");
			if($pid == 0){
				$data['path']="0";
			}else{
				$info=db("aside")->where('id',$pid)->find();
				$data['path'] = $info['path'].','.$info['id'];
			}
			if(db("aside")->insert($data)){
				return "添加成功";
			}else{
				return "添加失败";
			}
		}
		$data = db("aside")->select();
		$data = $this->getadd();
		return view("add",['data'=>$data]);
	}
	public function delete($id){
		$cate = db("aside")->where("pid",$id)->count();
		if($cate>0){
			return "201";
		}
		if(db("aside")->where("id",$id)->delete()){
			return "200";
		}
	}
	public function edit($id){
		if(request()->post()){
			$id=request()->param("id");
			$data['name']=request()->param();
			// dump($data);exit;
			if(db("aside")->where("id",$id)->update($data)){
				return "成功";
			}else{
				return "失败";
			}
		}
		//获取需要修改的数据
		$data = db("aside")->where("id",$id)->find();
		//获取类别数据
        $cate=Db::table("aside")->select();
        return view("edit",['data'=>$data,'cate'=>$cate]);
	}

}