<?php 
namespace Home\Controller;
use Think\Controller;
/**
 * 自定义菜单
 */
class MenuController extends CommonController{
    //菜单
    public function menu()
    {
        $log = wx_opera_log(session('username'),'订阅号管理','订阅号菜单','','menu');  
        if(IS_GET)
       {   
            //查询
            $pub_id=I('get.id',0,'intval');                               
            $manage = new ManageController();
            $access_token = $manage->get_token($pub_id);                
            $queryUserUrl = 'https://api.weixin.qq.com/cgi-bin/get_current_selfmenu_info?access_token='.$access_token.'&next_openid='.$next_openid;//一次可获取10000个openid
            $queryUserAction = 'GET';

            $curl = new \Org\Util\curl;
            $resultUser =  $curl::callWebServer($queryUserUrl,'',$queryUserAction);      
            if(!empty($resultUser['selfmenu_info']))
                $button = $resultUser['selfmenu_info']['button'];

       } 
       
        $this->button = $button;
        $this->id=$pub_id;
        $this->display();            
    }
    
    //菜单修改
    
    
    
    public function menuThree()
    {
        if(IS_GET)
        {
         $id=I('get.id');   
         $this->id=$id;   
        }
        $this->display();
    }
    public function menuWen()
    {
    
        $this->display();
    }
    public function suCai()
    {      
                     
     
        if(IS_GET)
        {
          $id=I('get.id',0,'intval');
          $wechat = A('wechat');
          
        $content=$wechat::getMaterialList($id,$type='news',$offset=0,$count=20); 
	$cont=$wechat::getMaterialList($id,$type='image',$offset=0,$count=20);
      /*   foreach ($content as $k=>$v)
        {
            echo '<pre>';
            //$content['item'][0]['content']['news_item'][0]['title']
         var_dump($v[0]['content']['news_item'][0]['title']);
            echo '</pre>';
        } */
         /* echo '<pre>';
        var_dump($cont);
        echo '</pre>'; */ 
        //========================
        /* $dataStr=array();
        foreach ($content as $v)
        {
        foreach ($v as $k=> $vv)
        {
           foreach ($vv['content']['news_item'] as $key=> $value)
           {
             //$this->assign('suCai',$value);
               $dataStr[]=array(
                'title'=> $value['title'],
                'url'=>$value['url'],                                      
               );
              /*  var_dump($value['title'].'<br/>'.$value['url']);
               echo '</pre>';
           }        
         }
        }
      $num=count($dataStr)+1;
        foreach ($cont as $d=>$c)
        {
            foreach ($c as $s=>$a)
            {
               $dataStr[$num]['name']=$a['name'];
            }
        }
        echo '<pre>';
     var_dump($dataStr);
     echo '</pre>'; */
     //=========================
       /*  $dataSrr=array();
        foreach ($content['item'] as $k=> $v)
        {
            foreach ($v['content']['news_item'] as $key=> $value)
            {
                //$this->assign('suCai',$value);
                var_dump($value['thumb_media_id']);
                $dataSrr[]=array(
                );
            }
        } */
      /*   foreach ($content as $v)
        {
            echo '<pre>';
            var_dump($v);
            echo '</pre>';
        } */
        /* echo "<pre>";

        var_dump($content['item'][0]['content']['news_item'][0]['title']);
        echo "</pre>";
        echo "<pre>";
        var_dump($content['item'][0]['content']['news_item'][0]['url']);
        echo "</pre>";*/
        }
         $this->display();
         
    }
    
    public function wenZhang()
    {
        
        $this->display();
    }
    //消息
       
    public function news()
    {
       $log = wx_opera_log(session('username'),'订阅号管理','订阅号消息','','news');   
        
        $this->display();
    }
    
