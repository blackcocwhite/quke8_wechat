<?php
/**
 * 微信第三方通信权限验证类
 * Created by Jh.
 * User: jh
 * Date: 15-06-08
 * Time: 9:45 AM
 * Mail: blackcocwhite@gmail.com
 */
namespace Home\Controller;
use Think\Controller;
class ReceiveController extends Controller{
/**
 * 捕获并解密微信每10分钟推送过来的ticket
 * Created by Jh.
 * User: jh
 * Date: 15-06-08 9:45 AM
 * Modify Date: 15-06-15 
 * Mail: blackcocwhite@gmail.com
 */
    public function sysmsg() {
    	//读取微信每10分钟发来的加密体存入文件
        $encryptMsg = file_get_contents('php://input');
        if(!empty($encryptMsg)){
            echo 'success';
        }
        F('TICKET',$encryptMsg);
        if(!empty($_GET)){
            F('GET',$_GET);
            $arr = F('GET');
        }else{
            $arr = F('GET');
        }
        $msg_sign = $arr['msg_signature'];
        $timeStamp = $arr['timestamp'];
        $nonce = $arr['nonce']; 

        $xml_tree = new \DOMDocument();
        $xml_tree->loadXML(F('TICKET'));
        $array_e = $xml_tree->getElementsByTagName('Encrypt');       
        $encrypt = $array_e->item(0)->nodeValue;
        $format = "<xml><ToUserName><![CDATA[toUser]]></ToUserName><Encrypt><![CDATA[%s]]></Encrypt></xml>";
        $from_xml = sprintf($format, $encrypt);
        
        $wxData = M('account')->where('type' == 4)->find();
        $encodingAesKey = $wxData['encodingaeskey'];
        $token = $wxData['token'];
        $appId = $wxData['appid'];
        $pc = new \Org\Util\wxBizMsgCrypt($token, $encodingAesKey, $appId);


        // 第三方收到公众号平台发送的消息


        $msg = '';

        $errCode = $pc->decryptMsg($msg_sign, $timeStamp, $nonce, $from_xml, $msg);
        if ($errCode == 0) {
            //\Think\Log::record("Ticket获取成功");
            $xml = new \DOMDocument();
            $xml->loadXML($msg);
            $array_e = $xml->getElementsByTagName('ComponentVerifyTicket');
            $component_verify_ticket = $array_e->item(0)->nodeValue;
            $date_time = date('Y-m-d H:i:s',time());

            $data = array(
                'component_verify_ticket' =>$component_verify_ticket,
                'ticket_c_time' => $date_time
            );

            if( M('account')->where('type' == 4)->save($data))
            {
                return;
            }

        } else {
            \Think\Log::record("Ticket获取失败，请检查服务器配置！错误码：".$errCode,'ERR');
            return false;
        }
    }

    /**
    * 消息接口
     * 
     */
    public function eventmsg(){    
        /*
         $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

         if(!empty($postStr))
         {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $toUsername = $postObj;             
         }else
           $toUsername='2016'; 

            $condition['pub_id'] = 1;
            $data['auto_type'] = 1;

            //$test = $_GET('ToUserName');
            //$test = json_decode($test);
            $data['auto_content'] =$toUsername;    
            M('pub_wechat')->where($condition)->save($data);  
         * 
         */  

        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);

            
            //根据$toUsername（公众号的原始号）与数据库公众号信息关联
            //$condition['user_name'] = $toUsername;
            //$pub_msg = M('pub_wechat')->where($condition)->find();


                    $contentStr = "测试测试";
                    $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                    </xml>";

            
                        
            $msgType = "text";     
            $fromUsername="gh_3bdd6f6b16f8";
            $toUsername="onW7iwLfGJJDHAtLr1WzPHqoIMZg";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            return $resultStr;

        }else {
            return false;
            exit;
        }        

        
    }
    
    public static function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            //$keyword = trim($postObj->Content);
            $time = time();
            $MsgType = $postObj->MsgType;        
            
            
            //根据$toUsername（公众号的原始号）与数据库公众号信息关联
            //$condition['user_name'] = $toUsername;
            //$pub_msg = M('pub_wechat')->where($condition)->find();

            switch($MsgType){
                case "event":
                    $contentStr = $toUsername;
                   // $contentStr = $pub_msg['sub_content'];
                    $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                    </xml>";
                    break;
                default:
                    $contentStr = $toUsername;
                    $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                    </xml>";
                    break;
            }
            
                        
            $msgType = "text";     
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            return $resultStr;

        }else {
            return false;
            exit;
        }
    }
    
/**
 * 微信Access_Token的获取与过期检查
 * Created by Jh.
 * User: jh
 * Date: 15-06-08 9:45 AM
 * Modify Date: 15-06-15 
 * Mail: blackcocwhite@gmail.com
 */
    public static function access_token(){
        $db = M('account');
    	$result = $db->where('id=1')->find();
    	if(time()-$result['token_c_time']>$result['token_e_time']-10){
	        $data['component_verify_ticket'] = $result['component_verify_ticket'];
	        $data['component_appid'] = $result['appid'];
	        $data['component_appsecret'] = $result['appsecret'];
	        $data = json_encode($data);
	        $url = 'https://api.weixin.qq.com/cgi-bin/component/api_component_token';
	        $result = http_post_data($url, $data);
	        $token = json_decode($result[1],true); 
            if(isset($token['errcode'])) \Think\Log::record($token['errmsg']."错误码：".$token['errcode'],'ERR');     
	        $t['access_token'] = $token['component_access_token'];
	        $t['token_c_time'] = time();
            $t['token_e_time'] = $token['expires_in'];
	        M('account')->where('id=1')->save($t);
	        return $t['access_token'];
        }else{
        	return $result['access_token'];
        }
    }
/**
 * 微信预授权码的获取与过期检查
 * Created by Jh.
 * User: jh
 * Date: 15-06-08 9:45 AM
 * Modify Date: 15-06-15 
 * Mail: blackcocwhite@gmail.com
 */
    public static function preauthcode(){  	
        $db = M('account');
    	$result = $db->where('id=1')->find();

        // if(time()-$result['preauthcode_c_time']>$result['preauthcode_e_time']-10 || empty($result['preauthcode'])){
        $data['component_appid'] = 'wxef0739105b12ff8d';
        $data = json_encode($data);
        $token = self::access_token();
        $url = 'https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode?component_access_token='.$token;
        //echo $url;die;
        $result = http_post_data($url, $data);
        $preauthcode = json_decode($result[1],true);
        $t['preauthcode'] = $preauthcode['pre_auth_code'];
        $t['preauthcode_c_time'] = time();
        $t['preauthcode_e_time'] = $preauthcode['expires_in'];
        M('account')->where('id=1')->save($t);
        return $t['preauthcode'];
        // }else{
        //    return $result['preauthcode'];
        // }

    	
    }
    
    
}
