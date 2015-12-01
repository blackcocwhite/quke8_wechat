<?php
namespace Home\Controller;
use Think\Controller;
class CaijiController extends Controller {
    public function index(){
        $url = "http://mp.weixin.qq.com/s?__biz=MjM5NDA2MTU5Ng==&mid=400494937&idx=2&sn=c98edad4a5afdbaddf17cc28d22e4d61&3rd=MzA3MDU4NTYzMw==&scene=6#rd";
        $t = "<p>123</p>";
        $contents = file_get_contents($url);
        $c = strip_tags($contents);
        //echo $c;
        $this->display();
    }
}