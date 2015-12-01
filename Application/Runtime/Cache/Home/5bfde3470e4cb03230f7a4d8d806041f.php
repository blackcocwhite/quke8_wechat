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
    .topdata{ width: 100%; height: 45px; background:#f5f5f5;border: 1px solid #dddddd; padding-top:5px; }
    .topdata ul{margin:5px 0; padding: 0;  }
    .topdata ul li{list-style: none;float: left; margin:0 15px;}
	.cursor{background:#5ea60f; padding:0 5px;}
	.cursor a{color:#fff;}
    .header{ width: 100%; height: 40px; background: #f5f5f5; border: 1px solid #dddddd; position: relative; font-size: 14px; margin-top: 10px; margin-bottom: 10px;}
    .header .header-left{ margin:5px 5px; padding: 0;}
    .header .header-left button{ width: 100px; height: 30px;   background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';}
    .header .header-right{ margin: 5px 0px; padding: 0; position: absolute; left: 550px; top:0px;}
    .header .header-right input{border: 1px solid #dddddd; height:26px; width: 200px; }
    .topdata input{border: 1px solid #dddddd; height:26px; width: 100px; }
    .header-right .select{border: 1px solid; height:28px; width: 50px;}
    .topdata .select{border: 1px solid; height:28px; width: 50px;}
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
<div class="sublist">
    <ul>
        <div id="u40" class="text-title">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
                <tbody>
                <tr>
                    <td width="30" height="30" align="center" valign="middle">&nbsp;</td>
                    <td width="200" height="30" align="center" valign="middle"><strong>文章标题</strong></td>
                    <td width="70" height="30" align="center" valign="middle"><strong>发布人</strong></td>
                    <td width="70" height="30" align="center" valign="middle"><strong>职责</strong></td>
                    <td width="70" height="30" align="center" valign="middle"><strong>编辑时间</strong></td>
                    <td width="150" height="30" align="center" valign="middle"><strong>发布时间</strong></td>
                    <!--
                    <td width="70" height="30" align="center" valign="middle"><strong>状态</strong></td>
                    <td width="70" height="30" align="center" valign="middle"><strong>审核人</strong></td>
                    -->
                    <!--
                    <td width="150" height="30" align="center" valign="middle"><strong>预览时间</strong></td>
                    -->
                    <td width="70" height="30" align="center" valign="middle"><strong>应用数量</strong></td>
                    <td width="70" height="30" align="center" valign="middle"><strong>阅读数量</strong></td>
                    <td height="30" colspan="3" align="center" valign="middle"><strong>操作</strong><strong></strong></td>
                </tr>
                 <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
                        <td height="30" align="center" valign="middle"><input type="checkbox" name="pubcheckbox" id="checkbox2" value="<?php echo ($vo["id"]); ?>"></td>
                        <td align="center" hidden="true" valign="middle"><?php echo ($vo["id"]); ?></td>
                        <td align="center" valign="middle"><?php echo ($vo["article_title"]); ?></td>
                        <td align="center" valign="middle"><?php echo ($vo["article_publisher"]); ?></td>
                    <?php if($vo["article_publisher"] == admin): ?><td align="center" valign="middle">系统管理员</td>
                    <?php else: ?>
                        <td align="center" valign="middle"><?php echo ($vo["remark"]); ?></td><!--<?php echo (date("Y-m-d H:i:s",$vo["edit_time"])); ?>--><?php endif; ?>
                        <td width="70" align="center" valign="middle"><?php echo (date("Y-m-d H:i:s",$vo["edit_time"])); ?></td>
                        <td width="70" align="center" valign="middle"><?php echo (date("Y-m-d H:i:s",$vo["pub_time"])); ?></td>
                        <!--
                        <td width="70" align="center" valign="middle">
                        <?php if($vo["article_state"] == 0): ?><a href="<?php echo U('audite',array('audite' =>$vo[id] ));?>"><span style="color:red">未审核</span></a>
                            <input name="audite" id="audite" value="<?php echo ($vo["id"]); ?>" hidden="true">
                            <?php else: ?><a href="#"><span>已审核</span></a><?php endif; ?>
                        </td>
                        <td width="70" align="center" valign="middle">Admin</td>
                        <td width="100" align="center" valign="middle">2015-05-15 11:32:56</td>   
                        -->
                        <td align="center" valign="middle">暂无数据</td>
                        <td align="center" valign="middle">暂无数据</td>
                        <td width="50" align="center" valign="middle">
                        <a href="/Home/Material/publish/pid/<?php echo ($vo["id"]); ?>">编辑</a></td>
                        <td width="50" align="center" valign="middle"><a target='_blank' href="/Home/Material/pview/id/<?php echo ($vo["id"]); ?>">预览</a></td>
                        <td width="50" align="center" valign="middle"><a href="javascript:;" onClick="delcfm(<?php echo ($vo["id"]); ?>)">删除</a></td>
                    </tr><?php endforeach; endif; ?>

                <tr>
                    <td style="border:0;" colspan="18" align="center" valign="middle"><?php echo ($show); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </ul>
</div>
<script src="/Application/Home/View/Public/js/jquery1.42.min.js"></script>
<script src="/Application/Home/View/Public/js/jquery.tabso_yeso.js"></script>
<script language="javascript" type="text/javascript" src="/Application/Home/View/Public/My97DatePicker/WdatePicker.js"></script>
<script>
    $("#fadetab").tabso({
        cntSelect:"#fadecon",
        tabEvent:"click",
        tabStyle:"fade"
    });
    
    //全选
    function selectAll(checkbox) {
        $('input[type=checkbox]').attr('checked', $(checkbox).attr('checked'));
    }    

    //创建素材
    function batchGroup()
    {
        var pubCheckBox = $("[name=pubcheckbox]");
        var article_id="";
        var i = 0;
        for (var j = 0; j < pubCheckBox.length; j++){
            if (pubCheckBox[j].checked == true)
            {
                i++;
                article_id += pubCheckBox[j].value+",";
            }
        }
        if(i>8)
        {
            alert("最多只能勾选8篇文章");
            return false;
            
        }
        if(article_id==""){      	
       	    return false;       	
        	}else{
                    article_id=article_id.substr(0,article_id.length-1);                     
                    window.location.href="/Home/Material/create_material/aids/"+article_id;
            }
    }
    
    //分组查询
    function groupSearch()
    {
        
        var date = $("[name=pubGroupDate]").val().toString();
        var dateEnd = $("[name=pubGroupDateEnd]").val().toString();
        
        if(date == "" || date == null)
            date = 0;
        if(dateEnd == "" || dateEnd == null)
            dateEnd = 0;        
        var age = $("[name=pubGroupAge]").val();
        var pub_class = $("[name=pubClassId]").val();
        //输入的文章名称
        var article_name=encodeURI($("[name=articleName]").val());

       // $.get("/Home/Material/group_search/date/" + date +"/date_end/" + dateEnd + "/age/" + age + "/pub_class/" + pub_class+"/article_name/"+article_name, null, function(html)
        $.get("/Home/Material/group_search/date/" + date +"/date_end/" + dateEnd + "/age/" + age + "/pub_class/" + pub_class+"/article_name/"+article_name, null, function(html)
        {
            //alert(html);
            $("#u40").empty().html(html);
        });        
        
    }
    

    //删除
    function delcfm(article_id) {
        if (!confirm("你在干什么，你确定一定以及肯定要这么干吗？")) {
            window.event.returnValue = false;
        }else
        {
            //$.get("http://localhost:8080/wx/Home/Material/delete_material/article_id/" + article_id , null, function(data)
            $.get("/Home/Material/delete_article/article_id/" + article_id , null, function(data)
            {
                if (data == 1)
                {
                    alert("删除成功");
                }else
                {
                    alert(data);
                }

            });                        
        }
        
        
    }
   
    
</script>
</body>
</html>