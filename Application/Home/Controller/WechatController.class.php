<?php
/**
 * Created by PhpStorm.
 * User: 蒋恒
 * Date: 2015/7/1
 * Time: 13:29
 */
namespace Home\Controller;
use Think\Controller;
class WechatController extends Controller{

    public function uploadNews($articles,$id){    	
    /**
     * 上传图文消息素材 - 创建一个图文消息，保存到微信服务器，可以得到一个id代表这个图文消息，发送的时候根据这个id发送就可以了
     *
     * @param $articles = array(
     *array('thumb_media_id'=>'多媒体ID，由多媒体上传接口获得' , 'author'=>'作者', 'title'=>'标题', 'content_source_url'=>'www.lanecn.com', content=>'图文消息页面的内容，支持HTML标签', 'digest'=>'摘要', 'show_cover_pic'=>'是否设置为封面（0或者1）'),
     *array('thumb_media_id'=>'多媒体ID，由多媒体上传接口获得' , 'author'=>'作者', 'title'=>'标题', 'content_source_url'=>'www.lanecn.com', content=>'图文消息页面的内容，支持HTML标签', 'digest'=>'摘要', 'show_cover_pic'=>'是否设置为封面（0或者1）'),
     *)
     *
     * return mediaId 上传的图文消息的ID
     */
        $manage = A('Manage');
        $token = $manage::get_token($id);
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/material/add_news?access_token='.$token;
        $queryAction = 'POST';
        foreach($articles as &$article){
            $article['author'] = urlencode($article['author']);
            $article['title'] = urlencode($article['title']);
            $article['content'] = urlencode(addslashes($article['content']));
            $article['digest'] = urlencode($article['digest']);
        }   
        $template = array();
        $template['articles'] = $articles;
        $template = json_encode($template);
        $template = urldecode($template);
        $result = new \Org\Util\curl;
        $result = $result::callWebServer($queryUrl, $template, $queryAction,1,0);
        //p($result);die;
        return $result;
    }

    public function uploadMedia($filename,$id) {
    /**
     * 多媒体上传。上传图片、语音、视频等文件到微信服务器，上传后服务器会返回对应的media_id，公众号此后可根据该media_id来获取多媒体。
     * 上传的多媒体文件有格式和大小限制，如下：
     * 图片（image）: 1M，支持JPG格式
     * 语音（voice）：2M，播放长度不超过60s，支持AMR\MP3格式
     * 视频（video）：10MB，支持MP4格式
     * 缩略图（thumb）：64KB，支持JPG格式
     * 媒体文件在后台保存时间为3天，即3天后media_id失效。
     * @param $filename，文件绝对路径
     * @param $type, 媒体文件类型，分别有图片（image）、语音（voice）、视频（video）和缩略图（thumb）
     * @return {"type":"TYPE","media_id":"MEDIA_ID","created_at":123456789}
     */	
		$type = 'image';
        $manage = A('Manage');
        $accessToken = $manage::get_token($id);
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/material/add_material?access_token='.$accessToken;
        if (class_exists('\CURLFile')) {
	       $field = array('fieldname' => new \CURLFile(realpath($filename)));
  		} else {
  		    $field = array('fieldname' => '@' . realpath($filename));
  		}
        $data = array();
        $data['media'] = $field['fieldname'];
        $data['type'] = $type;

        $result = new \Org\Util\curl;
      	$result = $result::callWebServer($queryUrl, $data, 'POST', 1 , 0);
      	return $result['media_id'];
    }	

