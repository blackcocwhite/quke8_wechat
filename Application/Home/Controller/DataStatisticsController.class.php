<?php
namespace Home\Controller;
use Think\Controller;
class DataStatisticsController extends CommonController{
    public function index(){
        $this->display();
       
    }
   
    //订阅号统计tab页
    public function pub_index()
    {
        $db = M('pub_data');
        $count = $db->count();
        
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show();  
        
        $this->result = $db->order('ref_date')->limit($page->firstRow.','.$page->listRows)->select();
        
        //查询分组
        $this->pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");
        
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");

        $this->display();
    } 
    
    //订阅号统计查询
     public function pub_query_index()
    {
        $pub_date = $_GET['pub_date'];//时间
        $pub_name = urldecode($_GET['pub_name']);//订阅号名称
        $city = urldecode($_GET['city']);//城市
        $area = urldecode($_GET['area']);//区县
        $group = urldecode($_GET['group']);//分组
        $vip = urldecode($_GET['vip']);//等级
        $certify = urldecode($_GET['certify']);//认证
        $stu_num = urldecode($_GET['stu_num']);//学生数
        $care_num = urldecode($_GET['care_num']);//关注数


        $pub_date_sql = "and ref_date = '".$pub_date."'" ;
        $pub_name_sql = "and nick_name like '%".$pub_name."%'" ;
        $city_sql = "and city = '".$city."'" ;
        $area_sql = "and area = '".$area."'" ;
        $group_sql = "and pub_group = '".$group."'" ;
        $vip_sql = "and is_vip = '".$vip."'" ;
        $certify_sql = "and is_certify = '".$certify."'" ;
        

        if($pub_name == null ||$pub_name == ""|| $pub_name == "index.php"|| $pub_name == "pub_name")
            $pub_name_sql = "";            
        if($city == null ||$city == "" ||$city == "0")
            $city_sql = "";
        if($area == null ||$area == "" ||$area == "0")
            $area_sql = "";        
        if($group == null ||$group == "" ||$group == "0")
            $group_sql = "";             
        if($vip == null ||$vip == "" ||$vip == "0")
            $vip_sql = "";            
        if($certify == null ||$certify == "" ||$certify == "0")
            $certify_sql = "";            
        if($stu_num == null ||$stu_num == "" ||$stu_num == "0")
            $stu_num_sql = ""; 
        else {
            $stu_num_array = explode('-',urldecode($_GET['stu_num']));
            $stu_num_start = $stu_num_array[0];
            $stu_num_end = $stu_num_array[1];  
            $stu_num_sql = "and stu_num between ".$stu_num_start."  and ".$stu_num_end ;
        }
        if($care_num == null ||$care_num == "" ||$care_num == "0")
            $care_num_sql = "";   
        else{
            $care_num_array =explode('-', urldecode($_GET['care_num']));
            $care_num_start = $care_num_array[0];
            $care_num_end = $care_num_array[1];
            $care_num_sql = "and care_num between ".$care_num_start." and ".$care_num_end ;
        }
            
        
        $sql_condition=" 1 = 1
            ".$pub_date_sql."
            ".$pub_name_sql."
            ".$city_sql."
            ".$area_sql."
            ".$group_sql."                 
            ".$vip_sql."
            ".$certify_sql."
            ".$stu_num_sql."
            ".$care_num_sql;

        $db = M('pub_data');
        $count = $db->where($sql_condition)->count();
        
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show();  
        
        $this->result = $db->where($sql_condition)->order('ref_date')->limit($page->firstRow.','.$page->listRows)->select();
        
        //查询分组
        $this->pubGroupId = M('group') -> query("select id,gname from wx_group where type = 1 order by id;");
        
        //查询地市区县
        $this->city = M('cityarea_info') -> query("select * from wx_cityarea_info where type=1;");
        
        
          $this->display();
     }   
    
  
    //导入excel
  public function excelImport()
  {
      $log = wx_opera_log(session('username'),'数据统计','订阅号统计-导入','','excelImport');  
    if (!empty ( $_FILES ['file_stu'] ['name'] )) 
    {
        $tmp_file = $_FILES ['file_stu'] ['tmp_name'];
        $file_types = explode ( ".", $_FILES ['file_stu'] ['name'] );
        $file_type = $file_types [count ( $file_types ) - 1];

         /*判别是不是.xls文件，判别是不是excel文件*/
         if (strtolower($file_type) != "xlsx" && strtolower($file_type) != "xls")              
        {
            $this->error ( '不是Excel文件，重新上传!' );
        }

        /*设置上传路径*/
         $savePath = './Uploads/Excel/';

        /*以时间来命名上传的文件*/
         $str = date ( 'Ymdhis' ); 
         $file_name = $str . "." . $file_type;

         /*是否上传成功*/
        if (!copy ($tmp_file, $savePath . $file_name)) 
        {
            $this->error ( '上传失败' );
        }

        /*
          *对上传的Excel数据进行处理生成编程数据,这个函数会在下面第三步的ExcelToArray类中
          注意：这里调用执行了第三步类里面的read函数，把Excel转化为数组并返回给$res,再进行数据库写入
        */
        // $res = Service ( 'ExcelToArray' )->read ( $savePath . $file_name );
          $res = $this->ExcelToArray ( $savePath . $file_name );

       /*
            重要代码 解决Thinkphp M、D方法不能调用的问题   
            如果在thinkphp中遇到M 、D方法失效时就加入下面一句代码
        */
       //spl_autoload_register ( array ('Think', 'autoload' ) );

       /*对生成的数组进行数据库的写入*/
          foreach ( $res as $k => $v ) 
       {
           if ($k != 1) 
          {
            $data ['id'] = $v [0];
            $data ['ref_date'] = $v [1];
            $data ['city'] = $v [2];
            $data ['area'] = $v [3];
            $data ['nick_name'] = $v [4];
            $data ['pub_group'] = $v [5];
            $data ['is_vip'] = $v [6];
            $data ['is_certify'] = $v [7];
            $data ['stu_num'] = $v [8];
            $data ['care_num'] = $v [9];
            $data ['care_rate'] = round($v [9]/$v [8],4)*100;//关注率
            $data ['daily_add'] = $v [11];
            $data ['daily_cancel'] = $v [12];
            $data ['daily_rate'] = round(($v [11]-$v [12])/$v [8],4)*100;//日增
            $data ['type'] = 1;
            $result = M ( 'pub_data' )->add ($data);
            if (!$result) 
            {
                $this->error ( $v [4].'数据导入失败' );
                //return 0;
            }  else {
                 $this->success($v [4].'数据导入成功','pub_index');
                //return 1;
            }               
          }          
       }       
    }
  }
  
