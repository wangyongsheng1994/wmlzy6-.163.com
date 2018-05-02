<?php
function getCateBypid($pid){
    $data=db("aside")->where("pid",$pid)->select();
    $data1=[];
    //遍历 递归
    foreach($data as $key=>$value){
        $value['cate']= getCateBypid($value['id']);
        $data1[]=$value;
    }
    return $data1;
}
function getLogBypid($pid){
    $data=db("log")->where("pid",$pid)->select();
    $data1=[];
    //遍历 递归
    foreach($data as $key=>$value){
        $value['cate']= getLogBypid($value['id']);
        $data1[]=$value;
    }
    return $data1;
}
//递归函数
function getList($brr,$pid=0,&$arr=[],$level=1){
	foreach ($brr as $v){
		  if ($v['pid']==$pid) {
			$v['level']=$level;
			$arr[]=$v;
			getList($brr,$v['id'],$arr,$level+1);
		  }
	}
    return  $arr;
}
// 递归获取所有上一级的id
function getparentids($id,$str){
        $data = Db::name('role')->where('id',$id)->find();
        if($data['pid'] == 0){
            $str .= '';
         }else{
            $str .= $data['pid'].',';
    }
        if($data['pid']){
            return getparentids($data['pid'],$str);
    }else{
            return $str;
    }

}

// function getLogBypids($pid){
//     $data=db("role")->where("pid",$pid)->select();
//     $data1=[];
//     //遍历 递归
//     foreach($data as $key=>$value){
//         $value['cate']= getLogBypids($value['id']);
//         $data1[]=$value;
//     }
//     return $data1;
// }
// $role = model("aside")->select();
 		// $aside=getList($role);
// ===============================================================
// function SidType($pid){
// 	     $where['pid']=$pid;
// 	     $list=model('menu')->where($where)->select();
// 	     return $list;
// }
// // 前台代码
// {volist name=":SidType(2)" id="list"}

// {/volist}
// 获取到所有的父及的数据
function getparentid($data,$rid){
    $mydata = [];
        foreach ($data as $v) {
            if($v['id']==$rid){
                // $mydata[] = $v;
                // $mydata= getparentid($data,$v['pid']);
                $v['father']= getparentid($data,$v['pid']);
                $mydata[]=$v;
            }
        }
        return $mydata;
}

?>