    public function uploadimg($filename,$id){
    /**
     * 文章类图片上传。上传图片微信服务器，上传后服务器会返回对应的url，替换图文消息内的图片地址。
     * 上传的多媒体文件有格式和大小限制，如下：
     * 图片（image）: 1M，图片仅支持jpg/png格式
     * 不占用公众号的素材库中图片数量的5000个的限制
     * @param $filename，文件绝对路径
     * @param $id, 公众号id
     * @return{"url":  "http://mmbiz.qpic.cn/mmbiz/gLO17UPS6FS2xsypf378iaNhWacZ1G1UplZYWEYfwvuU6Ont96b1roYs CNFwaRrSaKTPCUdBK9DgEHicsKwWCBRQ/0"}
     */ 
        $filename = '.'.$filename;
        $manage = A('Manage');
        $token = $manage::get_token($id);
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token='.$token;
        if (class_exists('\CURLFile')) {
            $field = array('fieldname' => new \CURLFile(realpath($filename)));
        } else {
            $field = array('fieldname' => '@' . realpath($filename));
        }
        $data = array();
        $data['media'] = $field['fieldname'];
        $result = new \Org\Util\curl;
        $result = $result::callWebServer($queryUrl, $data, 'POST', 1 , 0);
        return $result['url'];
    }


    public static function previewNewsByGroup($openId, $mediaId, $id){
    /**
     * 预览 - 预览图文消息
     *
     * @param $openId String 发送消息给指定用户,该用户的OpenId towxname
     * @param $mediaId String 必须通过self::uploadNews获得的多媒体资源ID
     * @return mixed array("errcode"=>0, "errmsg"=>"success","msg_id"=>34182} 正常是errcode为0
     */
    	$manage = A('Manage');
        $token = $manage::get_token($id);
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/message/mass/preview?access_token='.$token;
        $queryAction = 'POST';
        $template = array();
        $template['touser'] = $openId;
        $template['mpnews']['media_id'] = $mediaId;
        $template['msgtype'] = 'mpnews';

        $template = json_encode($template);
        $result = new \Org\Util\curl;
        return $result::callWebServer($queryUrl, $template, $queryAction);
    }

    /**
     * 根据分组进行群发 - 发送图文消息
     *
     * @param $groupId Int 要发送的分组ID 当istoall为true时 可以不填
     * @param $mediaId String 必须通过self::uploadNews获得的多媒体资源ID
     * @param $isToAll Bool 使用is_to_all为true且成功群发，会使得此次群发进入历史消息列表。
     * @param $id Int 公众号的id
     * @return mixed array("errcode"=>0, "errmsg"=>"success","msg_id"=>34182} 正常是errcode为0
     */
    public static function sentNewsByGroup($groupId='', $mediaId, $isToAll=false,$id){
        $manage = A('Manage');
        $token = $manage::get_token($id);
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token='.$token;
        $queryAction = 'POST';
        $template = array();
        $template['filter']['group_id'] = $groupId;
        $template['filter']['is_to_all'] = $isToAll;
        $template['mpnews']['media_id'] = $mediaId;
        $template['msgtype'] = 'mpnews';
        // p($template);die;
        $template = json_encode($template);
        $result = new \Org\Util\curl;
        return $result::callWebServer($queryUrl, $template, $queryAction);
    }

    /**
     * 获取素材列表
     *
     * @param $id
     * @param $type 素材的类型，图片（image）、视频（video）、语音 （voice）、图文（news）
     * @param $offset 从全部素材的该偏移位置开始返回，0表示从第一个素材 返回
     * @param $count 返回素材的数量，取值在1到20之间
     * @return mixed array
     */
    public function getMaterialList($id,$type,$offset=0,$count=20){
        $manage = A('Manage');
        $token = $manage::get_token($id);
        $queryUrl = 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token='.$token;
        $queryAction = 'POST';
        $template = array();
        $template['type'] = $type;
        $template['offset'] = $offset;
        $template['count'] = $count;
        $template = json_encode($template);
        $result = new \Org\Util\curl;
        return $result::callWebServer($queryUrl, $template, $queryAction);
    }

    /**
     * 获取素材统计数据
     */
    public function getMaterial_data($id){
        $manage = A('Manage');
        $token = $manage::get_token($id);
        $queryUrl = 'https://api.weixin.qq.com/datacube/getarticlesummary?access_token='.$token;
        // $queryUrl = 'https://api.weixin.qq.com/datacube/getarticletotal?access_token='.$token;
        $queryAction = 'POST';
        $template = array();
        $time = date('Y-m-d',strtotime("-1 day"));
        $template['begin_date'] = $template['end_date'] = $time;
        $template = json_encode($template);
        $result = new \Org\Util\curl;
        $data = $result::callWebServer($queryUrl, $template, $queryAction);
        return $data['list'];
        // p($data);die;
    }

