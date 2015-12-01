<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>被添加自动回复</title>
    <link rel="stylesheet" type="text/css" href="/Application/Home/View/Public/css/msg.css">
    <link rel="stylesheet" type="text/css" href="/Application/Home/View/Public/css/bootstrap.min.css" />
</head>
<body>


<ul class="msg_title_ul">
    <li style="background: #576477; color: white;"><a href="msg_1.html" style="color: #fff;">被添加自动回复</a></li>
    <li style="border-right: none;"><a href="msg_2.html">消息自动回复</a></li>
    <li><a href="msg_3.html">关键词自动回复</a></li>
</ul>
<div style="clear: both"></div>
<div class="text_tab">
    <ul id="myTab" class="nav nav-tabs" style="border: none; background: none;">
        <li><a href="#text" style="border: none; background: none;" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></span> 文字</a></li>
        <li><a href="#img" style="border: none; background: none;" data-toggle="tab"><span class="glyphicon glyphicon-picture"></span> 图片</a></li>
        <li><a href="#yuyin" style="border: none; background: none;" data-toggle="tab"><span class="glyphicon glyphicon-music"></span> 语音</a></li>
        <li><a href="#shiping" style="border: none; background: none;" data-toggle="tab"><span class="glyphicon glyphicon-facetime-video"></span> 视频</a></li>
    </ul>
    <div class="tab_content">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="text"><div contenteditable="true" id="content" class="msg_text"><?php echo ($wechat[sub_content]); ?></div></div>
            <div class="tab-pane fade" id="img">
                <ul>
                    <li class="create_access" ><a><i class="glyphicon glyphicon-plus"></i>从素材库中选择</a></li>
                    <li class="create_access" ><a><i class="glyphicon glyphicon-plus"></i>上传图片</a></li>
                </ul>
                <div style="clear: both"></div>

            </div>
            <div class="tab-pane fade" id="yuyin">
                <ul>
                    <li class="create_access" ><a><i class="glyphicon glyphicon-plus"></i>从素材库中选择</a></li>
                    <li class="create_access" ><a><i class="glyphicon glyphicon-plus"></i>新建语音</a></li>
                </ul>
            </div>
            <div class="tab-pane fade" id="shiping">
                <ul>
                    <li class="create_access" ><a><i class="glyphicon glyphicon-plus"></i>从素材库中选择</a></li>
                    <li class="create_access" ><a><i class="glyphicon glyphicon-plus"></i>新建视频</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div style="margin-top: 20px;"></div>
        <button id="saveReply" class="btn btn-success" onclick="replyButton(<?php echo ($pub_id); ?>,1)">保存回复</button>
        <button id="deleteReply" class="btn btn-default" onclick="replyButton(<?php echo ($pub_id); ?>,2)">删除回复</button>
</div>

<script src="/Application/Home/View/Public/js/jquery-1.10.2.min.js"></script>
<script src="/Application/Home/View/Public/js/bootstrap.min.js"></script>
<script>
function replyButton(pub_id,button_type){
    var msg_type = 1;//1表示被添加自动回复
    //var content= $("[id=content]").val();
    var content= encodeURI($('#content').text());
    //对应订阅号id，内容，什么类型的消息，按钮类型：保存还是删除
    $.get("/Home/Menu/reply_msg/pub_id/" + pub_id + "/content/" + content + "/msg_type/" + msg_type +"/button_type/" + button_type , null, function(data)
    {
        if (data == 1)
        {
            alert("保存成功！");
            //window.location.reload();
            if(button_type == 2)
                window.location.reload();
        } else
        {
            alert("内容未修改！");
        }

    });  
    
}
    
</script>
</body>
</html>