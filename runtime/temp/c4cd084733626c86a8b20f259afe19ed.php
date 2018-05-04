<?php /*a:3:{s:69:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\node\index.html";i:1524816884;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\header.html";i:1524816903;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\footer.html";i:1524816895;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/h-ui.admin/css/style.css" />

<link rel="stylesheet" type="text/css" href="/static/admin/static/ali/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/ali/iconfont.eot" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/ali/iconfont.svg" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/ali/iconfont.ttf" />
<link rel="stylesheet" type="text/css" href="/static/admin/static/ali/iconfont.woff" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>节点列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 节点管理 <span class="c-gray en">&gt;</span> 节点列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
  <div class="cl pd-4 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" onclick=picture_add('添加','<?php echo url("add"); ?>') href="javascript:;"><i class="Hui-iconfont">&#xe600;</i> 添加节点</a></span> <span class="r">共有数据：<strong><?php echo htmlentities($count); ?></strong> 条</span> </div>
  <div class="mt-20">
    <table class="table table-border table-bordered table-bg">
      <thead>
        <tr>
          <th scope="col" colspan="7">节点列表</th>
        </tr>
        <tr class="text-c">
          <th><input name="" type="checkbox" value=""></th>
          <th>ID</th>
          <th>名称</th>
          <th>PID</th>
          <th>PATH</th>
          <th>URL</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$row): ?>
        <tr class="text-c">
          <td><input name="" type="checkbox" value=""></td>
          <td><?php echo htmlentities($row['id']); ?></td>
          <td><?php echo htmlentities($row['name']); ?></td>
          <td><?php echo htmlentities($row['pid']); ?></td>
          <td><?php echo htmlentities($row['path']); ?></td>
          <td class="td-status"><?php echo htmlentities($row['mname']); ?>/<?php echo htmlentities($row['aname']); ?></td>
          <td class="td-manage">
            <a style="text-decoration:none" class="ml-5" onClick=picture_edit('节点编辑','<?php echo url("edit",array('id'=>$row['id'])); ?>','') href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> 
            <a style="text-decoration:none" class="ml-5" onClick="picture_del(this,'<?php echo htmlentities($row['id']); ?>')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
    </table>
  </div>
</div>

<!--_footer 作为公共模版分离出去-->
<!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/static/admin/static/ali/iconfont.js"></script>
<!--/_footer 作为公共模版分离出去-->
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
  "aaSorting": [[ 1, "desc" ]],//默认第几个排序
  "bStateSave": true,//状态保存
  "aoColumnDefs": [
    //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
    {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
  ]
});

/*节点-添加*/
function picture_add(title,url){
  var index = layer.open({
    type: 2,
    title: title,
    content: url
  });
  layer.full(index);
}

/*节点-查看*/
function picture_show(title,url,id){
  var index = layer.open({
    type: 2,
    title: title,
    content: url
  });
  layer.full(index);
}

/*节点-审核*/
function picture_shenhe(obj,id){
  layer.confirm('审核节点？', {
    btn: ['通过','不通过'], 
    shade: false
  },
  function(){
    $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="picture_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
    $(obj).remove();
    layer.msg('已发布', {icon:6,time:1000});
  },
  function(){
    $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="picture_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
    $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
    $(obj).remove();
      layer.msg('未通过', {icon:5,time:1000});
  }); 
}

/*节点-下架*/
function picture_stop(obj,id){
  layer.confirm('确认要下架吗？',function(index){
    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
    $(obj).remove();
    layer.msg('已下架!',{icon: 5,time:1000});
  });
}

/*节点-发布*/
function picture_start(obj,id){
  layer.confirm('确认要发布吗？',function(index){
    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="picture_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
    $(obj).remove();
    layer.msg('已发布!',{icon: 6,time:1000});
  });
}

/*节点-申请上线*/
function picture_shenqing(obj,id){
  $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
  $(obj).parents("tr").find(".td-manage").html("");
  layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
}

/*节点-编辑*/
function picture_edit(title,url,id){
  var index = layer.open({
    type: 2,
    title: title,
    content: url
  });
  layer.full(index);
}

/*节点-删除*/
function picture_del(obj,id){
  layer.confirm('确认要删除吗？',function(index){
    var url="<?php echo url("delete"); ?>";
    $.post(url,{id:id},function(data){
      if(data==200){
        $(obj).parents("tr").remove();
        layer.msg('已删除!',{icon:1,time:1000});
      }else{
        layer.msg('请先删除子类节点',{icon:1,time:2000});
      }
    });
  });
}
/*批量-删除*/
function datadel(){
  layer.confirm('确认要删除吗？',function(index){
    arr=[];
    // 便利出来所有的复选框
    $(":checkbox").each(function(){
      // 获取选中的id
          if($(this).prop("checked")){
        //获取选中数据的id
            id=$(this).val();
            arr.push(id);
            // alert(arr);
          }
    })
    var url="<?php echo url('alldel'); ?>";
    $.post(url,{arr:arr},function(data){
      if(data==1){
        //便利arr
        for(var i=0;i<arr.length;i++){
          //根据id获取input tr 
          $("input[value='"+arr[i]+"']").parents("tr").remove();
        }
        layer.msg('已删除!',{icon:1,time:1000});
      }else{
        layer.msg('删除失败!',{icon:1,time:1000});
      }
    });

  });
}
</script>
</body>
</html>