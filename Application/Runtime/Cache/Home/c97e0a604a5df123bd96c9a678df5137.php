<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>权限管理</title>
    <link href="/Application/Home/View/Public/css/main.css" type="text/css" rel="stylesheet">
    <meta http-equiv="x-ua-compatible" content="ie=7">
    <script src="/Application/Home/View/Public/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('input[level=1]').click(function () {
                var inputs = $(this).parents('#addn').find('input');
                $(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
            });
            $('input[level=2]').click(function () {
                var inputs = $(this).parents('.action').find('input');
                $(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
            });
        })
    </script>
</head>
<body class="warp">
<div id="artlist" class="addn">
    <form action="<?php echo U('setAccess');?>" method="post">
        <?php if(is_array($node)): foreach($node as $key=>$app): ?><table width="100%" border="0" cellspacing="0" cellpadding="0" id="addn">
                <tbody>
                <tr>
                    <th colspan="3" style="font-size:18px; color:#F60; font-weight:bold;">
                        <?php echo ($app["title"]); ?>
                        <input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>-<?php echo ($app["level"]); ?>" level="1"
                        <?php if($app['access']): ?>checked='checked'<?php endif; ?>
                        />
                        <label for="checkbox"></label></th>
                </tr>

                <tr>
                    <td height="48" align="center">
                        <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><table class='action' width="90%" border="0" cellspacing="0" cellpadding="0"
                                   style="margin:10px; border-top:1px #d2d2d2 solid; border-left:1px #d2d2d2 solid; border-right:1px #d2d2d2 solid;">
                                <tr>
                                    <td height="30" bgcolor="#ddd"
                                        style="padding-left:10px; color:#063; font-weight:bold;">
                                        <?php echo ($action["title"]); ?>
                                        <input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>-<?php echo ($action["level"]); ?>"
                                               level="2"
                                        <?php if($action['access']): ?>checked='checked'<?php endif; ?>
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td height="50" style="padding-left:10px;">
                                        <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): echo ($method["title"]); ?><input class="action" type="checkbox" name="access[]"
                                                                  value="<?php echo ($method["id"]); ?>-<?php echo ($method["level"]); ?>" level="3"
                                            <?php if($method['access']): ?>checked='checked'<?php endif; ?>
                                            />&nbsp;&nbsp;<?php endforeach; endif; ?>

                                    </td>
                                </tr>
                            </table><?php endforeach; endif; ?>
                    </td>
                </tr>

                </tbody>

            </table><?php endforeach; endif; ?>
        <input type="hidden" value="<?php echo ($rid); ?>" name="rid">
        <input type="submit" value="保存权限">
        <input type='button' value='返回' onClick="javascript :history.back(-1)">
    </form>
</body>
</html>