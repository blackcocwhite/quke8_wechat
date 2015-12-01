<?php
namespace Home\Controller;
use Think\Controller;
class ManageController extends Controller{

    public function pub_list() {
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
        $db = M('pub_account');

        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');        

        $count = $db->where($condition)->count();           
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");
        $this->allCount = $count;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   
           
           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();
    }
    
    //小学
    public function pub_primary_index()
    {         
        
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
                
        
        
        $db = M('pub_account');
        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');       
        
        $allCount = $db->where($condition)->count();

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");       
        foreach($pubGroupId as $v)
        {            
           if($v['gname'] =='小学')                
               $condition['pub_group'] = $v['id'];  
        }
        
        $count = $db->where($condition)->count();   
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->allCount = $allCount;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   

           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();        
    }
    //初中
    public function pub_junior_index()
    {
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
                
        
        $db = M('pub_account');
        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');       
        
        $allCount = $db->where($condition)->count();  

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");       
        foreach($pubGroupId as $v)
        {            
           if($v['gname'] =='初中')                
               $condition['pub_group'] = $v['id'];  
        }
        
        $count = $db->where($condition)->count();   
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->allCount = $allCount;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   

           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        
        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();  
    }
    //高中
    public function pub_senior_index()
    {
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
                
        
        $db = M('pub_account');
        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');       
        
        $allCount = $db->where($condition)->count();  

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");       
        foreach($pubGroupId as $v)
        {            
           if($v['gname'] =='高中')                
               $condition['pub_group'] = $v['id'];  
        }
        
        $count = $db->where($condition)->count();   
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->allCount = $allCount;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   

           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        
        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();  
    }
    //小初
    public function pub_small_index()
    {
        
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
                
        
        $db = M('pub_account');
        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');       
        
        $allCount = $db->where($condition)->count();  

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");       
        foreach($pubGroupId as $v)
        {            
           if($v['gname'] =='小初')                
               $condition['pub_group'] = $v['id'];  
        }
        
        $count = $db->where($condition)->count();   
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->allCount = $allCount;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   

           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        
        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();  
    }
    
    //初高
    public function pub_high_index()
    {
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
                
        
        $db = M('pub_account');
        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');       
        
        $allCount = $db->where($condition)->count();  

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");       
        foreach($pubGroupId as $v)
        {            
           if($v['gname'] =='初高')                
               $condition['pub_group'] = $v['id'];  
        }
        
        $count = $db->where($condition)->count();   
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->allCount = $allCount;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   

           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        
        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();  
    }
    //小初高
    public function pub_system_index()
    {
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
                
        
        $db = M('pub_account');
        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');       
        
        $allCount = $db->where($condition)->count();  

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");       
        foreach($pubGroupId as $v)
        {            
           if($v['gname'] =='小初高')                
               $condition['pub_group'] = $v['id'];  
        }
        
        $count = $db->where($condition)->count();   
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->allCount = $allCount;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   

           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        
        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();  
    }
    
    
    public function pub_kinder_index()
    {
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
                
        $db = M('pub_account');
        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');       
        
        $allCount = $db->where($condition)->count();  

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");       
        foreach($pubGroupId as $v)
        {            
           if($v['gname'] =='幼儿园')                
               $condition['pub_group'] = $v['id'];  
        }
        
        $count = $db->where($condition)->count();   
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->allCount = $allCount;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   

           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        
        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();  
    }    
    
    public function pub_kindersmall_index()
    {
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
                
        $db = M('pub_account');
        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');       
        
        $allCount = $db->where($condition)->count();  

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");       
        foreach($pubGroupId as $v)
        {            
           if($v['gname'] =='幼小')                
               $condition['pub_group'] = $v['id'];  
        }
        
        $count = $db->where($condition)->count();   
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->allCount = $allCount;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   

           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        
        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();  
    }   
    
    
    public function pub_kinders_index()
    {
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
                
        $db = M('pub_account');
        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');       
        
        $allCount = $db->where($condition)->count();  

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");       
        foreach($pubGroupId as $v)
        {            
           if($v['gname'] =='幼小初')                
               $condition['pub_group'] = $v['id'];  
        }
        
        $count = $db->where($condition)->count();   
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->allCount = $allCount;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   

           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        
        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();  
    }   
    
