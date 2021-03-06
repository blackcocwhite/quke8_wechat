<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/Application/Home/View/Public/css/main.css" type="text/css" rel="stylesheet">
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

    /* tabbtn */
    .tabbtn{height:35px;}
    .tabbtn li{float:left;position:relative;margin:0; top: 2px; border-left:#eee 1px solid; border-right:#eee 1px solid; border-top:#eee 1px solid;}
    .tabbtn li a{display:block;float:left;height:33px;line-height:33px;overflow:hidden;width:120px;text-align:center;font-size:14px;cursor:pointer;}
    .tabbtn li.current a{height:33px;line-height:33px;background:#5ea60f;color:#fff;font-weight:800;}
    /* tabcon */
    .tabcon{border:1px #ddd solid;position:relative;/*必要元素*/height:auto;overflow:hidden; width: 100%; height:auto;}
    .tabcon .subbox{position:absolute;/*必要元素*/left:0;top:0;}
    .tabcon .sublist{padding:5px 10px;height:auto;}
    /*表格颜色*/
    .tdcolor{background: #f4f4f4;}
    .page{margin-top:20px; position: absolute; left: 380px;}
    .page ul li{float: left; display: block; width: 40px;}
</style>
<body>
<div class="header">
    <div class="header-left">
        <input type="checkbox" name="checkbox" onclick="selectAll(this)"><span style="margin-left:5px;">全选</span>
        <select name='userGoup' id='userGoup'>
            <?php if(is_array($groups)): foreach($groups as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
        </select>
        <button type="button" style="cursor:pointer;" onclick="batchUpdate(<?php echo ($pub_id); ?>)">确定</button>
    </div>
</div>

<ul class="tabbtn" id="fadetab">
    <li class="current"><a href="<?php echo U('pub_fans',array('id' =>$pub_id));?>">全部（<span><?php echo ($countAll); ?></span>）</a></li>
    <?php if(is_array($groups)): foreach($groups as $key=>$vo): if($vo["count"] != 0): ?><li><a href="<?php echo U('pub_fans',array('gid' =>$vo[id],'id' =>$pub_id));?>"><?php echo ($vo["name"]); ?>（<span><?php echo ($vo["count"]); ?></span>）</a></li><?php endif; endforeach; endif; ?>
    <form action='<?php echo U("create_groups",array("pub_id"=>$pub_id));?>' method="post">
        <li><input style="margin-left:10px; margin-top:5px;" type="text" placeholder="+新建分组" name="gname">
        <button class="fenzu">确认</button></li>
    </form>
</ul><!--tabbtn end-->
<div class="tabcon" id="fadecon">
    <div class="sublist">
        <ul>
            <div id="u40" class="text-title">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
                    <tbody>
                    <tr>
                        <td width="40" height="30" align="center" valign="middle"><label for="checkbox"> </label></td>
                        <td width="70" height="30" align="center" valign="middle"><strong>图像</strong></td>
                        <td width="150" height="30" align="center" valign="middle"><strong>姓名</strong></td>
                        <td width="150" height="30" align="center" valign="middle"><strong>openid</strong></td>
                        <td width="100" height="30" align="center" valign="middle"><strong>性别</strong></td>
                        <td width="100" height="30" align="center" valign="middle"><strong>地区</strong></td>
                        <td width="100" height="30" align="center" valign="middle"><strong>分组</strong></td>
                        <td width="100" height="30" align="center" valign="middle"><strong>关注时间</strong></td>
                      </tr>
                      <?php if(is_array($resultUserList)): foreach($resultUserList as $key=>$vo): if($vo["subscribe"] == 1): ?><tr>
                                  <td align="center" valign="middle"><input type="checkbox" name="pubcheckbox" id="checkbox" value="<?php echo ($vo["openid"]); ?>">
                                      <label for="checkbox"> </label></td>
                                  <td align="center" valign="middle"><img src=<?php echo ($vo["headimgurl"]); ?> width="33" height="33" alt=""/></td>
                                  <td width="150" align="center" valign="middle"><?php echo ($vo["nickname"]); ?></td>
                                  <td align="center" valign="middle"><?php echo ($vo["openid"]); ?></td>
                                  <td align="center" valign="middle">
                                        <?php switch($$vo["sex"]): case "1": ?>男<?php break;?>    
                                            <?php case "2": ?>女<?php break;?>    
                                            <?php default: ?>未知<?php endswitch;?>
                                  </td>
                                  <td align="center" valign="middle"><?php echo ($vo["city"]); ?></td>
                                  <td align="center" valign="middle">
                                    <select>
                                        <?php if(is_array($groups)): foreach($groups as $key=>$vog): ?><option  
                                                <?php if($vo["groupid"] == $vog['id']): echo selected; endif; ?>
                                                value="<?php echo ($vog["id"]); ?>"><?php echo ($vog["name"]); ?>
                                            </option><?php endforeach; endif; ?>
                                    </select>

                                  </td>
                                  <td align="center" valign="middle"><?php echo (date("Y-m-d H:i:s",$vo["subscribe_time"])); ?></td>
                              </tr>
                            </else><?php endif; endforeach; endif; ?>
                    <tr>
                      <td style="border:0;" colspan="8" align="center" valign="middle">
                            <?php if($ifPage == 1): ?><div class="listpage"> 共 <span style="color:red"><?php echo ($countAll); ?></span> 条记录共<span style="color:red"> <?php echo ($pageAll); ?> </span> 页,当前第 <span style="color:red"><?php echo ($currentPage); ?></span> 页  
                                      <a href="<?php echo U('pub_fans',array('nextPage' =>$currentPage+1,'id' =>$pub_id,'next_openid' =>$next_openid));?>">下一页</a><?php endif; ?>
                    </td>
                    </tr>
                    </tbody>
                </table>
        </div>
            
        </ul>
  </div>
</div>
<script src="/Application/Home/View/Public/js/jquery1.42.min.js"></script>
<script src="/Application/Home/View/Public/js/jquery.tabso_yeso.js"></script>
<script>
    $("#fadetab").tabso({
        cntSelect:"#fadecon",
        tabEvent:"click",
        tabStyle:"fade"
    });
    function selectAll(checkbox) {
        $('input[type=checkbox]').attr('checked', $(checkbox).attr('checked'));
    }
 
    function batchUpdate(pub_id)
    {
        var pubCheckBox = $("[name=pubcheckbox]");
        var user_id;
        var user_list = "";
        // var group_id = document.getElementsByName('pubGroupIds').value;
        var group_id = $("[name=userGoup]").val();
        for (var j = 0; j < pubCheckBox.length; j++){
            if (pubCheckBox[j].checked == true)
            {
                    user_id = pubCheckBox[j].value;
                    if(user_list == "")
                        user_list = user_id;  
                    else
                        user_list = user_list+','+user_id;                   
            }
        }
        if(user_list == "")
        {
            alert("请至少选择一个用户！");
            return false;
        }
        
        $.get("/Home/Menu/batchUpdate/user_list/" + user_list + "/group_id/" + group_id + "/pub_id/" + pub_id, null, function(data)
        {
            if (data == 1)
            {
                alert("更新成功");
                window.location.reload();
            } else
            {
                alert(data);
            }

        });        

    }    
    
    
    
    
    
</script>
</body>
</html>