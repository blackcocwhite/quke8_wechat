<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>权限管理</title>
    <link href="/Application/Home/View/Public/css/main.css" type="text/css" rel="stylesheet">
    <meta http-equiv="x-ua-compatible" content="ie=7">
</head>
<body class="warp">
<div id="artlist" class="addn">
    <?php if(is_array($node)): foreach($node as $key=>$app): ?><table width="100%" border="0" cellspacing="0" cellpadding="0" id="addn">
        <tbody>
        <tr>
            <th colspan="3" style="font-size:18px; color:#F60; font-weight:bold;"><?php echo ($app["title"]); ?>[<a href="<?php echo U('addNode',array('pid'=>$app['id'],'level'=>2));?>">添加控制器</a>][<a href="#">修改</a>][<a href="#">删除</a>]
        </tr>
        <tr>
            <td height="48" align="center">
                <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin:10px; border-top:1px #d2d2d2 solid; border-left:1px #d2d2d2 solid; border-right:1px #d2d2d2 solid;">
                    <tr>
                        <td height="30" bgcolor="#ddd" style="padding-left:10px; color:#063; font-weight:bold;"><?php echo ($action["title"]); ?>[<a href="<?php echo U('addNode',array('pid'=>$action['id'],'level'=>3));?>">添加方法</a>][<a href="#">修改</a>][<a href="#">删除</a>]</td>
                    </tr>
                    <tr>
                        <td height="50" style="padding-left:10px;">
                            <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): echo ($method["title"]); ?>[<a href="#">修改</a>][<a href="#">删除</a>]&nbsp;&nbsp;<?php endforeach; endif; ?>
                        </td>
                    </tr>
                </table><?php endforeach; endif; ?>
            </td>
            <input type="hidden" name="dosubmit">
        </tr>
        </tbody>
    </table><?php endforeach; endif; ?>
    <input type='button' value='返回' onClick="javascript :history.back(-1)">

</body>
</html>