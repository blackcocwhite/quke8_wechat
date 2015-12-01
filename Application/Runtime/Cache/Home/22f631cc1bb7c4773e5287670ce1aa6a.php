<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/./Application/Home/View/Public/css/main.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/./Application/Home/View/Public/css/lanrenzhijia.css" media="all">
    <script src="/./Application/Home/View/Public/js/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $('.theme-login-admin').click(function () {
                $('.theme-popover-mask-admin').fadeIn(100);
                $('.theme-popover-admin').slideDown(200);
            });
            $('.theme-poptit-admin .close').click(function () {
                $('.theme-popover-mask-admin').fadeOut(100);
                $('.theme-popover-admin').slideUp(200);
            });
            $('.qx').click(function () {
                $('.theme-popover-mask-admin').fadeOut(100);
                $('.theme-popover-admin').slideUp(200);
            });

        })

        // 添加学校负责人账号
        jQuery(document).ready(function ($) {
            $('.theme-login-ls').click(function () {
                $('.theme-popover-mask-ls').fadeIn(100);
                $('.theme-popover-ls').slideDown(200);
            })
            $('.theme-poptit-ls .close').click(function () {
                $('.theme-popover-mask-ls').fadeOut(100);
                $('.theme-popover-ls').slideUp(200);
            });
            $('.qx').click(function () {
                $('.theme-popover-mask-ls').fadeOut(100);
                $('.theme-popover-ls').slideUp(200);
            });

        })

    </script>
</head>
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
        width: 200px;
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
        top: 2px;
        border-left: #eee 1px solid;
        border-right: #eee 1px solid;
        border-top: #eee 1px solid;
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
        width: 100%;
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

