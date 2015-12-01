<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<style type="text/css">
    *{margin:0;padding:0;list-style-type:none;}
    a,img{border:0;}
    body{ background-color:#e7e8eb; margin:0 20px;font:14px/180% '微软雅黑 Bold', '微软雅黑';}
    a{
	color:#000;
	text-decoration:none;
}
    a:hover{
	color:#F30;
	text-decoration:none;
}
    .header{ width: 1200px; height:auto; font-size: 16px; margin:40px auto; background-color:#fff; border:1px #ddd solid; padding:20px 0px;}
	.xxgl{ padding-left:30px; margin-bottom:10px;}
	.qbxx{ width:100%; height:45px; line-height:45px; border-bottom:1px #eee solid; font-size:14px; text-align:center;}
	.qbxx ul li{ float:left; width:120px;}
	.qbxx .search{float:right; margin-right:30px;}
	.qbxx .search input{ width:300px; height:26px; border:1px #eee solid; padding-left:10px; font-size:14px; color:#555;}
	.qbxx .search span{}
	.cur{ border-bottom:2px #090 solid;}
	.tx{margin:30px; line-height:30px; font-size:14px;}
	.tx select{ width:120px; height:35px; border:1px #ddd solid; font-size:14px; padding-left:5px; font-family:微软雅黑}
	.box{margin:10px 30px; font-size:14px; padding:20px; border:1px #ddd solid;}
	.box-left { float:left; width:70%}
	.box-left-img { float:left; width:48px; height:auto; margin-right:15px;}
	.box-left-img img { width:48px; height:48px;}
	.box-left-title { float:left; width:80%; height:auto; }
	.box-right { float:right; width:30%; color:#888;}
	.date{ float:left; width:40%;}
	.message_opr{ float:right; width:50%;}
	.message_opr li{ float:left; list-style:none; margin:0 10px;}
	.message_opr .star_gray{ width:20px; height:20px; cursor:pointer;background:url("/Application/Home/View/Public/images/ico.png") 0 -3917px no-repeat}
	.star_gray:hover{background:url("/Application/Home/View/Public/images/ico.png") 0 -3942px no-repeat}
	.save_gray{ width:20px; height:20px; cursor:pointer;background:url("/Application/Home/View/Public/images/ico.png") 0 -5114px no-repeat}
	.save_gray:hover{background:url("/Application/Home/View/Public/images/ico.png") 0 -5142px no-repeat}
	.download_gray{ width:20px; height:20px; cursor:pointer;background:url("/Application/Home/View/Public/images/ico.png") 0 -4890px no-repeat}
	.download_gray:hover,a:hover .message_opr.download_gray{background:url("/Application/Home/View/Public/images/ico.png") 0 -4918px no-repeat}
	.reply_gray{ width:20px; height:20px; cursor:pointer;background:url("/Application/Home/View/Public/images/ico.png") 0 -5002px no-repeat}
	.reply_gray a{ color:#fff;}
	.reply_gray:hover{background:url("/Application/Home/View/Public/images/ico.png") 0 -5030px no-repeat}
	.huifu{margin:10px auto; width:72%; height:200px;}
	.huifu textarea{ border:1px #ddd solid;}
	.huifu li{ float:left; list-style-type:none; margin:0 10px;}
	.huifu .fs{ width:120px; height:32px; line-height:32px; background-color:#44b549; color:#fff; text-align:center}
	.huifu .fs a{ background-color:#44b549; color:#fff; display:block}
	.huifu .fs a:hover{ background-color:#44b549; color:#fff;}
	.huifu .sq{ width:120px; height:32px; line-height:32px; background-color:#e7e7eb; color:#fff; text-align:center}
	.huifu .sq a{ background-color:#e7e7eb; color:#222; display:block}
	.huifu .sq a:hover{ background-color:#e7e7eb; color:#222;}
</style>
<body>
<div class="header">
	<div class="xxgl">消息管理</div>
	<div class="qbxx">
		<ul>
        	<li class="cur"><a href="news.html">全部消息</a></li>
            <li><a href="news-2.html">已收藏的消息</a></li>
        </ul>
      <div class="search"><input type="text" placeholder="消息内容"><span><a href="#"><img style="margin-bottom:-9px;" src="images/search.jpg"></a></span></div>
	</div>
  <div class="tx">
    	<div class="">
       	  <select>
            	<option selected value="最近五天">最近五天</option>
            	<option value="今天">今天</option>
            	<option value="昨天">昨天</option>
            	<option value="前天">前天</option>
                <option value="更早">更早</option>
        	</select>
        </div>
  </div>
    <div class="tx">
    	<span>全部消息<font style="color:#888;">(文字消息保存5天，其它类型消息只保存3天)</font></span><span style="margin-left:20px;"><input name="" type="checkbox" value="" checked> 隐藏关键词消息</span>
    </div>
    <div class="box">
    	<div class="box-left">
        	<div class="box-left-img"><img src="images/getheadimg(1)" data-fakeid="1536064806"></div>
          <div class="box-left-title">
          	  <ul>
            	<li><a href="#">丽丽</a></li>
           		<li style=" color:#888">全部消息(文字消息保存5天，其它类型消息只保存3天)</li>
              </ul>
          </div>
            <div style="clear:both"></div>
        </div>
        <div class="box-right">
       	  <div class="date">星期五 12:28</div>
       	  <div class="message_opr">
           <ul>
            <li class="star_gray"><a href="javascript:;" title="收藏消息"></a></li>
            <li class="save_gray"><a href="javascript:;" title="保存为素材"></a></li>
            <li class="download_gray"><a href="" target="_blank" title="下载"></a></li>
            <li class="reply_gray" id="hehe"><a style="display:inline;" id="showtxt" href="javascript:;" title="快捷回复"></a></li>
           </ul>
        </div>
      </div>
        <div style="clear:both"></div>
      
      <div id="content" style="display:none;">
      <div style="border-top:1px #ddd solid; margin:20px auto"></div>
        <div class="huifu">
        	<div>
        	  <textarea cols="110" rows="10"></textarea></div>
          <div style="margin:10px auto;">
            <ul>
                <li class="fs"><a href="#">发送</a></li>
                <li class="sq"><a href="#">取消</a></li>
             </ul>
           </div>
           
        </div>
    </div>
    <div style="clear:both"></div>
    </div>
    
</div>

<script language="javascript">
var hehe = document.getElementById("hehe");
var showtxt = document.getElementById("showtxt");
var content = document.getElementById("content");
var zzjs_net = document.getElementById("kg");
function test()
{
	if(showtxt.innerHTML == ".")
	{
		content.style.display = "";
		showtxt.innerHTML = "";
		zzjs_net.checked = false;
	}
	else
	{
		content.style.display = "none";
		showtxt.innerHTML = ".";
		zzjs_net.checked = true;
	}
}
hehe.onclick = function()
{
	test();
}
test();
</script>

</body>
</html>