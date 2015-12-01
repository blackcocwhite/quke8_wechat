<?php if (!defined('THINK_PATH')) exit(); $a = A('Jssdk'); $signPackage = $a->getSignPackage(); ?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>汉字英雄琅琊榜</title>
<link rel="stylesheet" type="text/css" href="/./Application/Home/View/Game/css/index.css">
<link rel="stylesheet" type="text/css" href="/./Application/Home/View/Game/css/media.css">
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"];?>',
        timestamp: <?php echo $signPackage["timestamp"];?>,
        nonceStr: '<?php echo $signPackage["nonceStr"];?>',
        signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
            // 所有要调用的 API 都要加到这个列表中
            'checkJsApi',
            'openLocation',
            'getLocation',
            'onMenuShareTimeline',
            'onMenuShareAppMessage'
          ]
    });
    wx.ready(function(){
        wx.onMenuShareAppMessage({
          title: '汉字英雄琅琊榜，诚邀各路英雄挑战冲榜！',
          desc: '汉字英雄琅琊榜，诚邀各路英雄挑战冲榜！',
          link: 'http://test.quke8.com/home/oauth/getcode',
          imgUrl: 'http://test.quke8.com/Application/Home/View/Game/images/fximg.jpg',
          trigger: function (res) {
            // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
            // alert('用户点击发送给朋友');
          },
          success: function (res) {
            // alert('已分享');
          },
          cancel: function (res) {
            // alert('已取消');
          },
          fail: function (res) {
            // alert(JSON.stringify(res));
          }
        });

        wx.onMenuShareTimeline({
          title: '汉字英雄琅琊榜，诚邀各路英雄挑战冲榜！',
          desc: '汉字英雄琅琊榜，诚邀各路英雄挑战冲榜！',
          imgUrl: 'http://test.quke8.com/Application/Home/View/Game/images/fximg.jpg',
          trigger: function (res) {
            // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
            // alert('用户点击分享到朋友圈');
          },
          success: function (res) {
            // alert('已分享');
          },
          cancel: function (res) {
            // alert('已取消');
          },
          fail: function (res) {
            // alert(JSON.stringify(res));
          }
        });

    // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。
    });
</script>
</head>

<body >
	<div class="contain">
		<div class="ad">
    	<img src="/./Application/Home/View/Game/images/datiye480_01.jpg">
    	</div>
    	<div class="fs">
   		    <div class="ad-left">
            	<div class="ad-left-m" id="show">10</div>
                <div class="ad-left-f point"><?php echo ($point_count); ?></div>
            </div>
            <div class="ad-right"><img src="/./Application/Home/View/Game/images/datiye480_03.jpg"></div>
            <div class="clear"></div>
    	</div>
    
    <div class="timu" id="questionid" ><?php echo ($result["id"]); ?></div>
    <!--题目内容-->
    <div class="content dati" id="dati">
    	<div class="content-t" id="headline">
            <?php if(strlen($result[headline]) > 0) echo '“'.$result[headline].'”';else echo '答题次数已用完，请明日再来！' ; ?>
<!--
            “<?php echo ($result["headline"]); ?>”
-->
        </div>
        <div class="content-m" id="subtitle"><?php echo ($result["subtitle"]); ?></div>
        <!--
        <div  class="content-an" id="answerA" ><?php echo ($result["answera"]); ?></div>    
        <div  class="content-an" id="answerB" ><?php echo ($result["answerb"]); ?></div>      
        -->
        <?php if(strlen($result[headline]) > 0) { ?>
            <div <?php if(strlen($result[answera])<17) echo 'class="content-an"' ;else echo 'class="content-an-2"'; ?> id="answerA" ><?php echo ($result["answera"]); ?></div>
            <div <?php if(strlen($result[answerb])<17) echo 'class="content-an"' ;else echo 'class="content-an-2"'; ?> id="answerB" ><?php echo ($result["answerb"]); ?></div>
        <?php } else { ?>
        <div class="content-sb"><a href="<?php echo U('rankList');?>"><img src="/./Application/Home/View/Game/images/index3_10.jpg"></a></div>
        <?php } ?>
        <div class="mb-100"></div>
        <input type="hidden" id="rid"  value="<?php echo ($result["answer"]); ?>">
    </div>
    <!--答题解析 正确-->
    <div class="content analys-right"  style="display:none">
        <div class="content-t">恭喜你答对了</div>
        <div class="content-j analy-right"><p><?php echo ($result["analy"]); ?></p></div>
        <div class="content-x">— — 根据绝世秘籍<a href="http://u431639.zhichiwangluo.com/index.php?r=Invitation/showNewInvitation&id=128967">《汉字之妙》</a>详解</div>
        <div class="content-x" id="next"><img src="/./Application/Home/View/Game/images/xiayiti.png" width="190" height="57"></div>
        <!--<div class="content-x"><img src="images/dtjs.png" width="190" height="57"></div>-->
        <div class="mb-100"></div>
    </div>
    <!--答题解析 错误-->
    <div class="content analys-error"  style="display:none">
        <div class="content-t">大侠请再接再励</div>
        <div class="content-j analy-error"><p><?php echo ($result["analy"]); ?></p></div>
        <!--<div class="content-x">— — 根据绝世秘籍《成语密码》详解</div>-->
        <!--<div class="content-x"><img src="images/xiayiti.png" width="190" height="57"></div>-->
        <div class="content-x" id="close"><img src="/./Application/Home/View/Game/images/dtjs.png" width="190" height="57"></div>
        <div class="mb-100"></div>
    </div>
	</div>
    <input type="hidden" id="analy" value="<?php echo ($result["analy"]); ?>">
    <input type="hidden" id="uid" value="<?php echo ($userid); ?>">
    <input type="hidden" id="maxqid" value="<?php echo ($max_question_id); ?>">