  //excel转成数组，共用方法
    public function ExcelToArray($filename,$encode='utf-8'){
        vendor('PHPExcel.PHPExcel');
        //$objReader = \PHPExcel_IOFactory::createReader(Excel5); 
         $inputFileType = \PHPExcel_IOFactory::identify($filename);
        $objReader = \PHPExcel_IOFactory::createReader($inputFileType); 

        $objReader->setReadDataOnly(true); 
        $objPHPExcel = $objReader->load($filename); 
        $objWorksheet = $objPHPExcel->getActiveSheet(); 
        $highestRow = $objWorksheet->getHighestRow(); 
        $highestColumn = $objWorksheet->getHighestColumn(); 
        $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn); 
        $excelData = array(); 
        for ($row = 1; $row <= $highestRow; $row++) { 
            for ($col = 0; $col < $highestColumnIndex; $col++) { 
                $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            } 
        } 
        return $excelData;        
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

    //文章统计
    public function article_index()
    {
        $db = M('article_summary');
        $count = $db->count('distinct title');
        
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show();  
        $field = array('title,sum(count_id) count_id,sum(count_title) count_title,'
            . 'sum(care_num) care_num,sum(int_page_read_user) int_page_read_user,sum(int_page_read_count) int_page_read_count,'
            . 'sum(ori_page_read_user) ori_page_read_user,sum(ori_page_read_count) ori_page_read_count,sum(share_user) share_user'
            . ',sum(share_count) share_count,sum(add_to_fav_user) add_to_fav_user');
        
        $this->result = $db->field($field)->limit($page->firstRow.','.$page->listRows)->group('title')->select();        
        
        $this->display();
    }
    
