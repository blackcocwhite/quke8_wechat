<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>微信公众平台管理系统</title>
<link href="/backup/wxtest/./Application/Home/View/Public/css/global.css" rel="stylesheet" type="text/css">
<link href="/backup/wxtest/./Application/Home/View/Public/css/frame.css" rel="stylesheet" type="text/css">
</head>

<body>
<style type="text/css">body, html{background:url(/backup/wxtest/./Application/Home/View/Public/images/login-bg.jpg) center 0 no-repeat; background-size:cover; overflow:hidden;}</style>
<div id="login">
	<form action="<?php echo U('dologin');?>" method="post">
    	<div class="login_form">
            <div class="t"></div>
            <div class="form">
                <div class="login_msg"></div>
                <div class="rows">
                	<label>用户名：</label>
                    <span><input name="username" id="UserName" type="text" maxlength="30" value="" autocomplete="off" tabindex="1"></span>
                    <div class="clear"></div>
                </div>
                <div class="rows">
                	<label>密&nbsp;&nbsp;&nbsp;码：</label>
                    <span><input name="password" id="Password" type="password" maxlength="20" value="" autocomplete="off" tabindex="2"></span>
                    <div class="clear"></div>
                </div>
                <div class="submit"><input type="submit" value="" name="submit_btn"></div>
                <div class="checkbox" ><input type="checkbox" name="checkbox" id="checkbox"> 记住我</div>
                <div style="clear:both"></div>
                <!--
                <div style="margin-left:40px;"><a href="https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=<?php echo ($appid); ?>&pre_auth_code=<?php echo ($appsecreat); ?>&redirect_uri=weixin.quke8.com/home/receive/callback"><img src="/backup/wxtest/./Application/Home/View/Public/images/icon_button3_2.png" alt="微信登陆授权"></a></div>
-->
            </div>
        </div>
	</form>
</div>
<div id="beian"><a href="http://www.quke8.com/" target="_blank"></a></div>
</body></html>