</style>
<body>
<!-- 编辑管理账号 END-->
<div class="theme-popover-admin">
    <div class="theme-poptit-admin">
        <a href="javascript:;" title="关闭" class="close">×</a>

        <h3 style=" color:red; font-size:18px; font-weight:bold; text-align:center;">添加/修改管理员账号</h3>
    </div>
    <form action="<?php echo U('addUser');?>" method="post">
        <div class="theme-popbod-admin dform-admin">
            <div class="wx-left">
                <div class="wx-gongzonghao">
                    <input id='user_name' type="text" placeholder="姓名" name='user_name'></div>
                <div class="wx-gongzonghao">
                    <input id='user_pass' type="text" placeholder="密码" name='user_pass' onblur="checkpsd1()"></div>

                <div class="wx-gongzonghao"><?php echo $vo['id'] ?>
                    <select style="width:230px;" name="role_id" id="user_role">
                        <?php if(is_array($role)): foreach($role as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"
                            <?php if($v['id'] == 1 && $_SESSION['superadmin']!= 1): ?>disabled='disabled'<?php endif; ?>
                            /><?php echo ($v["remark"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="wx-gongzonghao">
                    <input type="text" id='user_phone' placeholder="联系手机" name='user_phone' ></div>
                <div class="wx-gongzonghao"><input type="text" id='user_email' name='user_email' placeholder="邮箱" onblur="checkmail()">
                </div>

            </div>
            <div style="clear:both"></div>
            <div class="wx-button-admin">
                <input name="user_addtime" id="user_addtime" type="hidden">
                <input name="user_id" id='user_id' type="hidden">
                <input name="提 交" type="submit" value="确 定">
                <input name="取消" class="qx" type="reset" style="margin-left:10px;" value="取 消">
            </div>
        </div>
    </form>
</div>
<!-- 编辑管理账号 END-->

<!-- 添加学校负责人 END-->
<div class="theme-popover-ls">
    <div class="theme-poptit-ls">
        <a href="javascript:;" title="关闭" class="close">×</a>

        <h3 style=" color:red; font-size:18px; font-weight:bold; text-align:center;">添加/修改学校负责人账号</h3>
    </div>
    <div class="theme-popbod-ls dform-ls">
        <div class="wx-left">
            <div class="wx-gongzonghao"><input type="text" placeholder="姓名"></div>
            <div class="wx-gongzonghao"><input type="text" placeholder="密码"></div>
            <div class="wx-gongzonghao"><input type="text" placeholder="联系手机"></div>
            <div class="wx-gongzonghao"><input type="text" placeholder="邮箱"></div>
            <div class="wx-gongzonghao"><select>
                <option selected value="合肥">合肥</option>
                <option value="淮北">淮北</option>
                <option value="亳州">亳州</option>
                <option value="宿州">宿州</option>
                <option value="蚌埠">蚌埠</option>
                <option value="阜阳">阜阳</option>
                <option value="淮南">淮南</option>
                <option value="滁州">滁州</option>
                <option value="六安马鞍山">六安马鞍山</option>
                <option value="芜湖">芜湖</option>
                <option value="宣城">宣城</option>
                <option value="铜陵">铜陵</option>
                <option value="池州">池州</option>
                <option value="安庆">安庆</option>
                <option value="黄山">黄山</option>
            </select>
                <select>
                    <option selected value="包河区">包河区</option>
                    <option value="庐阳区">庐阳区</option>
                    <option value="蜀山区">蜀山区</option>
                    <option value="瑶海区">瑶海区</option>
                    <option value="高新区">高新区</option>
                    <option value="新站区">新站区</option>
                    <option value="经开区">经开区</option>
                    <option value="滨湖新区">滨湖新区</option>
                    <option value="肥东县">肥东县</option>
                    <option value="肥西县">肥西县</option>
                    <option value="长丰县">长丰县</option>
                    <option value="巢湖市">巢湖市</option>
                </select></div>
            <div class="wx-gongzonghao"><select style="width:230px;">
                <option selected value="北京大学">北京大学</option>
                <option value="清河路小学">清河路小学</option>
                <option value="宿松城关小学">宿松城关小学</option>
                <option value="宿松实验小学">宿松实验小学</option>
                <option value="清华大学">清华大学</option>
                <option value="复旦大学">复旦大学</option>
            </select></div>
        </div>
        <div style="clear:both"></div>
        <div class="wx-button-admin"><input name="提 交" type="submit" value="确 定">
            <input name="取消" type="reset" class="qx" style="margin-left:10px;" value="取 消">
        </div>
    </div>
</div>
<!-- 添加学校负责人 END-->

<ul class="tabbtn" id="fadetab">
    <li class="current"><a href="#">管理团队</a></li>
    <li><a href="#">学校负责人</a></li>
</ul>
<!--tabbtn end-->

<div class="header">
    <div class="header-left">
        <input style="padding-left:10px;" type="text" placeholder="请输入姓名">
        <button style="cursor:pointer;" class="select" type="button">查询</button>
        <button style="cursor:pointer;" class="select" type="button>"><a href="<?php echo U('node');?>"><span style="color:#fff;">权限管理</span></a>
        </button>
        <button style="cursor:pointer;" class="select" type="button>"><a href="<?php echo U('rbacLogList');?>"><span
                style="color:#fff;">操作日志</span></a></button>
    </div>
</div>
<div class="tabcon" id="fadecon">
    <div class="sublist">
        <ul>
            <div id="u40" class="text-title">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
                    <tbody>
                    <tr class="tdcolor">
                        <td width="150" height="30" align="center" valign="middle"><strong>姓名</strong></td>
                        <td width="150" height="30" align="center" valign="middle"><strong>职责</strong></td>
                        <td width="150" height="30" align="center" valign="middle"><strong>联系手机</strong></td>
                        <td width="200" height="30" align="center" valign="middle"><strong>邮箱</strong><strong></strong>
                        </td>
                        <td width="150" height="30" align="center" valign="middle"><strong>添加日期</strong></td>
                        <td width="150" height="30" align="center" valign="middle"><strong>添加人</strong></td>
                        <?php if($userName == admin): ?><td height="30" colspan="2" align="center" valign="middle"><strong>管理权限</strong></td>
                        <?php else: ?>
                            <td height="30" colspan="1" align="center" valign="middle"><strong>管理权限</strong></td><?php endif; ?>
                        <td width="200" height="30" align="center" valign="middle">
                            <strong>最后登录时间</strong><strong></strong></td>
                    </tr>
                    <?php if(is_array($user)): foreach($user as $key=>$vo): ?><tr>
                            <td width="150" height="30" align="center" valign="middle"><?php echo ($vo["user_name"]); ?></td>
                            <td align="center" valign="middle">
                                <?php if($vo['user_name']==C('RBAC_SUPERADMIN')): ?>系统管理员<?php endif; ?>
                                <elseif>
                                    <?php if(is_array($vo["role"])): foreach($vo["role"] as $key=>$v): ?><a href="<?php echo U('access',array('rid'=>$v['id']));?>"><?php echo ($v['remark']); ?></a><?php endforeach; endif; ?>
                                </elseif>
                            </td>
                            <td align="center" valign="middle"><?php echo ($vo["user_phone"]); ?></td>
                            <td align="center" valign="middle"><?php echo ($vo["user_email"]); ?></td>
                            <td align="center" valign="middle"><?php echo ($vo["user_addtime"]); ?></td>
                            <td align="center" valign="middle">admin</td>
                            <td width="75" align="center" valign="middle"><a href="javascript:modify('<?php echo ($vo["id"]); ?>')" id="modify">编辑</a></td>
                            <?php if($userName == admin): if($vo["id"] == 1): ?><td width="75" align="center" valign="middle"><a href="#"></a></td>
                                <?php else: ?>                              
                                    <td width="75" align="center" valign="middle"><a href="javascript:delcfm('<?php echo ($vo["id"]); ?>')">删除</a></td><?php endif; ?>
                            <?php else: endif; ?>
                            <td align="center" valign="middle"><?php echo (date("Y-m-d H:i:s",$vo["user_logtime"])); ?></td>
                        </tr><?php endforeach; endif; ?>

                    <tr>
                        <td>
                            <button style="cursor:pointer;"><a class="theme-login-admin" href="javascript:;"><span
                                    style="color:#fff;">+添加管理账号</span></a></button>
                        </td>
                        <td style="border:0;" colspan="15" align="center" valign="middle">
                            <?php echo ($show); ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </ul>
    </div>

    <div class="sublist">
        <ul>
            <div id="u40" class="text-title">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
                    <tbody>
                    <tr class="tdcolor">
                        <td width="150" height="30" align="center" valign="middle"><strong>姓名</strong></td>
                        <td width="200" height="30" align="center" valign="middle"><strong>学校（公众号）</strong></td>
                        <td width="150" height="30" align="center" valign="middle"><strong>地区</strong></td>
                        <td width="150" height="30" align="center" valign="middle">
                            <strong>联系手机</strong><strong></strong></td>
                        <td width="200" height="30" align="center" valign="middle"><strong>邮箱</strong></td>
                        <td width="200" height="30" align="center" valign="middle"><strong>添加日期</strong></td>
                        <td width="100" align="center" valign="middle"><strong>添加人</strong><strong></strong></td>
                        <td height="30" colspan="2" align="center" valign="middle"><strong>管理权限</strong></td>
                    </tr>

                    <tr>
                        <td width="150" height="30" align="center" valign="middle">马云</td>
                        <td align="center" valign="middle">清河路小学</td>
                        <td align="center" valign="middle">合肥市　庐阳区</td>
                        <td align="center" valign="middle">18611828878</td>
                        <td align="center" valign="middle">xuyanyun@wxm.com</td>
                        <td align="center" valign="middle">2015/5/12 11:21</td>
                        <td align="center" valign="middle">admin</td>
                        <td width="75" align="center" valign="middle"><a href="#">编辑</a></td>
                        <?php if($userName == admin): ?><td width="75" align="center" valign="middle"><a href="#">删除</a></td>
                        <?php else: endif; ?>
                    </tr>
                    <tr>
                        <td>
                            <button><a class="theme-login-ls" href="javascript:;"><span
                                    style="color:#fff;">+添加管理账号</span></a></button>
                        </td>
                        <td style="border:0;" colspan="15" align="center" valign="middle">
                            <div class="listpage"> 共 <span style="color:red">48</span> 条记录<span
                                    style="color:red"> 1/2 </span> 页 <a href="#">上一页</a> <span
                                    class="current">1</span><a href="#">2</a> <a href="#">下一页</a> <input
                                    class="search-tz" name="" type="text"> <a href="#">跳转</a></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </ul>
    </div>
</div>
<script src="/./Application/Home/View/Public/js/jquery1.42.min.js"></script>
<script src="/./Application/Home/View/Public/js/jquery.tabso_yeso.js"></script>
<script>
    $("#fadetab").tabso({
        cntSelect: "#fadecon",
        tabEvent: "click",
        tabStyle: "fade"
    });

    /*编辑管理账号*/
    function modify(id){
        $.ajax({
            url:'/Home/Rbac/modify/id/'+id,
            type:'json',
            success:function(data){
                    $('.theme-popover-mask-admin').fadeIn(100);
                    $('#user_name').val(data['user_name']);
                    // $('#user_pass').val(data['user_pass']);
                    $('#user_email').val(data['user_email']);
                    $('#user_phone').val(data['user_phone']);
                    $('#user_addtime').val(data['user_addtime']);
                    $('#user_id').val(id);
                    $('.theme-popover-admin').slideDown(200);
            }
        });
    }

    function delcfm(id) {
        if (!confirm("住手，你知道你在干什么吗？")) {
            window.event.returnValue = false;
        }else {
            window.location.href='/Home/Rbac/delUser/id/'+id;
        }
    }

//    密码
    function checkpsd1(){
        psd1=user_pass.value;
        var flagZM=false;
        var flagSZ=false ;
        var flagQT=false ;
        if(psd1.length<4 || psd1.length>12){
            $('#user_pass').css('border','1px solid red');
        }else
        {
            for(i=0;i < psd1.length;i++)
            {
                if((psd1.charAt(i) >= 'A' && psd1.charAt(i)<='Z') || (psd1.charAt(i)>='a' && psd1.charAt(i)<='z'))
                {
                    flagZM=true;
                }
                else if(psd1.charAt(i)>='0' && psd1.charAt(i)<='9')
                {
                    flagSZ=true;
                }else
                {
                    flagQT=true;
                }
            }
            if(!flagSZ||flagQT){
                $('#user_pass').css('border','1px solid red');

            }else{

                $('#user_pass').css('border','1px solid #aeaeae');

            }

        }
    }

//    邮箱
    function checkmail(){
        apos=user_email.value.indexOf("@");
        dotpos=user_email.value.lastIndexOf(".");
        if (apos<1||dotpos-apos<2)
        {
            $('#user_email').css('border','1px solid red');
        }
        else {
            $('#user_email').css('border','1px solid #aeaeae');
        }
    }




</script>
</body>
</html>