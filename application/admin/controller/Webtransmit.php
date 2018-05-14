<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Session;
class Webtransmit extends Controller
{
  public function index(){
    $webcate = getList(db("webcate")->select());
    if(request()->post()){
      $id = request()->param("id");
      $article = model("article")->where("webcate_id",$id)->select();
      return $article;
    }
    // dump($webcate);
   $this->assign([
      'webcate'=>$webcate, /*文章类别*/
    ]);
    return view("index");
  }
  public function indexs(){
    $id = request()->param("id");
    $article = db("article")->where("id",$id)->find();
    $webcate = db("webcate")->where("id",$article['webcate_id'])->find();
    $message  = db("message")->where("industrys",$webcate['id'])->select();
    return $message;
  }
  /* ************************************************************************************** */
  //使用curl 发送get/post请求 第二个参数有值是是post请求
    public function curl($url,$fields=[]){
        $ch = curl_init();
        //设置我们请求的地址
        curl_setopt($ch, CURLOPT_URL, $url);
        //数据返回都不要直接显示
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //禁止证书校验
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        //判断是否是post请求
        if($fields){
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        $data = '';
        if(curl_exec($ch)){
            //发送成功，获取数据
            $data = curl_multi_getcontent($ch);
          
        }
        curl_close($ch);
        return $data;
    }
    public function add(){
      $arr = isset($_POST['arr'])?$_POST['arr']:"";
      $article_id = $_POST['article_id'];
      /*查询出来文章*/
      $articles = db("article")->where("id",$article_id)->find();
      // 查询出来需要发送的地址
      $message = db("message")->where("id","in",$arr)->select();
      foreach($message as $k => $v){
        // $res = $this->curl($message[$k]['url'],$articles);
        // return $res;
        dump($v['url']);
      }

    }
    // public function add(){
    //   //文章id
    //   $article_id = $_POST['article_id'];
    //   // 行业 网站类别id
    //   $webcate_id = $_POST['webcate_id'];
    //   $arr = isset($_POST['arr'])?$_POST['arr']:"";
    //   // return $arr.":".$article.":".$arr;
    //   /*查询出来文章*/
    //   $articles = db("article")->where("id",$article_id)->find();
    //   /*查询出来所所属行业*/
    //   //$cate = db("webcate")->where("id",$webcate_id)->find();
    //   $articles['cate'] =$webcate_id;
    //   /*查询出来需要的网站*/
    //   $arr = implode(",",$arr);
    //   //定义返回数组
    //   $brr = [];
    //   //查询要发送的地址
    //   $message = db("message")->where("id","in",$arr)->select();
    //   dump($message);
      // // 循环
      // foreach($message as $k=>$v){
      //   //提交
      //   $res = $this->curl($message[$k]['url'],$articles);
      //   //反json
      //   $res = json_decode($res,true);
      //   //判断状态
      //   $res_arr = [
      //     'name' => $message[$k]['name'],
      //     'data' => $res['data']
      //   ];
      //   if($res['state'] == '200'){
      //     array_push($brr,$res_arr);
      //   }else if($res['state'] == '101'){
      //     array_push($brr,$res_arr);
      //   }else{
      //     array_push($brr,array('name' => $message[$k]['name'],'data' => '异常'));
      //   }

      // }
      // return $brr;
    // }

}