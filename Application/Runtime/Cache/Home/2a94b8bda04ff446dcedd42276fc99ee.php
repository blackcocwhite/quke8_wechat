<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>微信公众号后台管理系统</title>
<meta name="keywords" content="多用户微信营销后台管理系统">
<meta name="description" content="多用户微信营销后台管理系统">
<link href="/./Application/Home/View/Public/images/style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="/./Application/Home/View/Public/css/lanrenzhijia.css" media="all">
<script src="/./Application/Home/View/Public/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="/./Application/Home/View/Public/js/frame.js" type="text/javascript"></script>
<script type="text/javascript" src="/./Application/Home/View/Public/js/jquery.artDialog.js"></script>
<script type="text/javascript" src="/./Application/Home/View/Public/js/iframeTools.js"></script>
<script>
// 修改资料
jQuery(document).ready(function($) {
	$('.theme-login-us').click(function(){
		$('.theme-popover-mask-us').fadeIn(100);
		$('.theme-popover-us').slideDown(200);
	})
	$('.theme-poptit-us .close').click(function(){
		$('.theme-popover-mask-us').fadeOut(100);
		$('.theme-popover-us').slideUp(200);
	});
	$('.qx').click(function(){
		$('.theme-popover-mask-us').fadeOut(100);
		$('.theme-popover-us').slideUp(200);
	});

})

// 修改密码
jQuery(document).ready(function($) {
	$('.theme-login-pw').click(function(){
		$('.theme-popover-mask-pw').fadeIn(100);
		$('.theme-popover-pw').slideDown(200);
	})
	$('.theme-poptit-pw .close').click(function(){
		$('.theme-popover-mask-pw').fadeOut(100);
		$('.theme-popover-pw').slideUp(200);
	});
	$('.qx').click(function(){
		$('.theme-popover-mask-pw').fadeOut(100);
		$('.theme-popover-pw').slideUp(200);
	});

})

</script>
</head>
<body class="hidemenu">

<!-- 修改资料 END-->    
    <div class="theme-popover-us">
     <div class="theme-poptit-us">
          <a href="javascript:;" title="关闭" class="close">×</a>
          <h3 style=" color:red; font-size:18px; font-weight:bold; text-align:center;">修改资料</h3>
     </div>
     <div class="theme-popbod-us dform-us">
          <div class="wx-left">
            <div class="wx-gongzonghao"><input type="text" placeholder="姓名"></div>
            <div class="wx-gongzonghao"><input type="text" placeholder="联系手机"></div>
            <div class="wx-gongzonghao"><input type="text" placeholder="邮箱"></div>
          </div>
          <div style="clear:both"></div>
       <div class="wx-button-admin"><input name="提 交" type="submit" value="确 定"> <input name="取消" type="reset" class="qx" style="margin-left:10px;" value="取 消"></div>
     </div>
</div>
<!-- 修改资料 END-->

<!-- 修改密码 END-->    
    <div class="theme-popover-pw">
     <div class="theme-poptit-pw">
          <a href="javascript:;" title="关闭" class="close">×</a>
          <h3 style=" color:red; font-size:18px; font-weight:bold; text-align:center;">修改密码</h3>
     </div>
     <div class="theme-popbod-pw dform-pw">
          <div class="wx-left">
            <div class="wx-gongzonghao"><input type="text" placeholder="原密码"></div>
            <div class="wx-gongzonghao"><input type="text" placeholder="新密码"></div>
            <div class="wx-gongzonghao"><input type="text" placeholder="再输一次"></div>
          </div>
          <div style="clear:both"></div>
       <div class="wx-button-admin"><input name="提 交" type="submit" value="确 定"> <input name="取消" type="reset" class="qx" style="margin-left:10px;" value="取 消"></div>
     </div>
</div>
<!-- 修改密码 END-->

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody><tr>
    <td><div id="header">
	<div class="top">
    	<a href="http://www.quke8.com/" title="首页" target="_blank"></a>
		 <div class="top_left">
         <div id="wrapper">
			<div id="nav">
				<ul id="menu">
                    <!--
					<li><a href="<?php echo U('Index/info');?>" target="main"><span>首　页</span></a></li>
                    -->
					<li><a href="<?php echo U('Manage/pub_primary_index');?>" target="main"><span>公众号管理</span></a></li>
					<li><a href="<?php echo U('Material/article_list');?>" target="main"><span>文章管理</span></a></li>
            		<?php if($roleId == 1): ?><li><a href="<?php echo U('Material/audite_list');?>" target="main"><span>素材审核</span></a></li>   
            		<?php else: endif; ?>
            		<li><a href="<?php echo U('Material/material_list');?>" target="main"><span>素材管理</span></a></li>
					<li><a href="<?php echo U('DataStatistics/pub_index');?>" target="main"><span>数据统计</span></a></li>
					<li><a href="<?php echo U('Rbac/listUser');?>" target="main"><span>系统管理</span></a></li>
                                        <li><a href="<?php echo U('Test/index');?>" target="main"><span>游戏测试</span></a></li>
				</ul>
			</div>
		</div>
		<div style="clear: both"></div>
    	<!--导航 End --></div>
         <div class="login">
			<li>您好：<b><?php echo (session('username')); ?></b> ，欢迎您！</li>
            <li><a class="theme-login-us" href="javascript:;">修改资料</a></li>	
			<li><a class="theme-login-pw" href="javascript:;">修改密码</a></li>
			<li><a href="<?php echo U('logout');?>">[退出]</a></li>
		</div>
      
    </div>
    
