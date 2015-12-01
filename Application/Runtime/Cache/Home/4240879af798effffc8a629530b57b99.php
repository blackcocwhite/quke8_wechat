<?php if (!defined('THINK_PATH')) exit(); $a = A('Jssdk'); $signPackage = $a->getSignPackage(); $news = array("Title" =>"微信公众平台开发实践", "Description"=>"本书共分10章，案例程序采用广泛流行的PHP、MySQL、XML、CSS、JavaScript、HTML5等程序语言及数据库实现。", "PicUrl" =>'http://images.cnitblog.com/i/340216/201404/301756448922305.jpg', "Url" =>'http://www.cnblogs.com/txw1958/p/weixin-development-best-practice.html'); ?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>汉字英雄热身赛</title>
<link rel="stylesheet" type="text/css" href="/./Application/Home/View/Game/css/index.css">
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    wx.config({
        debug: true,
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
    wx.checkJsApi({
            jsApiList: [
                'getLocation',
                'onMenuShareTimeline',
                'onMenuShareAppMessage'
            ],
            success: function (res) {
                alert(JSON.stringify(res));
            }
        });
    wx.onMenuShareAppMessage({
          title: '123',
          desc: '321',
          link: '<?php echo $news['Url'];?>',
          imgUrl: '<?php echo $news['PicUrl'];?>',
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
          title: '321',
          link: '',
          imgUrl: '321',
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
</script>
</head>

<body>

	<div class="contain">
		<div class="wd360-1"><img src="/./Application/Home/View/Game/images/index2_01.jpg"></div>
        <div class="wd360-2"><img src="/./Application/Home/View/Game/images/index2_02.jpg"></div>
        <div class="wd360-3"><img src="/./Application/Home/View/Game/images/index2_03.jpg"></div>
      	<div class="huodong">
        	<div class="huodong-left"><img src="/./Application/Home/View/Game/images/index2_04.jpg"></div>
            <div class="huodong-right"><a href="#"><img src="/./Application/Home/View/Game/images/index2_05.jpg"></a></div>
		<div class="clear"></div>
        </div>
        <div class="wd360-4"><img src="/./Application/Home/View/Game/images/index2_06.jpg"></div>
      	<div class="shangbang">
        	<div class="shangbang-1"><img src="/./Application/Home/View/Game/images/index2_07.jpg"></div>
            <div class="shangbang-2"><a href="<?php echo U('dati');?>"><img src="/./Application/Home/View/Game/images/index2_08.jpg"></a></div>
            <div class="shangbang-3"><img src="/./Application/Home/View/Game/images/index2_09.jpg"></div>
            <div class="shangbang-4"><a href="<?php echo U('paihangbang');?>"><img src="/./Application/Home/View/Game/images/index2_10.jpg"></a></div>
            <div class="shangbang-5"><img src="/./Application/Home/View/Game/images/index2_11.jpg"></div>
        </div>
        <div class="wd360-5"><img src="/./Application/Home/View/Game/images/index2_12.jpg"></div>
        <div class="wd360-6"><img src="/./Application/Home/View/Game/images/index2_13.jpg"></div>
    </div>

</body>
</html>