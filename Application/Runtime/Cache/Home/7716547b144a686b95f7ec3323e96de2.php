<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/./Application/Home/View/Public/css/main.css" type="text/css" rel="stylesheet">
</head>
<style type="text/css">
    *{margin:0;padding:0;list-style-type:none;}
    a,img{border:0;}
    body{ margin:0 20px;font:14px/180% '微软雅黑 Bold', '微软雅黑';}
    a{
	color:#060;
	text-decoration:none;
}
    ul{margin: 0 auto; padding: 0; width: 100%; position: relative; left:100px;}
    li{list-style: none; float: left; width: 200px; height: 50px; display: block; line-height: 50px; text-align: center; color: #555; cursor:pointer; margin-bottom: 30px;}
    a:hover{
	color:#F30;
	text-decoration:none;
}
    .header{  width:800px; height:auto; font-size: 16px; margin:20px auto; border:1px #ddd solid; padding:20px 50px; text-align: center;}
    .header input{ width: 200px; height: 30px; font:14px/180% '微软雅黑 Bold', '微软雅黑';}
	.tx{margin:20px; line-height:30px; font-size:14px; color:#999;}
    .con{margin: 10px;}
    .menu2{display: none;}
    .menu3{display: none;}
    .ait{background: #e7e7e7;}
    .bit{background: #f8f8f8;}
    .btn{background: #e7e7e7; width: 100px; height: 40px; color: #555555; border: none;}
    .bo2{ margin-top: 30px; width:100%; text-align: center;}

</style>

<body>

<div class="header">
    <ul>
        <li id="mu1" class="ait">菜单1</li>
        <li id="mu2" class="bit">菜单2</li>
        <li id="mu3" class="bit">菜单3</li>
    </ul>
    <div style="clear: both"></div>
    <form action='<?php echo U("saveMenu");?>' method="post">
        <div class="menu1">
            <div class="con">主菜单 1：
                <input type="text" name='button_one' placeholder="主菜单1" value="<?php echo ($button[0]["name"]); ?>">
                <input type="text" hidden="true" name='button_one_url' placeholder="主菜单链接1" value="<?php echo ($button[0]["url"]); ?>">
                <input type="text" hidden="true" name='pub_id' placeholder="主菜单链接1" value="<?php echo ($pub_id); ?>">
            </div>
            <div class="con">子菜单 1：
                <input type="text" name='subone_one' placeholder="子菜单1" value="<?php echo ($button[0]['sub_button']['list'][0]["name"]); ?>">
                <input type="text" name='subone_one_url' placeholder="子菜单链接1" value="<?php echo ($button[0]['sub_button']['list'][0]["url"]); ?>">
            </div>
            <div class="con">子菜单 2：
                <input type="text" name='subone_two' placeholder="子菜单2" value="<?php echo ($button[0]['sub_button']['list'][1]["name"]); ?>">
                <input type="text" name='subone_two_url' placeholder="子菜单链接2" value="<?php echo ($button[0]['sub_button']['list'][1]["url"]); ?>">
            </div>
            <div class="con">子菜单 3：
                <input type="text" name='subone_thr'placeholder="子菜单3" value="<?php echo ($button[0]['sub_button']['list'][2]["name"]); ?>">
                <input type="text" name='subone_thr_url' placeholder="子菜单链接3" value="<?php echo ($button[0]['sub_button']['list'][2]["url"]); ?>">
            </div>
            <div class="con">子菜单 4：
                <input type="text" name='subone_for' placeholder="子菜单4" value="<?php echo ($button[0]['sub_button']['list'][3]["name"]); ?>">
                <input type="text" name='subone_for_url' placeholder="子菜单链接4" value="<?php echo ($button[0]['sub_button']['list'][3]["url"]); ?>">
            </div>
            <div class="con">子菜单 5：
                <input type="text" name='subone_five' placeholder="子菜单5" value="<?php echo ($button[0]['sub_button']['list'][4]["name"]); ?>">
                <input type="text" name='subone_five_url' placeholder="子菜单链接5" value="<?php echo ($button[0]['sub_button']['list'][3]["url"]); ?>">
            </div>
        </div>
        <div class="menu2">
            <div class="con">主菜单 2：
                <input type="text" name='button_two' placeholder="主菜单2" value="<?php echo ($button[1]["name"]); ?>">
                <input type="text" hidden="true" name='button_two_url' placeholder="主菜单链接2" value="<?php echo ($button[1]["url"]); ?>">
            </div>
            <div class="con">子菜单 1：
                <input type="text" name='subtwo_one' placeholder="子菜单1" value="<?php echo ($button[1]['sub_button']['list'][0]["name"]); ?>">
                <input type="text" name='subtwo_one_url' placeholder="子菜单链接1" value="<?php echo ($button[1]['sub_button']['list'][0]["url"]); ?>">
            </div>
            <div class="con">子菜单 2：
                <input type="text" name='subtwo_two' placeholder="子菜单2" value="<?php echo ($button[1]['sub_button']['list'][1]["name"]); ?>">
                <input type="text" name='subtwo_two_url' placeholder="子菜单链接2" value="<?php echo ($button[1]['sub_button']['list'][1]["url"]); ?>">
            </div>
            <div class="con">子菜单 3：
                <input type="text" name='subtwo_thr' placeholder="子菜单3" value="<?php echo ($button[1]['sub_button']['list'][2]["name"]); ?>">
                <input type="text" name='subtwo_thr_url' placeholder="子菜单链接3" value="<?php echo ($button[1]['sub_button']['list'][2]["url"]); ?>">
            </div>
            <div class="con">子菜单 4：
                <input type="text" name='subtwo_for' placeholder="子菜单4" value="<?php echo ($button[1]['sub_button']['list'][3]["name"]); ?>">
                <input type="text" name='subtwo_for_url' placeholder="子菜单链接4" value="<?php echo ($button[1]['sub_button']['list'][3]["url"]); ?>">
            </div>
            <div class="con">子菜单 5：
                <input type="text" name='subtwo_five' placeholder="子菜单5" value="<?php echo ($button[1]['sub_button']['list'][4]["name"]); ?>">
                <input type="text" name='subtwo_five_url' placeholder="子菜单链接5" value="<?php echo ($button[1]['sub_button']['list'][4]["url"]); ?>">
            </div>
        </div>
        <div class="menu3">
            <div class="con">主菜单 3：
                <input type="text" name='button_thr' placeholder="主菜单3" value="<?php echo ($button[2]["name"]); ?>">
                <input type="text" hidden="true" name='button_thr_url' placeholder="主菜单链接3" value="<?php echo ($button[2]["url"]); ?>">
            </div>
            <div class="con">子菜单 1：
                <input type="text" name='subthr_one' placeholder="子菜单1" value="<?php echo ($button[2]['sub_button']['list'][0]["name"]); ?>">
                <input type="text" name='subthr_one_url' placeholder="子菜单链接1" value="<?php echo ($button[2]['sub_button']['list'][0]["url"]); ?>">
            </div>
            <div class="con">子菜单 2：
                <input type="text" name='subthr_two' placeholder="子菜单2" value="<?php echo ($button[2]['sub_button']['list'][1]["name"]); ?>">
                <input type="text" name='subthr_two_url' placeholder="子菜单链接2" value="<?php echo ($button[2]['sub_button']['list'][1]["url"]); ?>">
            </div>
            <div class="con">子菜单 3：
                <input type="text" name='subthr_thr' placeholder="子菜单3" value="<?php echo ($button[2]['sub_button']['list'][2]["name"]); ?>">
                <input type="text" name='subthr_thr_url' placeholder="子菜单链接3" value="<?php echo ($button[2]['sub_button']['list'][2]["url"]); ?>">
            </div>
            <div class="con">子菜单 4：
                <input type="text" name='subthr_for' placeholder="子菜单4" value="<?php echo ($button[2]['sub_button']['list'][3]["name"]); ?>">
                <input type="text" name='subthr_for_url' placeholder="子菜单链接4" value="<?php echo ($button[2]['sub_button']['list'][3]["url"]); ?>">
            </div>
            <div class="con">子菜单 5：
                <input type="text" name='subthr_five' placeholder="子菜单5" value="<?php echo ($button[2]['sub_button']['list'][4]["name"]); ?>">
                <input type="text" name='subthr_five_url' placeholder="子菜单链接5" value="<?php echo ($button[2]['sub_button']['list'][4]["url"]); ?>">
            </div>
        </div>

        <div class="bo2">
             <!-- <input type="button" value="保存菜单" class="btn"><input type="button" value="取消" class="btn">-->
             <button type="post" class="btn">保存菜单</button>
        </div>
    </form>
    <div class="tx">
        <p>提醒：</p>
        <p>1、可创建最多3个一级菜单，每个一级菜单下可创建最多5个二级菜单。</p>
        <p>2、一级菜单名不多于4个汉字或8个字母；二级菜单不多于8个汉字或16个字母。</p>
    </div>
</div>

<script src="/./Application/Home/View/Public/js/jquery-1.10.2.min.js"></script>
<script>
$(function(){
   $('#mu1').click(function(){
       $(this).attr('class','ait');
       $('#mu2').attr('class','bit');
       $('#mu3').attr('class','bit');
       $('.menu1').fadeIn(400);
       $('.menu2').hide();
       $('.menu3').hide();
   });
    $('#mu2').click(function(){
        $(this).attr('class','ait');
        $('#mu1').attr('class','bit');
        $('#mu3').attr('class','bit');
        $('.menu2').fadeIn(400);
        $('.menu1').hide();
        $('.menu3').hide();
    });
    $('#mu3').click(function(){
        $(this).attr('class','ait');
        $('#mu1').attr('class','bit');
        $('#mu2').attr('class','bit');
        $('.menu3').fadeIn(400);
        $('.menu2').hide();
        $('.menu1').hide();
    });
});




</script>
</body>
</html>