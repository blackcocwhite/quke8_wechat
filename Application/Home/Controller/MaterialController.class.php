<?php 
namespace Home\Controller;
use Think\Controller;
class MaterialController extends CommonController{
    public function article_list() {
        $db = M('article_manage');
        $count = $db->where(array('is_del'=>0))->count();
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 
        //$this->result = $db->order('pub_time')->limit($page->firstRow.','.$page->listRows)->select();
        $sql = "select t1.*,t.remark from (select * from wx_article_manage a where a.is_del=0) t1 left join  
                (select b.user_name,c.remark from wx_user b ,wx_role c,wx_role_user d where b.id=d.user_id and d.role_id=c.id) t  
            on t1.article_publisher = t.user_name  order by t1.pub_time desc limit ".$page->firstRow.",".$page->listRows;
        $this->result = M('article_manage') -> query($sql);
        
        
        //查询分组
        $this->ageGroupId = M('group') -> query("select id,gname from wx_group where type = 2 order by id;");
        $this->GroupId = M('group') -> query("select id,gname from wx_group where type = 3 order by id;");

        //$this->days = array();
        //for($i=0;$i<=7;$i++){
         //   $this->days[] = date("m-d", strtotime(' -'. $i . 'day'));
        //} 

        $this->display();
    }
    
    
    //分组查询
    public function group_search()
    {
        $log = wx_opera_log(session('username'),'文章管理','文章查询','','group_search');  
        $date_id = $_GET['date'];        
        if($date_id == 0)
            $date = $date_id;
        else
            $date = $_GET['date'];
        
        $end_date_id = $_GET['date_end']; 
        if($end_date_id == 0)
            $date_end = $end_date_id;
        else
            $date_end = $_GET['date_end'];        
        
        $age = $_GET['age'];
        $pub_class = $_GET['pub_class'];
        $article_name = urldecode($_GET['article_name']);
        
        //$sql_date = "and from_unixtime(a.pub_time,'%Y-%m-%d')= '".$date."'" ;
        $sql_date = "and (from_unixtime(a.pub_time,'%Y-%m-%d')  between '".$date."' and '".$date_end."')" ;
        $sql_age = "and a.article_ageclass= ".$age ;
        $sql_class = "and a.article_class= ".$pub_class;
        $sql_article = "and a.article_title like '%".$article_name."%'";
        
        if($date == 0)
            $sql_date = "";
        if($age == 0)
            $sql_age = "";
        if($pub_class ==0)
            $sql_class = "";
        if($article_name == null ||$article_name == "" ||$article_name == "article_name")
            $sql_article = "";
        
        $sql = "select t1.*,t.remark from (select * from wx_article_manage  a 
            where  a.is_del=0
             ".$sql_date."
             ".$sql_age."
             ".$sql_class."      
             ".$sql_article."
            )t1
             left join  (select b.user_name,c.remark from wx_user b ,wx_role c,wx_role_user d where b.id=d.user_id and d.role_id=c.id) t  
             on t1.article_publisher = t.user_name 
             order by t1.pub_time desc";
    

        
        $db = M('article_manage');
        $sql_count = $db -> query($sql);        
        $count = count($sql_count);
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show();     
        $sql_page = $sql ." limit ".$page->firstRow.",".$page->listRows;
        

       $this->result = $db -> query($sql_page);

