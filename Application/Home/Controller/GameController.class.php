<?php
namespace Home\Controller;
use Think\Controller;
class GameController extends Controller{
    public function index(){
        $openid = session('openid');   
        $db_user = M('game_user');
        $condition_u['openid'] = $openid;
        $userid = $db_user->where($condition_u)->getField('id');
        $condition_user['id'] = $userid;
        $gameshare = $db_user->where($condition_user)->getField('gameshare');
        //0 答题次数用完，1 题库答完，2正常答题
        
        if($gameshare > 0)
        {
            $db_bank = M('question_bank');
            $db_record = M('question_record');

            $condition_record['userid'] =  $userid;
            $max_user_id = $db_record->where($condition_record)->max('questionid');
            $max_question_id = $db_bank->max('id');    
            
            if($max_user_id < $max_question_id)
                $this->type = 2;//正常答题
            else
                $this->type = 1;//题库答完
            
        }  else 
            $this->type = 0;//答题次数用完
        
         $this->display();
    }

    public function endGame()
    {
        //打败了多少人，总人数减去当前排名/总人数
        //总共答了多少题，总分
        //琅琊榜排名
        $openid = session('openid');   
        $db_user = M('game_user');
        $condition_u['openid'] = $openid;
        $userid = $db_user->where($condition_u)->getField('id');
        $db_record = M('question_record');

        $db_bank = M('question_bank');

        $condition_record['userid'] =  $userid;
        $max_user_id = $db_record->where($condition_record)->max('questionid');
        $max_question_id = $db_bank->max('id');    

        if($max_user_id < $max_question_id)
        {
            $condition_user['id'] = $userid;
            $this->gameshare = $db_user->where($condition_user)->getField('gameshare');            
        }
        else
            $this->gameshare = 0;     
        
        /*
        $sql = "select t.nickname,
                    t.headimgurl,
                    a.userid,
                    a.num*10 point,
                    (select count(1)+1 from (select userid,count(rigntorwrong) num from wx_question_record where rigntorwrong =1  group by userid ) t1 where  t1.num> a.num) place
                     from 
									(select userid, count(rigntorwrong) num from wx_question_record where rigntorwrong =1  group by userid ) a,
									wx_game_user t
                    where a.userid = t.id	
                     order by place,point desc;";
        */
        
        $sql = "select (@rowNO := @rowNo+1) AS rowno,nickname,headimgurl,userid,point,place from 
                    (select  t2.nickname,t2.headimgurl headimgurl,t1.userid userid,t1.num*10 point,
                    (select count(1)+1 from (select userid,count(rigntorwrong) num from wx_question_record where rigntorwrong =1  group by userid ) t3 where  t3.num> t1.num) place
                    from (select userid, count(rigntorwrong) num from wx_question_record where rigntorwrong =1  group by userid order by num desc) t1,
                    wx_game_user t2
                    where  t1.userid = t2.id order by point desc) t,(select @rowNO :=0) b ;";        
        
        
        $result = $db_user->query($sql);
        foreach($result as $k)
        {
            if($k[userid]==$userid)
            {
                $this->point = $k[point];//总分
                $this->place = $k[place];//排名
            }
        } 
        $place = $this->place;
        if($this->place == "" || $this->place == null)
            $place = 34;
        $top_point_num = $db_record->where('userid<>0')->count('distinct userid');

        $this->propor =round(($top_point_num-$this->place)/$top_point_num,2)*100;//打败
        if($this->point == "" || $this->point == null)
        {
            $this->propor = 0;
            $this->point = 0;
        }
        
        $this->count_num = $db_record->where('userid='.$userid)->count();//总共答了多少题
        
        $db_role = M('game_role');
        $role_result = $db_role->where('type=1')->select();
  
        foreach($role_result as $k)
        {
            /*
            if($place <34 )
            {
                if($k[rank] < 34)
                {
                    if($this->place==$k[rank])
                    {
                        $this->rank = $k[rank];
                        $this->comment = $k[comment];
                        $this->comment2 = $k[comment2];
                        $this->role = $k[role];
                        $this->roleanaly = $k[roleanaly];
                        $this->image = $k[image];
                    }                
                }                
            }  else {
                if($k[rank] == 34)
                {
                    $this->rank = '';
                    $this->comment = '很遗憾，你还未登上琅琊榜';
                    $this->comment2 = '继续努力';
                    $this->role = '';
                    $this->roleanaly = '争取早日上榜！';  
                    $this->image = '34role.png';
                }                
            }
            */
            if($this->point >= $k[minpoint] && $this->point < $k[maxpoint])
            {
                $this->rank = $k[rank];
                $this->comment = $k[comment];
                $this->comment2 = $k[comment2];
                $this->role = $k[role];
                $this->roleanaly = $k[roleanaly];
                $this->image = $k[image];                
            }else if($this->point >= 0 && $this->point < 150)
            {
                $this->rank = '';
                $this->comment = '很遗憾，你还未登上琅琊榜';
                $this->comment2 = '继续努力';
                $this->role = '';
                $this->roleanaly = '争取早日上榜！';  
                $this->image = '34role.png';                
            }
            

        }         
        
         $this->display();
    }
    
