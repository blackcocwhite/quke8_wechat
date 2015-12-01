<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">         
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
<title><?php echo ($pm["article_title"]); ?></title>
<link rel="stylesheet" type="text/css" href="/./Application/Home/View/Public/css/page_mp_article_improve260530.css">
<link rel="stylesheet" type="text/css" href="/./Application/Home/View/Public/css/page_mp_article_improve_combo260530.css">
</head>
<body> 
<div id="js_article" class="rich_media">
<div class="rich_media_inner">
<div id="page-content"> 
<div id="img-content" class="rich_media_area_primary">
<!--标题-->
<h2 class="rich_media_title" id="activity-name"><?php echo ($pm["article_title"]); ?></h2>
<!--标题 END-->

<!--日期/学校名称-->
<div class="rich_media_meta_list">                                                
<em id="post-date" class="rich_media_meta rich_media_meta_text"><?php echo (date("y-m-d",$pm["edit_time"])); ?></em><a class="rich_media_meta rich_media_meta_link rich_media_meta_nickname" href="javascript:void(0);" id="post-user"><?php echo ($pm["article_author"]); ?></a></div>
<!--日期/学校名称 END-->

<!--正文-->
<div class="rich_media_content" id="js_content">
<?php echo ($pm["content"]); ?>
</div>
<!--正文 END-->

</div> 
</div>
</div>  
</body>
</html>