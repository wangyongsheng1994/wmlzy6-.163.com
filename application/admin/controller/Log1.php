<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Log extends Allow
{
	public function index(){
		$uid = Session::get("islogin");
		 //当前用户
        $user = model('user')->with('Logts')->find($uid);
        // dump($user);exit;
        //用户的角色
        $roles = model('roles')->find($user['roles_id']);
        // // dump($roles);
        return view("index",["user"=>$user['logts'],"use"=>$user]);
	}
	// 用户日志详细内容
	public function detail($id){
		$data = model("log")->find($id);
		return view("detail",["content"=>$data['content']]);
	}
  //日志的审批查看 待审批
	public function correct(){
    /*审批人的id*/
    $uid = Session::get("islogin");
    $data = model("role")->where("pid",$uid)->select();
    dump($data);
  }
  //审批日志
	public function correct(){
		$uid = Session::get("islogin");
		$user = model('user')->with('Log')->find($uid);
    // dump($user['role_id']);exit;
        //用户的角色
        $roles = model('roles')->find($user['roles_id']);
        //该用户所属部门管辖的人员 
        $datas = model('user')->with('Logs')->where('role_id',$user['role_id'])->where('roles_id',$roles['limits'])->select();
        // dump($datas);exit;
        // echo "*********************************************************************************"; 
        $log_arr =[];
        $key = 0;
        //该用户除本部门管辖的所有人员及日志
       	$dutys = getList(model('role')->with('Users')->select(),$user['role_id']);
        // dump($dutys);exit;
        foreach ($dutys as $k => $v) {
          // dump($dutys[$k]['users']);
          //所有用户
          foreach ($dutys[$k]['users'] as $kk => $vv) {
            //所有用户的日志
            $logLst = $dutys[$k]['users'][$kk]['logs'];
            // dump($dutys[$k]['users'][$kk]['logs']);
            foreach ($logLst as $kkk => $vvv) {
              //每一个日志
              // dump($logLst[$kk]);
              $log_flow_arr=explode(',',$logLst[$kkk]['status']);
              // dump($log_flow_arr);
              foreach($log_flow_arr as $k1=>$v1){
                // dump($log_flow_arr[$k1]);
                if($k1 == 0){
                  //dump('第一个,是自己部门的'.$kk.'---------'.$vv);
                  if($v1 == $user['role_id']){
                    //dump('第一个,是自己部门的'.$kk.'---------'.$vv);
                    $log_arr['log'][$key] = $vvv;
                    $key += 1;
                    //$untreated_arr['table_data'][$k]=$v;                 
                  }else{
                     //dump('第一个,不是自己部门的'.$vv);
                  }        
                }else{
                  // dump('不等于0 ===='.$k1); 
                  if($v1 == $user['role_id'] && $log_flow_arr[$k1-1]== 0){
                    $log_arr['log'][$key] = $vvv;
                    $key += 1;
                    //$untreated_arr['table_data'][$k]=$v;
                    //dump('不是第一个,是本部门的'.$v1);
                    // dump('不是第一个,是自己部门的'.$kk.'---------'.$vvv);
                  
                  }else{
                    //dump('不是第一个,不是本部门的'.$vv);
                  }            
                }       
              }
              
            }

          }
        }
        // dump($log_arr);
        // die;
        foreach($log_arr as $ks=>$vs){
          $log= $log_arr['log'];
        }
        if(!isset($datas)){
          $datas = null;
        }
        if(!isset($log)){
          $log = null;
        }
        $this->assign("log",$log);
        $this->assign("datas",$datas);
		return view("correct");
	}
	// 审批历史
	public function history(){
		$uid = Session::get("islogin");
    $rid = db("user")->where("id",$uid)->find();
    // $rid['role_id'];
    $user = model('user')->with('Log')->find($uid);
    // dump($user['role_id']);
    // die;
    $num2=(string)$user['role_id'];
    // dump($num2);
    // die;
    // dump($user['roles_id']);
    // echo "***********************************************************************";
    //用户的角色
        $roles = model('roles')->find($user['roles_id']);
        // dump($roles['limits']);
        // echo "***********************************************************************";
        //该用户所属部门的管辖人员
        $data = model('user')->with('Log')->where('role_id',$user['role_id'])->where('roles_id',$roles['limits'])->select();
        // dump($data);
        // echo "***********************************************************************";
        //该用户除本部门管辖的所有人员及日志
        $dutys = getList(model('role')->with('User')->select(),$user['role_id']);
        // dump($dutys);exit;
        if(!isset($data)){
          $data = null;
        }
        if(!isset($dutys)){
          $dutys = null;
        }
       
        $this->assign("dutys",$dutys);
        $this->assign("data",$data);
        $this->assign("num2",$num2);
        return view("history");
	}
    // 添加日志
    public function add(){
        if(request()->isAjax()){
           $id = Session::get("islogin");
           $username = Session::get("username");
           $rolename = Session::get("rolename");
           // 获取到该用户的角色
           $role = model("user")->with("Role")->find($id);
           //dump($role['role_id']);die;
           $rid = $role['role_id'];
           //dump($rid);exit;
           $data['status'] = getparentids($rid,$rid.',');
           $data['title'] = $rolename;
           $data['name'] = $username;
           $data['content'] = request()->param("content");
           $data['time'] = time();
           $data['user_id'] = $id;
           $data['status']=rtrim($data['status'], ",");
           $data['status']=ltrim($data['status'],$rid);
           $data['status']="0".$data['status'];
           $data['state'] = 0;
           // dump($data);
           if(model("log")->allowField(true)->save($data)){
                return "日志提交成功";
            }else{
                return "日志提交失败";
            }
        }
        return view("add");
    }
    // 日志的审批
    public function shenpi(){
        // return "111";
        // 获取到审批人的id
        $uid = Session::get("islogin");
        // 获取到日志id
        $id = request()->param("id");
        $time = time();
        // 查询到日志
        $data = model("log")->find($id);
        // 日志人id
        $log_id = $data['user_id'];
        // dump($data['status']);exit;
        $arr = explode(",",$data['status']);
        $str = "";
        foreach($arr as $k=>$v){
          // dump($arr[$k]);
          if($v == 0){
            $str .= "0,";
          }else if($v != 0 && $arr[$k-1] == 0){
            $str .= "0,";
          }else{
            $str .= $v.",";
          }
        }
        // echo $time."--".$id."--".$uid."--".$log_id; 
        $dataw['time'] = $time;
        $dataw['log_id'] = intval($id);
        $dataw['shenpi_id'] = $uid;
        $dataw['user_log_id'] = $log_id;
        // dump($dataw);exit;
        // return $str;
        $strs = rtrim($str, ",");
        $string = "0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0";
        if(strpos($string,$strs) !== false){
          db("log")->where("id",$id)->update(["state" => 1]);
        }
        if(db("log")->where("id",$id)->setField('status',$strs)){
          db("loghostory")->insert($dataw);
            return "success";
        }else{
            return "error";
        }
    }
    // 一键审批
    public function allshenpi(){
      $arr = isset($_POST['arr'])?$_POST['arr']:"";
      foreach($arr as $k=>$v){
       $data = db("log")->where("id",$v)->find();
        // dump($data['status']);
        $log_arr = explode(",",$data['status']);
        // dump($log_arr);
        $key = '';
        foreach ($log_arr as $k1 => $v1) {
          if($v1 !=0){
            $key = $k1;
            break;
          }
        }
        $log_arr[$key] = 0;
        $logs_arr = implode(",",$log_arr);
        $data = db("log")->where("id",$v)->update(['status'=>$logs_arr]);
        }
        return "success";
      }
  }