       $this->display();
       // $this->success('查询成功！',U('Material/article_list'));  
        
    }
    

    
    //删除文章
    public function delete_article()
    {
        $log = wx_opera_log(session('username'),'文章管理','文章删除','','delete_article');  
        $article_id = $_GET['article_id'];
        $art = M('article_manage');
        $data['is_del'] = 1;
        if($art->where(array('id'=>$article_id))->save($data)){
          echo 1;
        }else{
          echo 0;
        }
        // if($this -> delete_article = M("article_manage")->execute("delete from wx_article_manage where id= ".$article_id.";")) 
        //     echo 1;
        // else
        //    echo 0;
        // return;
    }
    
    //文章审核
    public function audite()
    {    
        $condition = array('id' => I('audite'));    
        $data['article_state'] = 1;
        if($this->result=M('article_manage')->where($condition)->save($data))
            $this->success('审核成功！',U('Material/article_list'));    
    }
 
    //判断文章是不是存在未审核
    public function if_audite()
    {
        $article_id = $_GET['article_id'];
        $count = M('article_manage') -> query("select *  from wx_article_manage where article_state=0 and  id in (".$article_id.");");
        //0代表未审核，查询出未审核，count大于1，不能创建素材
        echo count($count);
    }
    
    //创建素材
    public function create_material() {
      $aid = explode(',', I('get.aids'));
      if(!empty($_SESSION['num']))
      {
          $num=$_SESSION['num'];
          $aid[]=$num;
      }
      $article = M('article_manage');
      $articles = array();
      foreach ($aid as $k => $v) {
        if($k == 0){
          $articles[] = $article->where(array('id'=>$v))->find();
          $articles[$k]['istop'] = 1;
        }else{
          $articles[] = $article->where(array('id'=>$v))->find();
        }
        
      }
      // p($articles);die;
      $this->assign('articles',$articles);
      $this->pub = M('pub_account')->select();
      // p($articles);die;
      $this->display();
    }
    
        //添加素材分组
    public function addGroup() {
        $log = wx_opera_log(session('username'),'文章管理','文章分类','','addGroup');  
       if(IS_POST){        
           $data = array('type' => I('type'),'gname' => I('gname'));           
            if(M('group')->add($data)){
                $this->success('添加分组成功！','article_list');
            }else{
                $this->error('添加分组失败！');
            }           
       }else{
           $this->error('错误的路径！');          
       }
    }
    
        //发表文章
    public function publish(){                        
        //抓取文章的方法
        //这个单独写一个方法 @jh
        $log = wx_opera_log(session('username'),'文章管理','发表文章编辑','','publish');  
        // if(!empty($_POST['txt'])&&empty($_POST['txt_id']))
        // {
        //     $sKeys=iconv("utf-8","gb2312",$_POST['txt']);
        //     $fh=file_get_contents($sKeys);
        //     echo $fh;exit();
        // }
        
        if(IS_POST){
            $post=$_POST;
            $file=$_FILES;
            $this->dataFen($post, $file);
        }else{
          if(!empty($_GET['pid'])){
            $pid=$_GET['pid'];          
            $m=M('article_manage')->where("id='$pid'")->find();            
                //修改文章审核状态             
                $ageId=$m['article_ageclass'];                
                $classId=$m['article_class'];
                $aname=M('group')->where("id='$ageId'")->getField("gname");               
                $cname=M('group')->where("id='$classId'")->getField("gname");
            $this->assign("ma",$m);
                $this->assign("aname",$aname);
                $this->assign("cname",$cname);
            $this->assign("root",$_SERVER['HTTP_HOST']);        
          }
                $ageClass=M('group')->where("type=2")->select();
                $class=M('group')->where("type=3")->select();           
                $this->assign("ageClass",$ageClass);
                $this->assign("class",$class);  
          $this->display();
        }      
    }
    public function zhuaqu(){
      if(isset($_POST['caijiurl'])) {
        unset($arrPostInfo);
        $caijiurl=$_POST['caijiurl'];
        $sq='weixin2010.com';
        $_POST['do']='add';
        $do = $_POST['do'];
        $key=1;
        $url = "http://v.we63.com/twcj.php";
        $data  = array("caijiurl"=>$caijiurl,"do"=>$do,"sq"=>$sq);
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
        $cj = curl_exec ( $ch );
        curl_close ( $ch );
        //var_dump($cj); //调试数据
        //exit;
      }
      $cj=trim($cj);

      $str2 = <<< END


        <script type="text/javascript">
              var ue = UE.getEditor('editor');
          ue.ready(function() {
            setTimeout(function(){
              ue.blur();
              ue.execCommand('cleardoc');
              ue.setContent('$cj');  
            },1000);  
         
          });
          
         </script>
END;
      $ageClass=M('group')->where("type=2")->select();
      $class=M('group')->where("type=3")->select();           
      $this->assign("ageClass",$ageClass);
      $this->assign("class",$class);  
      $this->display('publish');
      echo $str2;
    }
    //素材列表
    public function tuwen(){  
        $this->display();
    }  
    public function view(){
        $this->display();
    }
    public function mod(){
    	$aid = I('get.aid');
    	if($aid){
    		$art = M('article_manage')->where(array('id'=>$aid))->find();
    		$data = array(
    			'title' =>$art['article_title'],
    			'article_publisher' => $art['article_publisher'],
    			'fmurl' => $art['fm_url'],
    			'content' => $art['content']
    			);
    		$this->ajaxReturn($data);
    	}
    	
    }
    
  
   //编辑完上传
   public function modify(){   
       $manage=M('article_manage');
       if(!empty($_POST[txt_id]))
       {   
           $txtid= $_POST[txt_id]; 
	  
           $atr=array(
               'article_title'=>$_POST['article_title'],//文章标题
               'article_author' => I('post.article_publisher'),
               'article_publisher' => $_SESSION['username'],
               'edit_time'=>time(),//编辑时间
               'txt_Url'=>$_POST['txt_Url'],//抓取微信链接
               'article_url'=>$_POST['article_url'],//发布文章原链接
               'content'=>$_POST['cont'],
               'edit_author'=>1,
              // 'fm_Url'=>$smImg,
           );
		   $ph=$_FILES['photo'];		  
           if(!$ph['error'])
           {
                $smUrl=$manage->where("id='$txtid'")->getField('fm_Url');
                unlink($smUrl);//删除之前上传过的封面
                $smImg=$this->uploadAction($ph);
				$atr['fm_Url']=$smImg;
           }     
            if($_POST['aa']!='aa')
            {  
               $atr['article_class']=I('post.article_type')?I('post.article_type'):$this->error('请选择分类！');
               $atr['article_ageclass']=I('post.article_year')?I('post.article_year'):$this->error('请选择年龄！');
            }
           $m=$manage->where("id='$txtid'")->find();
                          
           
           $b=$manage->where("id='$txtid'")->save($atr);
           if($b>0)
           {
               $this->success("编辑文章成功！");
           }else{
                
               $this->error("编辑文章失败！");
           }
         
       }else{
                      
           if(IS_POST)
           {
                
            $post=$_POST;
            $file=$_FILES;
            $this->dataFen($post, $file);
                
           }
       }
   } 
   