    public function dati()
    {
        $openid = session('openid');   
        $db_user = M('game_user');
        $condition_u['openid'] = $openid;
        $userid = $db_user->where($condition_u)->getField('id');
        $condition_user['id'] = $userid;
        
        $db_record = M('question_record');
        $condition_point['userid'] = $userid;
        $condition_point['rigntorwrong'] = 1;
        $point = $db_record->where($condition_point)->count();      
        $this->point_count = $point*10;

        $gameshare = $db_user->where($condition_user)->getField('gameshare');

        
        
        if($gameshare > 0)
        {
            //取得这个用户最大值
            $db_bank = M('question_bank');


            $condition_record['userid'] =  $userid;
            $max_user_id = $db_record->where($condition_record)->max('questionid');
           // $max_user_id = $db_record->query('select max(questionid) questionid from wx_question_record where userid='.$userid);
            $max_question_id = $db_bank->max('id');
            //$questionid = $_GET['questionid'];      
            //如果$max_user_id不是最大值

            //p($max_user_id[0]['questionid']);

            if($max_user_id < $max_question_id)
            {
                $condition['id'] = intval($max_user_id) + 1; 
                //p($condition['id']);

                $this->result = $db_bank->where($condition)->select();
                $this->result = $this->result[0];
                $this->userid = $userid;                   
            }  else {
              //已答完题目  ，不用管
            }
          
        }  else {
            //告知次数已用完，不用管
        }
        $this->gameshare = $gameshare ;
        $this->max_question_id = $max_question_id;

        $this->display();
    }
    
    
    
    
    public function ajaxDati()
    {
        $db_bank = M('question_bank');
        $db_record = M('question_record');
        $result = array();
        $userid = I('userid');
        $questionid = I('questionid');
        $selectid = I('selectid');
        /*
        $condition_point['userid'] = $userid;
        $condition_point['rigntorwrong'] = 1;
        $point = $db_record->where($condition_point)->count();      
        $this->point_count = $point*10;
        */
        $db_user = M('game_user');
        $condition_user['id'] = $userid;

        $gameshare = $db_user->where($condition_user)->getField('gameshare');
        if($gameshare > 0)
        {
            if($selectid==1)
            {
                //回答正确，要判断题库答完问题
                $data['userid'] = $userid;
                $data['questionid'] = $questionid;
                $data['rigntorwrong'] = $selectid;
                $data['opera_time'] = time();
                $db_record->data($data)->add();

                $condition['id'] = intval($questionid) + 1;      

                $condition_record['userid'] =  $userid;
                $max_user_id = $db_record->where($condition_record)->max('questionid');
                $max_question_id = $db_bank->max('id');            
                if($max_user_id < $max_question_id)
                {
                    $result = $db_bank->where($condition)->select();

                    $condition_point['userid'] = $userid;
                    $condition_point['rigntorwrong'] = 1;
                    $point = $db_record->where($condition_point)->count();      
                    $point_count = $point*10;                

                    //array_push($result[0],'point_count',$point_count);
                    $result[0]['point_count'] = $point_count;


                    $this->ajaxReturn($result);  
                }  else {
                   // 题答完
                    $arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
                    $this->ajaxReturn($arr);                 
                }


            }else
            {
                //回答错误
               //判断剩余可答题次数
                $data['userid'] = $userid;
                $data['questionid'] = $questionid;
                $data['rigntorwrong'] = $selectid;
                //$data['opera_time'] = time();
                $db_record->data($data)->add();

                if($gameshare > 0)
                {            
                    $data_user['gameshare'] = intval($gameshare) -1 ;            
                    $db_user->where($condition_user)->data($data_user)->save();
                    $condition['id'] = intval($questionid) + 1;         

                    $result = $db_bank->where($condition)->select();

                    $condition_point['userid'] = $userid;
                    $condition_point['rigntorwrong'] = 1;
                    $point = $db_record->where($condition_point)->count();      
                    $point_count = $point*10;                

                    //array_push($result[0],'point_count',$point_count);   
                    $result[0]['point_count'] = $point_count;

                    $this->ajaxReturn($result);     
                    //返回下一题
                }else
                {
                    //告知次数已用完
                    $arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
                    $this->ajaxReturn($arr); 
                }

            }

            
        }else
        {
            //告知次数已用完
            $arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);
            $this->ajaxReturn($arr);             
        }

    
    }
    
    public function rankList()
    {
        $openid = session('openid');   
        $db_user = M('game_user');
        $condition_u['openid'] = $openid;
        $userid = $db_user->where($condition_u)->getField('id');
        
        /*
        $sql = "select t.nickname,
                    t.headimgurl,
                    a.userid,
                    a.num*10 point,
                    (select count(1)+1 from (select userid,count(rigntorwrong) num from wx_question_record where rigntorwrong =1  group by userid ) t1 where  t1.num> a.num) place
                     from 
									(select userid, count(rigntorwrong) num from wx_question_record where rigntorwrong =1  group by userid ) a,
									wx_game_user t
                    where a.userid = t.id	
                     order by place,point desc;";
        
        */
        $sql = "select (@rowNO := @rowNo+1) AS rowno,nickname,headimgurl,userid,point,place from 
                    (select  t2.nickname,t2.headimgurl headimgurl,t1.userid userid,t1.num*10 point,
                    (select count(1)+1 from (select userid,count(rigntorwrong) num from wx_question_record where rigntorwrong =1  group by userid ) t3 where  t3.num> t1.num) place
                    from (select userid, count(rigntorwrong) num from wx_question_record where rigntorwrong =1  group by userid order by num desc) t1,
                    wx_game_user t2
                    where  t1.userid = t2.id order by point desc) t,(select @rowNO :=0) b ;";
        
        
        $result = $db_user->query($sql);
        foreach($result as $k)
        {
            if($k[userid]==$userid)
            {
                $this->point = $k[point];
                $this->place = $k[place];
            }
        }
        
        $this->result = $result;
        $this ->display();
    }
    
    public function cron_index()
    {
        $db = M('game_user');
        $data['gameshare'] = 5;
        $result = $db->where('gameshare < 5')->save($data);
    }
    
    
}