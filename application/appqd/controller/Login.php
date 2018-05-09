<?php
namespace app\appqd\controller;
use think\Controller;
class Login extends Controller
{
	public function login(){
		if(request()->post()){
            $data['username'] =input('phone');
            $data['password'] = input('pwd');
			$dats=Db("user")->where($data)->find(); 
			if($dats){
				return json_encode(array('state'=>200,'msg'=>'欢迎回来','xx'=>$dats));
			}else{
				return json_encode(array('state'=>400,'msg'=>'账号密码错误'));
			}
		}
	}
	public function logout(){
        $this->success("退出成功","/admin/login/index");
	}
	public function role(){
		if(request()->post()){
            $id =input('id');
			$dats=Db("role")->where('id',$id)->field('id,name')->find();
			if($dats){
				return json_encode(array('state'=>200,'msg'=>'','xx'=>$dats));
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，请稍候重试'));
			}
		}
	}
	public function addlog(){
		if(request()->post()){
            $data['user_id'] =input('id'); 
            $data['title'] =input('title'); 
            $data['content'] =input('content');
            $data['name'] =input('name');
            $data['time'] =time(); 
            // $data['status'] = 0 ; 

           $role = model("user")->with("Role")->find($data['user_id']);  
           $rid = $role['role_id'];
           $data['status'] = getparentids($rid,$rid.',');
           $data['status']=rtrim($data['status'], ",");
           $data['status']=ltrim($data['status'],$rid);
           $data['status']="0".$data['status'];
           // return $data;  
            // return json_encode(array($data)); 
            $updata = Db('log')->insert($data); 
			if(!empty($updata)){ 
				return json_encode(array('state'=>200,'msg'=>'提交成功'));
			}else{
				return json_encode(array('state'=>400,'msg'=>'提交失败，请重新提交'));
			}
		}
	}
	public function alllog(){
		if(request()->post()){  
            $data =input('id'); 
            $act =input('act');   
            if($act != 'myrz' ){  
            	return json_encode(array('sadas'=>'132')); 
            }
			$arr=Db("log")->where('user_id',$data)->paginate(5);
			if($arr){
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$arr));  
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败'));
			}
		}
	}
	public function alllogs(){
		if(request()->post()){ 
            $data =input('id'); 
            $act =input('act');   
            if($act != 'myrz' ){  
            	return json_encode(array('sadas'=>'132')); 
            }
			$dats=Db("log")->where('user_id',$data)->paginate(5);
			if(!empty($dats)){ 
				return json_encode(array('state'=>200,'msg'=>'查询成功','xx'=>$dats));
			}else{
				return json_encode(array('state'=>400,'msg'=>'系统繁忙，查询失败')); 
			} 
		}
	}
	public function bumen(){
		if(request()->post()){ 
            $data =input('id'); 
            $role = model("user")->where("id",$data)->field('id,roles_id')->find();
            if ($role['roles_id'] == 1) {
            	return json_encode(array('state'=>200,'msg'=>'即将开始审批'));
            }elseif($role['roles_id'] == 2){
				return json_encode(array('state'=>400,'msg'=>'您不是管理者，暂无该权限'));
            }else{
				return json_encode(array('state'=>401,'msg'=>'系统繁忙，请稍候重试'));
            }
		}
	}
	public function bumens(){
		if(request()->post()){ 
            $data =input('id'); 
            $data =3;
            $rolelist = Db('role')->where('pid',$data)->field('id,name')->select(); 
            if (!empty($rolelist)) {
            	return json_encode(array('state'=>200,'msg'=>'','data'=>$rolelist));
            }else{
            	return json_encode(array('state'=>400,'msg'=>'您暂时没有可审批的人员'));
            }
		}
	} 
	public function bumensa(){ //查询部门下的人员
		if(request()->post()){ 
            $data =input('name'); 
            $rolelist = Db('role')->where('name',$data)->field('id,name')->find(); 
			// $manlist = Db('user')->where('role_id',$rolelist['id'])->field('id,name,role_id')->select();
			$dats=Db("user")->where('role_id',$rolelist['id'])->field('id,username,role_id')->select();

            if (!empty($dats)) {
            	return json_encode(array('state'=>200,'msg'=>'','data'=>$dats)); 
            }else{
            	return json_encode(array('state'=>400,'msg'=>'该部门暂时没有可审批的人员')); 
            }
		}

	}
	public function sprz(){ 
		if (request()->post()) { 
	        $uid =input('id');  
	        // $tim =input('tim'); 
	    	$user = model('user')->with('Log')->find($uid);
		    // dump($user['roles_id']);
		    // echo "***********************************************************************";
		    //用户的角色
	        $roles = model('roles')->find($user['roles_id']);
	        // dump($roles['limits']);
	        // echo "***********************************************************************";
	        //该用户所属部门的管辖人员 
	        // dump($data);
	        // echo "***********************************************************************";
	        //该用户除本部门管辖的所有人员及日志
	        $dutys = getList(model('role')->with('User')->paginate(10),$user['role_id']);
	        
	        // dump($dutys);exit;
	       
	        if(!isset($dutys)){ 
	          $dutys = null;
	        }
	        
	        if (!empty($dutys)) {    
	        	return json_encode(array('state'=>200,'msg'=>'','xx'=>$dutys));  
	        }else{
	        	return json_encode(array('state'=>400,'msg'=>'暂无审批记录'));   
	        }
		}
	}
	public function spls(){  
		if(request()->post()){ 
			$uid =input('id');
			 // $tim =input('tim'); 
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
	       	$dutys = getList(model('role')->with('Users')->paginate(10),$user['role_id']);
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
	         if (!empty($log)) {    
	        	return json_encode(array('state'=>200,'msg'=>'','data'=>$log)); 
	        }else{
	        	return json_encode(array('state'=>400,'msg'=>'暂时没有可审批的日志')); 
	        }
		}
	}
	public function logdetails(){ 
		if(request()->post()){ 
            $data =input('id'); 
            $log = Db('log')->where('id',$data)->find();
            $log['times'] = date('Y-m-d H:i:s',$log['time']);
            $log['time1'] = date('Y-m-d',$log['timetwo']);
            $log['time11'] = date('m',$log['timetwo']);
            $log['time12'] = date('d',$log['timetwo']);
            $log['time13'] = date('H:i:s',$log['timetwo']);
            $log['time2']  = date('Y-m-d',$log['timethree']);   
            $log['time21'] = date('m',$log['timethree']);  
            $log['time22'] = date('d',$log['timethree']);  
            $log['time23'] = date('H:i:s',$log['timethree']);
            if(!empty($log['spone'])){
            	$user = Db('user')->where('username',$log['spone'])->find();
           		$role = Db('role')->where('id',$user['role_id'])->find();
           		$log['role1'] = $role['name']; 
            }
            if(!empty($log['sptwo'])){
            	$user1 = Db('user')->where('username',$log['sptwo'])->find();
           		$role1 = Db('role')->where('id',$user1['role_id'])->find();
           		$log['role2'] = $role1['name'];
            }
            if (!empty($log)) {
            	return json_encode(array('state'=>200,'msg'=>'','data'=>$log)); 
            }else{
            	return json_encode(array('state'=>400,'msg'=>'网络繁忙，请稍后重试')); 
            }
		}
 
	}
	public function auditprocese(){   //审批日志 
		if(request()->post()){ 
        $id =input('id');  //日志id
        $uid =input('roleid');  //用户id 
        $data = model("log")->find($id);
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

        // return $str;
        $strs = rtrim($str, ",");
        if(db("log")->where("id",$id)->setField('status',$strs)){
            return json_encode(array('state'=>200,'msg'=>'审批成功')); 
        }else{
            return json_encode(array('state'=>400,'msg'=>'网络繁忙，请稍后重试'));
        }
    }
	}
	public function lookrole(){
		if(request()->post()){ 
            $data =input('id'); 
            $log = Db('role')->where('id',$data)->find(); 
            if (!empty($log)) {
            	return json_encode(array('state'=>200,'msg'=>'','data'=>$log)); 
            }else{ 
            	return json_encode(array('state'=>400,'msg'=>'网络繁忙，请稍后重试'));  
            }
		}
	}
	public function spcg(){
		if(request()->post()){ 
            $data =input('id');  
            $role =input('role');

            $roe =  Db('role')->where('id',$role)->find();
            $log = Db('log')->where('id',$data)->find();
            $date = $log;   
            $date['role1'] = $roe['name'];   
            $user = Db('user')->where('username',$log['spone'])->find();
        	  $role1 = Db('role')->where('id',$user['role_id'])->find(); 
            $date['role2'] = $role1['name'];
            $date["timesa"] = date('Y-m-d',$log['timetwo']);  
            if (!empty($date)) {
            	return json_encode(array('state'=>200,'msg'=>'','data'=>$date)); 
            }else{ 
            	return json_encode(array('state'=>400,'msg'=>'网络繁忙，请稍后重试'));  
            }
		}
	}
  public function islog(){
    if(request()->post()){ 
      $data =input('id');  
      $log = Db('log')->where('id',$data)->find();
      if (!empty($log['timetwo'])) {
        return json_encode(array('state'=>200,'msg'=>'','data'=>$log)); 
      }else{ 
        return json_encode(array('state'=>400,'msg'=>'您的日志暂未审批'));  
      }
    }
  }

}
