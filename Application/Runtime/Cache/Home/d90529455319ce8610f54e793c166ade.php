<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' href='/./Application/Home/View/Public/css/style-sc.css' media='screen' />
<link rel="stylesheet" href="/./Application/Home/View/Public/css/lanrenzhijia.css" media="all">
<script src="/./Application/Home/View/Public/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="/./Application/Home/View/Public/js/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="/./Application/Home/View/Public///html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="/./Application/Home/View/Public/js/blocksit.min.js"></script>
<script>
$(document).ready(function() {
	 
	
	//blocksit define
	$(window).load( function() {
		$('#container').BlocksIt({
			numOfCol: 2,
			offsetX: 12,
			offsetY: 12,
			blockElement: '.grid'
		});
	});
	
	//window resize
	var currentWidth = 860;
	$(window).resize(function() {
		var winWidth = $(window).width();
		var conWidth;
		if(winWidth < 640) {
			conWidth = 240;
			col = 2
		} else if(winWidth < 960) {
			conWidth = 760;
			col = 3
		} else if(winWidth < 1280) {
			conWidth = 1060;
			col = 4;
		} else {
			conWidth = 1280;
			col = 5;
		}
		
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			$('#container').width(conWidth);
			$('#container').BlocksIt({
				numOfCol: col,
				offsetX: 12,
				offsetY: 12
			});
		}
	});
});
</script>

</head>
<body>

<!-- Content -->
<div id="container">
   <!-- 循环 Star -->
	<div class="grid">
		<div class="imgholder"><img src="/./Application/Home/View/Public/images/im1.jpg" />
        	<div class="top-title"></div><span class="title2"><a href="#">写给女儿最后一封信你飙泪了吗？</a></span>
      </div>
        	<div class="bottom10"></div>
            <div class="title-img">
				<p><a href="view.html" target="_blank">写给女儿最后一封信你飙泪了吗？</a></p>
        		<img src="/./Application/Home/View/Public/images/im2.jpg">
			</div>
            <div class="title-img">
				<p><a href="view.html" target="_blank">写给女儿最后一封信你飙泪了吗？</a></p>
        		<img src="/./Application/Home/View/Public/images/im2.jpg">
			</div>
            <div style="text-align:center; font-size:14px; color:#090; font-weight:bold;" class="meta"><input name="radio" type="radio" value=""> 选择此素材</div>
        
	</div>
	
  <div class="grid">
		<div class="imgholder"><img src="/./Application/Home/View/Public/images/404.jpg" />
        	<div class="top-title"></div><span class="title2"><a href="#">写给女儿最后一封信你飙泪了吗？</a></span>
      </div>
        	<div class="bottom10"></div>
            <div class="title-img">
				<p><a href="view.html" target="_blank">写给女儿最后一封信你飙泪了吗？</a></p>
        		<img src="/./Application/Home/View/Public/images/im2.jpg">
			</div>
            <div style="text-align:center; font-size:14px; color:#090; font-weight:bold;" class="meta"><input name="radio" type="radio" value=""> 选择此素材</div>
        
	</div>
	
  <div class="grid">
		<div class="imgholder"><img src="/./Application/Home/View/Public/images/Main.jpg" />
        	<div class="top-title"></div><span class="title2"><a href="#">写给女儿最后一封信你飙泪了吗？</a></span>
      </div>
        	<div class="bottom10"></div>
            <div class="title-img">
				<p><a href="view.html" target="_blank">写给女儿最后一封信你飙泪了吗？</a></p>
        		<img src="/./Application/Home/View/Public/images/im2.jpg">
			</div>
            <div class="title-img">
				<p><a href="view.html" target="_blank">写给女儿最后一封信你飙泪了吗？</a></p>
        		<img src="/./Application/Home/View/Public/images/im2.jpg">
			</div>
            <div style="text-align:center; font-size:14px; color:#090; font-weight:bold;" class="meta"><input name="radio" type="radio" value=""> 选择此素材</div>
        
	</div>
    <div class="grid">
		<div class="imgholder"><img src="/./Application/Home/View/Public/images/im1.jpg" />
        	<div class="top-title"></div><span class="title2"><a href="#">写给女儿最后一封信你飙泪了吗？</a></span>
      </div>
        	<div class="bottom10"></div>
            <div class="title-img">
				<p><a href="view.html" target="_blank">写给女儿最后一封信你飙泪了吗？</a></p>
        		<img src="/./Application/Home/View/Public/images/im2.jpg">
			</div>
            <div class="title-img">
				<p><a href="view.html" target="_blank">写给女儿最后一封信你飙泪了吗？</a></p>
        		<img src="/./Application/Home/View/Public/images/im2.jpg">
			</div>
            <div style="text-align:center; font-size:14px; color:#090; font-weight:bold;" class="meta"><input name="radio" type="radio" value=""> 选择此素材</div>
        
	</div>
<!--循环 END-->
</div>
</body>
</html>