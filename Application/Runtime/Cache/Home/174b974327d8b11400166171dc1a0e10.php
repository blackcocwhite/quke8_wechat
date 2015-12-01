<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/Application/Home/View/Public/css/main.css" type="text/css" rel="stylesheet">
</head>
<style type="text/css">
    *{margin:0;padding:0;list-style-type:none;}
    a,img{border:0;}
    body{ margin:0 20px;font:14px/180% '微软雅黑 Bold', '微软雅黑';}
    a{
        color:#060;
        text-decoration:none;
    }
    a:hover{
        color:#F30;
        text-decoration:none;
    }
    .header{ width: 100%; height: 40px; background: #E4E4E4; border: 1px solid #dddddd; position: relative; font-size: 14px; margin-top: 10px; margin-bottom: 10px;}
    .header .header-left{ margin:5px 5px; padding: 0;}  
    .header .header-right{ margin: 5px 0px; padding: 0; position: absolute; left: 450px; top:0px;}
    .header .header-left select{width: 75px; height: 30px; }
    .header .header-left input.inp{border: 1px solid #dddddd; height:26px; width: 200px; }
    .header-left .add{ width: 120px; height: 30px;  background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';cursor:pointer;}
    .fenzu{ width: 120px; height: 30px;  background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';cursor:pointer;}

    /* tabbtn */
    .tabbtn{height:35px;}
    .tabbtn li{float:left;position:relative;margin:0; top: 2px; border-left:#eee 1px solid; border-right:#eee 1px solid; border-top:#eee 1px solid;}
    .tabbtn li a{display:block;float:left;height:33px;line-height:33px;overflow:hidden;width:120px;text-align:center;font-size:14px;cursor:pointer;}
    .tabbtn li.current a{height:33px;line-height:33px;background:#5ea60f;color:#fff;font-weight:800;}
    /* tabcon */
    .tabcon{border:1px #ddd solid;position:relative;/*必要元素*/height:auto;overflow:hidden; width: 100%; height:auto;}
    .tabcon .subbox{position:absolute;/*必要元素*/left:0;top:0;}
    .tabcon .sublist{padding:5px 10px;height:auto;}
    /*表格颜色*/
    .tdcolor{background: #f4f4f4;}
    .page{margin-top:20px; position: absolute; left: 380px;}
    .page ul li{float: left; display: block; width: 40px;}
    .put1{
	
    	opacity:0;filter:alpha(opacity=0);
    	position: absolute; 
    	right:456px;
    	top:8px;
    	width:95px;
    	height:20px;
    	z-index:9;
    	
    }
     .header .header-left  button.select1{position:absolute; right:450px;top:5px;  width: 100px; height: 30px;   background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';}  
    .header .header-left  button.select2{ position:absolute; right:330px;top:5px;width: 100px; height: 30px;   background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';}  
	.text-title td{ padding:0 10px;}
    
</style>
<body>
<div id='fat'>
<!-- <form action="" method="post"> -->
    <ul class="tabbtn" id="fadetab">
        <li><a href="/Home/DataStatistics/index">总表</a></li>
        <li><a href="/Home/DataStatistics/pub_index">订阅号统计</a></li>
        <li class="current"><a href="#">文章阅读统计</a></li>
    </ul><!--tabbtn end-->

    <div class="header">
        <div class="header-left">
               时间查询： <input name="sj" type="text"  value='<?php echo ($shi); ?>' placeholder="<?php echo date('Y-m-d');?>"
                onClick="WdatePicker()"  id="date" style="width: 120px; text-align: center;"/>   
            <input id="gz" name="gz" class="inp" type="text" value='<?php echo ($atName); ?>' placeholder="请输入文章标题">
            <button class="select" type="button" onClick="selectData()">查询</button>
                <input type="hidden" name="table" value="tablename"/> 
                <input onChange="imgUrl()" id="put1" class="put1" type="file" name="import"/>      
          <button   class="select1" type="button">导入CSV</button>
            <a onClick="daoChu(this)" href="#" ><button class="select2" type="button">导出CSV</button></a>
        </div>
    </div>
    <div class="tabcon" id="fadecon">   
        <div class="sublist" id="sub2">
            <ul>
                <div id="u40" class="text-title">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
                        <tbody id='yuedu'>                  
                            <tr>
                                <td width='40' height="30" align="center" valign="middle"><strong>文章标题</strong></td>
                                <td width='60' height="30" align="center" valign="middle"><strong>应用订阅号数量</strong></td>
                                <td  width='60' height="30" align="center" valign="middle"><strong>送达人数</strong></td>
                                <td  width='60' height="30" align="center" valign="middle"><strong>图文页阅读人数</strong></td>
                                <td width='60' height="30" align="center" valign="middle"><strong>原文页阅读人数</strong></td>
                                <td width='60' height="30" align="center" valign="middle"><strong>分享转发人数</strong></td>
                                <td  width='60' height="30" align="center" valign="middle"><strong>微信收藏人数</strong></td>
                            </tr>
                            <?php if(is_array($rinfo)): $i = 0; $__LIST__ = $rinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><tr>
                                    <td width='120' height="30" align="center" valign="middle"><strong><?php echo ($m["articlname"]); ?></strong></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($m["appsubnub"]); ?></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($m["sernub"]); ?></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($m["newsnub"]); ?></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($m["pagenub"]); ?></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($m["shareforwnub"]); ?></td>
                                   <td width='50' align="center" valign="middle"><?php echo ($m["micchannub"]); ?></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr>
                                <td id='lo' style="border:0;" colspan="7" align="center" valign="middle"><?php echo ($show); ?></td>
                            </tr>                  
                        </tbody>
                    </table>
                </div>
            </ul>
        </div>
    </div>
<!-- </form> -->
<p id="p2"></p>
</div>
<script src="/Application/Home/View/Public/js/jquery1.42.min.js"></script>
<script src="/Application/Home/View/Public/js/jquery.tabso_yeso.js"></script>
<script src="/Application/Home/View/Public/js/ajaxfileupload.js"></script>
<script src="/Application/Home/View/Public/My97DatePicker/WdatePicker.js"></script>

<script>
   
        function indexTwo(id){    //user函数名 一定要和action中的第三个参数一致上面有
            var id = id;         
               $.get('/Home/DataStatistics/indexTwo', {'p':id,'sj':$('#date').val(),'gz':$('#gz').val()}, function(data){  //用get方法发送信息到UserAction中的user方法
                $("#fat").replaceWith("<div  id='fat'>"+data+"</div>"); //user一定要和tpl中的一致
           });
        }
    
        function imgUrl()
        {	
             $.ajaxFileUpload({    	   	
                 url:'/Home/DataStatistics/impUser', 
                 type:"post",
                 secureuri:false,
                 fileElementId:'put1',
                 dataType: 'text',
                 success: function (data)
                 {
                    window.location.href="/Home/DataStatistics/indexTwo";
                 }
            }); 

        }
        function daoChu(dao)
        {
             var time=$("#date").val();
             var city=$("#city").val();
             var area=$('#area').val();
             var gz=$('#gz').val();

            if(time=='')
            {
                time=1;   			       			   
            }
            if(gz=='')
            {    			
                gz=1;
            }

            dao.href="/Home/DataStatistics/index/csv/1/tm/"+time+"/gz/"+gz; 		    		   		
        }
    

        function selectData(id)
       {	
           $.ajax({
           type: "GET",
           url: "/Home/DataStatistics/indexTwo",
           data : {'sj':$('#date').val(),'gz':$('#gz').val()},
           dataType: "html",
           success: function(data){			        	
              $("#fat").replaceWith("<div  id='fat'>"+data+"</div>"); //user一定要和tpl中的一致
           }
           }); 

        }  
 
        //地市区县关联   
        $('#city').click(function(){
                   $(this).change(function(){
                       var city = encodeURI($("[name=city]").val());
                       $.ajax({
                           url:'/Home/DataStatistics/pub_area_info/city/'+city,
                           dataType:'json',
                           success:function(data){
                               $("#area").empty();
                               var count = data.length;
                               var i = 0;
                               var b="<option selected value='0'>全部</option>";
                                  for(i=0;i<count;i++){
                                      b+="<option value='"+data[i].area+"'>"+data[i].area+"</option>";
                                  }
                               $("#area").append(b);
                           }
                       });
                      });
               }
           );    
    
 
</script>
</body>
</html>