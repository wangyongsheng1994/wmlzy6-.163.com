<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Index extends Allow
{	
	 public function getcatebypid($pid){
        $arr=Session::get('user_limit');
        $data=model("aside")->where("id",'in',$arr)->where("pid",$pid)->select();
        $data1=[];
        //遍历 递归
        foreach($data as $key=>$value){
            $value['cate']=$this->getcatebypid($value['id']);
            $data1[]=$value;
        }
        return $data1;
    }
	public function index(){
		$aside=$this->getcatebypid(0);
		// dump($aside);exit;
		return view("index",['aside'=>$aside]);
	}
	 public function welcome(){
    	$id=Session::get('islogin');
        $request=request();
        $data=db("user")->where("id",$id)->find();
        // 获取当前域名
        $data['domain']=$request->domain();
        // WEB服务端口
        $data['port']=$_SERVER['SERVER_PORT'];
        // '网站文档目录'
        $data['document']=$_SERVER["DOCUMENT_ROOT"];
        // 服务器时间
        $data['newtime']=time();
        // 操作系统
        $data['pack']=PHP_OS;
        // 剩余空间
        $data['space']=round((disk_free_space(".")/(1024*1024)),2).'M';
        // 通信协议
        $data['protocol']=$_SERVER['SERVER_PROTOCOL'];
        // dump($data);
        $this->assign('data',$data);
    	return view("welcome");
    }
    public function info(){
        $id = Session::get("islogin");
        $data = model("user")->with('role')->with('Roles')->where("id",$id)->find();
        if(request()->isAjax()){
           $dataws = request()->param();
           $oldpassword = request()->param("oldpassword");
            if($dataws['password'] == null){
                $dataws['password'] = $oldpassword;
            }
            if(model("user")->allowField(true)->save($dataws,['id' => $id])){
                return "修改成功";
            }else{
                return "修改失败";
            }
        }
        return view("info",['data'=>$data]);
    }
}
