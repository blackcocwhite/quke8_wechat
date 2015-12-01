<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div id="cont">

</div>
<script src="/Application/Home/View/Public/js/jquery-1.10.2.min.js"></script>
<script>
    setInterval(show,1000);
    function show(){
        $.ajax({
            type: "POST",
            url: "/Home/Material/Home/Material/save_m",
            dataType:'json',
            timeout:30000,
            cache: false,
            success:function(data){
                $('#cont').append("<p><span>"+data.name+"</span>...<span>"+data.status+"</span></p>");
            },
            error: function(err){
                $('#cont').append("<p>错误！没有获取到数据!</p>")
            }
    });
    }
</script>
</body>
</html>