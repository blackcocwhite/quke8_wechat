<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>微信公众平台管理系统</title>
<link href="/./Application/Home/View/Public/css/global.css" rel="stylesheet" type="text/css">
<link href="/./Application/Home/View/Public/css/frame.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="login">
	<div class="loginleft"><img src="/./Application/Home/View/Public/images/loginleft.jpg" width="624" height="549"></div>
    <div style="float:left; width:350px; margin-top:260px; margin-left:100px;">
	<form action="<?php echo U('dologin');?>" method="post">
    	<div class="login_form">
            <div class="t"><img src="/./Application/Home/View/Public/images/dl.jpg" width="58" height="33"></div>
            <div class="form">
                <div class="login_msg"></div>
                <div class="rows">
                    <span><input name="username" placeholder="账号" id="UserName" type="text" maxlength="30" value="" autocomplete="off" tabindex="1"></span>
                    <div class="clear"></div>
                </div>
                <div class="rows">
                    <span><input class="password" name="password" placeholder="密码" id="Password" type="password" maxlength="20" value="" autocomplete="off" tabindex="2"></span>
                    <div class="clear"></div>
                </div>
                <div class="checkbox" ><input type="checkbox" name="checkbox" id="checkbox"> 记住账号</div>
              <div class="submit"><input type="submit" value="" name="submit_btn"></div>
                <div style="clear:both"></div>
                <!--
                <div style="margin-left:40px;"><a href="https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=<?php echo ($appid); ?>&pre_auth_code=<?php echo ($appsecreat); ?>&redirect_uri=weixin.quke8.com/home/receive/callback"><img src="/./Application/Home/View/Public/images/icon_button3_2.png" alt="微信登陆授权"></a></div>
-->
            </div>
        </div>
	</form>
    </div>
    <div style="clear:both"></div>
</div>
<div id="beian"><a href="http://www.quke8.com/" target="_blank"></a></div>
</body></html>