<style type="text/css">
#wrapper{text-align:center; margin-top:0px;}
ul{list-style:none;}/*去掉小圆点吧*/
li{float:left;height:67px;overflow:hidden;}/*水平排列并来点间距吧，不要把我挤得太紧了。*/
#wrapper ul li a{color:#444; font-size:16px;height:67px;}
#wrapper ul li a:hover{color:#666; font-size:16px; text-decoration:none;}

.normal,.over,.cur{display:inline-block;padding-right:20px;padding-top:23px;*padding-top:0;padding-bottom:13px;*padding-bottom:0;height:67px;background:url(/./Application/Home/View/Public/images/button.gif) no-repeat right -66px; text-decoration:none;font-size:12px;color:#666;}
.normal span,.over span,.cur span{display:inline-block;padding-left:20px;padding-top:10px;*padding-top:0;padding-bottom:13px;*padding-bottom:0;height:67px;line-height:67px;background:url(/./Application/Home/View/Public/images/button.gif) no-repeat left top;}
.normal,.normal span,.over,.over span,.cur,.cur span{display:inline;cursor:pointer;}

.cur{background:url(/./Application/Home/View/Public/images/button.gif) no-repeat right -150px; padding-bottom:23px;}
.cur span{background:url(/./Application/Home/View/Public/images/button.gif) no-repeat left -158px;color:#fff;}
.blog{clear:both;margin:0px auto;text-align:center;width:640px;color:#fff;}
</style>
    
    </div>
    <!--<i class="tico"></i>-->

<div class="topnav"><p><a href="#" id="togglemenu">显示左侧菜单</a></p></div>
</td>
  </tr>
  <tr>
    <td height="100%" bgcolor="#ffffff"><table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0" bordercolor="#ff0000">
        <tbody>
          <tr>
            <td nowrap="" id="frmTitle" bgcolor="#ff0000" width="213"><iframe frameborder="0" id="left" name="left" scrolling="auto" src="/./Application/Home/View/Public/images/index.html" style="HEIGHT:100%;VISIBILITY:inherit;width:200px;Z-INDEX:2" allowtransparency="true" cyberarticle_ext_name="Frame_0"></iframe></td>
            <td></td>
            <td width="100%"><table height="100%" cellspacing="0" cellpadding="0" width="100%" align="right" border="0">
                <tbody>
                  <tr>
                    <td align="right"><iframe id="main" name="main" style="width: 100%; HEIGHT: 100%" src="<?php echo U('Manage/pub_primary_index');?>" frameborder="0" cyberarticle_ext_name="Frame_1"></iframe></td>
                  </tr>
                </tbody>
              </table></td>
          </tr>
        </tbody>
      </table></td>
  </tr>
  <tr>
    <td><div id="footer"><i class="tico"></i>

<p style=" font-size:12px;" class="fr"> Copyright © 2013-2015 趣课吧版权所有  </p>
</div></td>
  </tr>
</tbody></table>
<script type="text/javascript">

function getObj(objName){return(document.getElementById(objName));}

//全局变量,菜单数量和当前选中菜单的序号
var temp;/*菜单ID*/

window.onload =function() {
	var obj=getObj("menu");/*ul的id*/
	var obj_a=obj.getElementsByTagName("a");
	number=obj_a.length;
	for (var i=0,j=obj_a.length;i<j;i++){
		obj_a[i].index=i;
		obj_a[i].className="normal";
		obj_a[i].onclick=function(){click(this)};
		obj_a[i].onmouseover=function(){overme(this)};
		obj_a[i].onmouseout=function(){outme(this)};
		obj_a[i].onfocus=function(){this.blur()};/*去掉IE下的虚线框*/
	}
    if (getCookie("show_a") != null) {
		obj_a[getCookie("show_a")].className="cur";
		temp=getCookie("show_a")
	}
	else{
	    var obj=getObj("menu");
	    var obj_a=obj.getElementsByTagName("a");	    
		obj_a[0].className="cur";	    
	}	
}
//鼠标滑过效果
function overme(o){
    if (temp!=o.index) 
    o.className="over";/*翻滚色样式*/  
}
//鼠标移开后效果
function outme(o){
    if (temp!=o.index) 
    o.className="normal";/*翻滚色样式*/  
}
//鼠标点击效果
function click(o){
   
    var obj=getObj("menu");
	var obj_a=obj.getElementsByTagName("a");
	for (var i=0,j=obj_a.length;i<j;i++){
		obj_a[i].className="normal";
	}
	o.className="cur";
	o.blur();
	setCookie("show_a",o.index,1);/*设置1分钟后失效*/
	temp=o.index 
}
// --- 设置cookie
function setCookie(sName,sValue,expireMinute) {
	var cookieString = sName + "=" + escape(sValue);
	if (expireMinute>0) 
	document.cookie = cookieString;//写cookie
}
//--- 获取cookie
function getCookie(sName) {
  var aCookie = document.cookie.split("; ");
  for (var j=0; j < aCookie.length; j++){
	var aCrumb = aCookie[j].split("=");
	if (escape(sName) == aCrumb[0])
	  return unescape(aCrumb[1]);
  }
  return null;
}
</script>


</body>
</html>