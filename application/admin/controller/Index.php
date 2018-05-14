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
        /* ************************************ 
        日志的审批通知
        **************************************** */
        $uid = Session::get("islogin");
        $user = model("user")->where("id",$uid)->find();
        $data = model("role")->where("pid",$user['role_id'])->select();                 /*查询出来所有下级的角色*/
        $arr = [];
        foreach($data as $k=>$v){
            $arr[] = $v['id'];
        }
        $row = model("user")->where("role_id","in",$arr)->select();                     /*查询出来待审批人*/
        $arrs = [];
        foreach($row as $k1=>$v1){
            $arrs[] = $v1['id'];
        }
        $log_tot = model("log")->where("user_id","in",$arrs)->where("state",0)->count();  /*未审批数量*/
    		// dump($aside);exit;
		/* ********************************
            邮件未读取      
        *********************************** */
        $username = Session::get("username");
        $email_tot = db("email")->where("receive",$username)->where("receive_id",1)->where("state",0)->count();
        // dump($email_tot);
        $tot = $log_tot + $email_tot;
        $this->assign([
            "log_tot" => $log_tot,
            'aside'=>$aside,
            'email_tot' => $email_tot,
            "tot" =>$tot
            ]);
        return view("index");
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
    /*个人信息修改*/
    public function info(){
        $id = Session::get("islogin");
        $data = model("user")->with('role')->with('Roles')->where("id",$id)->find();
        if(request()->isAjax()){
            $uid = Session::get("islogin");
            $oldpassword = request()->param("oldpassword");
            $user = model("user")->where("id",$uid)->find();
            // dump($user['password']);
            if($user['password'] != md5($oldpassword)){
                return "旧密码输入错误";
            }
            $info = request()->except("oldpassword,password2,password");
            $info['password'] = md5($_POST['password']);
            if(model("user")->allowField(true)->save($info,['id'=>$uid])){
              return "修改成功";
            }else{
              return "修改失败";
            }
        }
        return view("info",['data'=>$data]);
    }
    /*
        审批通知
     */
    public function shenpi(){
         /*审批人的id*/
        $uid = Session::get("islogin");
        $user = model("user")->where("id",$uid)->find();
        $data = model("role")->where("pid",$user['role_id'])->select();                 /*查询出来所有下级的角色*/
        $arr = [];
        foreach($data as $k=>$v){
            $arr[] = $v['id'];
        }
        $row = model("user")->where("role_id","in",$arr)->select();                           /*查询出来待审批人*/
        $arrs = [];
        foreach($row as $k1=>$v1){
            $arrs[] = $v1['id'];
        }
        $res = model("log")->where("user_id","in",$arrs)->where("state",0)->select();  /*查询出来待审批人的日志*/
        // dump($res);die;
        return view("shenpi",["res" => $res]);
    }
    /*
        邮件未读的便利
     */
    public function email(){
        $username = Session::get("username");
        db("email")->where("receive_id",3)->where("send_id",3)->delete();
        $data = db("email")->where("receive",$username)->where("receive_id",1)->where("state",0)->select();
        $this->assign("data",$data);
        return view("email");
    }
}