    //文章统计查询
    public function artitle_query_index()
    {
        $artitle_title = urldecode($_GET['artitle_title']);//文章标题名称
        $pub_num = urldecode($_GET['pub_num']);//推送账号数
        $care_num = urldecode($_GET['care_num']);//送达人数
        $read_num = urldecode($_GET['read_num']);//阅读人数

        $artitle_title_sql = "and title like '%".$artitle_title."%'" ;
        
        if($artitle_title == null ||$artitle_title == ""|| $artitle_title == "index.php"|| $artitle_title == "artitle_title")
            $artitle_title_sql = "";            
         
        if($pub_num == null ||$pub_num == "" ||$pub_num == "0")
            $pub_num_sql = ""; 
        else {
            $pub_num_array = explode('-',$pub_num);
            $pub_num_start = $pub_num_array[0];
            $pub_num_end = $pub_num_array[1];  
           // $pub_num_sql = "and count_id between ".$pub_num_start."  and ".$pub_num_end ;
            $pub_num_sql = "and sum(count_id) >= ".$pub_num_start."  and sum(count_id) < ".$pub_num_end;
        }

        if($care_num == null ||$care_num == "" ||$care_num == "0")
            $care_num_sql = "";   
        else{
            $care_num_array =explode('-', $care_num);
            $care_num_start = $care_num_array[0];
            $care_num_end = $care_num_array[1];
            //$care_num_sql = "and care_num between ".$care_num_start." and ".$care_num_end ;
            $care_num_sql = " and sum(care_num) >= ".$care_num_start."  and sum(care_num) < ".$care_num_end;
        }
        
        if($read_num == null ||$read_num == "" ||$read_num == "0")
            $read_num_sql = "";   
        else{
            $read_num_array =explode('-', $read_num);
            $read_num_start = $read_num_array[0];
            $read_num_end = $read_num_array[1];
            //$read_num_sql = "and int_page_read_user between ".$read_num_start." and ".$read_num_end ;
            $read_num_sql = " and sum(int_page_read_user) >= ".$read_num_start."  and sum(int_page_read_user) < ".$read_num_end;
        }
            

        $sql_condition=" 1 = 1
            ".$artitle_title_sql;
        $sql_having=" 1 = 1
            ".$pub_num_sql."
            ".$care_num_sql."
            ".$read_num_sql;

        $db = M('article_summary');
        
        $count_arrry = $db->where($sql_condition)->field('count(distinct title)')->group('title')->having($sql_having)->select();
        
        $count = count($count_arrry);
        $page = new \Think\Page($count,20);
        $page->setConfig('header','<div class="listpage"> 共 <span style="color:red">%TOTAL_ROW%</span> 条记录');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('theme','%HEADER% &nbsp;&nbsp;<span style="color:red">%NOW_PAGE%/%TOTAL_PAGE%</span>页&nbsp;&nbsp;%UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
        $this->show = $page->show();  
    
        $field = array('title,sum(count_id) count_id,sum(count_title) count_title,'
            . 'sum(care_num) care_num,sum(int_page_read_user) int_page_read_user,sum(int_page_read_count) int_page_read_count,'
            . 'sum(ori_page_read_user) ori_page_read_user,sum(ori_page_read_count) ori_page_read_count,sum(share_user) share_user'
            . ',sum(share_count) share_count,sum(add_to_fav_user) add_to_fav_user');
         
       
        $this->result = $db->where($sql_condition)->field($field)->limit($page->firstRow.','.$page->listRows)->group('title')->having($sql_having)->select();
       
          $this->display();        
        
    }
    

  
}


