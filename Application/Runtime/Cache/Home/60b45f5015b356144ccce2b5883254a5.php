<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="css/main.css" type="text/css" rel="stylesheet">
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
    /* tabcon */
    .tabcon{border:1px #ddd solid;position:relative;/*必要元素*/height:auto;overflow:hidden; width: 100%; height:auto;}
    .tabcon .subbox{position:absolute;/*必要元素*/left:0;top:0;}
    .tabcon .sublist{padding:5px 10px;height:auto;}
    /*表格颜色*/
    .tdcolor{background: #f4f4f4;}
    .page{margin-top:20px; position: absolute; left: 380px;}
    .page ul li{float: left; display: block; width: 40px;}
    td button{ width: 100px; height: 30px;   background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';}

</style>
<body>
<div class="tabcon" id="fadecon">
    <div class="sublist">
        <ul>
            <div id="u40" class="text-title">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
                    <tbody>
                    <tr class="tdcolor">
                        <td width="200" height="30" align="center" valign="middle"><strong>操作时间</strong></td>
                        <td width="200" height="30" align="center" valign="middle"><strong>操作人</strong></td>
                        <td width="200" height="30" align="center" valign="middle"><strong>操作动作</strong></td>
                        <td height="30" align="center" valign="middle"><strong>备注</strong></td>
                    </tr>
                    <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
                            <td height="30" align="center" valign="middle"><?php echo (date("Y-m-d H:i:s",$vo["opera_time"])); ?></td>
                            <td align="center" valign="middle"><?php echo ($vo["user_name"]); ?></td>
                            <td align="center" valign="middle"><?php echo ($vo["method"]); ?></td>
                            <td align="center" valign="middle"><?php echo ($vo["bak"]); ?></td>
                        </tr><?php endforeach; endif; ?>
                    <tr>
                        <td style="border:0;" colspan="18" align="center" valign="middle"><?php echo ($show); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </ul>
    </div>
</div>
</body>
</html>