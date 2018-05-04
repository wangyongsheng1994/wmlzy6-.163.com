<?php /*a:3:{s:69:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\index\info.html";i:1524816757;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\header.html";i:1524816903;s:72:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\public\footer.html";i:1524816895;}*/ ?>
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
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>新增图片</title>
<link href="/static/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
		<div class="row cl">
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo htmlentities($data['username']); ?>" placeholder="" id="" name="username">
			</div>
		</div>
            <input type="hidden" name="oldpassword" value="<?php echo htmlentities($data['password']); ?>">
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>新密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="password" name="password">
            </div>
        </div>
         <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>确认新密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="password2">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>电话：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo htmlentities($data['phone']); ?>" placeholder="" id="" name="phone">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo htmlentities($data['email']); ?>" placeholder="" id="" name="email">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>所属部门：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo htmlentities($data['role']['name']); ?>" disabled placeholder="" id="" name="name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>部门角色：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo htmlentities($data['roles']['name']); ?>" disabled placeholder="" id="" name="aname">
            </div>
        </div>
        
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>


<!--_footer 作为公共模版分离出去-->
<!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/static/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/static/admin/static/ali/iconfont.js"></script>
<!--/_footer 作为公共模版分离出去-->
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/static/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript" src="/static/admin/lib/webuploader/0.1.5/webuploader.min.js"></script> 
<script type="text/javascript">
// var old = $("#oldpassword").val();
$("#oldpassword").blur(function(){
    var old = $(this).val();
    var id = $(".ids").val();
    var url = "<?php echo url('info'); ?>";
    $.post(url,{old:old},function(data){
        if(data == 404){
            alert("旧密码输入错误");
            return false;
        }
    })
})
$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    
    $("#form-admin-add").validate({
        rules:{
            username:{
                required:true,
                minlength:3
            },
            password2:{
                equalTo: "#password"
            },
            phone:{
                required:true,
                isPhone:true,
            },
            email:{
                required:true,
                email:true,
            },
            autor:{
                required:true,
            }
        },
        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            $(form).ajaxSubmit({
                type: 'post',
                url: "<?php echo url('info'); ?>" ,
                success: function(data){
                // console.log(data);
                // alert(data);
                    layer.msg(data,{icon:1,time:1500},function(){
                        parent.window.location.href="<?php echo url('index'); ?>";
                        var index=parent.layer.getFrameIndex(window.name);
                        parent.layer.close(index);
                    });
                },
                error: function(XmlHttpRequest, textStatus, errorThrown){
                    layer.msg('很遗憾!添加失败',{icon:1,time:1000});
                }
            });
        }
    });
});
</script>
</body>
</html>