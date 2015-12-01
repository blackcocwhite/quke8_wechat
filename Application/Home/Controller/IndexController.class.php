<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        
        $role = M('role');       
        $userName = session('username');  
        if($userName == "admin")
        {
            $this -> roleId = 1;    
        }else
        {
            $sql = "select c.id roleId from wx_user a,wx_role_user b,wx_role c
                    where a.id = b.user_id
                    and b.role_id = c.id
                    and a.user_name='".$userName."' ;";            
            $id = $role -> query($sql);   
            foreach($id as $k )
            {
                //var_dump((int)$id[0]['roleid']);
                $this -> roleId = (int)$id[0]['roleid'];                
            }

        }
        //$this -> roleId = $this -> roleId +4;
        //var_dump($this -> roleId);
        //die;
        $this->display();
    }
    public function info() {
        //p($_SESSION);

        $this->display();
    }
    public function logout(){
        session_unset();
        session_destroy();
        $this->success('退出成功');
    }
    public function auth(){
        $this->display();
    }
}