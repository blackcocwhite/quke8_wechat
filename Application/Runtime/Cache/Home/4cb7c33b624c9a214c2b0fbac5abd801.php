<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/backup/wxtest/./Application/Home/View/Public/css/main.css" type="text/css" rel="stylesheet">
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
<div id="fat">
    <ul class="tabbtn" id="fadetab">
        <li class="current"><a href="#">订阅号统计</a></li>
        <li><a href="/backup/wxtest/Home/DataStatistics/indexTwo">素材阅读统计</a></li>
    </ul><!--tabbtn end-->

    <div class="header">
        <div class="header-left">
            <input name="sj" type="text" value="<?php echo ($shi); ?>"  onClick="WdatePicker()"  id="date" style="width: 120px; text-align: center;" placeholder="<?php echo date('Y-m-d'); ?>">
            <select id="city" name="city"> 
                <option value="">全部</option>      
                <?php if(is_array($city)): foreach($city as $key=>$vo): if($cs == $vo['city']): ?><option selected='selected' value="<?php echo ($vo["city"]); ?>"><?php echo ($vo["city"]); ?></option>
                <?php else: ?>            
                <option value="<?php echo ($vo["city"]); ?>"><?php echo ($vo["city"]); ?></option><?php endif; endforeach; endif; ?>   
            </select>
            <select id="area" name="area">
                <?php if(strlen($qu) > 0): ?><option selected value=""><?php echo ($qu); ?></option>
                  <?php else: ?> 
                  <option selected value="">全部</option><?php endif; ?>       
            </select>
            <input id="gz" name="gz" class="inp" value="<?php echo ($atName); ?>" type="text" placeholder="请输入公众号名称">
            <button class="select" type="button" onClick="selectData()">查询</button>
            <input type="hidden" name="table" value="tablename"/> 
            <input onChange="imgUrl()" id="put1" class="put1" type="file" name="import"/>      
            <button   class="select1" type="button">导入CSV</button>
            <a onClick="daoChu(this)" href="#" ><button class="select2" type="button">导出CSV</button></a>
        </div>
    </div>
    <div class="tabcon" id="fadecon">
        <div class="sublist" id="sub1">
            <ul>
                <div id="u40" class="text-title">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
                        <tbody >                  
                        <tr id='head'>
                            <td height="30" align="center" valign="middle"><strong>公众号名称</strong></td>
                            <td height="30" colspan="2" align="center" valign="middle"><strong>地区</strong></td>
                            <td height="30" align="center" valign="middle"><strong>学生数</strong></td>
                            <td height="30" align="center" valign="middle"><strong>关注数</strong></td>
                            <td height="30" align="center" valign="middle"><strong>关注率</strong></td>
                            <td height="30" align="center" valign="middle"><strong>日新增</strong></td>
                            <td height="30" align="center" valign="middle"><strong>取消</strong></td>
                            <td height="30" align="center" valign="middle"><strong>净增</strong></td>
                            <td height="30" align="center" valign="middle"><strong>日净增(%)</strong></td>
                            <td height="30" align="center" valign="middle"><strong>周净增(%)</strong></td>
                            <td height="30" align="center" valign="middle"><strong>月净增(%)</strong></td>
                          </tr>
                       <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>					
                            <td width="180" height="30" align="center" valign="middle"><strong><?php echo ($v["pubname"]); ?></strong></td>
                            <td width="30" align="center" valign="middle"><?php echo (strstr($v["district"],' ',true)); ?>市</td>
                            <td width="30" align="center" valign="middle"><?php echo (strstr($v["district"],' ')); ?></td>
                            <td width="70" align="center" valign="middle"><?php echo ($v["sudnumber"]); ?></td>
                            <td width="50" align="center" valign="middle"><?php echo ($v["sernumber"]); ?></td>                     
                            <td width="50" align="center" valign="middle"><?php echo ($v["netgrowth"]); ?></td>
                            <td width="50" align="center" valign="middle"><?php echo ($v["newday"]); ?></td>
                            <td width="50" align="center" valign="middle"><?php echo ($v["remove"]); ?></td>
                            <td width="50" align="center" valign="middle"><?php echo ($v["netgrowth"]); ?></td>
                            <td width="50" align="center" valign="middle"><?php echo ($v["onthenet"]); ?></td>
                            <td width="50" align="center" valign="middle"><?php echo ($v["weeknum"]); ?></td>
                            <td width="50" align="center" valign="middle"><?php echo ($v["mothnum"]); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <tr>
                            <td style="border:0;" colspan="12" align="center" valign="middle"><?php echo ($show); ?></td>
                        </tr>
                        </tbody>
                    </table> 
                </div>
            </ul>
        </div>
    </div>

<p id="p2"></p>
</div>
<script src="/backup/wxtest/./Application/Home/View/Public/js/jquery1.42.min.js"></script>
<script src="/backup/wxtest/./Application/Home/View/Public/js/jquery.tabso_yeso.js"></script>
<script src="/backup/wxtest/./Application/Home/View/Public/js/ajaxfileupload.js"></script>
<script src="/backup/wxtest/./Application/Home/View/Public/My97DatePicker/WdatePicker.js"></script>

<script>
    
        function index(id){    //user函数名 一定要和action中的第三个参数一致上面有
            var id = id;         
               $.get('/backup/wxtest/Home/DataStatistics/index', {'p':id,'sj':$('#date').val(),'shi':$("#city").val(),'qu':$('#area').val(),'gz':$('#gz').val()}, function(data){  //用get方法发送信息到UserAction中的user方法
                $("#fat").replaceWith("<div  id='fat'>"+data+"</div>"); //user一定要和tpl中的一致
           });
        }

        //导入
        function imgUrl()
        {	
             $.ajaxFileUpload({    	   	
                 url:'/backup/wxtest/Home/DataStatistics/impUser', 
                 type:"post",
                 secureuri:false,
                 fileElementId:'put1',
                 dataType: 'text',
                 success: function (data)
                 {
                    window.location.href="/backup/wxtest/Home/DataStatistics/index";
                 }
            }); 

        }
    
         //导出
        function daoChu(dao)
        {
             var time=$("#date").val();
             var city=$("#city").val();
             var area=$('#area').val();
             var gz=$('#gz').val();

            if(time=='')
            {
                time=1;   			       			   
            };
            if(city=='')
            {    			
                city=1;
            };
            if(area==0||area=='')
            {
                area=1;

            }
            if(gz=='')
            {    			
                gz=1;
            };

            dao.href="/backup/wxtest/Home/DataStatistics/index/csv/1/tm/"+time+"/city/"+city+"/area/"+area+"/gz/"+gz; 


        }
    
        //订阅号统计查询按钮
         function selectData()
        {		 					 	
            $.ajax({
            type: "GET",
            url: "/backup/wxtest/Home/DataStatistics/index",
            data : {'sj':$('#date').val(),'shi':$("#city").val(),'qu':$('#area').val(),'gz':$('#gz').val()},
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
                           url:'/backup/wxtest/Home/DataStatistics/pub_area_info/city/'+city,
                           dataType:'json',
                           success:function(data){
                               $("#area").empty();
                               var count = data.length;

                                var b="<option selected value='0'>全部</option>";

                                  for(var i=0;i<count;i++){
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