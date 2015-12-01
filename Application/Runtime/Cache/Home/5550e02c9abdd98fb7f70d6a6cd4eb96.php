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
    <style>
        .share{position: absolute; opacity:0.9; }

    </style>
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
          title: '我在汉字英雄琅琊榜中的身份是<?php echo ($role); ?>，击败了<?php echo ($propor); ?>%的英雄，不服来战！',
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
          title: '我在汉字英雄琅琊榜中的身份是<?php echo ($role); ?>，击败了<?php echo ($propor); ?>%的英雄，不服来战！',
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
<!-- 分享好友 -->
<div class="contain share" style="display:none;">
	<div class="fx"  >
    	<div class="fx-01"><img src="/./Application/Home/View/Game/images/jzxx.png" width="220" height="161"></div>
      <div class="fx-02">
        <div class="fx-text">点击右上角发送给指定好友或分享到朋友圈嘚瑟一下！</div>
        <div class="fx-03"><img src="/./Application/Home/View/Game/images/anniu.png" width="171" height="43" class="back"></div>
        </div>
    </div>
</div>

<!-- 分享好友 END-->

	<div class="contain main">
   	  <div class="datijieshu-1">
        <div class="datijieshu-1-2"><?php echo ($propor); ?>&#37;</div>
      </div>
        <div class="datijieshu-2">
       	  <div class="datijieshu-2-1"><?php echo ($count_num); ?></div>
          <div class="datijieshu-2-2"><?php echo ($point); ?></div>
            <div class="clear"></div>
        </div>
      <div class="datijieshu-3">
            <div class="tuxiang"><img src="/./Application/Home/View/Game/roleimage/<?php echo ($image); ?>"></div>
            <div class="datijieshu-3-test"><?php echo ($comment); echo ($role); ?>，<?php echo ($roleanaly); ?></div>
            <div class="clear"></div>
      </div>
        <div class="wd360-fb-1"><img src="/./Application/Home/View/Game/images/dtjs_05.jpg" ></div>
            <div class="wd360-fb">
            <div class="wgmj"><a href="http://u431639.zhichiwangluo.com/index.php?r=Invitation/showNewInvitation&id=128967"><img src="/./Application/Home/View/Game/images/wgmj.png" ></a></div>
        <div class="wd360-fb">
            <div class="clear"></div>
        <div class="zlyc">
      	    <div class="zlyc-1"><img src="/./Application/Home/View/Game/images/zlyc.png" id="zlyc" ></div>
            <div class="zlyc-2"><img src="/./Application/Home/View/Game/images/tjhy.png" id="tjhy"></div>
            <div class="clear"></div>
      	    <div class="choujiang4">今日还可以玩 <font color="#FF0000"><?php echo ($gameshare); ?></font> 次哦</div>
      	    <div class="clear"></div></div></div></div>
    </div>
    <script src="/./Application/Home/View/Game/js/jquery-1.11.2.min.js"></script>
    <script>
        $('#zlyc').click(function(){
            window.location.href = '/Home/Game/index';
        });
        $('#tjhy').click(function(){
            $('.share').show();
//            $('.main').hide();
        });
        $('.back').click(function(){
           $('.share').hide();
//            $('.main').show();
        });
       
    </script>
    
</body>
</html>