//数据封装
   public  function dataFen($post,$file)
   {
       $atr = array();
       $atr['article_title'] = $post['article_title'] ? $post['article_title']: $this->error('请输入文章标题');
       $atr['article_author'] = $post['article_publisher'] ? $post['article_publisher'] : '';
       $atr['article_publisher'] = $_SESSION['username'];
       //$atr['article_publisher'] = I('post.article_publisher') ? I('post.article_publisher') : '';
       $atr['content'] = $post['cont'] ? $post['cont'] : $this->error('请输入文章内容');
       $atr['pub_time'] = time();
       $atr['txt_Url'] = $post['txt_Url'] ? $post['txt_Url'] : '';
       $atr['article_url'] = $post['article_url'] ? $post['article_url'] : '';
       $atr['edit_author'] = 1;//暂且为1测试使用后期完善 @jh
       if($post['aa']!='aa')
       {
           $atr['article_class']=$post['article_type']?$post['article_type']:$this->error('请选择分类！');
           $atr['article_ageclass']=$post['article_year']?$post['article_year']:$this->error('请选择年龄！');
       }
       $manage=M('article_manage');
       $ph=$file['photo'];
        
       if(!$ph['error'])
       {
           $smImg=$this->uploadAction($ph);
           $atr['fm_Url']=$smImg;
       }else {
           
            $this->error("封面不能为空！");
            
           
       }
       $num=$manage->add($atr);
       if(!empty($num)){
           if($post['aa']!='aa')
           {
           $this->success("添加文章成功！",U('Material/article_list'));
           }else {
               session('num',$num);
               $this->success("新建文章成功！");
               
           }
       }else{
           $this->error("添加文章失败！");
       }
       
        
          
       
       
   }
   //上传方法
   public function uploadAction($ph)
   {
       //在操作者不知道要点击上传按钮时执行此方法
           $upload=new \Think\Upload();      
           $upload->maxSize   =     5145728 ;// 设置附件上传大小
           $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
           $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
           $upload->savePath  =     ''; // 设置附件上传（子）目录
           // 上传文件
       
           $info   =   $upload->uploadOne($ph);

           if(!$info)
           {
               $this->error('文章封面上传有误!');       
           }else{
               //把已上传的图片产生缩略图
               $smailImg=new \Think\Image();
               $bigImg=$info['savepath'].$info['savename'];
               $ImgUrl=$upload->rootPath.$bigImg;//拼接要打开图片的路径
               $smailImg->open($ImgUrl);
               $smailImg->thumb(900, 500);//设置图片大小
               $smImg=$upload->rootPath.$info['savepath']."fm_".$info['savename'];//保存缩略的图片路径
               $sm=$_SERVER['HTTP_HOST'].$upload->rootPath.$info['savepath']."fm_".$info['savename'];
               $smailImg->save($smImg);
               unlink($ImgUrl);//删除之前上传过的原图
               return $smImg;
           }
      
       
       
   }
   
   //文章预览
   
   public function pview(){    
      $info="";
      if(!empty($_GET['id']))
      {
      $aid=$_GET['id'];
      $info=M('article_manage')->where("id='$aid'")->find();
      $this->assign("pm",$info);
      }       
      $this->display();
   }
   
   public function del_material(){
       
       $log = wx_opera_log(session('username'),'素材审核','素材删除','','del_material');  
      $id = I('get.id');
      if(isset($id)){
        if($result = M('material_manage')->where("id='$id'")->delete() !== false){
          $this->success('删除素材成功');
        }else{
          $this->error('删除失败，SQL语句出错');
        }
      }else{
        $this->error('路径非法!');
      }
     }

   public function tosave(){
       $log = wx_opera_log(session('username'),'文章管理','提交审核','','tosave');  
      if(isset($_GET['aids'])){
          $material['article_id'] = I('get.aids');
          $material['article_publisher'] = session('username');
          $material['ptime'] = time();
          if(M('material_manage')->add($material)){
            $this->success('创建素材成功',U('Material/material_list'));
          }else{
            $this->error('创建素材失败！');
          }
      }
   }
   /*保存素材  非常非常非常非常复杂*/
  public function save_m(){
    $material_id = I('get.mid');
    $m = M('material_manage');
    $m_o = M('material_online');
    $info = '';
    $arts = $m->where(array('id'=>$material_id))->find();
    $aids = explode(',', $arts['article_id']);
    $pids = explode(',', I('get.pids'));
    $art = M('article_manage');
    $wechat = A('Wechat');
    $articles = array();
    $media = array();
    foreach ($pids as $pid){
    	$is_pub = $m_o->join('wx_pub_account ON wx_material_online.pub_id = wx_pub_account.id')->where(array('pub_id'=>$pid,'material_id'=>$material_id))->field('nick_name')->find();
      if(!empty($is_pub)){
        $info .= "该素材在<span style=color:red>".$is_pub['nick_name']."</span>已经保存过，请勿重复保存!<br>";
        continue;
      } 
      foreach ($aids as $aid) {
        $articles['articles'] = $art->where(array('id'=>$aid))->find();
        $data['id'] = $aid;
        $data['title'] = $articles['articles']['article_title'];
        $data['author'] = $articles['articles']['article_author'];
        $data['digest'] = $articles['articles']['digest'];
        $data['show_cover_pic'] = $articles['articles']['show_cover_pic'];
        $data['content_source_url'] = $articles['articles']['txt_url']; 
        //处理图片
        $str1 = $articles['articles']['content']; 
        $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
        $rep = array();
        $match = array();
        preg_match_all($pattern,$str1,$match);
        foreach ($match[1] as $value) {
          if(empty(strstr($value,'http://mmbiz.qpic.cn/mmbiz')) && empty(strstr($value,'https://mmbiz.qlogo.cn/mmbiz'))){
            $url = $wechat::uploadimg($value,$pid);
            $rep[] = $url;
          }else{
            $rep[] = $value;
          }

        }
        $str1 = htmlspecialchars_decode($str1);
        $new = str_replace($match[1], $rep, $str1);
        $data['content'] = $new;
        if(!$media_id = M('img_article_pub')->where(array('article_id'=>$aid,'pub_id'=>$pid))->getField('media_id')){        
          $fm_url = $articles['articles']['fm_url'];   
          $insert['media_id'] = $data['thumb_media_id'] = $wechat::uploadMedia($fm_url,$pid);
          $insert['pub_id'] = $pid;
          $insert['article_id'] = $aid;
          M('img_article_pub')->add($insert);
        }else{
          $data['thumb_media_id'] = $media_id;
        }
        $datas[] =$data;
      }

      $mid = $wechat::uploadNews($datas,$pid);
      //p($mid);die;
      $nick_name = M('pub_account')->where(array('id'=>$pid))->getField('nick_name');
      if(empty($mid['media_id'])){
          //$this->error('保存素材失败！');
          $info .= '公众号<span style=color:red>'.$nick_name.'</span>保存素材失败！错误信息：<span style=color:red>'.$mid['errmsg'].'</span><br>';
      }else{
        $material['pub_id'] = $pid;
        $material['material_id'] = $material_id;
        $material['article_publisher'] = session('username');
        $material['media_id'] = $mid['media_id'];
        $material['ptime'] = time();
        M('material_online')->add($material);
        $info .= '公众号<span style=color:red>'.$nick_name.'</span>保存素材成功！<br>';
      } 
      unset($datas);
    }
    //echo "<script type='text/javascript'>alert('正在保存请稍后')</script>";
    echo $info;
  }

  
  /**预览给个人
  ***
  ***/
  public function preview(){
  	if(IS_POST){
		$towxname = I('post.wxname');
		$pid = I('post.pres');
		$mid = I('post.mid');
		$media_id = M('material_online')->where(array('material_id'=>$mid,'pub_id'=>$pid))->getField('media_id');
  		if($media_id == null){
  			$this->error('该素材未上传到您要预览的公众号，请检查重试');
  		}else{
  			$wechat = A('wechat');
  			$result = $wechat::previewNewsByGroup($towxname,$media_id,$pid);
        $code = $result[errcode];
        if($code == 0)
            $this->success('预览成功！');
        else 
            $this->success('预览失败！');		
  		}
    }
  }

  //素材列表
  public function material_list(){
        //查询素材
        $material = M('material_manage');
        $mat_infos = $material ->where('state=1')-> select();
        $this->mat_infos = $mat_infos;

        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");   
        //查询分组
        $this->pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");
        //查询公众号
        $p = M('pub_account');
        $this->pub = $p->select();
        $this->display();
  }
  
