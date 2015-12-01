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
    	<div class="huodongguize-top">
    		<div class="huodongguize-top-1"><img src="/./Application/Home/View/Game/images/hdsm.png" width="480" height="55"></div>
            <div class="huodongguize-top-2">
            <p>年末将至，作为回馈江湖的大礼，由国内最大的发行企业——皖新传媒和中国第一家现代出版社——商务印书馆联手推出的中小学生“阅读成长计划”诚意出品首届汉字英雄琅琊榜，欢迎各路深谙“汉字之妙”的英雄豪杰前来挑战冲榜！</p>
            <p>若要快速跻身榜单前列，习得这3本秘笈：《汉字博物馆》、《汉字英雄（第1季）》、《成语密码（第1季）》，定能助你一臂之力！</p>
            <p>琅琊榜首，江左梅郎；汉字英雄，答题上榜！</p>
            <p>赛程安排：热身赛→英雄挑战赛→决战琅琊阁</p>
            <p>（此次游戏为热身赛，后续比赛请关注微信公众号“八点阳光”获取确切消息。）</p>
            <p class="huodongshijian">活动时间：2015年11月20日-2015年11月30日</p>
            </div>
            <div class="huodongguize-top-3"><img src="/./Application/Home/View/Game/images/huodongshuoming_03.jpg" width="480" height="55"></div>
          <div class="huodongguize-bottom">
            <p>1、用户每日有5次答题机会，答对1题获得10积分，答错游戏结束。</p>
            <p>2、每日积分可累计，用户在排行榜中可查看最新积分排行。</p>
            <p class="jieshiquan">--本活动最终解释权归皖新金智教育科技有限公司所有--</p>
            <div class="liaojie"><a href='<?php echo U("game/index");?>'><img src="/./Application/Home/View/Game/images/anniu.png" ></a></div>
          </div>
    	</div>
</div>

</body>
</html>