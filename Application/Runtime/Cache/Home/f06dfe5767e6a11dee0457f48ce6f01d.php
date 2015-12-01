<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>汉字英雄热身赛</title>
<link rel="stylesheet" type="text/css" href="/./Application/Home/View/Game/css/index.css">
</head>

<body>

	<div class="contain">
		<div class="paihangbang_01"><img src="/./Application/Home/View/Game/images/paihangbang_01.jpg"></div>
        <div class="jinripaiming">

                    <div class="jinripaiming-left"><?php echo ($place); ?></div>
                    <div class="jinripaiming-right"><?php echo ($point); ?></div>                    


        </div>
        <div class="paihangbang">
            <div class="paihangbang-top">
            <div class="paihangbang-top-1">英雄大名</div>
            <div class="paihangbang-top-2">排名</div>
            <div class="paihangbang-top-3">分数</div>
        </div>
        </div>
        <div class="paihangbang-content">
            <ul>
                <?php if(is_array($result)): foreach($result as $key=>$vo): ?><li>
                        <span class="paihangbang-content-img"><img src="<?php echo ($vo["headimgurl"]); ?>" width="200" height="200"></span>
                        <span class="paihangbang-content-xm"><?php echo ($vo["nickname"]); ?></span>
                        <span class="paihangbang-content-pm"><?php echo ($vo["place"]); ?></span>
                        <span class="paihangbang-content-fs"><?php echo ($vo["point"]); ?></span>
                   </li><?php endforeach; endif; ?>

            </ul>
        </div>
</div>

</body>
</html>