    public function pub_group_index()
    {
    	$appid = C('WECHAT_APPID');
    	$preauthcode = A('Receive');
    	$preauthcode = $preauthcode::preauthcode();
    	$uri = "http://test.quke8.com/Home/Manage/callback";
    	$this->url = "https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=".$appid."&pre_auth_code=".$preauthcode."&redirect_uri=".$uri;
                
        $db = M('pub_account');
        if(session('username') == "admin")
            $condition['1'] = '1';
        else 
            $condition['owner'] = session('username');       
        
        $allCount = $db->where($condition)->count();  

        $pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");       
              
        $condition['pub_group'] = 0;  

        
        $count = $db->where($condition)->count();   
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show(); 

                
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();

        $this->allCount = $allCount;
                
        foreach($pubGroupId as $k)
        {
            $condition['pub_group'] = $k['id'];  
           if($k['gname'] =='小学')                
               $this->primaryCount = $db->where($condition)->count();  
           
           if($k['gname'] =='初中') 
               $this->juniorCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='高中') 
               $this->seniorCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初') 
               $this->smallCount = $db->where($condition)->count(); 
           
           if($k['gname'] =='初高') 
               $this->highCount = $db->where($condition)->count();   
           
           if($k['gname'] =='小初高') 
               $this->systemCount = $db->where($condition)->count();   

           if($k['gname'] =='幼儿园') 
               $this->kinderCount = $db->where($condition)->count();              
           
           if($k['gname'] =='幼小') 
               $this->kindersmallCount = $db->where($condition)->count();              

           if($k['gname'] =='幼小初') 
               $this->kindersCount = $db->where($condition)->count();      
           
        }
        