    /**
     * 处理数据
    */
    public function handle_data(){
        $pub = M('pub_account')->where('verify_type_info=0')->select();
        
        //订阅号统计
        $this->pub_data($pub);
        
        //素材文章统计
        $this->article_data($pub);
        $this->insert_article_data();
    }
    
    //数据统计---素材文章统计
    public function insert_article_data()
    {
        //按照前一天的接口调用日期汇总统计
        $article_summary = M('article_summary');
        $article_summary ->execute("insert into wx_article_summary
                                    select t.title title,
                                    count(distinct t.id) count_id,
                                    count(t.title) count_title,
                                    sum(distinct t.care_num) care_num,
                                    sum(t.int_page_read_user) int_page_read_user,
                                    sum(t.int_page_read_count) int_page_read_count, 
                                    sum(t.ori_page_read_user) ori_page_read_user,
                                    sum(t.ori_page_read_count) ori_page_read_count,
                                    sum(t.share_user) share_user,
                                    sum(t.share_count) share_count,
                                    sum(t.add_to_fav_user) add_to_fav_user,
                                    t.ref_date ref_date
                                    from wx_article_data t where t.ref_date=date_format(current_date()-1,'%Y-%m-%d')
                                    group by t.title ;");
    }

    //数据统计---素材文章统计
    public function article_data($pub){
       // $pub = M('pub_account')->where('verify_type_info=0')->select();
        $article_data = M('article_data');
        foreach ($pub as $value) {            
            $result = $this->getarticlesummary($value['id']);
            $res = $this->getusercumulate($value['id']);//关注数
            if(!empty($result))
            {
                for($i=0;$i<count($result);$i++)  //接口日期里当天阅读的文章
                {
                    $data = array(); 
                    $data['id'] = $value['id'];
                    $condition = array(); 
                    $condition['pub_id'] = $value['id'];
                    $condition['msg_id'] = explode('_', $result[$i]['msgid'])[0];    
                    $ptime = M('material_online')->where($condition)->select();
                    
                    if(empty($ptime))
                        $data['msg_date'] = "未知日期";
                    else 
                        $data['msg_date'] = date('Y-m-d',$ptime[0]['msg_ptime']);//群发日期
                    //$data['msg_date'] = $result[$i]['msgid'];
                    $data['ref_date'] = $result[$i]['ref_date'];//接口调用日期
                    $data['care_num'] = $res['cumulate_user'];//关注数
                    $data['msgid'] = $result[$i]['msgid'];
                    $data['title'] = $result[$i]['title'];
                    $data['int_page_read_user'] = $result[$i]['int_page_read_user'];
                    $data['int_page_read_count'] = $result[$i]['int_page_read_count'];
                    $data['ori_page_read_user'] = $result[$i]['ori_page_read_user'];
                    $data['ori_page_read_count'] = $result[$i]['ori_page_read_count'];
                    $data['share_user'] = $result[$i]['share_user'];
                    $data['share_count'] = $result[$i]['share_count'];
                    $data['add_to_fav_user'] = $result[$i]['add_to_fav_user'];
                    $data['add_to_fav_count'] = $result[$i]['add_to_fav_count'];
                    $article_res = $article_data->add($data);
                }
                
            }
        }
    }
    
    //数据统计---订阅号统计
    public function pub_data($pub)
    {
        //订阅号统计
       // $pub = M('pub_account')->where('verify_type_info=0')->select();
        $user_data = M('user_data');
        foreach ($pub as $value) {            
            $res = $this->getusercumulate($value['id']);
            $result = $this->getusersummary($value['id']);
            //p($res);
            $data = array(); 
            $data['cumulate_user'] = $res['cumulate_user'];//关注数
            $data['ref_date'] = strtotime($res['ref_date']);             
            foreach ($result as $v) {
               $data['new_user'] += $v['new_user'];//新增用户
               $data['cancel_user'] += $v['cancel_user'];//取消用户
               //$data['ref_date'] = time($v['ref_date']);
            }
            $data['pub_id'] = $value['id'];
            $pub_res = $user_data->add($data);
            
            //入订阅号统计汇总表,已认证的才有接口
            if(!empty(strtotime($res['ref_date'])))
            {
                 $this->insert_pub_data($value,$res,$data);
            }

        }        
    }
    

    
    //数据统计---入订阅号统计汇总表
    public function insert_pub_data($pub,$res,$data)
    {
        $pub_data = M('pub_data');
        $group_name = M('group') ->where("type=1")->select();
        $pub_condition = array(); 
        $pub_condition['id'] = $pub['id'];
        $pub_condition['ref_date'] = date('Y-m-d',strtotime($res['ref_date'])); 
        $pub_condition['city'] = $pub['city'];
        $pub_condition['area'] = $pub['area'];
        $pub_condition['nick_name'] = $pub['nick_name'];
        foreach($group_name as $g)
        {
            if($pub['pub_group'] == $g['id'])
                $pub_condition['pub_group'] = $g['gname'];
        }
        //$pub_condition['pub_group'] = $value['pub_group'];
        $pub_condition['is_vip'] = $pub['is_vip'];
        //$pub_condition['is_certify'] = $value['verify_type_info'];
        switch($pub['verify_type_info'])
        {
            case -1:
                $pub_condition['is_certify'] = "未认证";
                break;
            case 0:
                $pub_condition['is_certify'] = "已认证";
                break;
            default:
                $pub_condition['is_certify'] = "未知";
                break;
        }
        $pub_condition['stu_num'] = $pub['school_pnum'];
        $pub_condition['care_num'] = $res['cumulate_user'];
        $pub_condition['care_rate'] = round($res['cumulate_user']/$pub['school_pnum'],4)*100;
        $pub_condition['daily_add'] = $data['new_user'];
        if($data['new_user'] == 0 || $data['new_user'] == null)
            $pub_condition['daily_add'] = 0;
        $pub_condition['daily_cancel'] = $data['cancel_user'];
        if($data['cancel_user'] == 0 || $data['cancel_user'] == null)
            $pub_condition['daily_cancel'] = 0;
        $pub_condition['daily_rate'] = round(($data['new_user']-$data['cancel_user'])/$pub['school_pnum'],4)*100;
        $pub_condition['type'] = 2;
        $pub_insert = $pub_data->add($pub_condition);     
        //return $pub_insert;
    }

    //获取用户增减数据
    public function getusersummary($id){
        $manage = A('Manage');
        $token = $manage::get_token($id);
        $queryUrl = 'https://api.weixin.qq.com/datacube/getusersummary?access_token='.$token;
        $queryAction = 'POST';
        $template = array();
        $time = date('Y-m-d',strtotime("-1 day"));
        $template['begin_date'] = $template['end_date'] = $time;
        $template = json_encode($template);
        $result = new \Org\Util\curl;
        $data = $result::callWebServer($queryUrl, $template, $queryAction);
        //p($data);die;
        return $data['list'];
       // p($data);
    }

    //获取累计用户数据
    public function getusercumulate($id){
        $manage = A('Manage');
        $token = $manage::get_token($id);
        $queryUrl = 'https://api.weixin.qq.com/datacube/getusercumulate?access_token='.$token;
        $queryAction = 'POST';
        $template = array();
        $time = date('Y-m-d',strtotime("-1 day"));
        $template['begin_date'] = $template['end_date'] = $time;
         $template = json_encode($template);
        $result = new \Org\Util\curl;
        $data = $result::callWebServer($queryUrl, $template, $queryAction);
        return $data['list'][0];
    }
    
    //获取图文群发每日数据
    public function getarticlesummary($id){
        $manage = A('Manage');
        $token = $manage::get_token($id);
        $queryUrl = 'https://api.weixin.qq.com/datacube/getarticlesummary?access_token='.$token;
        $queryAction = 'POST';
        $template = array();
        $time = date('Y-m-d',strtotime("-1 day"));
        $template['begin_date'] = $template['end_date'] = $time;
         $template = json_encode($template);
        $result = new \Org\Util\curl;
        $data = $result::callWebServer($queryUrl, $template, $queryAction);
        return $data['list'];
    }
    
    
}