<?php /*a:3:{s:69:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\email\send.html";i:1524816734;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\header.html";i:1524816903;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\footer.html";i:1524816895;}*/ ?>
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
<title>发送列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 邮件中心 <span class="c-gray en">&gt;</span> 邮件管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a href="javascript:;" onclick=member_send('删除历史','<?php echo url('lastdeletes'); ?>') class="btn btn-primary radius"><i class="Hui-iconfont">&#xe62b;</i>删除历史</a>
		</span>
		<span class="r">共有数据：<strong>88</strong> 条</span>
	</div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="15"><input type="checkbox" name="" value=""></th>
				<th width="20">ID</th>
				<th width="40">发送人</th>
				<th width="40">接收人</th>
				<th width="50">标题</th>
				<th width="180">内容</th>
				<th width="80">时间</th>
				<th width="80">读取状态</th>
				<th width="80">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo htmlentities($vo['id']); ?>" name=""></td>
				<td><?php echo htmlentities($vo['id']); ?></td>
				<td><?php echo htmlentities($vo['send']); ?></td>
				<td><?php echo htmlentities($vo['receive']); ?></td>
				<td><?php echo htmlentities($vo['title']); ?></td>
				<td><?php echo mb_substr($vo['content'],0,28); ?>...<u style="cursor:pointer" class="text-primary" onclick=member_show('邮件-查看','<?php echo url('detail',array('id'=>$vo['id'])); ?>','<?php echo htmlentities($vo['id']); ?>','800','600')>点我查看</u></td>
				<td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($vo['time'])? strtotime($vo['time']) : $vo['time'])); ?></td>
				<td><?php echo htmlentities($arr[$vo['state']]); ?></td>
				<td class="td-manage">

				<a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo htmlentities($vo['id']); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>

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
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,5]}// 制定列不参与排序
		]
	});
	
});
/*邮件-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*邮件-历史*/
function member_send(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*邮件-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*邮件-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		var url = "<?php echo url('senddel'); ?>";
		$.post(url,{id:id},function(data){
			$(obj).parents("tr").remove();
			layer.msg('已删除!',{icon:1,time:1000});
		});
	});
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要启标为已读？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var url="<?php echo url('start'); ?>";
			$.post(url,{id:id},function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="已读" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已读</span>');
				$(obj).remove();
				layer.msg('已标记!',{icon: 5,time:1000});
		});
	});
}
			

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启标为未读？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var url="<?php echo url('stop'); ?>";
		$.post(url,{id:id},function(data){
			$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="未读" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
			$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">未读</span>');
			$(obj).remove();
			layer.msg('已标记!', {icon: 6,time:1000});
		});
	});
}

/*批量-删除*/
function datadel(){
  layer.confirm('确认要删除吗？',function(index){
    arr=[];
    // 便利出来所有的复选框
    $(":checkbox").each(function(){
      //获取选中数据的id
      if($(this).prop("checked")){
        id=$(this).val();
        arr.push(id);
      }
    })
    var url="<?php echo url('alldel'); ?>";
    $.post(url,{arr:arr},function(data){
      // alert(data);
     if(data=="success"){
        for(var i=0;i<arr.length;i++){
	        //根据id获取input tr 
	        $("input[value='"+arr[i]+"']").parents("tr").remove();
      	}
      layer.msg('已删除!',{icon:1,time:1000});
     }
    })
  });
}
</script> 
</body>
</html>