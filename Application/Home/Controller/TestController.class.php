<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller{
    public function index(){
        
        $db = M('question_bank');
        $result = $db->where('id=80')->select();
        $test = $result[0]['answera'];
        $test2 = "蔬菜、水果等食物，与“荤”相对";
        $this ->result = $result;
        p($result);
        p($test);
        p(strlen($test));
        p(strlen($test2));
        
         $this->display();
    }

 
    //导入excel
  public function excelImport()
  { 
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
           // $data ['id'] = $v [0];
               /*
            $data ['questionid'] = $v [0];
            $data ['headline'] = $v [1];            
            $data ['subtitle'] = $v [2];
            $data ['answerA'] = $v [3];
            $data ['answerB'] = $v [4];
            $data ['answerC'] = "";
            $data ['answerD'] = "";
            $data ['answer'] = $v [5];
            $data ['analy'] = $v [6];
                * *
                */
            $data ['headline'] = $v [0];            
            $data ['subtitle'] = $v [1];
            $data ['answerA'] = $v [2];
            $data ['answerB'] = $v [3];
            $data ['answerC'] = "";
            $data ['answerD'] = "";
            $data ['answer'] = $v [4];
            $data ['analy'] = $v [5];               
            $result = M ('question_bank' )->add ($data);
            if (!$result) 
            {
                $this->error ( $v [4].'数据导入失败' );
                //return 0;
            }  else {
                 $this->success($v [4].'数据导入成功');
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
 
    
}