<?php /*a:3:{s:68:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\role\role.html";i:1524816945;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\header.html";i:1524816903;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\footer.html";i:1524816895;}*/ ?>
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
<title></title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo htmlentities($role['name']); ?>" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">网站角色：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<dl class="permission-list">
					<dt>
					
						<label>
							<?php if(in_array($vo['id'],$limit)): ?>
							<input type="checkbox" checked="checked" value="<?php echo htmlentities($vo['id']); ?>"  name="user-Character-0" id="user-Character-0"><?php echo htmlentities($vo['name']); else: ?>
							<input type="checkbox" value="<?php echo htmlentities($vo['id']); ?>"  name="user-Character-0" id="user-Character-0"><?php echo htmlentities($vo['name']); endif; ?>
						</label>
						
					</dt>	
					<dd>
						<dl class="cl permission-list2">
							<?php if(is_array($vo['cate']) || $vo['cate'] instanceof \think\Collection || $vo['cate'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['cate'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?>
							<dt>
								<label class="">
									<?php if(in_array($voo['id'],$limit)): ?>
									<input type="checkbox" checked="checked" value="<?php echo htmlentities($voo['id']); ?>" name="user-Character-0-0" id="user-Character-0-0"><?php echo htmlentities($voo['name']); else: ?>
									<input type="checkbox" value="<?php echo htmlentities($voo['id']); ?>" name="user-Character-0-0" id="user-Character-0-0"><?php echo htmlentities($voo['name']); endif; ?>
								</label>
							</dt>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							<!-- <dd>
								<label class="">
									<input type="checkbox" value="" name="user-Character-0-0-0" id="user-Character-0-0-0">
									添加</label>
							</dd> -->
						</dl>
					</dd>
				</dl>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="row cl">
			<input type="hidden" name="id" id="s" value="<?php echo htmlentities($role['id']); ?>">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">提交</a>
			</div>
		</div>
	</form>
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
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">

$(function(){
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});
});
function datadel(){
	layer.confirm('确认要选择这些吗？',function(index){
	arr=[];
	// 便利出来所有的复选框
	$(":checkbox").each(function(){
		//获取选中数据的id
		if($(this).prop("checked")){
			id=$(this).val();
			arr.push(id);
		}
	})
	var url="<?php echo url('update'); ?>";
	var sid = $("#s").val();
	$.post(url,{arr:arr,sid:sid},function(data){
		layer.msg(data,{icon:1,time:1500},function(){
		    parent.window.location.href="<?php echo url('index'); ?>";
		    var index=parent.layer.getFrameIndex(window.name);
		    parent.layer.close(index);
		});
	})
  })
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>