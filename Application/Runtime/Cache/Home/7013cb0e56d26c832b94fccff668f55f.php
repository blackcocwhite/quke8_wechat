<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
<head>
    <title>2010 V5微信编辑器 - 微信文章编辑 - 微信图文内容排版系统</title>
    <meta charset="UTF-8">
    <meta name="keywords" content="2010微信编辑器、微信在线编辑器、2010微信排版、微信内容排版、微信文章排版、HTML编辑器、在线编辑器 ">
    <meta name="Description"
          content="2010微信编辑器提供微信内容编辑，文章编辑，图文编辑样式素材，微信文字排版，图文排版功能，是最好用的在线微信代码排版软件，用微信公众平台编辑排版图文文章就用2010微信编辑器。">
    <meta name="generator" content="Wechat Super Editor!">
    <meta name="author" content="2010微信编辑器">
    <meta name="copyright" content="2010">
    <link href="favicon.ico" rel="SHORTCUT ICON">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <link href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/css/common.css" type="text/css" rel="stylesheet">
    <link href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/css/index.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/css/editor-min.css" type="text/css">
    <link href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/css/guoyoo.css">
    <link rel="stylesheet" type="text/css" href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/css/jquery.jgrowl.css">
    <!--[if lt IE 9]>
    <script src="style/js/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" charset="utf-8" src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/js/bootstrap.min.js"></script>
    <script>
        var BASEURL = "";
        var current_editor;
        var current_active_v3item = null;
        var isout = "false";
        var isnew = "";</script>
    <style>
        #right-fix-tab {
            width: 32px;
            position: absolute;
            right: 0px;
        }

        #right-fix-tab li {
            width: 30px;
            background: rgba(58, 51, 50, 0.5);
            border: 0 none;
            color: #FFF;
            width: 30px;
            font-size: 14px;
        }

        #color-plan .nav-tabs > li > a {
            padding: 5px;
            color: #efefef;
            border: 0 none;
        }

        #color-plan .nav-tabs > li > a:hover {
            background: transparent;
            color: #FFF;
        }

        #color-plan .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
            background-color: #000;
            color: #FFF;
            border: 0 none;
        }

        #more-popover-content .btn-xs {
            font-size: 12px;
            padding: 2px 2px;
            width: 64px;
            margin: 2px;
            height: 20px;
            margin: 1px auto;
            border: 0 none;
            background: transparent;
            color: #FFF;
            border: 1px solid #FFF;
        }

        #more-popover-content .btn-xs:hover {
            background-color: rgb(213, 149, 69);
            color: #FFF;
        }

        table#xtbn {
            width: 386px
        }

        table#xtbn tr {
            line-height: 2
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style id="edui-customize-v3BgDialog-style">.edui-default .edui-for-v3BgDialog .edui-dialog-content {
        width: 600px;
        height: 300px;
    }</style>
    <style id="edui-customize-v3BdBgDialog-style">.edui-default .edui-for-v3BdBgDialog .edui-dialog-content {
        width: 800px;
        height: 400px;
    }</style>
    <link href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/css/ueditor.css" type="text/css" rel="stylesheet">
    <script src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/js/codemirror.js" type="text/javascript" defer></script>
    <link rel="stylesheet" type="text/css" href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/css/codemirror.css">

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        a, img {
            border: 0;
        }

        body {
            margin: 0 20px;
            font: 14px/180% '微软雅黑 Bold', '微软雅黑';
        }

        a {
            color: #060;
            text-decoration: none;
        }

        a:hover {
            color: #F30;
            text-decoration: none;
        }

        .header {
            width: 100%;
            height: 40px;
            background: #E4E4E4;
            border: 1px solid #dddddd;
            position: relative;
            font-size: 14px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .header .header-left {
            margin: 5px 5px;
            padding: 0;
        }

        .header .header-left button {
            width: 100px;
            height: 30px;
            background: #5ea60f;
            border: none;
            color: #fff;
            font: 14px bold '微软雅黑 Bold', '微软雅黑';
        }

        .header .header-right {
            margin: 5px 0px;
            padding: 0;
            position: absolute;
            left: 450px;
            top: 0px;
        }

        .header .header-left select {
            width: 75px;
            height: 30px;
            cursor: pointer;
        }

        .header .header-left input {
            border: 1px solid #dddddd;
            height: 26px;
            width: 260px;
        }

        .header-left .add {
            width: 120px;
            height: 30px;
            background: #5ea60f;
            border: none;
            color: #fff;
            font: 14px bold '微软雅黑 Bold', '微软雅黑';
            cursor: pointer;
        }

        .fenzu {
            width: 120px;
            height: 30px;
            background: #5ea60f;
            border: none;
            color: #fff;
            font: 14px bold '微软雅黑 Bold', '微软雅黑';
            cursor: pointer;
        }

        /* tabbtn */
        .tabbtn {
            height: 35px;
        }

        .tabbtn li {
            float: left;
            position: relative;
            margin: 0;
            top: 0px;
            border-left: #ddd 1px solid;
            border-right: #ddd 1px solid;
            border-top: #ddd 1px solid;
        }

        .tabbtn li a {
            display: block;
            float: left;
            height: 33px;
            line-height: 33px;
            overflow: hidden;
            width: 120px;
            text-align: center;
            font-size: 14px;
            cursor: pointer;
        }

        .tabbtn li.current a {
            height: 33px;
            line-height: 33px;
            background: #5ea60f;
            color: #fff;
            font-weight: 800;
        }

        /* tabcon */
        .tabcon {
            border: 1px #ddd solid;
            position: relative; /*必要元素*/
            height: auto;
            overflow: hidden;
            width: 1100px;
            height: auto;
        }

        .tabcon .subbox {
            position: absolute; /*必要元素*/
            left: 0;
            top: 0;
        }

        .tabcon .sublist {
            padding: 5px 10px;
            height: auto;
        }

        /*表格颜色*/
        .tdcolor {
            background: #f4f4f4;
        }

        .page {
            margin-top: 20px;
            position: absolute;
            left: 380px;
        }

        .page ul li {
            float: left;
            display: block;
            width: 40px;
        }

        td button {
            width: 100px;
            height: 30px;
            background: #5ea60f;
            border: none;
            color: #fff;
            font: 14px bold '微软雅黑 Bold', '微软雅黑';
        }

        .all {
            width: 1000px;
            height: auto;
            margin: 5px auto;
        }

        .all-left {
            float: left;
            width: 370px;
            height: 795px;
            background-image: url(images/phone.png);
            background-repeat: no-repeat;
        }

        .all-right {
            float: left;
            width: auto;
            margin: 10px;
        }

        .tuwei {
            width: 1100px;
            margin: 0px;
        }

        .tuwei-left {
            float: left;
        }

        .tuwei-right {
            float: right;
            margin-right: 50px;
        }

        .tuwei-left-test {
            width: 720px;
            padding: 5px;
        }

        .tuwei-left-test input {
            width: 555px;
            height: 30px;
            font-size: 14px;
            padding: 5px;
            border: 1px #ddd solid;
        }

        .tuwei-left-test select {
            width: 75px;
            height: 30px;
            font-size: 12px;
            padding: 5px;
            border: 1px #ddd solid;
        }

        .tuwei-left-test-span {
            float: right;
            width: 150px;
            height: 40px;
            line-height: 40px;
            background: #5ea60f;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }

        .tuwei-right-img-span {
            float: right;
            width: 90px;
            height: 90px;
            line-height: 90px;
            text-align: center;
            margin-left: 20px;
            background: #5ea60f;
        }

        .wuwei-right-img {
            position: relative;
            margin-top: 5px;
        }

        .wuwei-right-img input {
            opacity: 0;
            filter: alpha(opacity=0);
            height: 95px;
            width: 100px;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 9;
        }

        .content-edit {
            width: 1200px;
            height: auto;
            margin: 0 auto;
            text-align: center;
        }

        .content-edit textarea {
            width: 800px;
            height: 400px;
            border: 1px #ddd solid;
        }

        .content-edit input {
            width: 850px;
            height: 30px;
            font-size: 14px;
            margin: 10px auto;
            padding: 5px;
            border: 1px #ddd solid;
        }

        .content-edit button {
            width: 130px;
            height: 40px;
            line-height: 40px;
            background: #5ea60f;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }

        .content-font {
            width: 800px;
            height: auto;
            margin: 0 auto;
            text-align: center;
        }

        .content-font textarea {
            width: 800px;
            height: 600px;
            border: 1px #ddd solid;
        }

        .content-img {
            width: 800px;
            height: 600px;
            border: 1px #ddd solid;
            position: relative;
            margin-top: 5px;
            padding-top: 10px;
        }

        .content-img input {
            opacity: 0;
            filter: alpha(opacity=0);
            height: 240px;
            width: 240px;
            position: absolute;
            top: 10;
            left: 200;
            z-index: 19;
        }

        .content-media {
            width: 800px;
            height: 600px;
            border: 1px #ddd solid;
            position: relative;
            margin-top: 5px;
            padding-top: 10px;
        }

        .content-media-left {
            float: left;
            width: 300px;
            margin: 90px 10px;
        }

        .content-media-right {
            float: right;
            width: 450px;
            margin: 90px 10px;
        }

        .content-media-right input {
            opacity: 0;
            filter: alpha(opacity=0);
            height: 240px;
            width: 240px;
            position: absolute;
            top: 10;
            left: 200;
            z-index: 19;
        }

        .content-media-left input {
            width: 260px;
            height: 30px;
            font-size: 14px;
            padding: 5px;
            border: 1px #ddd solid;
            margin: 10px 0;
        }

        .content-media-left textarea {
            width: 260px;
            height: 312px;
            font-size: 14px;
            padding: 5px;
            border: 1px #ddd solid;
        }
    </style>
</head>

<body>
<?php if($ma["id"] > 0): ?><form id="form" action="/backup/wxtest/Home/Material/modify" enctype="multipart/form-data" method="post">
        <?php else: ?>
        <form id="form" action="/backup/wxtest/Home/Material/publish" enctype="multipart/form-data" method="post"><?php endif; ?>

<div class="all">
    <div class="all-right">
        <ul class="tabbtn" id="fadetab" style="margin-bottom:1px;">
            <li class="current"><a href="#">图文</a></li>
            <li><a href="#">文字</a></li>
            <li><a href="#">图片</a></li>
            <li><a href="#">音频</a></li>
            <li><a href="#">视频</a></li>
            <li><a href="#">投票</a></li>

        </ul>
        <!--tabbtn end-->

        <div class="tabcon" id="fadecon">
            <!--图文标签-->
            <div class="sublist">
                <ul>
                    <div id="u40" class="text-title">
                        <div class="tuwei" id="alist">
                            <!--图文头部-->
                            <input value="<?php echo ($ma["id"]); ?>" name="txt_id" type="hidden">

                            <div class="tuwei-left">
                                <!--<div class="tuwei-left-test">
                                <form action="<?php echo U('zhuaqu');?>" method="post">
                                    <input name='caijiurl' type="text" placeholder="必须为微信发表文章URL"><span><button style="width:150px; height:40px; line-height:40px; margin-left:5px; background:#5ea60f; color:#fff; font-size:14px; font-weight:bold; text-align:center;cursor:pointer;"type="submit">抓取</button></span>
                                </form>
                                </div>-->
                                <div class="tuwei-left-test" style="margin-top:25px;">
                                    <select name="article_type" class="sel">

                                        <?php if($ma["article_class"] > 0): ?><option selected="selected" value="<?php echo ($ma["article_class"]); ?>">
                                                <?php echo ($cname); ?>
                                            </option>

                                            <?php else: ?>
                                            <option selected="selected">
                                                分类
                                            </option><?php endif; ?>

                                        <?php if(is_array($class)): foreach($class as $key=>$v): if($ma["article_class"] != $v.id): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["gname"]); ?></option><?php endif; endforeach; endif; ?>
                                    </select>
                                    <select name="article_year" class="sel">

                                        <?php if($ma["article_ageclass"] > 0): ?><option selected="selected" value="<?php echo ($ma["article_ageclass"]); ?>">
                                                <?php echo ($aname); ?>
                                            </option>
                                            <?php else: ?>
                                            <option selected="selected">
                                                年龄
                                            </option><?php endif; ?>

                                        <?php if(is_array($ageClass)): foreach($ageClass as $key=>$vv): if($ma["article_class"] != $vv.id): ?><option value="<?php echo ($vv["id"]); ?>"><?php echo ($vv["gname"]); ?></option><?php endif; endforeach; endif; ?>
                                    </select>
                                    <input style="width:396px;" name='article_title' type="text" placeholder="文章标题：（必填）"
                                           value='<?php echo ($ma["article_title"]); ?>'>
                                    <input style="width:150px; float:right;" type="text" placeholder="文章作者：（选填）"
                                           name='article_publisher' value='<?php echo ($ma["article_publisher"]); ?>'>
                                </div>
                                <div class="tuwei-left-test">
                                    正文：
                                </div>
                            </div>
                            <div class="tuwei-right">
                                <div class="wuwei-right-img">

                                    <input id="fiUrl" name="photo" type="file">

                                    <img id="im" style='width:88px;height:88px' src="http://<?php echo ($root); echo ($ma["fm_url"]); ?>">
                                    <b><span id="sh">

                                    </span></b>
                                    <span><button type="button" id="but" class="tuwei-right-img-span"
                                                  style="cursor:pointer; color:#fff; font-size:14px; font-weight:bold;">
                                        上传封面
                                    </button></span></div>

                                <div class="wuwei-right-img">（大图片建议尺寸：900*500像素）</div>
                            </div>
                            <div style="clear:both;"></div>
                            <!--图文头部 end-->
                            <!--编辑器-->
                            <div class="content-edit">
                                <div id="full-page" class="bg small-height"
                                     style="min-width: 1200px; margin-top: 0px; margin-left:-80px; height: 352px;">
                                    <div class="box p-r"><!--box start-->
                                        <div class="fl w0 p-r">

                                            <div class="w1 fl">
                                                <div class="n1">分类</div>
                                                <ul class="n1-1" style="height: 280px;">
                                                    <li id="guanzhu-tpl-trigger" class="active"><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-guanzhu" role="tab"
                                                            data-toggle="tab" aria-expanded="true"> 顶关注 </a></li>
                                                    <li id="title-tpl-trigger" class=""><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-title" role="tab"
                                                            data-toggle="tab" aria-expanded="false"> 标题 </a></li>
                                                    <li id="body-tpl-trigger" class=""><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-body" role="tab"
                                                            data-toggle="tab" aria-expanded="false"> 卡片 </a></li>
                                                    <li id="img-tpl-trigger" class=""><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-img" role="tab"
                                                            data-toggle="tab" aria-expanded="false"> 分割线 </a></li>
                                                    <li id="hutui-tpl-trigger"><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-hutui" role="tab"
                                                            data-toggle="tab"> 互推账号 </a></li>
                                                    <li id="yuanwen-tpl-trigger" class=""><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-yuanwen" role="tab"
                                                            data-toggle="tab" aria-expanded="false"> 底提示 </a></li>
                                                    <li id="backg-tpl-trigger" class=""><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-backg" role="tab"
                                                            data-toggle="tab" aria-expanded="false"> 背景 </a></li>
                                                    <li id="pic-tpl-trigger" class=""><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-pic" role="tab"
                                                            data-toggle="tab" aria-expanded="false"> 图文图片 </a></li>
                                                    <li id="fuhao-tpl-trigger"><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-fuhao" role="tab"
                                                            data-toggle="tab" aria-expanded="false"> iconfont </a></li>
                                                    <li id="video-tpl-trigger" class=""><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-video" role="tab"
                                                            data-toggle="tab" aria-expanded="false"> 音视频 </a></li>
                                                    <li id="mb-tpl-trigger" class=""><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-mb" role="tab"
                                                            data-toggle="tab"> 模板 </a></li>
                                                    <li id="zan-tpl-trigger" class=""><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-zan" role="tab"
                                                            data-toggle="tab">点赞分享</a></li>
                                                    <li id="sucai-tpl-trigger"><a
                                                            href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#style-sucai" role="tab"
                                                            data-toggle="tab">素材+节日</a></li>


                                                </ul>
                                            </div>


                                            <div class="w2 fl" style="background:#FFF">
                                                <div class="n2 ttt">
                                                    样式展示区
                                                </div>

                                                <div id="insert-style-list" class="item tab-content"
                                                     style="height: 281px;">


                                                    <!-- 顶关注 -->

                                                    <div id="style-guanzhu" class="tab-pane active">


                                                        <div id="guanzhu-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">


                                                                <?php
 $res = M('wxstyle')->where(array('type'=>1))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>


                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <!-- 标题 -->

                                                    <div id="style-title" class="tab-pane">


                                                        <div id="title-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">

                                                                <?php
 $res = M('wxstyle')->where(array('type'=>2))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>


                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <!-- 卡片 -->
                                                    <div id="style-body" class="tab-pane">

                                                        <div id="body-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">


                                                                <?php
 $res = M('wxstyle')->where(array('type'=>3))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>

                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <!-- 分隔线 -->

                                                    <div id="style-img" class="tab-pane">

                                                        <div id="img-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">


                                                                <?php
 $res = M('wxstyle')->where(array('type'=>5))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <!-- 互推 -->

                                                    <div id="style-hutui" class="tab-pane">
                                                        <div id="hutui-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">


                                                                <?php
 $res = M('wxstyle')->where(array('type'=>4))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>

                                                            </ul>

                                                        </div>
                                                    </div>


                                                    <!-- 底提示 -->

                                                    <div id="style-yuanwen" class="tab-pane">
                                                        <div id="yuanwen-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">


                                                                <?php
 $res = M('wxstyle')->where(array('type'=>6))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>


                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <!-- 背景 -->
                                                    <div id="style-backg" class="tab-pane">
                                                        <div id="backg-list" class="ui-portlet clearfix ">
                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">

                                                                <?php
 $res = M('wxstyle')->where(array('type'=>7))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <!-- 图文图片 -->
                                                    <div id="style-pic" class="tab-pane">
                                                        <div id="pic-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">

                                                                <?php
 $res = M('wxstyle')->where(array('type'=>8))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>

                                                            </ul>

                                                        </div>
                                                    </div>

                                                    <!-- 场景 -->


                                                    <div id="style-scene" class="tab-pane">
                                                        <div id="scene-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">
                                                                <?php
 $res = M('wxstyle')->where(array('type'=>9))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>


                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <!-- 音视频 -->


                                                    <div id="style-video" class="tab-pane">
                                                        <div id="video-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">
                                                                <?php
 $res = M('wxstyle')->where(array('type'=>10))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>


                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <!-- 模板 -->


                                                    <div id="style-mb" class="tab-pane">
                                                        <div id="mb-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">
                                                                <?php
 $res = M('wxstyle')->where(array('type'=>11))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>


                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <!-- 模板 -->


                                                    <div id="style-zan" class="tab-pane">
                                                        <div id="zan-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">
                                                                <?php
 $res = M('wxstyle')->where(array('type'=>12))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>


                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <!-- 素材图 -->


                                                    <div id="style-sucai" class="tab-pane">
                                                        <div id="sucai-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">
                                                                <?php
 $res = M('wxstyle')->where(array('type'=>13))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>


                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <!-- 小符号 -->


                                                    <div id="style-fuhao" class="tab-pane">
                                                        <div id="fuhao-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">
                                                                <?php
 $res = M('wxstyle')->where(array('type'=>14))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>


                                                            </ul>
                                                        </div>
                                                    </div>


                                                    <!-- 节日 -->


                                                    <div id="style-jieri" class="tab-pane">
                                                        <div id="jieri-list" class="ui-portlet clearfix ">

                                                            <ul id="loader"
                                                                class="editor-template-list ui-portlet-list">
                                                                <?php
 $res = M('wxstyle')->where(array('type'=>15))->order('id
                                                                desc')->select(); foreach ($res as $value) { $sid = $value['id']; $style = $value['style']; $code = $value['code']; echo "
                                                                <li class='col-xs-12 brush' data-id='$sid' title=$style>
                                                                    "; echo "<!--".$style." -->"; echo $code; } ?>


                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <!--我的收藏-->
                                                    <!--<div id="style-my" class="tab-pane">
                                                    <div id="my-list" class="ui-portlet clearfix "></div>
                                                    </div>-->
                                                    <!--模板列表-->
                                                    <!--<div class="tab-pane" id="editor-tpls" style="padding:0px 0px;position:relative;">
                                                        <ul id="editor-tpls-navtab" class="nav nav-tabs" style="border:0 none;">
                                                                                  <li class="ignore">
                                                            <a href="#recommend-tpl-list-1" role="tab" data-toggle="tab">模板可以提高编辑效率哟</a>
                                                          </li>
                                                        </ul>
                                                        <div class="tab-content"  style="padding:0 10px;overflow-x:hidden;" id="editor-tpls-list"></div>
                                                    </div>	-->
                                                </div>

                                            </div>
                                            <div class="w3 fl">
                                                <div class="editor2 p-r fl" style="height: 280px;"><!--editor2 start-->
                                                    <textarea id="editor" name='cont' class="edui-default" style="width: 498px; height: 264px;">
                                                        <?php echo ($ma["content"]); ?>
                                                    </textarea>
                                                    <div class="menu">
                                                        <!--<div class="loginbox"><a href="/admin/login.html" target="_blank">登录</a></div>-->

                                                        <!--<div id="scon" data-toggle="modal" data-target="#bccg" title="保存">保存</div>-->

                                                        <div id="html-see" data-toggle="modal" data-target="#myModalsee"
                                                             title="模拟预览">预览
                                                        </div>
                                                        <!-- <div class="copy-editor-html" title="复制内容">复制</div> -->
                                                        <!--<div class="loginbox" id="tongbu" title="登录到微信"><a href="https://mp.weixin.qq.com" target="_blank">发布</a></div> -->
                                                        <div class="clear-editor" title="清空编辑器内容">清空</div>
                                                        <!--<div id="kefu"><a href="http://www.weixin2010.com" target="_blank" title="编辑器使用帮助">教程</a></div>-->
                                                        <div id="caiji" title="采集微信文章内容">采集</div>
                                                    </div>
                                                </div>
                                                <!--editor2 end-->

                                            </div>
                                        </div>
                                    </div>
                                    <!--box end-->
                                </div>


                                <div id="bccg" class="modal fade" tabindex="9999" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">保存草稿到数据库</h4>

                                            </div>
                                            <div class="modal-body">
                                                <form id="form8" action="admin/svmsg.php?do=tongbu" target="_blank"
                                                      enctype="multipart/form-data" method="post">

                                                    <div class="input-group" style="margin-top:10px;">
                                                        <span class="input-group-addon" id="basic-addon1">标题:</span>
                                                        <input type="text" class="form-control" id="wxtitle1"
                                                               name="wxtitle1">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">内容:</label>

                                                        <div style="border:1px solid #ccc;padding:20px;">
                                                            <div id="tbcov"
                                                                 style="height:120px;overflow-y:scroll;"></div>

                                                            <textarea id="savecontent1" name="content1"
                                                                      style="display:none"></textarea>

                                                        </div>

                                                    </div>


                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" id="savewx">保存文章</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                </button>
                                            </div>


                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                                <!--预览框  -->
                                <!-- Modal -->
                                <!-- sample modal content -->
                                <div id="myModal" class="modal fade" tabindex="9999" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title" id="exampleModalLabel">保存编辑内容</h4>

                                                <div><em style="color:#8c8c8c;font-style:normal;font-size:12px;">2015-08-10</em>
                                                    <a style="font-size:12px;color:#607fa6" href="javascript:void(0);"
                                                       id="post-user"></a></div>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form1" action="user/savemoban.php" method="post">
                                                    <div class="input-group" style="margin-top:10px;">
                                                        <span class="input-group-addon" id="basic-addon1">标题:</span>
                                                        <input type="text" class="form-control" id="wxtitle"
                                                               name="wxtitle" placeholder="标题（必填）"><input name="wxhname"
                                                                                                          type="hidden"
                                                                                                          value="">
                                                    </div>
                                                    <div class="input-group" style="margin-top:10px;">
                                                        <span class="input-group-addon" id="basic-addon1">描述</span>
                                                        <textarea class="form-control" rows="2" id="wxstr" name="wxstr"
                                                                  placeholder="指定分享描述（选填）"></textarea></div>
                                                    <div class="input-group" style="margin-top:10px;">
                                                        <span class="input-group-addon" id="basic-addon1">图片URL</span>
                                                        <input type="text" class="form-control" id="wximgurl"
                                                               name="wximgurl" placeholder="指定分享图标（选填）"></div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">内容:</label>

                                                        <div style="border:1px solid #ccc;padding:20px;">
                                                            <div id="preview" style="height:200px;overflow-y:scroll;"><p
                                                                    style="border-width: 0px;"><br></p>
                                                                <section data-id="685" class="v3editor"><p
                                                                        style="border-width: 0px;">&nbsp; &nbsp;<img
                                                                        src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/https://mmbiz.qlogo.cn/mmbiz/z9433rAGTDfiaaFED4iaX8CS6OIzViaEWFdYHqxw1jAtyo5296wzicjyFWsricb7jd6uRbdNdTZOFcIqveC0ISpbClg/0?wx_fmt=gif"
                                                                        style="border-radius: 4px; max-width: 100%; padding: 4px; border-width: 0px; background-color: rgb(255, 255, 255);">
                                                                </p></section>
                                                                <p style="border-width: 0px;"><br></p>
                                                                <section data-id="720" class="v3editor">
                                                                    <section
                                                                            style="max-width: 100%; white-space: normal; margin: 1em auto; padding: 1em 2em; box-sizing: border-box !important; word-wrap: break-word !important; border-width: 0px;">
                                                                        <span style="max-width: 100%; float: left; margin-left: -7px; margin-top: 15px; display: block; box-sizing: border-box !important; word-wrap: break-word !important; border-width: 0px;"><section
                                                                                class="color"
                                                                                style="max-width: 100%; min-height: 33px; color: rgb(255, 255, 255); text-align: center; line-height: 1.5; font-size: 15px; margin-right: 10px; padding: 5px 8px; min-width: 75px; border-width: 0px; box-sizing: border-box !important; word-wrap: break-word !important; background: rgb(255, 29, 107);">
                                                                            今日话题
                                                                        </section><img
                                                                                style="display: block; border-radius: 4px; max-width: 100%; padding: 4px; border-width: 0px; width: 7px !important; box-sizing: border-box !important; word-wrap: break-word !important; visibility: visible !important; height: auto !important; background-color: rgb(255, 255, 255);"
                                                                                class="" data-type="gif"
                                                                                data-ratio="0.8571428571428571"
                                                                                data-w="7" _width="7px"
                                                                                src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/https://mmbiz.qlogo.cn/mmbiz/SlzGSgJicOCyyFCCia7KrgN9uruqH8dB461o9ZgmIVbOdRSicIpLRPBuciaGl0YKedcIfpXGI9TEia3a14TFWdLNrgQ/0?wx_fmt=gif&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1"
                                                                                data-width="7px"></span>
                                                                        <section class="v3brush"
                                                                                 style="max-width: 100%; padding: 16px; width: 560px; font-size: 14px; line-height: 1.4; border-width: 0px; box-sizing: border-box !important; word-wrap: break-word !important;"
                                                                                 data-width="560px">
                                                                            一天一个鸡蛋，不仅能提高记忆力，还能保护视力，帮助减肥。但有些人对鸡蛋心有疑虑，怕每天吃升高血脂。殊不知，早餐吃个鸡蛋，可是有诸多好处。在营养学界，鸡蛋一直有“全营养食品”的美称，杂志甚至为鸡蛋戴上了“世界上最营养早餐”的殊荣。
                                                                        </section>
                                                                    </section>
                                                                </section>
                                                                <p style="border-width: 0px;"><br></p>
                                                                <section data-id="716" class="v3editor">
                                                                    <fieldset
                                                                            style="padding: 16px; line-height: 1.4; margin-top: 10px; max-width: 100%; white-space: normal; border-width: 0px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(244, 244, 244);"
                                                                            id="shifu_c_008"
                                                                            class="wxqq-borderTopColor wxqq-borderLeftColor wxqq-borderRightColor wxqq-borderBottomColor;"
                                                                            label="Copyright © 2014 99vu.com All Rights Reserved.">
                                                                        <section class="v3brush"
                                                                                 style="color: inherit; border-width: 0px;">
                                                                            图文排版是设计的基本功，但经常有同学不知道如何处理图片与字体的搭配。正所谓“无规矩不成方圆”，图文排版也需要遵循一定的法则。今天就给同学们扒一扒图文排版10个技巧，让你的设计瞬间高逼格！
                                                                        </section>
                                                                    </fieldset>
                                                                </section>
                                                                <p style="border-width: 0px;"><br></p></div>
                                                            <textarea id="savecontent" name="savecontent"
                                                                      style="display:none"></textarea>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                </button>
                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                                <script>


                                    $("#tbsc").click(function () {

                                        $("#form4").submit();

                                    });


                                </script>

                                <!--tongbuweiwin_end-->
                                <!--userlogin-->


                                <!--e-userlogin-->
                                <!--caijistart-->
                                <div class="modal fade" id="weixincaiji" tabindex="999" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title" id="myModalLabel">微信文章内容采集</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form id="form5" action="<?php echo U('zhuaqu');?>" method="post">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">请输入要采集的微信文章网址（Ctrl+V
                                                            粘贴）：</label>
                                                        <input style="width:560px" type="text" class="form-control"
                                                               id="caijiurl" name="caijiurl" placeholder="输入网址">
                                                        <label for="exampleInputEmail1">授权码：</label>
                                                        <input style="width:560px" type="text" class="form-control"
                                                               id="sq" name="sq" value="weixin2010.com" readonly>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" id='51weixincaiji'
                                                        name='51weixincaiji'>采集整篇文章
                                                </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- endcaiji -->
                                <!--adstart-->
                                <div class="modal fade" id="myad" tabindex="999" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title" id="myModalLabel">2010微信编辑器</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    　　大家好，您现在访问的是2010微信编辑器，该版本更新了首页布局，编辑器内容一键清空、一键复制、一键预览功能，添加了一些最新流行的新样式，颜色选择器可以对一部分文本样式进行调整颜色等。</p>

                                                <p>
                                                    　　用户登录之后在前台可以直接保存编辑内容到后台数据库中，以备查看，修改，删除、同步微信公众平台等管理。如果您配置了微信公众平台开发者的appid,appsecret参数，你可以作为微信第三方发布平台，手机微信二维码扫描，预览编排好的文章，并可直接分享朋友或朋友圈。</p>

                                                <p></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="paragraph-setting" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog" style="width:600px;margin-top:20px;">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border:0 none">
                                                <button type="button" class="close" data-dismiss="modal"><span
                                                        aria-hidden="true">×</span><span class="sr-only">关闭</span>
                                                </button>
                                                <h4 class="modal-title">段落设置</h4>
                                            </div>
                                            <div class="modal-body" style="overflow: hidden;padding: 0;margin: 10px;">
                                                <form class="form-horizontal">
                                                    <div>
                                                        <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label">行高</label>

                                                                <div class="col-sm-7 controls">
                                                                    <input class="form-control" value="1.5em"
                                                                           id="paragraph-lineHeight" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label">字体</label>

                                                                <div class="col-sm-7 controls">
                                                                    <select class="form-control"
                                                                            id="paragraph-fontFamily">
                                                                        <option value="微软雅黑">微软雅黑</option>
                                                                        <option value="宋体">宋体</option>
                                                                        <option value="楷体">楷体</option>
                                                                        <option value="黑体">黑体</option>
                                                                        <option value="隶书,SimLi">隶书</option>
                                                                        <option value="arial">arial</option>
                                                                        <option value="sans-serif">sans-serif</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label">字号</label>

                                                                <div class="col-sm-7 controls">
                                                                    <input class="form-control" placeholder="字号"
                                                                           value="14px" id="paragraph-fontSize"
                                                                           type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label">首行缩进</label>

                                                                <div class="col-sm-7 controls">
                                                                    <input class="form-control"
                                                                           id="paragraph-textIndent" value="2em"
                                                                           type="text">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label">段前距</label>

                                                                <div class="col-sm-7 controls">
                                                                    <input class="form-control"
                                                                           id="paragraph-paddingTop" value="5px"
                                                                           type="text">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-5 control-label">段后距</label>

                                                                <div class="col-sm-7 controls">
                                                                    <input class="form-control"
                                                                           id="paragraph-paddingBottom" value="5px"
                                                                           type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </form>
                                            </div>
                                            <div class="modal-footer text-right">
                                                <button type="button" onClick="applyParagraph('active');"
                                                        class="btn btn-primary" data-dismiss="modal">应用本样式
                                                </button>
                                                <button type="button" onClick="applyParagraph('all');"
                                                        class="btn btn-warning" data-dismiss="modal">应用全文
                                                </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- sample modal content -->
                                <div id="myModalsee" class="modal fade" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static"
                                     style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    预览（提示：如文章太长，请按下鼠标滚轮，上下拉动预览）</h4>

                                                <div><em style="color:#8c8c8c;font-style:normal;font-size:12px;">2015-08-10</em>
                                                    <a style="font-size:12px;color:#607fa6" href="javascript:void(0);"
                                                       id="post-user"></a></div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <div style="border:0px solid #ccc;padding:20px;">
                                                        <div id="previews"><p style="border-width: 0px;"><br></p>
                                                            <section data-id="685" class="v3editor"><p
                                                                    style="border-width: 0px;">&nbsp; &nbsp;<img
                                                                    src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/https://mmbiz.qlogo.cn/mmbiz/z9433rAGTDfiaaFED4iaX8CS6OIzViaEWFdYHqxw1jAtyo5296wzicjyFWsricb7jd6uRbdNdTZOFcIqveC0ISpbClg/0?wx_fmt=gif"
                                                                    style="border-radius: 4px; max-width: 100%; padding: 4px; border-width: 0px; background-color: rgb(255, 255, 255);">
                                                            </p></section>
                                                            <p style="border-width: 0px;"><br></p>
                                                            <section data-id="720" class="v3editor">
                                                                <section
                                                                        style="max-width: 100%; white-space: normal; margin: 1em auto; padding: 1em 2em; box-sizing: border-box !important; word-wrap: break-word !important; border-width: 0px;">
                                                                    <span style="max-width: 100%; float: left; margin-left: -7px; margin-top: 15px; display: block; box-sizing: border-box !important; word-wrap: break-word !important; border-width: 0px;"><section
                                                                            class="color"
                                                                            style="max-width: 100%; min-height: 33px; color: rgb(255, 255, 255); text-align: center; line-height: 1.5; font-size: 15px; margin-right: 10px; padding: 5px 8px; min-width: 75px; border-width: 0px; box-sizing: border-box !important; word-wrap: break-word !important; background: rgb(255, 29, 107);">
                                                                        今日话题
                                                                    </section><img
                                                                            style="display: block; border-radius: 4px; max-width: 100%; padding: 4px; border-width: 0px; width: 7px !important; box-sizing: border-box !important; word-wrap: break-word !important; visibility: visible !important; height: auto !important; background-color: rgb(255, 255, 255);"
                                                                            class="" data-type="gif"
                                                                            data-ratio="0.8571428571428571" data-w="7"
                                                                            _width="7px"
                                                                            src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/https://mmbiz.qlogo.cn/mmbiz/SlzGSgJicOCyyFCCia7KrgN9uruqH8dB461o9ZgmIVbOdRSicIpLRPBuciaGl0YKedcIfpXGI9TEia3a14TFWdLNrgQ/0?wx_fmt=gif&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1"
                                                                            data-width="7px"></span>
                                                                    <section class="v3brush"
                                                                             style="max-width: 100%; padding: 16px; width: 560px; font-size: 14px; line-height: 1.4; border-width: 0px; box-sizing: border-box !important; word-wrap: break-word !important;"
                                                                             data-width="560px">
                                                                        一天一个鸡蛋，不仅能提高记忆力，还能保护视力，帮助减肥。但有些人对鸡蛋心有疑虑，怕每天吃升高血脂。殊不知，早餐吃个鸡蛋，可是有诸多好处。在营养学界，鸡蛋一直有“全营养食品”的美称，杂志甚至为鸡蛋戴上了“世界上最营养早餐”的殊荣。
                                                                    </section>
                                                                </section>
                                                            </section>
                                                            <p style="border-width: 0px;"><br></p>
                                                            <section data-id="716" class="v3editor">
                                                                <fieldset
                                                                        style="padding: 16px; line-height: 1.4; margin-top: 10px; max-width: 100%; white-space: normal; border-width: 0px; box-sizing: border-box !important; word-wrap: break-word !important; background-color: rgb(244, 244, 244);"
                                                                        id="shifu_c_008"
                                                                        class="wxqq-borderTopColor wxqq-borderLeftColor wxqq-borderRightColor wxqq-borderBottomColor;"
                                                                        label="Copyright © 2014 99vu.com All Rights Reserved.">
                                                                    <section class="v3brush"
                                                                             style="color: inherit; border-width: 0px;">
                                                                        图文排版是设计的基本功，但经常有同学不知道如何处理图片与字体的搭配。正所谓“无规矩不成方圆”，图文排版也需要遵循一定的法则。今天就给同学们扒一扒图文排版10个技巧，让你的设计瞬间高逼格！
                                                                    </section>
                                                                </fieldset>
                                                            </section>
                                                            <p style="border-width: 0px;"><br></p></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                                                </button>
                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <!--adend-->
                                <script type="text/javascript"
                                        src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/ueditor/ueditor.config.js"></script>
                                <script type="text/javascript"
                                        src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/ueditor/ueditor.all.min.js"></script>
                                <script src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/js/gjs02.js" type="text/javascript"></script>
                                <script src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/js/jquery.Jcrop.js"></script>
                                <link rel="stylesheet" href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/css/jquery.Jcrop.css"
                                      type="text/css">

                                <!--[if lt IE 9]>
                                <script src="style/js/html6.js"></script>
                                <![endif]-->
                                <script src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/js/gjs01.js" type="text/javascript"></script>
                                <script type="text/javascript"
                                        src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/js/less-1.7.0.min.js"></script>
                                <script type="text/javascript"
                                        src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/js/ZeroClipboard.min.js"></script>
                                <script>
                                    //$('#myad').modal('show');
                                    $('#loginModal').modal('show');</script>
                                <script type="text/javascript" src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/style/js/instoo.js"></script>
                                <div id="global-zeroclipboard-html-bridge" class="global-zeroclipboard-container"
                                     style="position: absolute; left: 0px; top: -9999px; width: 1px; height: 1px; z-index: 999999999;">
                                    <object id="global-zeroclipboard-flash-bridge"
                                            name="global-zeroclipboard-flash-bridge" width="100%" height="100%"
                                            type="application/x-shockwave-flash"
                                            data="js/ueditor/third-party/zeroclipboard/ZeroClipboard.swf?noCache=1439172085753">
                                        <param name="allowScriptAccess" value="sameDomain">
                                        <param name="allowNetworking" value="all">
                                        <param name="menu" value="false">
                                        <param name="wmode" value="transparent">
                                        <param name="flashvars"
                                               value="trustedOrigins=guoyoo.99vu.com%2C%2F%2Fguoyoo.99vu.com%2Chttp%3A%2F%2Fguoyoo.99vu.com&amp;swfObjectId=global-zeroclipboard-flash-bridge&amp;jsVersion=2.2.0">
                                        <div id="global-zeroclipboard-flash-bridge_fallbackContent">&nbsp;</div>
                                    </object>
                                </div>

                                <div id="success" style="display:none;">
                                    <div>复制成功</div>
                                </div>
                                <div id="tbsuccess" style="display:none;">
                                    <div>正在同步微信公众平台，请等待......</div>
                                </div>
                                <div id="zeroClipBoard-helper" class="hidden"></div>

                                <a href="#" id="toTop" style="display: none;"><span id="toTopHover"></span>To Top</a>

                                <script>
                                    function shifuMouseDownMark(id) {

                                        var con = $('#' + id).find("span").html();
                                        var range = UE.getEditor('editor').selection.getRange();

                                        range.select();

                                        UE.getEditor('editor').selection.getText();

                                        UE.getEditor('editor').execCommand('insertHtml', con);
                                    }
                                </script>
                            </div>
                            <div style="margin-left:-100px; margin-top:0px;" class="content-edit">
                                <input type="text" placeholder="原文链接（选填）" name='txt_Url' value='<?php echo ($ma["txt_url"]); ?>'>
                            </div>
                            <div style="margin-left:-100px" class="content-edit">
                                <button type="submit" style="cursor:pointer;">
                                    <?php if($ma["id"] > 0): ?>编辑文章
                                        <?php else: ?>
                                        发布文章<?php endif; ?>
                                </button>
                            </div>

                        </div>
                    </div>

                </ul>
            </div>
            <!--图文标签 END-->
            <!--文字标签 -->
            <div class="sublist">
                <ul>
                    <div id="u40" class="text-title">
                        <div class="tuwei" id="alist">
                            <div class="content-font">
                                <textarea name="yj" cols="20" rows="5">dff</textarea>
                            </div>
                            <div class="content-edit">
                                发布时间：<input style="width:200px; height:30px;" class="Wdate" type="text"
                                            onClick="WdatePicker()">
                            </div>
                            <div class="content-edit">
                                <button type="button" style="cursor:pointer;">发布文章</button>
                            </div>

                        </div>
                    </div>

                </ul>
            </div>
            <!--文字标签 END-->

            <!--图片标签 -->
            <div class="sublist">
                <ul>
                    <div id="u40" class="text-title">
                        <div class="tuwei" id="alist">
                            <div class="content-font">
                                <div class="content-img"><input style=" cursor:pointer;" type="file">
                                    <img src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/images/img.jpg"><br>（大小: 不超过2M, 格式: bmp, png, jpeg,
                                    jpg, gif）
                                </div>
                            </div>
                            <div class="content-edit">
                                发布时间：<input style="width:200px; height:30px;" class="Wdate" type="text"
                                            onClick="WdatePicker()">
                            </div>
                            <div class="content-edit">
                                <button type="button" style="cursor:pointer;">发布文章</button>
                            </div>

                        </div>
                    </div>

                </ul>
            </div>
            <!--图片标签 END-->

            <!--音频标签 -->
            <div class="sublist">
                <ul>
                    <div id="u40" class="text-title">
                        <div class="tuwei" id="alist">
                            <div class="content-font">
                                <div class="content-img"><input style=" cursor:pointer;" type="file">
                                    <img src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/images/music.jpg"><br>（大小: 不超过2M, 格式: bmp, png, jpeg,
                                    jpg, gif）
                                </div>
                            </div>
                            <div class="content-edit">
                                发布时间：<input style="width:200px; height:30px;" class="Wdate" type="text"
                                            onClick="WdatePicker()">
                            </div>
                            <div class="content-edit">
                                <button type="button" style="cursor:pointer;">发布文章</button>
                            </div>

                        </div>
                    </div>

                </ul>
            </div>
            <!--音频标签 END-->

            <!--视频标签 -->
            <div class="sublist">
                <ul>
                    <div id="u40" class="text-title">
                        <div class="tuwei" id="alist">
                            <div class="content-font">
                                <div class="content-media">
                                    <div class="content-media-left">
                                        <p><input type="text" placeholder="必须为微信发表文章URL"></p>

                                        <p><textarea name="yj" cols="20" rows="5">dff</textarea></p>
                                    </div>
                                    <div class="content-media-right">
                                        <p style="margin-top:10px;">（大小: 不超过20M, 格式: rm, rmvb, wmv, avi, mpg, mpeg, mp4
                                            ）</p>

                                        <p style="width:420px; height:320px; margin-top:30px; border:1px #ddd solid;">
                                            <input style=" cursor:pointer;" type="file">
                                            <img src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/images/media.jpg"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="content-edit">
                                发布时间：<input style="width:200px; height:30px;" class="Wdate" type="text"
                                            onClick="WdatePicker()">
                            </div>
                            <div class="content-edit">
                                <button type="button" style="cursor:pointer;">发布文章</button>
                            </div>

                        </div>
                    </div>

                </ul>
            </div>
            <!--视频标签 END-->

        </div>
    </div>
    <div style="clear:both"></div>
</div>
</form>
<div id="zeroClipBoard-helper" class="hidden"></div>

<a href="/backup/wxtest/./Application/Home/View/Public/bianjiqi/#" id="toTop" style="display: none;"><span id="toTopHover"></span>To Top</a>

<script src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/js/jquery1.42.min.js"></script>
<script src="/backup/wxtest/./Application/Home/View/Public/bianjiqi/js/jquery.tabso_yeso.js"></script>
<script src="/backup/wxtest/./Application/Home/View/Public/js/ajaxfileupload.js"></script>
<script src="/backup/wxtest/./Application/Home/View/Public/js/uploadPreview.js"></script>
<script>


    window.onload = function () {

        new uploadPreview({UpBtn: "fiUrl", ImgShow: "im"});
    }
    $("#fadetab").tabso({
        cntSelect: "#fadecon",
        tabEvent: "click",
        tabStyle: "fade"
    });

    function imgUrl() {
        var f = $('#fiUrl').val();

        if (f == "") {
            $('#sh').text('图片不能为空！');
            $('#sh').show(300);
            $('#im').attr("src", "");
            return false;

        }
        $.ajaxFileUpload({
            url: '/backup/wxtest/Home/Material/uploads',
            type: "post",
            secureuri: false,
            fileElementId: 'fiUrl',
            dataType: 'text',
            success: function (data) {

                if (data == 1) {

                    $('#sh').text('图片为3M以内！');
                    $('#sh').show(300);
                    $('#im').attr("src", "");
                    return false;
                }

                var va = data;
                $('#sh').text('上传成功！');
                $('#sh').show(300);
                $('#im').attr("src", "http://" + va);
                $('#fiUrl').val('');
            }
        });
    }


</script>


</body>
</html>