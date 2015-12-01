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

<body>

	<div class="contain">
		<div class="wd360-1"><img src="/./Application/Home/View/Game/images/index2_01.jpg"></div>
        <div class="wd360-2"><img src="/./Application/Home/View/Game/images/index2_02.jpg"></div>
        <div class="wd360-3"><img src="/./Application/Home/View/Game/images/index2_03.jpg"></div>
      	<div class="huodong">
        	<div class="huodong-left"><img src="/./Application/Home/View/Game/images/index2_04.jpg"></div>
            <div class="huodong-right"><a href="<?php echo U('huodongguize');?>"><img src="/./Application/Home/View/Game/images/index2_05.jpg"></a></div>
		<div class="clear"></div>
        </div>
        <div class="wd360-4"><img src="/./Application/Home/View/Game/images/index2_06.jpg"></div>
      	<div class="shangbang">
            <div class="shangbang-1"><img src="/./Application/Home/View/Game/images/index2_07.jpg"></div>
            <div class="shangbang-2"><a href="<?php echo U('dati');?>"><img src="/./Application/Home/View/Game/images/index2_08.jpg"></a></div>
            <!--
            <?php switch($type): case "2": ?><div class="shangbang-2"><a href="<?php echo U('dati');?>"><img src="/./Application/Home/View/Game/images/index2_08.jpg"></a></div><?php break;?>
                <?php default: ?>
                    <div class="shangbang-2"><a href="<?php echo U('dati');?>"><img src="/./Application/Home/View/Game/images/index2_08.jpg"></a></div><?php endswitch;?>
            -->
            <div class="shangbang-3"><img src="/./Application/Home/View/Game/images/index2_09.jpg"></div>
            <div class="shangbang-4"><a href="<?php echo U('rankList');?>"><img src="/./Application/Home/View/Game/images/index2_10.jpg"></a></div>
            <div class="shangbang-5"><img src="/./Application/Home/View/Game/images/index2_11.jpg"></div>
        </div>
        <div class="wd360-5"><img src="/./Application/Home/View/Game/images/index2_12.jpg"></div>
        <div class="wd360-6"><img src="/./Application/Home/View/Game/images/index2_13.jpg"></div>
    </div>

</body>
</html>