//根据素材查询保存给了哪个公众号
  public function material_to_pub()
  {
      $log = wx_opera_log(session('username'),'素材管理','预览给个人','','material_to_pub');  
        $result = array();
        $mid = I('mid');
        $result = M('pub_account') -> query("select distinct t1.* from wx_pub_account t1,wx_material_online t2 where t1.id=t2.pub_id and t2.material_id=".$mid.";");  
        $this->ajaxReturn($result);
  }
  
  public function material_search()
  {
 
        $get_city = urldecode($_GET['city']);
        $get_area = urldecode($_GET['area']);
        $get_pub_group = urldecode($_GET['pub_group']);
        $get_pub_name = urldecode($_GET['pub_name']);


        $sql_city = "and a.city = '".$get_city."'" ;
        $sql_area = "and a.area = '".$get_area."'" ;
        $sql_pub_group = "and a.pub_group = '".$get_pub_group."'" ;
        $sql_pub_name = "and a.nick_name like '%".$get_pub_name."%'" ;

        if($get_city == null || $get_city == "" || $get_city == "0")     
            $sql_city = "";

        if($get_area == null || $get_area == "" || $get_area == "0")
            $sql_area = "";

        if($get_pub_group == null || $get_pub_group == "" || $get_pub_group == "0")
            $sql_pub_group = "";

        if($get_pub_name == null || $get_pub_name == "" || $get_pub_name == "0"|| $get_pub_name == "index.php")
            $sql_pub_name = "";

         $sql="select * from wx_pub_account a
         where 1 = 1
         ".$sql_pub_name."
         ".$sql_city."
         ".$sql_area."
         ".$sql_pub_group.";";
        
         //var_dump($sql);

        $this->pub = M('pub_account')->query($sql);       
         //$this->pub = M('pub_account')->select();

        $this->display();
      
  }
  
  //审核
  public function audite_list()
  {
        $material = M('material_manage');
        $mat_infos = $material ->where('state=0')-> select();
        $this->mat_infos = $mat_infos;
        $this->count_mat = count($this->mat_infos);    
        p($this->count_mat);
        $this->display();
  }
    
  public function update_audite()
  {
      $log = wx_opera_log(session('username'),'素材审核','素材审核','','update_audite');  
        $id = I('id','','intval');

        $data['state'] = 1;
        if(M('material_manage')->where(array('id'=>$id))->save($data))
            $this->success('信息审核成功');              

        exit;            
  }
  
    //根据地市查询区县 by xuyx
    public function pub_area_info(){
        //通过city查询area
        $result = array();
        $city = urldecode(I('city'));
        $result = M('cityarea_info') -> query("select * from wx_cityarea_info where type=2 and city='".$city."' ;");
        $this->ajaxReturn($result);
        //echo json_encode($result);
    }  
  
  public function singleqf(){
  	 /***公众号管理页面的单独群发素材功能
      ***
      ***群发完以后标记该公众号当日已经群发的功能未实现---@jh
      ***/
    $log = wx_opera_log(session('username'),'订阅号管理','订阅号群发','','singleqf');  
    $id = I('get.id');
    $mid = I('get.mid');
    if(!empty($id)){
      // $wechat = A('Wechat');
      // $result = $wechat::getMaterialList($id,'news');
      $this->id = $id;
      $m = M('material_online');
      $field = array('material_id,wx_material_online.article_publisher,wx_material_online.ptime as ptime,article_id,state,media_id
        ');
      $this->mat_infos = $m->join('wx_material_manage ON wx_material_online.material_id = wx_material_manage.id')       
             ->where(array('wx_material_online.pub_id'=>$id))     
             ->field($field) 
             ->select();
      $this->display();
    }elseif(!empty($_POST)){
      p($_POST);die;
      $wechat = A('Wechat');
      $result = $wechat::sentNewsByGroup('', $med, true,$pid);
    }else{
      $this->error('错误的路径！');
    }
  }

  public function massall(){
      $log = wx_opera_log(session('username'),'素材管理','群发素材','','massall');  
  	$pids = I('get.pids');  	
    $mid = I('get.mid');
    if(!empty($pids)){
      $info = '';
      $wechat = A('wechat');
    	$pids = explode(',', $pids);      
      foreach ($pids as $pid) {
        $media_id = M('material_online')->where(array('pub_id'=>$pid,'material_id'=>$mid))->getField('media_id');
        $result = $wechat::sentNewsByGroup('',$media_id,true,$pid);
        $nick_name = M('pub_account')->where(array('id'=>$pid))->getField('nick_name');
        if($result['errcode'] === 0){
          $data['msg_data_id'] = $result['msg_data_id'];
          $data['msg_id'] = $result['msg_id'];
          $data['msg_ptime'] = time();
          M('material_online')->where(array('pub_id'=>$pid,'material_id'=>$mid))->save($data);
          $info .= '公众号<span style=color:red>'.$nick_name.'</span>素材群发成功！<br>';
        }else{
          $info .= '公众号<span style=color:red>'.$nick_name.'</span>素材群发失败！错误信息：<span style=color:red>'.$result['errmsg'].'</span><br>';
          $log = wx_opera_log(session('username'),'素材','素材群发','公众号<span style=color:red>'.$nick_name.'</span>素材群发失败！错误信息：'.$result['errmsg'],'massall');
        }
      }
      echo $info;
      exit;
    }
    $m = M('material_online');
   
    $result = $m->join('wx_pub_account ON wx_pub_account.id = wx_material_online.pub_id')
                ->distinct(true)->field('nick_name,id')->where(array('material_id'=>$mid))->select();
    $this->ajaxReturn($result);

  } 
}