<script src="/./Application/Home/View/Game/js/jquery-1.11.2.min.js"></script>
<script>
    var t=9;
    var timer = setInterval("refer()",1000);
    function refer(){  
        document.getElementById('show').innerHTML=""+t; // 显示倒计时         
        if(t==0){ 
            //location="/Home/Game/endGame"; //#设定跳转的链接地址 
            window.clearInterval(window.timer);
            var userId = $('#uid').val();
            var questionId = $('#questionid').html();
            var selectId = 0;
            $.ajax({
                cache: true,
                type: 'POST',
                url: '/Home/Game/ajaxDati',//1正确，0错误
                data: {userid: userId, questionid: questionId, selectid: selectId},
                async: false,
                success: function (data) {
                    window.location.href = '/Home/Game/endGame';

                }
            });            
        } 
        t--; // 计数器递减 
    }
    
    
    function classtype(t,answerdiv){
        //var answerAdiv = document.getElementById('answerA');
        if(t.length < 17)
            answerdiv.className = 'content-an'; 
        else
            answerdiv.className = 'content-an-2'; 
    }

    $(function() {
        
        $("#answerA").on("click", function () {
            var maxqid = $('#maxqid').val();
            var answerA = $(this).html();
            var rightId = $('#rid').val();
            var userId = $('#uid').val();
            var questionId = $('#questionid').html();
            if(maxqid==questionId){
                $('.dati').hide();
                window.clearInterval(window.timer);
                if(answerA==rightId){
                    var selectId = 1;
                    $('.analys-right').show();
                    $('#next').click(function(){
                        $.ajax({
                            cache: true,
                            type: 'POST',
                            url: '/Home/Game/ajaxDati',//1正确，0错误
                            data: {userid: userId, questionid: questionId, selectid: selectId},
                            async: false,
                            success: function (data) {
                                window.location.href = '/Home/Game/endGame';

                            }
                        });
                    });
                }else{
                    $('.analys-error').show();
                    var selectId = 0;
                    $('#close').click(function(){
                        $.ajax({
                            cache: true,
                            type: 'POST',
                            url: '/Home/Game/ajaxDati',//1正确，0错误
                            data: {userid: userId, questionid: questionId, selectid: selectId},
                            async: false,
                            success: function (data) {
                                window.location.href = '/Home/Game/endGame';

                            }
                        });
                    });
                }

            } else if (answerA == rightId) {
                var selectId = 1;
                $.ajax({
                    cache: true,
                    type: 'POST',
                    url: '/Home/Game/ajaxDati',//1正确，0错误
                    data: {userid: userId, questionid: questionId, selectid: selectId},
                    async: false,
                    success: function (data) {

                        var obj = eval(data);
                        $.each(obj, function (key, val) { 
                            window.clearInterval(window.timer);
                            var id = val["id"];
                            var headline = val["headline"];
                            var subtitle = val["subtitle"];
                            var answera = val["answera"];
                            var answerb = val["answerb"];
                            var answer = val["answer"];
                            var analy = val["analy"];
                            var point = val['point_count'];
                            window.classtype(answera,document.getElementById('answerA'));
                            window.classtype(answerb,document.getElementById('answerB'));
                            $('#questionid').html(id);
                            $('#headline').html(headline);
                            $('#subtitle').html(subtitle);
                            $('#answerA').html(answera);
                            $('#answerB').html(answerb);
                            $('#rid').val(answer);
                            $('.point').html(point);
                            $('.dati').hide();
                            $('.analys-right').show();
                            $('#next').click(function(){
                                window.clearInterval(window.timer);
                                window.t=9;
                                window.timer = setInterval("window.refer()",1000);                                  
                                $('#questionid').html(id);
                                $('.analy-right').html(analy);
                                $('.analy-error').html(analy);
                                $('.dati').show();
                                $('.analys-right').hide();
                            });                                

                        });
                                              
                    },
                    error: function (request) {
                        alert('暂时没有获取到题目数据');

                    }
                });


            } else {
                $('.dati').hide();
                $('.analys-error').show();
                var selectId = 0;
                window.clearInterval(window.timer);
                $('#close').click(function(){
                    $.ajax({
                        cache: true,
                        type: 'POST',
                        url: '/Home/Game/ajaxDati',//1正确，0错误
                        data: {userid: userId, questionid: questionId, selectid: selectId},
                        async: false,
                        success: function (data) {
                            window.location.href = '/Home/Game/endGame';

                        }
                    });
                });
            }

        });
        $('#answerB').on("click",function(){
            var maxqid = $('#maxqid').val();
            var answerB= $(this).html();
            var rightId= $('#rid').val();
            var userId= $('#uid').val();
            var questionId= $('#questionid').html();


            if(maxqid==questionId){

                $('.dati').hide();
                window.clearInterval(window.timer);

                if(answerB==rightId){
                    $('.analys-right').show();
                    var selectId = 1;
                    $('#next').click(function(){
                        $.ajax({
                            cache: true,
                            type: 'POST',
                            url: '/Home/Game/ajaxDati',//1正确，0错误
                            data: {userid: userId, questionid: questionId, selectid: selectId},
                            async: false,
                            success: function (data) {
                                window.location.href = '/Home/Game/endGame';

                            }
                        });
                    });
                }else{
                    $('.analys-error').show();
                    var selectId = 0;
                    $('#close').click(function(){
                        $.ajax({
                            cache: true,
                            type: 'POST',
                            url: '/Home/Game/ajaxDati',//1正确，0错误
                            data: {userid: userId, questionid: questionId, selectid: selectId},
                            async: false,
                            success: function (data) {
                                window.location.href = '/Home/Game/endGame';

                            }
                        });
                    });
                }

            } else if(answerB==rightId){
                var selectId=1;
                $.ajax({
                    cache: true,
                    type: 'POST',
                    url: '/Home/Game/ajaxDati',//1正确，0错误
                    data:{userid:userId,questionid:questionId,selectid:selectId},
                    async: false,
                    success: function (data) {
                        window.clearInterval(window.timer);
                        var obj = eval(data);
                        $.each(obj, function(key,val) {
                        var id = val["id"];
                        var headline = val["headline"];
                        var subtitle = val["subtitle"];
                        var answera = val["answera"];
                        var answerb = val["answerb"];
                        var answer = val["answer"];
                        var analy = val["analy"];
                        var point = val['point_count'];
                        window.classtype(answera,document.getElementById('answerA'));
                        window.classtype(answerb,document.getElementById('answerB'));
                        $('#headline').html(headline);
                        $('#subtitle').html(subtitle);
                        $('#answerA').html(answera);
                        $('#answerB').html(answerb);
                        $('#rid').val(answer);
                        $('.point').html(point);
                        $('.dati').hide();
                        $('.analys-right').show();
                        $('#next').click(function(){
                            window.clearInterval(window.timer);
                            window.t=9;
                            window.timer = setInterval("window.refer()",1000);   
                            $('#questionid').html(id);
                            $('.analy-right').html(analy);
                            $('.analy-error').html(analy);
                            $('.dati').show();
                            $('.analys-right').hide();

                        });



                        });
                    },
                    error: function(request) {
                        alert('暂时没有获取到题目数据');

                    }
                });


            }else{
                $('.dati').hide();
                $('.analys-error').show();
                var selectId = 0;
                window.clearInterval(window.timer);
                $('#close').click(function(){
                    $.ajax({
                        cache: true,
                        type: 'POST',
                        url: '/Home/Game/ajaxDati',//1正确，0错误
                        data: {userid: userId, questionid: questionId, selectid: selectId},
                        async: false,
                        success: function (data) {
                            window.location.href = '/Home/Game/endGame';

                        }
                    });
                });
            }
        });
    });



</script>
</body>
</html>