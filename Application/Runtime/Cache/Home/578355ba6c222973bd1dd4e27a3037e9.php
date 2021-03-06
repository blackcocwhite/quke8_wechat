<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<style type="text/css">
    *{margin:0;padding:0;list-style-type:none;}
    a,img{border:0;}
    body{ margin:0 20px;font:14px/180% '微软雅黑 Bold', '微软雅黑';}
    a{
	color:#060;
	text-decoration:none;
}
    a:hover{
	color:#F30;
	text-decoration:none;
}
    .header{ width: 900px; height:710px; font-size: 16px; margin:20px auto; border:1px #ddd solid; padding:10px 10px;}
	.header input{ border:1px #ccc solid; height:28px;}
	.sucai{ background-color:#f1f1f1; padding-left:20px; color:#333; height:45px; line-height:45px;}
	.search{ width:100%; height:36px; line-height:36px; margin:10px auto;}
	.search-1{ float:left; width:60%; height:30px; line-height:30px; margin:0px auto;}
	.search-1 input{ float:left; width:400px; height:26px; border:1px #eee solid; padding-left:10px;  font-size:14px; color:#555;}
	.search-1 span.ss{ float:left; width:35px; }
	.search-right{ float:right; width:150px; height:34px; line-height:34px; margin:2px 20px; background-color:#090; color:#fff; text-align:center; font-size:14px;border-radius:5px; }
	.search-right:hover{ background-color:#060; cursor:pointer;}
	.search-right a{ color:#fff;}
	.content-1{ border:#eee 1px solid; padding:10px; width:880px; height:470px; margin-bottom:10px;}
	.tijiao{ float:left; width:100px; height:30px; background-color:#090; color:#fff; line-height:30px; margin:7px auto; margin-left:300px; text-align:center;border-radius:5px;}
	.tijiao:hover{ background-color:#060; cursor:pointer;}
	.tijiao a{ color:#fff; font-size:14px;}
	.quxiao{ float:left; width:100px; height:30px; background-color:#fff; border:#ccc 1px solid; color:#555; line-height:30px; margin:7px auto; margin-left:10px; text-align:center;border-radius:5px;}
	.quxiao:hover{ background-color:#eee; cursor:pointer;}
	.quxiao a{ color:#555; font-size:14px;}
	
/* 分页 */
.listpage {padding:16px 30px 16px 0;clear:both;text-align:right}
.listpage a,
.listpage a:visited,.listpage a:hover,.listpage b {padding:0px 8px; border:1px solid #F7F7F7;border-bottom:1px solid #DFDFDF;border-right:1px solid #DFDFDF;display:inline-block;height:20px;line-heighT:20px;text-decoration:none;color:#11396A;margin:0 3px;font-family:'宋体';background:#F7F7F7}
.listpage a:hover,.listpage b {border:0;padding:1px 9px; color:#fff;background:#090}
.search-tz {width:40px; text-align:center}
</style>
<body>
<div class="header">
	<div class="sucai">选择素材</div>
	<div class="search">
  		<div class="search-1"><input type="text" placeholder="标题/作者/摘要"><span class="ss"><a href="#"><img src="/./Application/Home/View/Public/images/search.jpg"></a></span></div>
    	<div class="search-right"><a href="publish.html" target="_blank">+ 新建图文消息</a></div>
	</div>
	<div class="content-1">
    <iframe id="main" name="main" style="width: 100%; HEIGHT: 100%" src="<?php echo U('Menu/suCai',array('id'=>$id));?>" frameborder="0" cyberarticle_ext_name="Frame_1"></iframe>
	</div>
    <div style="font-size:14px;" class="listpage"> 共 <span style="color:red">48</span> 条记录<span style="color:red"> 1/2 </span> 页  <a href="#">上一页</a>     <span class="current">1</span><a href="#">2</a>  <a href="#">下一页</a>    <input class="search-tz" name="" type="text">  <a href="#">跳转</a>  </div>
	<div class="sucai">
    	<div class="tijiao"><a href="#">确定</a></div>
        <div class="quxiao"><a href=javascript:window.opener=null;window.close()>取消</a></div>
    </div>
</div>
</body>
</html>