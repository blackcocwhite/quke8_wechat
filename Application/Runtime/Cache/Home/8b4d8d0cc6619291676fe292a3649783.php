<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="/backup/wxtest/./Application/Home/View/Public/js/jquery.min.js"></script>
    <!--百度编辑器  -->
    <script type="text/javascript" charset="utf-8" src="/backup/wxtest/./Application/Home/View/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/backup/wxtest/./Application/Home/View/Public/ueditor/ueditor.all.min.js"></script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/backup/wxtest/./Application/Home/View/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
</head>
<body>
<form action="" method="post">
    <input type="text" id='url' name="curl">
    <input id='submit' type="submit" value="抓取">
    <textarea type="text/plain" style="height:500px;width:850px;" id="container"
     name="cont"><?php echo ($ma["content"]); ?></textarea>
</form>
<script>
    $(document).ready(function() {
        $.ajax({
            url: 'http://mp.weixin.qq.com/s?__biz=MjM5NDA2MTU5Ng==&mid=400494937&idx=2&sn=c98edad4a5afdbaddf17cc28d22e4d61&3rd=MzA3MDU4NTYzMw==&scene=6#rd',
            type: 'GET',
            dataType: 'json',
            contentType: "application/json",
            beforeSend: function(xhr) {
                xhr.setRequestHeader("Authentication", "Basic ZnJvbWFwcGx********uOnRoM24zcmQ1UmgzcjM=") //Some characters have been replaced for security but this is a true BASE64 of "username:password"
            },
            success: function(data){
                alert(data);
            }
        });
    });

</script>
</body>
</html>