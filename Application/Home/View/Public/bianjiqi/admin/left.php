<?php

@session_start();  
//检测是否登录，若没登录则转向登录界面  
if(!isset($_SESSION['ewema=997720527'])){  
    header("Location:login.html");  
    exit();  
} 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>微信编辑器管理后台</title>


    <!--[if lt IE 8]>
    <script>
        alert('已不支持IE6-8，请使用谷歌、火狐等浏览器\n或360、QQ等国产浏览器的极速模式浏览本页面！');
    </script>
    <![endif]-->

    <link href="/style2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/style2/css/font-awesome.min.css" rel="stylesheet">
    <link href="/style2/css/animate.min.css" rel="stylesheet">
    <link href="/style2/css/style.min.css" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="/style2/images/profile_small.jpg" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold">admin</strong></span>
                                <span class="text-muted text-xs block">超级管理员</span>
                                </span>
                            </a>
                 
                        </div>
                        <div class="logo-element">V5
                        </div>
                    </li>
					
					
					<li>
                        <a class="J_menuItem" href="main.php"><i class="fa fa-flask"></i> <span class="nav-label">在线升级</span></a>
                    </li>
					
					
                    <li>
                        <a href="#">
                            <i class="fa fa-magic"></i>
                            <span class="nav-label">样式管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="list.php?type=1" data-index="0">顶关注</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="list.php?type=2"  data-index="0">标题</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="list.php?type=3"  data-index="0">卡片</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="list.php?type=4">互推账号</a>
                            </li>
							
							  <li>
                                <a class="J_menuItem" href="list.php?type=5">分割线</a>
                            </li>
							  <li>
                                <a class="J_menuItem" href="list.php?type=6">底提示</a>
                            </li>
							  <li>
                                <a class="J_menuItem" href="list.php?type=7">背景</a>
                            </li>
							  <li>
                                <a class="J_menuItem" href="list.php?type=8">图文图片</a>
                            </li>
							  <li>
                                <a class="J_menuItem" href="list.php?type=9">应用场景</a>
                            </li>
							  <li>
                                <a class="J_menuItem" href="list.php?type=10">音视频</a>
                            </li>
							  <li>
                                <a class="J_menuItem" href="list.php?type=11">模板</a>
                            </li>
							  <li>
                                <a class="J_menuItem" href="list.php?type=12">点赞分享</a>
                            </li>
							  <li>
                                <a class="J_menuItem" href="list.php?type=13">素材图</a>
                            </li>
							  <li>
                                <a class="J_menuItem" href="list.php?type=14">小符号</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="list.php?type=15">节日</a>
                            </li>
							
                        </ul>

                    </li>
					
					             <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label">草稿管理</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="alist.php">我的草稿</a>
                            </li>
                       
                    
                        </ul>
                    </li> 

					
					
                    <li>
                        <a class="J_menuItem" href="makeindex.php"><i class="fa fa-columns"></i> <span class="nav-label">生成首页</span></a>
                    </li>
					
					    <li>
                        <a class="J_menuItem" href="modipassword.php"><i class="fa fa-edit"></i> <span class="nav-label">修改密码</span></a>
                    </li>
					
       
           
                    <li>
                        <a  href="logincheck.php?do=logout" ><i class="fa fa-desktop"></i> <span class="nav-label">退出系统</span></a>
                    </li>
					
					
				
            

                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                  
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
              
                  
                        <li class="hidden-xs">
                            <a href="http://item.taobao.com/item.htm?scm=12306.300.0.0&id=521827953337" target='_blank' ><i class="fa fa-cart-arrow-down"></i> 购买</a>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-tasks"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                </button>
                <div class="btn-group roll-nav roll-right">
                    <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div>
                <a href="login.html" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="main.php" frameborder="0" data-id="main.php" seamless></iframe>
            </div>
            <div class="footer">
                <div class="pull-right">&copy; 2015 版权所有： <a href="http://www.weixin2010.com/" target="_blank"> 微信2010编辑器V5</a>
               淘宝店铺地址： <a href="http://item.taobao.com/item.htm?scm=12306.300.0.0&id=521827953337" target="_blank">掌柜旺旺yingjiegod</a>
				
				</div>
            </div>
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active"><a data-toggle="tab" href="#tab-1">
                        通知
                    </a>
                    </li>
                    <li><a data-toggle="tab" href="#tab-2">
                        项目进度
                    </a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab-3">
                            <i class="fa fa-gear"></i>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">


                    <div id="tab-1" class="tab-pane active">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 最新通知</h3>
                            <small><i class="fa fa-tim"></i> 您当前有1条信息</small>
                        </div>

                        <div>

                            <div class="sidebar-message">
                                <a href="#">
                                    <div class="pull-left text-center">
                                        <img alt="image" class="img-circle message-avatar" src="/style2/images/a1.jpg">

                                        <div class="m-t-xs">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">

                                        新V5后台界面功能升级优化。
                                        <br>
                                        <small class="text-muted">2015/10/01 14:21</small>
                                    </div>
                                </a>
                            </div>
                        
              
             
            
                        </div>

                    </div>

                    <div id="tab-2" class="tab-pane">

                        <div class="sidebar-title">
                            <h3> <i class="fa fa-cube"></i> 最新任务</h3>
                            <small><i class="fa fa-tim"></i> 您当前有2个任务</small>
                        </div>

                        <ul class="sidebar-list">
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">更新中</div>
                                    <h4>样式库更新</h4> 搜集制作热门素材；

                                    <div class="small">已完成： 82%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 82%;" class="progress-bar progress-bar-warning"></div>
                                    </div>
                                    <div class="small text-muted m-t-xs">项目截止： 2020.10.01</div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="small pull-right m-t-xs">开发中</div>
                                    <h4>草稿保存功能 </h4> 对多篇文章进行草稿保存，单用户版本

                                    <div class="small">已完成： 68%</div>
                                    <div class="progress progress-mini">
                                        <div style="width: 68%;" class="progress-bar"></div>
                                    </div>
                                </a>
                            </li>
           
      

                        </ul>

                    </div>

                    <div id="tab-3" class="tab-pane">

                        <div class="sidebar-title">
                            <h3><i class="fa fa-gears"></i> 设置</h3>
                        </div>

                        <div class="setings-item">
                            <span>
                        显示通知
                    </span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                    <label class="onoffswitch-label" for="example">
                                        <span class="onoffswitch-inner"></span>
                                        <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
            
             
                  
           
        
         

                        <div class="sidebar-content">
                            <h4>设置</h4>
                            <div class="small">
                                你可以从这里设置一些常用选项。
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>
        <!--右侧边栏结束-->
  
        <!--mini聊天窗口结束-->
    </div>
    
    <!-- 全局js -->
    <script src="/style2/js/jquery-2.1.1.min.js"></script>
    <script src="/style2/js/bootstrap.min.js"></script>
    <script src="/style2/js/jquery.metisMenu.js"></script>
    <script src="/style2/js/jquery.slimscroll.min.js"></script>
    <script src="/style2/js/layer.min.js"></script>

    <!-- 自定义js -->
    <script src="/style2/js/hplus.min.js"></script>
    <script type="text/javascript" src="/style2/js/contabs.min.js"></script>

    <!-- 第三方插件 -->
    <script src="/style2/js/pace.min.js"></script>

</body>

</html>