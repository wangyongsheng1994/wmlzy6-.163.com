<?php /*a:3:{s:77:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\customer\all_index.html";i:1525397378;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\header.html";i:1524816903;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\footer.html";i:1524816895;}*/ ?>
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
<title>客户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 客户中心 <span class="c-gray en">&gt;</span> 客户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
		<!-- <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
		
		 <a href="javascript:;" onclick="member_add('添加客户','<?php echo url('add'); ?>','1100','800')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加客户</a> --></span>
		 
	</div>

	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="25">ID</th>
				<th width="80">客户名</th>
				<th width="80">负责人</th>
				<th width="120">客户需求简述</th>
				<th width="40">性别</th>
				<th width="90">手机</th>
				<th width="100">邮箱</th>
				<th width="100">地址</th>
				<th width="30">接触记录</th>
				<th width="100">加入时间</th>
			
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): if(is_array($vo['customers']) || $vo['customers'] instanceof \think\Collection || $vo['customers'] instanceof \think\Paginator): if( count($vo['customers'])==0 ) : echo "" ;else: foreach($vo['customers'] as $key=>$voo): ?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo htmlentities($voo['id']); ?>" name=""></td>
				<td><?php echo htmlentities($voo['id']); ?></td>
				<td><?php echo htmlentities($voo['name']); ?></td>
				<td><?php echo htmlentities($vo['username']); ?></td>
				<td><?php echo mb_substr($voo['descr'],0,18); ?>... ...<u style="cursor:pointer" class="text-primary" onclick=member_show('客户-内容详情','<?php echo url('detail',array('id'=>$voo['id'])); ?>','<?php echo htmlentities($voo['id']); ?>','800','800')>点我查看</u></td>
				<td><?php echo htmlentities($arr[$voo['sex']]); ?></td>
				<td><?php echo htmlentities($voo['phone']); ?></td>
				<td><?php echo htmlentities($voo['email']); ?></td>
				<td><?php echo htmlentities($voo['address']); ?></td>
				<td><?php echo htmlentities($voo['contact']); ?></td>
				<td><?php echo htmlentities(date( "Y-m-d H:i:s",!is_numeric($voo['time'])? strtotime($voo['time']) : $voo['time'])); ?></td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
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
		  {"orderable":false,"aTargets":[0,7,8]}// 制定列不参与排序
		]
	});
	
});
/*客户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*客户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*客户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*客户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*客户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*客户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		var url = '<?php echo url("delete"); ?>';
		$.post(url,{id:id},function(data){
			if(data == 200){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			}
		})	
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
     if(data=="200"){
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