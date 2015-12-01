<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel='stylesheet' href='/Application/Home/View/Public/css/styleb.css' media='screen' />
    <link rel="stylesheet" href='/Application/Home/View/Public/css/lanrenzhijia.css' media="all">
    <link rel="stylesheet" href="../Public/js/开发包/skin/WdatePicker.css" type="text/css"/>

    <script src="/Application/Home/View/Public/js/jquery-1.4.2.min.js"></script>

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/Application/Home/View/Public/js/blocksit.min.js"></script>
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
    <style>
        .box{ width:500px; margin:0 auto; background:url(/Application/Home/View/Public/images/img.png) no-repeat center 40%;}
        .box .left-box{ width:180px; float:left; height:300px; border:#ccc solid 1px; overflow-x:visible; overflow-y:scroll;}
        .box ul{margin: 0;padding: 0;}
        .box ul li{ list-style:none; line-height:30px; cursor:pointer; padding:0px 5px;}
        .box ul li:hover{ background:#f60; color:#FFF;}
        .box .right-box{ width:180px; float:right; height:300px; border:#ccc solid 1px; overflow-x:visible; overflow-y:scroll;}
        .box .clear{ clear:both;}
        .box .leftnum{ width:180px; text-align:center; float:left; line-height:30px;}
        .box .leftnum p{ line-height:20px;}
        .box .rightnum{ width:180px; text-align:center; float:right; line-height:30px;}
        .box .rightnum p{ line-height:20px;}
        .box .btn{ display:block; width:150px; line-height:30px; background:#F60; color:#FFF; font-size:15px; font-weight:bold; border:none; margin:0 auto; outline:none; cursor:pointer;}
        .box .search {height:36px; margin:10px auto}
        .box .search select{ width:80px;height:32px;}
        .box .search input{ width:160px;height:30px; border:1px #abadb3 solid;}
        .box .search button{ width:60px;height:30px; border:1px #abadb3 solid;}
    </style>
</head>
<body>
<!-- Content -->
<div id="container">
    <!-- 循环 Star -->
    <?php if(is_array($mat_infos)): foreach($mat_infos as $key=>$mat): ?><input type='hidden' name='pid' value="<?php echo ($id); ?>">
        <input type="hidden" name="mid" value="<?php echo ($mat["material_id"]); ?>">
        <input type='hidden' name='media_id' value="<?php echo ($mat["media_id"]); ?>">
        <?php
 $article = M('article_manage'); unset($articles); $pid = explode(',', $mat['article_id']); foreach ($pid as $k => $v) { if($k == 0){ $articles[] = $article->where(array('id'=>$v))->find(); $articles[$k]['istop'] = 1; }else{ $articles[] = $article->where(array('id'=>$v))->find(); } } ?>
        <div class="grid">
            <div class="top-time"><?php echo (date('Y-m-d H:i:s',$mat["ptime"])); ?></div>
                <div class="bottom10"></div>
                <?php if(is_array($articles)): foreach($articles as $key=>$art): if($art["istop"] == 1): ?><div class="imgholder"><img src="/<?php echo ($art["fm_url"]); ?>" />
                            <div class="top-title"></div><span class="title2"><a href="<?php echo U('pview',array('id'=>$art['id']));?>" target="_blank"><?php echo ($art["article_title"]); ?></a></span>
                        </div>

                        <?php else: ?>
                        <div class="title-img">
                            <p><a href="<?php echo U('pview',array('id'=>$art['id']));?>" target="_blank"><?php echo ($art["article_title"]); ?></a></p>
                            <img src="/<?php echo ($art["fm_url"]); ?>" />
                        </div><?php endif; ?>
                    <input type="hidden" name='aid[]' value='<?php echo ($aid["id"]); ?>'><?php endforeach; endif; ?>
                <div class="meta2">
                    <div><a href="#" pid="<?php echo ($id); ?>" mad="<?php echo ($mat["material_id"]); ?>" med="<?php echo ($mat["media_id"]); ?>" onclick="qunfa($(this))">选择当前文章</a></div>
                </div>

        </div><?php endforeach; endif; ?>
</div>
<script>

    function qunfa(ab){
        var mad=ab.attr("mad");
        var med=ab.attr("med");
        var pid=ab.attr('pid');
        if(confirm('你确定要选择这篇文章群发吗?(该操作不可逆！)')){
            $.ajax({
                cache: true,
                type: "POST",
                url:"/Home/Material/singleqf",
                data:{mad:mad,med:med,pid:pid},
                async: false,
                error: function(data) {
                    alert(data.errmsg);
                },
                success: function(data) {
                    alert(data);
                    if(data == 1){
                         alert('保存成功');
                    }                  
                }
            });

        }else{
            return;
        }
    }
</script>
</body>
</html>