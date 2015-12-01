<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <!--<meta charset="UTF-8">-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link href="/./Application/Home/View/Public/css/main.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="/./Application/Home/View/Public/css/lanrenzhijia.css" media="all">
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

        .header{ width: 100%; height: 40px; background: #E4E4E4; border: 1px solid #dddddd; position: relative; font-size: 14px; margin-top: 10px; margin-bottom: 10px;}
        .header .header-left{ margin:5px 5px; padding: 0;}
        .header .header-left button{ width: 100px; height: 30px;   background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';}
        .header .header-right{ margin: 5px 0px; padding: 0; position: absolute; left: 450px; top:0px;}
        .header .header-left select{width: 75px; height: 30px; }
        .header .header-right select{width: 75px; height: 30px;  }
        .header .header-right input{border: 1px solid #dddddd; height:26px; width: 200px; }
        .header-right .select{border: 1px solid; height:28px; width: 50px;}
        .header-right .add{ width: 120px; height: 30px;  background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';cursor:pointer;}
        .fenzu{ width: 120px; height: 30px;  background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';cursor:pointer;}

        /* tabcon */

        .tabcon{border:1px #ddd solid;position:relative;/*必要元素*/height:auto;overflow:hidden; width: 100%; height:auto;}
        .tabcon .subbox{position:absolute;/*必要元素*/left:0;top:0;}
        .tabcon .sublist{padding:5px 10px;height:auto;}

        /*表格颜色*/

        .tdcolor{background: #f4f4f4;}
        .page{margin-top:20px; position: absolute; left: 380px;}
        .page ul li{float: left; display: block; width: 40px;}
        .wx-gongzonghao2 { margin-top:10px;}
        .wx-gongzonghao2 button{ float:right;width:90px; height:90px; line-height:90px; text-align:center; margin-left:20px; background:#f60;}
        .wx-gongzonghao2 input
        {
            opacity:0;
            filter:alpha(opacity=0);
            height: 100px;
            width: 100px;
            position: absolute;
            top: 10;
            left: 200;
            z-index: 19;
        }

    </style>
<body>
<div class="sublist">
    <ul>
        <div id="u40" class="text-title">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
                <tbody>
                <tr>
                        <td width="40" height="30" align="center" valign="middle"><label for="checkbox"> </label></td>
                        <td width="70" height="30" align="center" valign="middle"><strong>LOGO</strong></td>
                        <td width="150" height="30" align="center" valign="middle"><strong>订阅号名称</strong></td>
                        <td width="150" height="30" align="center" valign="middle"><strong>地区</strong></td>
                        <td height="30" colspan="2" align="center" valign="middle"><strong>管理权限</strong></td>
                        <!--
                        <td width="50" height="30" align="center" valign="middle">&nbsp;</td>
                        -->
                        <td width="50" height="30" align="center" valign="middle">&nbsp;</td>
                        <td width="50" height="30" align="center" valign="middle">&nbsp;</td>
                        <td width="50" height="30" align="center" valign="middle">&nbsp;</td>
                        <td width="50" height="30" align="center" valign="middle">&nbsp;</td>
                        <td width="100" height="30" align="center" valign="middle">&nbsp;</td>
                        <td width="50" height="30" align="center" valign="middle">&nbsp;</td>
                        <td width="100" height="30" align="center" valign="middle"><strong>添加人</strong></td>
                        <td width="100" height="30" align="center" valign="middle"><strong>添加日期</strong></td>
                        <td width="100" height="30" align="center" valign="middle"><strong>编辑人</strong></td>
                        <td width="100" height="30" align="center" valign="middle"><strong>编辑时间</strong></td>
                        <!--
                        <td width="100" height="30" align="center" valign="middle"><strong>最后编辑</strong></td>
                        -->
                </tr>
            <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
                    <td align="center" valign="middle"><input type="checkbox" name="pubcheckbox" id="checkbox" value="<?php echo ($vo["id"]); ?>">
                        <label for="checkbox"> </label></td>
                    <td align="center" valign="middle"><img src="<?php echo ($vo["head_img"]); ?>" width="33" height="33" alt=""/></td>
                    <td width="150" align="center" valign="middle"><a href="#" title="注册人姓名：马云&#10;注册手机号：15888587138&#10;注册邮箱：tyl@quke8.com&#10;学校负责人：刘德华&#10;学校负责人手机：13855886699&#10;学校负责人邮箱：kgz@quke8.com"><strong><?php echo ($vo["nick_name"]); ?></strong></a></td>
                    <td align="center" valign="middle"><?php echo ($vo["city"]); ?>-<?php echo ($vo["area"]); ?></td>
                    <!--
                    <td width="50" align="center" valign="middle"><a class="theme-login-gl" href="javascript:;" onClick="delcfm()">管理</a></td>
                    -->
                    <!--<td width="50" align="center" valign="middle"><a class="theme-login-bj" href="javascript:;">编辑</a></td>-->
                    <td width="3%" align="center" valign="middle"><a class="theme-login-bj1"
                            href="<?php echo U('com_info',array('id'=>$vo['id']));?>">编辑</a></td>                       
                    <!--<td width="50" align="center" valign="middle" ><a href="/./Application/Home/View/Publicfans.html">粉丝</a></td>-->
                    <!--<td width="50" align="center" valign="middle"><a href="/./Application/Home/View/Publicmaterial.html">群发</a></td>-->
                    <!--<td width="50" align="center" valign="middle"><a href="#">回复</a></td>-->
                    <!--<td width="50" align="center" valign="middle"><a href="/./Application/Home/View/Publicstats.html">统计</a></td>-->
                    <!--<td width="50" align="center" valign="middle"><a href="/./Application/Home/View/Publichttps://mp.weixin.qq.com/">菜单</a></td>-->

                        <td width="50" align="center" valign="middle" ><a href="<?php echo U('Menu/pub_fans',array('id'=>$vo[id]));?>">粉丝</a></td>
                        <td width="50" align="center" valign="middle"><a href="<?php echo U('material/singleqf',array('id'=>$vo[id]));?>">群发</a></td>
                        <td width="50" align="center" valign="middle"><a href="<?php echo U('Menu/pub_msg',array('id'=>$vo[id]));?>">回复</td>
                        <td width="50" align="center" valign="middle"><a href="<?php echo U('DataStatistics/pub_index');?>">统计</a></td>
                        <td width="50" align="center" valign="middle"><a href="<?php echo U('Menu/menu',array('id'=>$vo[id]));?>">菜单</a></td>
                        <td align="center" valign="middle"><a href="<?php echo U('Menu/news',array('id'=>$vo[id]));?>">消息</a>
                        <!--<a href="javascript:;" onClick="delcfm2()">删除</a>-->
                                                     
                            <!--<span style="width:50px;" id="content">小学</span><input style="width:30px; height:20px; background:#5ea60f; color:#fff; margin-left:5px;" id="changeContent" type="text" value="分组" onclick="changeContent()"/>                                        
                            <script type="text/javascript">                                       
                            function changeContent(){                                       
                                var o = document.getElementById("content");                                        
                                var c = o.innerHTML;                                        
                                o.innerHTML = "<input type='text' value='" + c + "'/>"                                       
                            }                                       
                            </script>-->
                        </td>
                        <td align="center" valign="middle"><select  style="width:50px;" id="pubGroupIdsh" name="<?php echo ($vo["id"]); ?>">
                                <?php if(is_array($pubGroupId)): foreach($pubGroupId as $key=>$vop): ?><!--
                                    <option  value="<?php echo ($vop["id"]); ?>"><?php echo ($vop["gname"]); ?></option>
                                    -->
                                    <option  
                                        <?php if($vo['pub_group'] == $vop['id']) echo selected;?>
                                        value="<?php echo ($vop["id"]); ?>"><?php echo ($vop["gname"]); ?></option><?php endforeach; endif; ?>
                            </select>
                            <button type="button" style="cursor:pointer;" onclick="singleGroup(<?php echo ($vo["id"]); ?>)">确定</button></td>
                        <td align="center" valign="middle"><?php echo ($vo["create_person"]); ?></td>
                        <td align="center" valign="middle"><?php echo (date('Y/m/d',$vo["create_time"])); ?></td>
                        <td align="center" valign="middle"><?php echo ($vo["create_person"]); ?></td>
                        <td align="center" valign="middle"><?php echo (date('Y-m-d H:i:s',$vo["modify_time"])); ?></td>
                        <!--
                        <td align="center" valign="middle"><?php echo ($vo["create_person"]); ?></td>
                        -->
                    </tr><?php endforeach; endif; ?>
                <tr>
                    <!-- <td style="border:0;" colspan="18" align="center" valign="middle"><div class="listpage"> 共 <span style="color:red">48</span> 条记录<span style="color:red"> 1/2 </span> 页  <a href="#">上一页</a>     <span class="current">1</span><a href="#">2</a>  <a href="#">下一页</a>    <input class="search-tz" name="" type="text">  <a href="#">跳转</a>  </div></td> -->
                    <td style="border:0;" colspan="18" align="center" valign="middle"><?php echo ($show); ?></td>
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
    function selectAll(checkbox) {
        $('input[type=checkbox]').attr('checked', $(checkbox).attr('checked'));
    }
    function batchGroup()
    {
        var pubCheckBox = $("[name=pubcheckbox]");
        var pub_id;
        // var group_id = document.getElementsByName('pubGroupIds').value;
        var group_id = $("[name=pubGroupIds]").val();
        for (var j = 0; j < pubCheckBox.length; j++){
            if (pubCheckBox[j].checked == true)
            {
                    pub_id = pubCheckBox[j].value;
                    // alert("  ");
                    // $.get( "<?php echo U('manage/updatePubGroup',array('pub_id'=>pub_id,'group_id'=>group_id)) ; ?>",null,function(data)

                    //$.get("http://localhost:8080/wx/Home/Manage/updatePubGroup/pub_id/" + pub_id + "/group_id/" + group_id, null, function(data)
                    $.get("/Home/Manage/updatePubGroup/pub_id/" + pub_id + "/group_id/" + group_id, null, function(data)
                    {
                         if (data == 1)
                        {
                            alert("更新成功");
                            window.location.reload();
                        }  else
                        {
                            alert(data);
                        }

                    });
            }
        }

    }

    function singleGroup(pub_id)
    {
        //var group_id = $("[name=pubGroupIdsh]").val();
                //var pub_id =  $("[name=pubGroupIdsh]").title;
        var group_id = $("[name="+pub_id+"]").val();

        //$.get("http://localhost:8080/wx/Home/Manage/updatePubGroup/pub_id/" + pub_id + "/group_id/" + group_id, null, function(data)
        $.get("/Home/Manage/updatePubGroup/pub_id/" + pub_id + "/group_id/" + group_id, null, function(data)
        {
            if (data == 1)
            {
            alert("更新成功");
            window.location.reload();
           } else if (data == 2)
            {
            alert("更新成功2");
            window.location.reload();
            } else
            {
            alert(data);
            }

        });
    }
    //    添加公众号
    $(function () {
        $('.theme-login').click(function () {
            $('.theme-popover-mask').fadeIn(100);
            $('.theme-popover').slideDown(200);
        });
        $('.theme-poptit .close').click(function () {
            $('.theme-popover-mask').fadeOut(100);
            $('.theme-popover').slideUp(200);
        });
        $('.qx').click(function () {
            $('.theme-popover-mask').fadeOut(100);
            $('.theme-popover').slideUp(200);
        });
    });
    //    编辑公众号
    $(function () {
        $('.theme-login-bj').click(function () {
            $('.theme-popover-mask-bj').fadeIn(100);
            $('.theme-popover-bj').slideDown(200);
        })
        $('.theme-poptit-bj .close').click(function () {
            $('.theme-popover-mask-bj').fadeOut(100);
            $('.theme-popover-bj').slideUp(200);
        });
        $('.qx').click(function () {
            $('.theme-popover-mask-bj').fadeOut(100);
            $('.theme-popover-bj').slideUp(200);
        });
    });
    
    /*
    //公众号查询
    function pubQueryByCondition(){
        var city= encodeURI($("[name=city]").val());
        var area= encodeURI($("[name=area]").val());
        var materName= encodeURI($("[name=materName]").val());
        
        //$.get("http://localhost:8080/wx/Home/Manage/pub_query/city/" + city + "/area/" + area + "/materName/" + materName, null, function(html)
          $.get("/Home/Manage/pub_query/city/" + city + "/area/" + area + "/materName/" + materName, null, function(html)
        {
            $("#u40").empty().html(html);
        });        
        
    }
    */

    /*
 $('#city').click(function(){
            $(this).change(function(){
                var city = $("[name=city]").val();
                $.ajax({
                    url:'/Home/Manage/pub_area_info/city/'+city,
                    dataType:'json',
                    success:function(data){
                        $("#area").empty();
                        var count = data.length;
                        var i = 0;
                        var b="<option selected value='0'>全部</option>";
                           for(i=0;i<count;i++){
                               b+="<option value='"+data[i].area+"'>"+data[i].area+"</option>";
                           }
                        $("#area").append(b);
                    }
                });
               });
        }
    );    
  */  
    
    
    
    
    
    //    管理公众号
    function delcfm() {
        if (confirm("管理资料修改可能会影响公众号的正常运营，请谨慎操作。")) {
            $('.theme-popover-mask-gl').fadeIn(100);
            $('.theme-popover-gl').slideDown(200);
            $('.theme-poptit-gl .close').click(function () {
                $('.theme-popover-mask-gl').fadeOut(100);
                $('.theme-popover-gl').slideUp(200);
            });
            $('.qx').click(function () {
                $('.theme-popover-gl').fadeOut(100);
                $('.theme-popover-gl').slideUp(200);
            });
        } else {

        }
    }
    //    删除公众号
    function delcfm2() {
        if (!confirm("蠢猪，你知道你在干什么吗？")) {
            window.event.returnValue = false;
        }
    }
</script>
</body>
</html>