<?php
namespace Home\Controller;
use Think\Controller;
/****auth   @蒋恒*****
 ****2015-6-1*********
 ****微信后台 角色权限控制管理类*****/
class RbacController extends CommonController {
    //用户列表页
    public function listUser() {
        $db = M('user');
        $count = $db->where('user_status = 1')->count();
        $page = new \Think\Page($count,10);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show();  
        $this->user = D('UserRelation')->field('user_pass',true)->relation(true)->order('user_addtime')->limit($page->firstRow.','.$page->listRows)->where('user_status = 1')->select();
        $this->role = M('role')->select();
        //获取登录用户
        $this->userName = $_SESSION['username'];
        
        $this->display();
    }
    /*添加网站用户（只有管理员/主编可以添加）
    主编和管理员目前只有一位请上线时直接在数据库添加
    此方法并未提供页面添加管理员以及主编的功能*/
    public function addUser() {
        if(IS_POST){
            $user = array(
                'user_name' => I('user_name') ? I('user_name') : $this->error('请输入姓名'),
                'user_pass' => I('user_pass') ? I('user_pass','','md5') : $this->error('请设置密码'),
                'user_realname' => I('user_realname') ? I('user_name') : I('user_realname'),
                'user_email' => I('user_email'),
                'user_addtime' => I('user_addtime') ? I('user_addtime') : date("Y-m-d H:i:s" ,time()),
                'user_status' => I('user_status','1'),
                'user_phone' => preg_match("/13\d{9}|15\d{9}|18\d{9}/",I('user_phone')) ? I('user_phone') : $this->error('请输入正确的手机号')
            );
            $db = M('user');
            if($user_id = I('user_id','0','intval')){
                if($db->where(array('id'=>$user_id))->save($user) === false){
                    $this->error('编辑信息失败，请重新尝试');
                }else{
                    $role = array(
                        'user_id' => $user_id,
                        'role_id' => I('role_id'),
                    );
                    if(M('role_user')->where(array('user_id'=>$user_id))->save($role) !== false){
                        $this->success('修改用户信息成功！');
                    }else{
                        $this->error('修改用户信息失败！');
                    }
                }
            }else{
                if($user_id = M('user')->add($user)){
                    $role = array(
                        'user_id' => $user_id,
                        'role_id' => I('role_id'),
                    );
                    if(M('role_user')->add($role)){
                        $this->success('添加用户成功！','listUser');
                    }else{
                        $this->error('添加用户失败！');
                    }
                }else{
                    $this->error('添加用户失败！');
                }
            }

        }else{
            // $sql = 'SELECT * FROM wx_role WHERE `id`>1';
            // $this->role = M('role')->query($sql);
            // $this->display();
            $this->error('路径非法');
        }
    }
    /*删除用户  只有Admin可以删除*/
    public function delUser() {
        $log = wx_opera_log(session('username'),'系统管理','删除账号','','delUser');  
        $data['user_status'] = 0;
        if(M('user')->where(array('id'=>I('id')))->save($data) === false){
            $this->error('删除用户失败');
        }else{
            $this->success('删除成功',U('Rbac/listUser'));
        }
    }
    //角色列表
    public function listRole() {
        $this->role = M('role')->select();
        $this->display();
    }
    //添加角色
    //角色已固定，主编 责编 学校投稿人
    public function addRole() {

    }
    //权限列表
    public function node() {
        $log = wx_opera_log(session('username'),'系统管理','权限管理','','node');  
        $field = array('id','name','title','pid');
        $node = M('node')->field($field)->select();
        $this->node = node_merge($node);
        $this->display();
    }
    //添加权限
    public function addNode() {
        if(IS_POST){
            if(M('node')->add($_POST)) {
                $this->success('添加成功',U('listUser'));
            }else{
                $this->error('添加失败！');
            }
        }else{
            $this->pid = I('pid',0,'intval');
            $this->level = I('level',1,'intval');
            switch($this->level){
                case 1:
                    $this->type = '应用';
                    break;
                case 2:
                    $this->type = '控制器';
                    break;
                case 3:
                    $this->type = '方法';
                    break;
            }
            $this->display();
        }
    }

    //配置权限
    public function access(){
        $this->rid = I('rid',0,'intval');
        $field = array('id','name','title','pid');
        $node = M('node')->field($field)->select();
        $access = M('access')->where(array('role_id'=>$this->rid))->getField('node_id',true);
        $this->node = node_merge($node,$access);
        //p($node);die;
        $this->display();
    }
    //修改权限
    public function setAccess(){
        if(!IS_POST){
            $this->error('非法路径！');
        }
        $rid = I('rid',0,'intval');
        $data = array();
        $db = M('access');
        $db->where(array('role_id'=>$rid))->delete();

        foreach($_POST['access'] as $v){
            $tmp = explode('-',$v);
            $data[] = array(
                'role_id' => $rid,
                'node_id' => $tmp[0],
                'level'   => $tmp[1],
            );
        }
        if($db->addAll($data)){
            $this->success('权限分配成功!',U('listUser'));
        }else{
            $this->error('权限分配失败！');
        }
    }
    /*用户信息修改 只有主编和admin有权限 需要进行配置 */
    public function modify(){ 
        $id = I('id');
        $user = D('UserRelation')->relation(true)->where(array('id'=>$id))->find();
        $role = array();
        foreach($user['role'] as $vo){
            foreach($vo as $k => $v){
                if($k == 'id'){
                    $k = 'rid';
                }
                $role[$k] = $v;
                unset($user['role']);
            }
        }
        $user = array_merge($user,$role);
        $log = wx_opera_log(session('username'),'系统管理','修改资料-编辑','','modify'); 
        $this->ajaxReturn($user);
    }
    
    //操作日志 by xuyx
    public function rbacLogList()
    {
        $db = M('opera_log');
        $count = $db->count();
        $page = new \Think\Page($count,30);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show();      
        $this->result = $db ->order('opera_time desc')->limit($page->firstRow.','.$page->listRows) -> select();
        //$this->result = $db -> select();
        
        $this->display();
    }
}