        $this->groupCount = $db->where("pub_group = 0")->count(); 

        
        $this->pubGroupId = $pubGroupId;
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        $this->display();  
    }    
    
    public function pub_query()
    {
        $city = urldecode($_GET['city']);
        $area = urldecode($_GET['area']);
        $materName = urldecode($_GET['materName']);
        $gid = urldecode($_GET['gid']);
        $verify = urldecode($_GET['verify']);
        
        $sql_city = "and city = '".$city."'" ;
        $sql_area = "and area = '".$area."'" ;
        $sql_nick = "and nick_name like '%".$materName."%'" ;
        
        
        if($city == null ||$city == "" ||$city == "0")
            $sql_city = "";
        if($area == null ||$area == "" ||$area == "0")
            $sql_area = "";        
        if($materName == null ||$materName == ""|| $materName == "index.php" || $materName == "materName")
            $sql_nick = "";     
          
         if(session('username') == "admin")
             $sql_owner = "";
         else
             $sql_owner = "and owner = '".session('username')."'";
         
          $pubGroupId =   M('group') -> query("select id,gname from wx_group where type = 1 order by id;");    

          $group_sql = "";
        if($gid == 10)     
            $group_sql = "and pub_group = 0 ";            
          
        foreach($pubGroupId as $k)
        {
            if($k['gname'] =='小学' && $gid == 1)   
                $group_sql = "and pub_group =". $k['id'];
           if($k['gname'] =='初中' && $gid == 2)
                $group_sql = "and pub_group =". $k['id'];
           if($k['gname'] =='高中' && $gid == 3)
                $group_sql = "and pub_group =". $k['id'];
           if($k['gname'] =='小初' && $gid == 4)
                $group_sql = "and pub_group =". $k['id'];
           if($k['gname'] =='初高' && $gid == 5)   
               $group_sql = "and pub_group =". $k['id'];
           if($k['gname'] =='小初高' && $gid == 6)     
               $group_sql = "and pub_group =". $k['id'];
           if($k['gname'] =='幼儿园' && $gid == 7)     
               $group_sql = "and pub_group =". $k['id'];       
           if($k['gname'] =='幼小' && $gid == 8)     
               $group_sql = "and pub_group =". $k['id']; 
           if($k['gname'] =='幼小初' && $gid == 9)     
               $group_sql = "and pub_group =". $k['id'];                  
        }      
        
        if($verify == 1)
            $verify_sql = "";
        else if($verify == 0)
            $verify_sql = " and verify_type_info = 0";
        else
            $verify_sql = " and verify_type_info <> 0";
        
        $condition=" 1 = 1
            ".$sql_owner."
            ".$verify_sql."
            ".$group_sql."
            ".$sql_city."
            ".$sql_area."
            ".$sql_nick ;

        
        
        $db = M('pub_account');          
        $count = $db->where($condition)->count();
        
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show();         
        $log = wx_opera_log(session('username'),'订阅号管理','订阅号查询','','pub_query');
        //$this->result = $db->query($sql);  
        $this->result = $db->where($condition)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();
        
        //查询分组
        //$this->pubGroup = M('group') -> query("select '全部' gname,0 gid ,count(1) groupno  from wx_pub_account union (select IFNULL(b.gname,'待分组') gname,IFNULL(b.id,0) gid,count(1) groupno  from wx_pub_account a left join  (select * from wx_group where type=1) b   on  a.pub_group = b.id group by b.gname order by a.pub_group);");
        $this->pubGroupId = $pubGroupId;        
                
        $this->display();        
    }
    
    
    
    public function get_token($id){
    	$db = M('pub_account');
        $token = A('receive');
        if($result = $db->where(array('id'=>$id))->find()){
        	
            if(time() - $result['token_c_time'] < $result['expires_in']-10){
                return $result['account_token'];
            }else{
                $data['component_appid'] = C('WECHAT_APPID');
                $data['authorizer_appid'] = $result['account_appid'];
                $data['authorizer_refresh_token'] = $result['account_ref_token'];
                $url = 'https://api.weixin.qq.com/cgi-bin/component/api_authorizer_token?component_access_token='.$token::access_token();
                //echo $url;
                //p($data);die;
                $data = json_encode($data);
                $r = http_post_data($url, $data);
                $r = json_decode($r[1],true);
                //var_dump($r);die;
                if(isset($r['errcode'])){
		    		\Think\Log::record($result['errmsg']."错误码：".$result['errcode'],'ERR');
		    		$this->error('参数错误,请查看错误日志');
		    	}
                $save['token_c_time'] = time();
              	$save['account_token'] = $r['authorizer_access_token'];
              	if($db->where(array('id'=>$id))->save($save)){         		
              		return $save['account_token'];
              	}else{
              		return 'false';
              	}
            }
        }else{
        	return false;
        }
    }
    public function callback(){
    	/*authorization_code 授权码 60分钟授权码回调回来 GET接收(可以存入session中)
    	用授权码 第三方token和第三方appid去换取授权方token和ref_token 2小时过期
        转到getinfo方法 用三方appid和授权方appid取得授权方基本信息
        之后流程应该是去一个完善信息的页面*/
    	if(!IS_GET) $this->error('路径非法！');
    	$appid = C('WECHAT_APPID');
    	$auth_code = $_GET['auth_code'];
    	$token = A('Receive');
    	$token = $token::access_token();
    	$url = 'https://api.weixin.qq.com/cgi-bin/component/api_query_auth?component_access_token='.$token;
    	$data['component_appid'] = $appid;
    	$data['authorization_code'] = $auth_code;
    	$data = json_encode($data);
    	$result = http_post_data($url, $data);
    	$result = json_decode($result[1],true);
    	if(isset($result['errcode'])){
    		\Think\Log::record($result['errmsg']."错误码：".$result['errcode'],'ERR');
    		$this->error('参数错误,请查看错误日志');
    	}
    	foreach ($result as $value) {
    		$result = $value;
    	} 
    	$r['account_appid'] = $result['authorizer_appid'];
    	$r['account_token'] = $result['authorizer_access_token'];
    	$r['account_ref_token'] = $result['authorizer_refresh_token'];
    	$r['expires_in'] = $result['expires_in'];
    	$r['func_info'] = func_info_merge($result['func_info']);
    	$r['token_c_time'] = time();
    	$db = M('pub_account');
    	$info = $db->where(array('account_appid'=>$r['account_appid']))->find();
    	if($info == NULL){
    		if($id = $db->add($r)){
    			$this->getInfo($r['account_appid'],$id);
    		}
    	}else{
            //有BUG 标记一下 应该在之前就判断若存在该公众号就中断程序
	    	if($db->where(array('account_appid'=>$r['account_appid']))->save($r)){
	    		$this->getInfo($r['account_appid'],$info['id']);
	    	}

    	}
    	
    }
    public function getInfo($appid,$id){
    	//auth_code会失效 60分钟
        //if(!$appid){$this->error('参数错误','/');}
        //$appid ? $appid : $appid = M('pub_account')->where('id = 1')->getField('account_appid');
        $log = wx_opera_log(session('username'),'订阅号管理','订阅号授权','','getInfo');
        $token = R('Receive/access_token');    
    	$url = 'https://api.weixin.qq.com/cgi-bin/component/api_get_authorizer_info?component_access_token='.$token;
    	$data['component_appid'] = C('WECHAT_APPID');
    	$data['authorizer_appid'] = $appid;
    	$data = json_encode($data);
    	$result = http_post_data($url, $data);
    	$result = json_decode($result[1],true);
        if(isset($result['errcode'])){
            \Think\Log::record($result['errmsg']."错误码：".$result['errcode'],'ERR');
            $this->error('参数错误,请查看错误日志');
        }
        $authorizer_info = $result['authorizer_info'];
        $info['nick_name'] = $authorizer_info['nick_name'];
        $info['head_img'] = $authorizer_info['head_img'];
        $info['service_type_info'] = implode($authorizer_info['service_type_info']);
        $info['verify_type_info'] = implode($authorizer_info['verify_type_info']);
        $info['user_name'] = $authorizer_info['user_name'];
        $info['alias'] = $authorizer_info['alias'];
        $info['qrcode_url'] = $authorizer_info['qrcode_url'];
        $info['create_time'] = time();
        $info['create_person'] = session('username');
        $info['create_person_id'] = session('uid');
        if(M('pub_account')->where(array('account_appid'=>$appid))->save($info)){
            $this->success('授权成功，请返回完善授权公众号资料',U('com_info',"id=".$id));
        }else{
            $this->error('授权失败，请刷新网页重试','/');
        }
    }   	
        /*完善公众号资料*/
    public function com_info(){
        $id = I('id','','intval');
        
        if(IS_POST){
            //p(I('pub_id','','intval'));
            $log = wx_opera_log(session('username'),'订阅号管理','订阅号编辑','','com_info');
            $data['school_name'] = I('school_name') ? I('school_name') : $this->error('请填写学校名称');
            $data['school_pnum'] = I('school_pnum','','intval');
            $data['contact_name'] = I('contact_name');
            $data['contact_phone'] = I('contact_phone','','intval');
            $data['contact_email'] = I('contact_email');
            $data['pub_group'] = I('pub_group','','intval');
            $data['modify_time'] = time();
            $data['is_vip'] = I('is_vip');
            if(I('city') == "0" ||I('area')== "0")
                $this->error('请选择对应地市区县');
            $data['city'] = I('city');
            $data['area'] = I('area');           
            $data['owner'] = I('owner');//公众号归属

            if(M('pub_account')->where(array('id'=>I('pub_id','','intval')))->save($data)!==false 
                    || M('pub_account')->where(array('id'=>I('pub_id','','intval')))->save($data)!==0){
            	$this->success('信息修改成功','pub_list');
            	exit;
            }

        }

	    $db_pub  = M('pub_account');
        $db_group = M('group');
        $this->id = $id;
        $this->group = $db_group->where('type = 1')->select();
        $sql = "select t.*,t1.id as gid,t2.user_name as uname,t2.user_email,t2.user_phone from wx_pub_account t LEFT JOIN (select * from wx_group where type=1) t1 on t.pub_group = t1.id,wx_user t2
                where t.create_person_id = t2.id 
                and t.id='$id';";

        $this->result = array_pop($db_pub->query($sql));

        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        //查询用户数据
        if(session('username') == "admin")
            $this->user = M('user') -> query("select * from wx_user where user_name <> '".session('username')."';");
        else
        {
           $roleId = M('user') -> query("select t2.role_id from wx_user t1,wx_role_user t2 "
                   . "where t1.id = t2.user_id "
                   . "and t1.user_name = '".session('username')."' ;");
           
           $sql = "select t1.* from wx_user t1,wx_role_user t2 "
                  . "where t1.id = t2.user_id "
                  . "and t1.user_name <> '".session('username')."' "
                  . "and t2.role_id >= ".$roleId[0][role_id].";";
            
          $this->user = M('user') -> query($sql);  
        }
       //当前登录用户 
        $this->session_user = session('username');
        
        $this->display();
    }
    
    //添加公众号分组
    public function addGroup($gname) {
       if(IS_POST){
            if(I('gname') == null || I('gname') =="")
                $this->error('添加分组失败,请确认不为空！');
 
            if(!eregi("[^\x80-\xff]",I('gname'))){
                $group = M("group");  
                $sql = "select count(1) count from wx_group where type=".I('type')." and gname='".I('gname')."';";
                $count = $group->query($sql); 
                if($count[0]['count']=="0")
                {
                    $data = array('type' => I('type'),'gname' => I('gname'));   

                     if(M('group')->add($data)){
                         $this->success('添加分组成功！');
                     }else{
                         $this->error('添加分组失败！');
                     }                    
                }  else {
                    $this->error('组名已存在，请勿重复添加！');
                }
                
 
            }else{ 
                $this->error('分组名称必须全部中文！');
            } 
            
          
       }else
       {
           $this->error('添加分组失败！');
           
       }
    }
    
    //批量修改分组
    public function updatePubGroup()
    {   
        $log = wx_opera_log(session('username'),'订阅号管理','订阅号分组','','updatePubGroup');  
        $this -> updatePub = M("pub_account")->execute("update wx_pub_account set pub_group= ".$_GET['group_id']." where id=".$_GET['pub_id'].";");
        echo 1;
        return;
    }
    
    public function displayPubGroup()
    {
        $groupid = $_GET('group_id');
        $db = M('pub_account');
        $count = $db->count();
        $page = new \Think\Page($count,5);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->displayshow = $page->show(); 
        $this->displayresult = $db->where("pub_group='%s'",$groupid)->order('create_time')->limit($page->firstRow.','.$page->listRows)->select();
        $this->display();
    }
    
    public function logout(){
        session_unset();
        session_destroy();
        $this->success('退出成功');
    }
    
    
    
    //公众号查询
    public function getMaterInfo(){
        
        
    }
    
    //根据地市查询区县
    public function pub_area_info(){
        //通过city查询area
        $result = array();
        $city = urldecode(I('city'));
        $result = M('cityarea_info') -> query("select * from wx_cityarea_info where type=2 and city='".$city."' ;");
        $this->ajaxReturn($result);
        //echo json_encode($result);
    }
    
    
    public function fans(){
        //粉丝方法 接口为usercontroller.class.php
        $this->display();
    }
}
