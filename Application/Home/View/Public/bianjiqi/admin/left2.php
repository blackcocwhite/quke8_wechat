<?php

@session_start();  
//检测是否登录，若没登录则转向登录界面  
if(!isset($_SESSION['ewema=997720527'])){  
    header("Location:login.html");  
    exit();  
} 
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT language=javascript>
function opencat(cat,img,imgsrc){
	if(cat.style.display=="none"){
	cat.style.display="";
	imgsrc.src="images/arrow_bottom.gif";
	img.className="row02_over"
	}	else {
	cat.style.display="none"; 
	imgsrc.src="images/arrow_right.gif";
	img.className="row02"
	}
}
</Script>
<link href="css/css.css" rel="stylesheet" type="text/css">
<div class="row01"><img src="images/ico_admin.gif" width="20" height="20" align="absmiddle" style="margin-top:2px;" />&nbsp;&nbsp;微信2010微信后台管理</div>
<a href="main.php" target="mainbody"><div class="row02"><img src="images/Home.gif" width="20" height="20" border="0" align="absmiddle"   style="margin-left:10px;"/> <b>后台首页</b></div>
</a>
     
	  <div class="row02" style="cursor:hand;" onclick=opencat(cat01,img01,imgsrc01)  id="img01"><img src="images/arrow_right.gif" width="10"  id="imgsrc01"  style="margin-left:20px;"/> 样式管理 </div>
	  <div id="cat01" style="display:none">
      <a href="list.php?type=1" target="mainbody"><div class="row03"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border=0/> 顶关注</div></a>
     <a href="list.php?type=2" target="mainbody"><div class="row03"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border=0/> 标题</div></a>
 <a href="list.php?type=3" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 卡片</div></a>
	  <a href="list.php?type=4" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 互推账号</div></a>
	  <a href="list.php?type=5" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 分割线</div></a>
      <a href="list.php?type=6" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 底提示</div></a>
      <a href="list.php?type=7" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 背景</div></a>
	 <a href="list.php?type=8" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 图文图片</div></a>
		  <a href="list.php?type=9" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 应用场景</div></a>
		  <a href="list.php?type=10" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 音视频</div></a>
		  <a href="list.php?type=11" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 模板</div></a>
		  <a href="list.php?type=12" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 点赞分享</div></a>
		  <a href="list.php?type=13" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 素材图</div></a>
		  <a href="list.php?type=14" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 小符号</div></a>
		  <a href="list.php?type=15" target="mainbody"><div class="row04"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 节日</div></a>

	  </div>
	  
	  <div class="row02" style="cursor:hand;" onclick=opencat(cat03,img03,imgsrc01)  id="img03"><img src="images/arrow_right.gif" width="10"  id="imgsrc01"  style="margin-left:20px;"/> 我的模板 </div>
	  <div id="cat03" style="display:none">
   
      <a href="addmoban.php?do=add" target="mainbody"><div class="row03"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border=0/> 添加模板</div></a>
       </div>     
      <div class="row02" style="cursor:hand;" onclick=opencat(cat02,img02,imgsrc02)  id="img02"><img src="images/arrow_right.gif" width="10"   style="margin-left:20px;"   id="imgsrc02"/> 系统管理 </div>
	  <div id="cat02" style="display:none">
	  <a href="makeindex.php" target="mainbody"><div class="row03"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 生成首页</div></a>
	  <a href="modipassword.php" target="mainbody"><div class="row03"><img src="images/arrow_dot.gif" width="3" height="3"  style="margin-left:40px;" border="0"/> 修改密码</div></a>
    </div>
	
	 <!-- <a href="addwechat.php" target="mainbody">
      <div class="row02"><img src="images/arrow_right.gif" width="10" height="10"  style="margin-left:20px;" border="0"/> 微信号同步设置 </div></a> -->

	
      <a href="logincheck.php?do=logout" target="_top">
      <div class="row02"><img src="images/arrow_right.gif" width="10" height="10"  style="margin-left:20px;" border="0"/> 退出系统 </div></a>
<div align="center"><br />
        <br />
      	<br />
  版权所有：weixin2010.com<br />
 <br />
 </div>
      <br />