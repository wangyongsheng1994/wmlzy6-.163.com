<?php /*a:3:{s:76:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\webtransmit\index.html";i:1525244748;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\header.html";i:1524816903;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\footer.html";i:1524816895;}*/ ?>
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
<title>添加</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<article class="page-container">
<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	<form class="form form-horizontal" id="form-admin-add">
		<br>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-1">行业选择：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<span class="select-box">
					<select class="select" size="1" onchange="gradeChanges()" id="b" name="webcate_id">
						<option value="0">-----------暂未选择---------</option>
						<?php if(is_array($webcate) || $webcate instanceof \think\Collection || $webcate instanceof \think\Paginator): if( count($webcate)==0 ) : echo "" ;else: foreach($webcate as $key=>$voo): ?>
						<option id="selects" value="<?php echo htmlentities($voo['id']); ?>"><?php echo str_repeat('|——',$voo['level']); ?><?php echo htmlentities($voo['industry']); ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
			</div>
		</div>
		<br>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-1">文章选择：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<span class="select-box">
					<select class="select" size="1" onchange="gradeChangess()" id="a" name="article_id">
						<option value="0">-----------暂未选择---------</option>
						
					</select>
				</span>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<table class="table table-border table-bordered table-hover table-bg table-sort">
		<p class="btn  radius">转发列表</p>
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">&nbsp;ID</th>
				<th width="40">网站名称</th>
				<th width="40">转发地址</th>
				<th width="100">账号</th>
			</tr>
		</thead>
		<tbody id="resLists">
			<!-- <?php if(is_array($message) || $message instanceof \think\Collection || $message instanceof \think\Paginator): $i = 0; $__LIST__ = $message;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo htmlentities($vo['id']); ?>" name=""></td>
				<td><?php echo htmlentities($vo['id']); ?></td>
				<td><?php echo htmlentities($vo['name']); ?></td>
				<td><?php echo htmlentities($vo['url']); ?></td>
				<td><?php echo htmlentities($vo['username']); ?></td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?> -->
		</tbody>
	</table>
	
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-8 col-sm-offset-8">
				<!-- <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;"> -->
				<a href="javascript:;" onclick="allput()" class="btn btn-primary radius">&nbsp;&nbsp;一键转发&nbsp;&nbsp;</a>
			</div>
		</div>
	</form>
	
	<p class="btn  radius">转发结果</p>
	
	<table  class="table table-border table-bordered table-hover table-bg">
		<tbody id="resList">
			
			
			
		</tbody>
	</table>
</article>

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
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">

function gradeChanges(){
	//var objS = document.getElementById("dutyId");
	var options=$("#b option:selected");
	var id = options.val();
	var url = "<?php echo url('select'); ?>";
	var option = '';
	$.post(url,{id:id},function(data){
		 
		for(var i = 0;i< data.length; i++){
			option +='<option value="'+data[i].id+'">'+data[i].title+'</option>';
		}
		 $("#a").html(option);
	})
}

function gradeChangess(){
	var options=$("#b option:selected");
	var id = options.val();
	var url = "<?php echo url('selects'); ?>";
	var option = '';
	$.post(url,{id:id},function(data){
		console.log(data);
		var html = '';
		for(var i = 0; i < data.length; i++){
			html += '<tr class="text-c">'+
						'<td><input type="checkbox" value='+data[i]['id']+' name=""></td>'+
		     			'<td>'+data[i]['id']+'</td>'+
		     			'<td>'+data[i]['name']+'</td>'+
		     			'<td>'+data[i]['url']+'</td>'+
						'<td>'+data[i]['username']+'</td>'+
		     			'</tr>';
		}
		$("#resLists").html(html);
	})


}



$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
});
function allput(){
  layer.confirm('确定要发送吗',function(index){
    arr=[];
    // 便利出来所有的复选框
    $(":checkbox").each(function(){
      //获取选中数据的id
      if($(this).prop("checked")){
        id=$(this).val();
        
        arr.push(id);
      }
    })
    var article_id = $("#a").val();
    var webcate_id = $("#b").val();

    if(article_id == 0){
    	layer.msg('请选择要转发的文章',{icon:5,time:1000});
    	return false;
    }
    if(arr.length <= 0){
    	layer.msg('请选择要转发的网站',{icon:5,time:1000});
    	return false;
    }
    var url="<?php echo url('add'); ?>";
    //layer.msg('提交成功!',{icon:1,time:1000});
    $.post(
    	url,
    	{arr:arr,article_id:article_id,webcate_id:webcate_id},
    	function(data){
	      	console.log(data);
	      	// layer.msg('提交成功!',{icon:1,time:1000});
	      	var html = '';
		    for (var i = 0;  i < data.length; i++) {
		    	
		     	html +=	'<tr class="text-c">'+
		     			'<td>'+data[i]['name']+'</td>'+
		     			'<td>'+data[i]['data']+'</td>'+
		     			'</tr>';
		     }
		    //console.log(html);
		    $("#resList").html(html); 
			layer.msg('提交成功!',{icon:1,time:1000});
    	}
    )
  });
}
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>