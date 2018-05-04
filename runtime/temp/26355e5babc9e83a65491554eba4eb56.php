<?php /*a:3:{s:68:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\seal\edit.html";i:1524884084;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\header.html";i:1524816903;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\footer.html";i:1524816895;}*/ ?>
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
<title>添加信息</title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>收到日期：</label>
		<div class="formControls col-xs-8 col-sm-5">
			<input type="date" class="input-text" placeholder=""  value="<?php echo htmlentities($data['receive_time']); ?>" id="receive_time" name="receive_time">
		</div>
		
	</div> 
	<div class="row cl">	
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>启用日期：</label>
		<div class="formControls col-xs-6 col-sm-5">
			<input type="date" class="input-text" placeholder=""  value="<?php echo htmlentities($data['use_time']); ?>" id="use_time" name="use_time">
		</div>
	</div>
	<!-- <div class="row cl">	
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用印人：</label>
		<div class="formControls col-xs-6 col-sm-5">
			<input type="text" class="input-text" placeholder=""  value="<?php echo htmlentities($use_name); ?>" id="seal_use_name" name="seal_use_name">
		</div>
	</div> -->

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用印人：</label>
		<div class="formControls col-xs-5 col-sm-5">
				<span class="select-box">
					<select class="select" size="1" name="seal_use_name">
						<option value="0">---请选择---</option>
						<?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): if( count($user)==0 ) : echo "" ;else: foreach($user as $key=>$voo): ?>
						<option <?php if($voo['id'] == $use_name): ?>selected<?php else: endif; ?> value="<?php echo htmlentities($voo['id']); ?>">---<?php echo htmlentities($voo['username']); ?>---</option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
		</div>
	</div>
	<!-- <div class="row cl">	
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>批准人：</label>
		<div class="formControls col-xs-6 col-sm-5">
			<input type="text" class="input-text" placeholder=""  value="<?php echo htmlentities($roval_name); ?>" id="seal_roval_name" name="seal_roval_name">
		</div>
	</div> -->
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>批准人：</label>
		<div class="formControls col-xs-5 col-sm-5">
				<span class="select-box">
					<select class="select" size="1" name="seal_roval_name">
						<option value="0">---请选择---</option>
						<?php if(is_array($user) || $user instanceof \think\Collection || $user instanceof \think\Paginator): if( count($user)==0 ) : echo "" ;else: foreach($user as $key=>$voo): ?>
						<option <?php if($voo['id'] == $roval_name): ?>selected<?php else: endif; ?> value="<?php echo htmlentities($voo['id']); ?>">---<?php echo htmlentities($voo['username']); ?>---</option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
		</div>
	</div>
	
	<!-- <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用印部门：</label>
		<div class="formControls col-xs-8 col-sm-5">
			<input type="text" class="input-text" placeholder=""  value="<?php echo htmlentities($role_name); ?>" id="" name="" value="">
		</div>
	</div> -->
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>用章部门：</label>
		<div class="formControls col-xs-5 col-sm-5">
				<span class="select-box">
					<select class="select" size="1" name="role_id">
						<option value="0">---请选择---</option>
						<?php if(is_array($roles) || $roles instanceof \think\Collection || $roles instanceof \think\Paginator): if( count($roles)==0 ) : echo "" ;else: foreach($roles as $key=>$vo): ?>
						<option <?php if($vo['id'] == $role_name): ?>selected<?php else: endif; ?> value="<?php echo htmlentities($vo['id']); ?>">---<?php echo str_repeat('|——',$vo['level']); ?><?php echo htmlentities($vo['name']); ?>---</option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>印章类型：</label>
		<div class="formControls col-xs-5 col-sm-5">
				<span class="select-box">
					<select class="select" size="1" name="seal_type">
						<option value="0">---请选择---</option>
						<option <?php if($data['seal_type'] == '公章'): ?>selected<?php else: endif; ?> value="公章">---公章---</option>
						<option <?php if($data['seal_type'] == '法人章'): ?>selected<?php else: endif; ?> value="法人章">---法人章---</option>
						<option <?php if($data['seal_type'] == '财务章'): ?>selected<?php else: endif; ?> value="财务章">---财务章---</option>
						<option <?php if($data['seal_type'] == '合同章'): ?>selected<?php else: endif; ?> value="合同章">---合同章---</option>
						<option <?php if($data['seal_type'] == '其他'): ?>selected<?php else: endif; ?> value="其他">---其他---</option>
					</select>
				</span>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>申请理由：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" autocomplete="off"  value="<?php echo htmlentities($data['result']); ?>" placeholder="申请理由" id="result" name="result">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>使用范围：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"  value="<?php echo htmlentities($data['scope']); ?>" placeholder="" id="scope" name="scope">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>印章名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder=""  value="<?php echo htmlentities($data['seal_name']); ?>" name="seal_name" id="seal_name">
		</div>
	</div>
	<!-- <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>枚数：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder=""  value="<?php echo htmlentities($data['seal_num']); ?>">
		</div>
	</div> -->
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>枚数：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="number" min="1" max="100" class="input-text" placeholder="" name="seal_num" value="<?php echo htmlentities($data['seal_num']); ?>">
		</div>
	</div>
	<!-- <div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>份数：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder=""  value="<?php echo htmlentities($data['number']); ?>">
		</div>
	</div> -->
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>份数：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="number" min="1" max="100" class="input-text" placeholder="" name="number" value="<?php echo htmlentities($data['number']); ?>">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>盖章内容概要：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder=""  value="<?php echo htmlentities($data['seal_descr']); ?>" name="seal_descr" id="seal_descr">
		</div>
	</div>
	

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder=""  value="<?php echo htmlentities($data['beizhu']); ?>" name="beizhu" id="beizhu">
		</div>
	</div>
	<input type="hidden" name="id" value="<?php echo htmlentities($data['id']); ?>">

	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			receive_time:{
				required:true,
			},
			use_time:{
				required:true,
			},
			role_id:{
				required:true,
			},
			result:{
				required:true,	
			},
			scope:{
				required:true,
			},
			seal_name:{
				required:true,
			},
			seal_num:{
				required:true,
			},
			seal_descr:{
				required:true,
			},
			number:{
				required:true,
			},
			seal_type:{
				required:true,
			},
			seal_use_name:{
				required:true,
			},
			seal_roval_name:{
				required:true,
			}
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
            $(form).ajaxSubmit({
                type: 'post',
                url: "<?php echo url('update'); ?>" ,
                success: function(data){
		                layer.msg(data,{icon:1,time:1500},function(){
		                    parent.window.location.href="<?php echo url('index'); ?>";
		                    var index=parent.layer.getFrameIndex(window.name);
		                    parent.layer.close(index);
		                });	
                	// alert(data);
                },
                error: function(XmlHttpRequest, textStatus, errorThrown){
                    layer.msg('很遗憾!添加失败',{icon:1,time:1000});
                }
            });
        }
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>