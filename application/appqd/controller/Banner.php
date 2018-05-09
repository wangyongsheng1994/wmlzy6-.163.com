<?php
namespace app\appqd\controller;
use think\Controller;
class Banner extends Controller
{
	public function index(){
    		return view('index');
	}
	public function upfile(){
		if(request()->post()){
			$data['edition'] = input('edition');
			$data['descript'] = input('descript'); 	
			$file = request()->file('app'); 
		    // 移动到框架应用根目录/uploads/ 目录下
		    $info = $file->validate(['size'=>156780000,'ext'=>'apk'])->move( '../public/App');
		    if($info){
		        // 成功上传后 获取上传信息
		        // 输出 jpg
		        // echo  $info->getExtension();
		        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
		        $files = $info->getSaveName();
		        // // 输出 42a79759f284b767dfcb2a0197904287.jpg
		        // echo $info->getFilename(); 
		    }else{
		        // 上传失败获取错误信息
		        echo $file->getError();
		    }
		    $data['url'] = 'App/'.$files; 
		    $data['time'] = time();
		    $res = Db('editon')->insert($data);  
		    if ($res) {
		    	return "<script>alert('上传成功');location.href='index.html'</script>";
		    }else{
		    	return "<script>alert('上传失败');location.href='index.html'</script>";
		    }
		}
	}
	public function getver(){//获取最新app版本的信息
		if(request()->post()){
			$edition = input('edition');
			$max_id=db('editon')->max('id');
 			$app_new_info=db('editon')->where('id',$max_id)->find();  
 			if($app_new_info['edition'] == $edition){
				// $app_new_info['status']='200';
				return json_encode(array('status'=>200,'msg'=>'目前版本为最新版本'));
			}else{
				return json_encode(array('status'=>400,'msg'=>'','xx'=>$app_new_info));
			}
			// return json_encode($app_new_info); 
		}
	}
}
