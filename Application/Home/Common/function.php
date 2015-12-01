<?php
/*测试打印函数*/
function p($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}
/*递归重组权限信息为多维数组的函数*/
function node_merge($node,$access=null,$pid=0){

    $arr = array();
    foreach ($node as $v){
        if(is_array($access)){
            $v['access'] = in_array($v['id'],$access) ? 1 : 0;
        }
        if($v['pid'] == $pid){
            $v['child'] = node_merge($node,$access,$v['id']);
            $arr[] = $v;
        }
    }
    return $arr;
}

function http_post_data($url, $data_string) {  
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_POST, 1);  
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
        'Content-Type: application/json; charset=utf-8',  
        'Content-Length: ' . strlen($data_string))  
    );  
    ob_start();  
    $a = curl_exec($ch);  
    $return_content = ob_get_contents();  
    ob_end_clean();  

    $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
    return array($return_code, $return_content);  
}

function func_info_merge($arr){
    $str = '';
    foreach($arr as $v) {
        foreach($v as $value){
            $str .= implode(',',$value).',';
        }
    }
    return $str;
}

//日志函数
function wx_opera_log($user_name,$module=null,$method=null,$bak=null,$operation=null)
{
    $db = M('opera_log');
    $condition['user_name'] = $user_name;
    $condition['module'] = $module;
    $condition['method'] = $method;
    $condition['operation'] = $operation;
    $condition['bak'] = $bak;
    $condition['opera_time'] = time();
    if($db->add($condition)){
        //$this->success('日志添加成功！');
        return 1;
    }else{
        //$this->error('日志添加失败！');
        return 0;
    }   
    
    
}