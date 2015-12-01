<?php
namespace Home\Controller;
use Org\Util\Rbac;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        if(session('?uid')){
            $this->redirect('Index/index');
        }
        $this->appid = C('APPID');
        $this->appsecreat = C('APPSECREAT');
        $this->display();
    }

    public function dologin(){        
        if(!IS_POST){
            $this->error('路径非法','index');
        }
        if(I('post.username')==''){
            $this->error('请输入登录名！');
        }
        if(I('post.password')==''){
            $this->error('请输入密码！');
        }
        $ip = get_client_ip();
        $log = wx_opera_log(I('post.username'),'登录','登录',$ip,'dologin');  
        $db = M('user');
        $user = $db->where(array('user_name' => I('post.username')))->find();
        if(!$user || $user['user_pass'] != I('post.password','','md5')){
            $this->error('登录信息错误，请重新登陆！','index');
        }else{
            session(C('USER_AUTH_KEY'),$user['id']);
            session('username',$user['user_name']);
            session('logintime',date('Y-m-d H:i:s',$user['user_logtime']));
            //超级管理员识别
            if($user['user_name'] == C('RBAC_SUPERADMIN')){
                session(C('ADMIN_AUTH_KEY'),true);
            }
            //读取用户权限
            import('Org.Util.Rbac');
            Rbac::saveAccessList();

            $data['user_logtime'] = time();
            $db->where("id=".$user['id'])->save($data);
            $this->success('登陆成功',redirect('Index/index'));
        }
    }
}