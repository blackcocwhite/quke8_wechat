<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function _initialize() {
        if(!isset($_SESSION[C('USER_AUTH_KEY')])){
            $this->redirect('Home/Login/index');
        }

        $notAuth = in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));
        //p($_SESSION);//die;
        if(C('USER_AUTH_ON') && !$notAuth){
            import('Org.Util.Rbac.class.php');
            //$rbac ='' ;
            \Org\Util\Rbac::AccessDecision() || $this->error('您没用权限访问此版块');

        }
    }
}