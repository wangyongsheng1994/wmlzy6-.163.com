<?php /*a:1:{s:70:"D:\phpstudy\PHPTutorial\WWW\oa\application\admin\view\login\index.html";i:1524553436;}*/ ?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>系统登陆</title>
 <link rel="shortcut icon" href=""/>
 <link rel="stylesheet" type="text/css" href="/static/admin/login/css/login.css">
<body>
<div class="login_bg"></div>
<div class="login_main">
 <div class="logtit">
  <h1>后台管理系统</h1>
 </div>
 <div class="login_box">
  <div class="box_wrap">
   <h3>用户登录</h3>
   <form action="<?php echo url('dologin'); ?>" method="post">
   <p><input class="span12" type="text" name="username" placeholder="用户名"></p>
   <p><input class="span12" type="password" name="password" placeholder="密码"></p>
   <p><input class="span12 yzm" type="text"  name="code" placeholder="验证码">
    <img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src='<?php echo captcha_src(); ?>?'+'math.random()'" /></p>
   <p><input name="" type="submit" class="tjbtn" value="登录" /></p>
   </form>
  </div>
 </div>
</div>
</body>
</html>
