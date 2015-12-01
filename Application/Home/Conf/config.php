<?php
return array(
	//'配置项'=>'配置值' 
	/*本地Apache服务器请配置成*/
	'TMPL_PARSE_STRING' => array(
       '__PUBLIC__' => __ROOT__.'/'.MODULE_PATH.'View/Public',
       '__GAME__' => __ROOT__.'/'.MODULE_PATH.'View/Game'    ,
        '__YOUXI__' => __ROOT__.'/'.MODULE_PATH.'View/Youxi'    
    ),
 
 /*
	//远程Nginx服务器配置
    'TMPL_PARSE_STRING' => array(
        '__PUBLIC__' => '/Application/'.MODULE_NAME.'/View/Public',
    ), 
    */

);