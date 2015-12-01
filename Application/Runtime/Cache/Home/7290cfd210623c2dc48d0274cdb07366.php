<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' href='/backup/wxtest/./Application/Home/View/Public/css/styleb.css' media='screen' />
<link rel="stylesheet" href='/backup/wxtest/./Application/Home/View/Public/css/lanrenzhijia.css' media="all">
<script src="/backup/wxtest/./Application/Home/View/Public/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script>

// 预览
jQuery(document).ready(function($) {
	$('.theme-login-view').click(function(){
		$('.theme-popover-mask-view').fadeIn(100);
		$('.theme-popover-view').slideDown(200);
	})
	$('.theme-poptit-view .close').click(function(){
		$('.theme-popover-mask-view').fadeOut(100);
		$('.theme-popover-view').slideUp(200);
	})

})

</script>
<script src="/backup/wxtest/./Application/Home/View/Public/js/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="/backup/wxtest/./Application/Home/View/Public/js/blocksit.min.js"></script>
<script>
$(document).ready(function() {
	 
	
	//blocksit define
	$(window).load( function() {
		$('#container').BlocksIt({
			numOfCol: 4,
			offsetX: 8,
			offsetY: 8,
			blockElement: '.grid'
		});
	});
	
	//window resize
	var currentWidth = 1200;
	$(window).resize(function() {
		var winWidth = $(window).width();
		var conWidth;
		if(winWidth < 760) {
			conWidth = 440;
			col = 2
		} else if(winWidth < 880) {
			conWidth = 760;
			col = 3
		} else if(winWidth < 1200) {
			conWidth = 980;
			col = 4;
		} else {
			conWidth = 1200;
			col = 5;
		}
		
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			$('#container').width(conWidth);
			$('#container').BlocksIt({
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
		}
	});
});
</script>

</head>
<body>
<!-- 预览给个人 -->
<div class="theme-popover-view">
     <div class="theme-poptit-view">
          <a href="javascript:;" title="关闭" class="close">×</a>
          <h3 style=" color:red; font-size:18px; font-weight:bold; text-align:center;">创建素材预览给个人</h3>
     </div>
     <div class="theme-popbod-view dform-view">
          <div class="wx-left">
            <div class="wx-gongzonghao"><select style="width:235px; height:30px; border:1px #aeaeae solid; padding-left:10px;">
            <option selected value="宿松城关小学">宿松城关小学</option>
            <option value="合肥第一中学">合肥第一中学</option>
            <option value="芜湖第三小学">芜湖第三小学</option>
            <option value="安庆第二中学">安庆第二中学</option>
            <option value="合肥第十中学">合肥第十中学</option>
            <option value="安庆第二小学">安庆第二小学</option>
        </select></div>
          </div>
          <div class="wx-right">
            <div class="wx-gongzonghao"><input type="text" placeholder="请输入用户名"></div>
          </div> 
          <div style="clear:both"></div>
       <div class="wx-button-view"><input name="提 交" type="submit" value="预 览"> </div>
     </div>
</div>
<!-- 预览给个人 END-->
<!-- Content -->
<div id="container">
   <!-- 循环 Star -->
   <?php if(is_array($mat_infos)): foreach($mat_infos as $key=>$mat): $article = M('article_manage'); unset($articles); $pid = explode(',', $mat['article_id']); foreach ($pid as $k => $v) { if($k == 0){ $articles[] = $article->where(array('id'=>$v))->find(); $articles[$k]['istop'] = 1; }else{ $articles[] = $article->where(array('id'=>$v))->find(); } } ?>
   	<div class="grid">
            <div class="top-time"><?php echo (date('Y-m-d H:i:s',$mat["ptime"])); ?><p style='float:right; margin-right:10px;'><?php echo ($mat["article_publisher"]); ?></p></div> 
            <?php if(is_array($articles)): foreach($articles as $key=>$art): if($art["istop"] == 1): ?><div class="imgholder"><img src="/<?php echo ($art["fm_url"]); ?>" />
                        <div class="top-title"></div><span class="title2"><a target="_blank" href="<?php echo U('pview',array('id'=>$art['id']));?>"><?php echo ($art["article_title"]); ?></a></span>
                     </div>
            		<div class="bottom10"></div>
                <?php else: ?>         
                    <div class="title-img">
                        <p><a href="<?php echo U('pview',array('id'=>$art['id']));?>" target="_blank"><?php echo ($art["article_title"]); ?></a></p>
                        <img src="/<?php echo ($art["fm_url"]); ?>" />
                    </div><?php endif; endforeach; endif; ?>
            <div class="meta">
            	<!--<span><a class="theme-login-view" href="javascript:;">预览给个人</a></span>
                <span><a href="#">保存素材</a></span>-->
                <span style='margin-left:85px'><a href="<?php echo U('update_audite',array('id'=>$mat['id']));?>">审核</a></span>
                <span class="shanchu" ><a href="<?php echo U('del_material',array('id'=>$mat['id']));?>">删除</a></span>
            </div>
	</div><?php endforeach; endif; ?>
</div>
<script>
    
    
</script>
</body>
</html>