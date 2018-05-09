<?php
namespace app\appqd\controller;
use think\Controller;
class Uphoto extends Controller
{
	public function index(){
		if (request()->post()) {
			$id = input('id');
			$photo = str_replace('data:image/png;base64,', '', input('photo'));
			// $time=str_replace('-','',date('Y-m-d',time()));    
			$img = 'photo/'.time().uniqid().'.png';        
			file_put_contents($img, base64_decode($photo)); 
			$image['img'] = $img; 
			$user = model('user')->where('id',$id)->update($image);  
 
			if ($user) {
				return json_encode(array('status'=>200,'msg'=>'上传成功','img'=>$img));  		
			}else{
				return json_encode(array('status'=>400,'msg'=>'上传失败'));		
			}

		}
    	 
	}

}
