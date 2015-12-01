<?php
return array(
	//'配置项'=>'配置值'
    /*路由配置*/
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        'auth' => 'Home/Index/auth',
    ),

    //URL模式配置
    'URL_MODEL' => 2,

    /*数据库配置项*/
    'DB_HOST' => 'localhost',
    'DB_TYPE' => 'mysql',
    'DB_NAME' => 'wxtest',
    'DB_USER' => 'root',
    'DB_PWD'  => 'xxx333',
    'DB_PORT' => '3306',
    'DB_PREFIX' => 'wx_',

    //显示调试页面
    //'SHOW_PAGE_TRACE' =>true,

    //RBAC类的配置
    'RBAC_SUPERADMIN' =>  'admin',//超级管理员名称
    'ADMIN_AUTH_KEY'  =>  'superadmin',//超级管理员识别号
    'USER_AUTH_ON'    =>  true,   //是否开启权限验证
    'USER_AUTH_TYPE'  =>  1,      //验证类型（1：登录验证，2：时时验证）
    'USER_AUTH_KEY'   =>  'uid',   //用户认证识别号
    'NOT_AUTH_MODULE' =>  'Index',      //无需验证的控制器
    'NOT_AUTH_ACTION' =>  '',      //无需验证的方法
    'RBAC_ROLE_TABLE' =>  'wx_role',
    'RBAC_USER_TABLE' =>  'wx_role_user',
    'RBAC_ACCESS_TABLE' => 'wx_access',
    'RBAC_NODE_TABLE' =>  'wx_node',

    //错误日志配置
    'LOG_RECORD' => true,
    'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR',

    //微信第三方配置项
    'WECHAT_APPID' => 'wxef0739105b12ff8d',
    'WECHAT_APPSECRET' => '0c79e1fa963cd80cc0be99b20a18faeb',
    'WECHAT_APPTOKEN' => 'quke8',
);