    //curl获取网页中的数据
    public function _request($curl,$https=true,$method='GET',$data=null)
    {
        $ch=curl_init();
        curl_setopt($ch, CURLOPT_URL, $curl);
        curl_setopt($ch, CURLOPT_HEADER,false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($https)
        {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    
        }
        if($method=='POST')
        {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
    
        $content=curl_exec($ch);
        curl_close($ch);
        return $content;
    }
    
    //回复按钮
    public function pub_msg()
    {       
        $log = wx_opera_log(session('username'),'订阅号管理','订阅号回复','','pub_msg');  
        $this->pub_id=I('get.id',0,'intval');   
        $data['pub_id'] = $this->pub_id;
        $id_in_msg = M('pub_wechat')->where($data)->getField('pub_id');
        $this -> id_in_msg = $id_in_msg;
        if($id_in_msg == null){
            $this->wechat = null;
        }
        else
        {
           $this->wechat= M('pub_wechat')->where($data)->find();
           if($this->wechat['sub_content'] == null )
               $this->wechat['sub_content'] = "";
           $this->sub_content = $this->wechat['sub_content'];
        }
        
        $this->display();
    }
    
    //保存回复功能
    public function reply_msg()
    {
        $pub_id = $_GET['pub_id'];//公众号id
        $content = urldecode($_GET['content']);//消息内容
        $msg_type = $_GET['msg_type'];//消息类型,1表示被添加自动回复，2表示消息自动回复，3表示关键词自动回复
        $button_type = $_GET['button_type'];//按钮类型
        if($button_type == 2)
            $content = "";
        $content_type = 1;//1：文字，2：图片，3：语音，4：视频，暂时只做了文字
        
        //判断wx_pub_wechat是否有该公众号记录，如果没有，直接insert，如果有，update
        //需要根据msg_type不同来更新不同的字段
        
        switch ($msg_type)
        {
            case 1://被添加自动回复
                $data['sub_type'] = $content_type;
                $data['sub_content'] = $content;
                break;
            case 2;//消息自动回复
                $data['auto_type'] = $content_type;
                $data['auto_content'] = $content;                  
                break;
            case 3://关键词自动回复
                $data['keyword_type'] = $content_type;
                $data['keyword_content'] = $content;                  
                break;
            default:
                break;      
          }          

        $id_in_msg = M('pub_wechat')->where(array('pub_id'=>$pub_id))->getField('pub_id');      
        if($id_in_msg == null){
            //insert
            //根据公众号id获取公众号名称
            //$pub['nick_name'],
            $pub= M('pub_account')->where(array('id'=>$pub_id))->find();
            $data['pub_id'] = $pub_id;
            $data['pub_name'] = $pub['nick_name'];
            $data['user_name'] = $pub['user_name'];
            if(M('pub_wechat')->add($data))
                echo 1;
            else 
                echo 0;            
        }else
        {
            //update
            $condition['pub_id'] = $pub_id;
            if(M('pub_wechat')->where($condition)->save($data))
                echo 1;
            else 
                echo $content;
        }        
    }

    //1、查询所有分组
     /**
    * 获取用户列表
    *
    * @param 
    * @return groups  公众平台分组信息列表;
      * id 分组id，由微信分配,
      * name  分组名字，UTF8编码   ,
      * count 分组内用户数量
    */    
    public static function get_groups($pub_id){
     
        $manage = new ManageController();
        $access_token = $manage->get_token($pub_id);          
        $queryGroupsUrl = 'https://api.weixin.qq.com/cgi-bin/groups/get?access_token='.$access_token;
        $queryGroupsAction = 'GET';
        
        $curl = new \Org\Util\curl;
        $resultGroups =  $curl::callWebServer($queryGroupsUrl,'',$queryGroupsAction); 
        return $resultGroups;
    }    
    
    //2、获取关注者列表
    /**
   * 获取用户列表
   *
   * @param next_openid  第一个拉取的OPENID，不填默认从头开始拉取  
   * @return mixed array（total=>关注该公众账号的总用户数;
     * count=> 拉取的OPENID个数，最大值为10000,
     * data=> 列表数据，OPENID的列表 ,
     * next_openid=> 拉取列表的最后一个用户的OPENID）
   */   
    public static function get_user($pub_id,$next_openid=null){
        
        $manage = new ManageController();
        $access_token = $manage->get_token($pub_id);            
        $queryUserUrl = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token='.$access_token.'&next_openid='.$next_openid;//一次可获取10000个openid
        $queryUserAction = 'GET';
        
        $curl = new \Org\Util\curl;
        $resultUser =  $curl::callWebServer($queryUserUrl,'',$queryUserAction);    
        return $resultUser;
    }    
    
    
    //粉丝（用户）页面
    public function pub_fans()
    {
        $log = wx_opera_log(session('username'),'订阅号管理','订阅号粉丝','','pub_fans');
        $this->pub_id=I('get.id',0,'intval');  

        //$data['pub_id'] = $this->pub_id;
        //$id_in_msg = M('pub_wechat')->where($data)->getField('pub_id');
        
        //获取所有分组
        $resultGroups = self::get_groups($this->pub_id);
        $this->groups = $resultGroups[groups];
        $this->countAll = 0;//总关注数
        foreach ($this->groups as $value) {
            $this->countAll = $this->countAll + $value[count];
        }
        $this->pageAll = (int)floor($this->countAll/100)+1;//总页数
        

        $this->currentPage = 1;//当前页
        //每10000个都是1到10页
        $modPage = $this->currentPage;//1-100
        $nextPage = $_GET['nextPage'];
        $get_next_openid  = null;
        if($_GET['nextPage'] == "" ||$_GET['nextPage'] == NULL)
        {
           $modPage = 1; 
        }  else {
            $this->currentPage = $nextPage;
            if($nextPage%100 == 0)
            {
                $modPage = 100;
                $get_next_openid = $_GET['next_openid'];
            }else
            {
              $modPage = $nextPage%100;   
            }
        }        
        //获取关注列表，一次最多可获取10000个openid
        $this->resultUser =  self::get_user($this->pub_id,$get_next_openid); 
        $this->userData = $this->resultUser[data][openid];
        $this->next_openid = $this->resultUser[next_openid];

        //3、批量获取用户信息
        //根据openid获取用户信息，一次可最多获取100个
        //先只处理一百个以内
      
        $manage = new ManageController();
        $access_token = $manage->get_token($this->pub_id);   
        $queryUserInfoUrl = 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token='.$access_token;//一次可获取100个用户
        $queryUserInfoAction = 'POST';

        $dataUserInfo = array();
        $dataList = array();
        for($i = ($modPage-1)*100;$i < (($modPage-1)*100+99) &&$i < count($this->userData);$i++)
        {
            $dataList['openid'] = $this->userData[$i];  
            $dataList['lang'] = 'zh-CN'; 
            $dataUserInfo['user_list'][$i-($modPage-1)*100] = $dataList;         
        }        

        $dataUserInfo = json_encode($dataUserInfo);  

        $curl = new \Org\Util\curl;
        $this->resultUserInfo =  $curl::callWebServer($queryUserInfoUrl,$dataUserInfo,$queryUserInfoAction); 
        $this ->resultUserList = $this->resultUserInfo[user_info_list];
        //$this->resultUserInfo =  $curl::callWebServer($queryUserInfoUrl,'',$queryUserInfoAction);  

        if($_GET['gid'] == "" ||$_GET['gid'] == NULL)
        {
            $this ->ifPage = 1;
            $this ->resultUserList = $this ->resultUserList;           
        }
        else
        {//分组查询
           $this ->ifPage = 0;
           $gid = $_GET['gid']; 
           $arr = array();
           for($i=0;$i<count($this ->resultUserList);$i++)
           {
               if($gid == $this ->resultUserList[$i][groupid])
                   $arr[$i] = $this ->resultUserList[$i];               
           }
           $this ->resultUserList = $arr;
        }
        
        $this ->display();
    }
    
    //处理101-1000
    
    //处理1000以上
    
      /**
     * 创建分组
     *
     * @param $name 分组名字（30个字符以内）
     * @return mixed array（id=>分组id，由微信分配;name=> 分组名字，UTF8编码）
     */
    public function create_groups()
    {
        if(IS_POST){
            $this->pub_id=I('get.pub_id',0,'intval');   
            $gname = urlencode(I('gname'));
            if(I('gname') == null || I('gname') =="")
                $this->error('添加分组失败,请确认不为空！');
            if(strlen(I('gname'))<30)
            {
                $manage = new ManageController();
                $access_token = $manage->get_token($this->pub_id);          
                $queryUrl = 'https://api.weixin.qq.com/cgi-bin/groups/create?access_token='.$access_token;
                $queryAction = 'post';
                $data = array();
                $data['group']['name'] = $gname;   
                $data = urldecode(json_encode($data));
                $curl = new \Org\Util\curl;
                $this->result =  $curl::callWebServer($queryUrl,$data,$queryAction);   
                if(isset($this->result['errcode']))
                    $this->success('添加分组失败！');
                else
                    $this->redirect('pub_fans', array('id' =>$this->pub_id), 1, '添加分组成功...');
                   //$this->success('添加分组成功！',U('pub_fans',array("id"=>$this->pub_id))); 
            }else
                $this->error('添加分组失败,请确认小于30个字符！');

        
        }
        
    }
    
    
    /**
     * 删除分组测试
     *
     * @param $name 分组名字（30个字符以内）
     * @return mixed array（id=>分组id，由微信分配;name=> 分组名字，UTF8编码）
     */
    public function delete_groups()
    {
        for($i=100;$i<121;$i++)
        {
            $manage = new ManageController();
            $access_token = $manage->get_token(1);          
            $queryUrl = 'https://api.weixin.qq.com/cgi-bin/groups/delete?access_token='.$access_token;
            $queryAction = 'post';
            $data = array();
            $data['group']['id'] = $i;   
            $data = json_encode($data);
            $curl = new \Org\Util\curl;
            $this->result =  $curl::callWebServer($queryUrl,$data,$queryAction);                    
        }
   
        
    }
    
    /**
     * 批量移动用户分组
     *
     * @param $openid_list 用户唯一标识符openid的列表（size不能超过50）
     * @param $to_groupid   分组id 
     * @return {"errcode": 0, "errmsg": "ok"}
     */    
    public function batchUpdate()
    {   
        $openid_list = array();
        $user_list = $_GET['user_list'];
        $openid_list = split(',',$user_list);
        $to_groupid = (int)$_GET['group_id'];
        $pub_id = $_GET['pub_id'];
        $manage = new ManageController();
        $access_token = $manage->get_token($pub_id);     
        
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/groups/members/batchupdate?access_token='.$access_token;
        $queryAction = 'POST';
        $data = array();
        for($i=0;$i<count($openid_list);$i++)
            $data['openid_list'][$i] = $openid_list;   
        $data['to_groupid'] = $to_groupid;   
        $data = json_encode($data);
        $curl = new \Org\Util\curl;
        $this->result =  $curl::callWebServer($queryUrl,$data,$queryAction);  
        $code = $this->result[errcode];
        if($code == 0)
            echo 1;
        else 
            echo $code;
        return;
    }    
    
}