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
    .header .header-left{ float:left; width:60%; margin:5px 5px; padding: 0;}  
	.header .header-left button{ width:120px; height:30px; line-height:30px; background-color:#5ea60f; color:#fff;}
    .header .header-right{ margin: 5px 0px; padding: 0; position: absolute; left: 450px; top:0px;}
	.header-right2{float:left; line-height:40px;}
	.header-right2 input{ width:200px; height:30px; line-height:30px; background-color:#5ea60f; color:#fff;}
    .header .header-left select{width: 100px; height: 30px; }
    .header .header-left input.inp{border: 1px solid #dddddd; height:26px; width: 200px; }
    .header-left .add{ width: 120px; height: 30px;  background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';cursor:pointer;}
    .fenzu{ width: 120px; height: 30px;  background: #5ea60f; border: none; color: #fff; font: 14px bold '微软雅黑 Bold', '微软雅黑';cursor:pointer;}
	.biaoge{background:#eee; margin:10px auto; padding:5px;}
	.biaoge select{width: 75px; height: 30px; }
	.biaoge button{ width:120px; height:30px; line-height:30px; background-color:#5ea60f; color:#fff;}

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
        <li><a href="/backup/wxtest/Home/DataStatistics/index">总表</a></li>
        <li class="current"><a href="#">订阅号统计</a></li>
        <li><a href="/backup/wxtest/Home/DataStatistics/article_index">文章阅读统计</a></li>
    </ul><!--tabbtn end-->

    <div class="biaoge">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>时间查询</td>
        <td>订阅号模糊查询</td>
        <td>城市</td>
        <td>区县</td>
        <td>学校组别</td>
        <td>等级</td>
        <td>是否认证</td>
        <td>学生数</td>
        <td>关注数</td>
        <td>&nbsp;</td>
        <td>导入Excel表</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
          <!--
        <td width="80"><span class="header-left">时间查询：</span></td>
          -->
        <td width="130"><span class="header-left">
               <!--
               <input name="sj" type="text"  value='<?php echo ($shi); ?>' placeholder="<?php echo date('Y-m-d');?>" onClick="WdatePicker()"  id="date" style="width: 120px; text-align: center;"/>   
               -->
               <input id='pub_date' name="pub_date" 
			   class="Wdate"  style="width: 120px; text-align: center;"
			   type="text" value="<?php echo date('Y-m-d'); ?>" onClick="WdatePicker()"> 
		</span></td>
		<td width="180"><span class="header-left">
            <input id="pub_name" name="pub_name" class="inp" type="text"  placeholder="订阅号名称">
		</span></td>
        <td width="100"><span class="header-left">
            <select id="city" name="city">
                <option selected value="0">全部</option>
                <?php if(is_array($city)): foreach($city as $key=>$vo): ?><option value="<?php echo ($vo["city"]); ?>"><?php echo ($vo["city"]); ?></option><?php endforeach; endif; ?>   
            </select>
		</span></td>
        <td width="100"><span class="header-left">
            <select id="area" name="area">
                <option selected value="0">全部</option>
            </select>
		</span></td>
        <td width="100"><span class="header-left">
            <select id='group' name="group">
                <option selected value="0">全部</option>
               <?php if(is_array($pubGroupId)): foreach($pubGroupId as $key=>$vo): ?><option value="<?php echo ($vo["gname"]); ?>"><?php echo ($vo["gname"]); ?></option><?php endforeach; endif; ?>
           </select>
		</span></td>
        <td width="100"><span class="header-left">
            <select id='is_vip' name="is_vip">
                <option selected value="0">全部</option>
                <option value="A">重点</option>
                <option value="B">普通</option>
                <option value="C">垃圾</option>
           </select>
        </span></td>
        <td width="100"><span class="header-left">
            <select id='is_certify' name="is_certify">
                <option selected value="0">全部</option>
                <option value="已认证">已认证</option>
                <option value="未认证">未认证</option>
           </select>
         </span></td>
        <td width="100"><span class="header-left">
		           <!--学生数-->
            <select id='stu_num' name="stu_num">
                <option selected value="0">全部</option>
                <option value="0-500">0-500</option>
                <option value="500-1000">500-1000</option>
                <option value="1000-2000">1000-2000</option>
                <option value="2000-5000">2000-5000</option>
                <option value="5000-10000">5000-10000</option>
           </select>
        </span></td>
        <td width="100"><span class="header-left">
		            <!--关注数-->
            <select id='care_num' name="care_num">
                <option selected value="0">全部</option>
                <option value="0-100">0-100</option>
                <option value="100-500">100-500</option>
                <option value="500-1000">500-1000</option>
                <option value="1000-2000">1000-2000</option>
                <option value="2000-3000">2000-3000</option>
                <option value="3000-5000">3000-5000</option>
                <option value="5000-10000">5000-10000</option>
           </select>
        </span></td>            
            <td width="200"><button class="select" type="button" onClick="selectData()">查询</button></td>
            <!--
                <input type="hidden" name="table" value="tablename"/> 
                <input onChange="imgUrl()" id="put1" class="put1" type="file" name="import"/>      
          <button   class="select1" type="button">导入CSV</button>
            <a onClick="daoChu(this)" href="#" ><button class="select2" type="button">导出CSV</button></a>      
            -->

        <td>
            <div class="header-right2">
                <form method="post" action='<?php echo U("excelImport");?>' enctype="multipart/form-data">
                    <!--
                    <strong>导入Excel表：</strong>
                    -->
                    <input style="background:none;" type="file" name="file_stu" />
                    <input style="width:100px;" type="submit"  value="导入" />
                </form>
            </div>
        </td>
      </tr>
    </table>
    </div>
    <div class="tabcon" id="fadecon">   
        <div class="sublist" id="sub2">
            <ul>
                <div id="u40" class="text-title">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
                        <tbody id='yuedu'>                  
                            <tr>
                                <td width='100' height="30" align="center" valign="middle"><strong>日期</strong></td>
                                <td width='40' height="30" align="center" valign="middle"><strong>地区</strong></td>
                                <td width='100' height="30" align="center" valign="middle"><strong>公众号</strong></td>
                                <td width='50' height="30" align="center" valign="middle"><strong>学校组别</strong></td>
                                <td width='40' height="30" align="center" valign="middle"><strong>等级</strong></td>
                                <td width='40' height="30" align="center" valign="middle"><strong>认证</strong></td>
                                <td width='40' height="30" align="center" valign="middle"><strong>学生数</strong></td>
                                <td width='40' height="30" align="center" valign="middle"><strong>关注数</strong></td>
                                <td width='40' height="30" align="center" valign="middle"><strong>关注率</strong></td>
                                <td width='40' height="30" align="center" valign="middle"><strong>新增</strong></td>
                                <td width='40' height="30" align="center" valign="middle"><strong>取消</strong></td>
                                <td width='40' height="30" align="center" valign="middle"><strong>日增%</strong></td>
                            </tr>
                            <?php if(is_array($result)): foreach($result as $key=>$vo): ?><tr>
                                    <td width='100' height="30" align="center" valign="middle"><strong><?php echo ($vo["ref_date"]); ?></strong></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($vo["city"]); ?>-<?php echo ($vo["area"]); ?></td>
                                    <td width='100' align="center" valign="middle"><?php echo ($vo["nick_name"]); ?></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($vo["pub_group"]); ?></td>
                                    <td width='50' align="center" valign="middle">
                                        <?php switch($vo["is_vip"]): case "A": ?>重点<?php break;?>    
                                            <?php case "B": ?>普通<?php break;?>    
                                            <?php default: ?>垃圾<?php endswitch;?>
                                    </td>
                                    <td width='50' align="center" valign="middle"><?php echo ($vo["is_certify"]); ?></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($vo["stu_num"]); ?></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($vo["care_num"]); ?></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($vo["care_rate"]); ?>&#37;</td>
                                    <td width='50' align="center" valign="middle"><?php echo ($vo["daily_add"]); ?></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($vo["daily_cancel"]); ?></td>
                                    <td width='50' align="center" valign="middle"><?php echo ($vo["daily_rate"]); ?>&#37;</td>
                                </tr><?php endforeach; endif; ?>
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
<script src="/backup/wxtest/./Application/Home/View/Public/js/jquery1.42.min.js"></script>
<script src="/backup/wxtest/./Application/Home/View/Public/js/jquery.tabso_yeso.js"></script>
<script src="/backup/wxtest/./Application/Home/View/Public/js/ajaxfileupload.js"></script>
<script src="/backup/wxtest/./Application/Home/View/Public/My97DatePicker/WdatePicker.js"></script>

<script>
    
        function selectData(id)
       {
           //时间
           var pub_date = $('#pub_date').val();
           //订阅号名称
           var pub_name = encodeURI($('#pub_name').val());//最后一个传
            if(pub_name == ""||pub_name == null)
               pub_name = 'pub_name';
           //城市区县
            var city= encodeURI($("[name=city]").val());
            var area= encodeURI($("[name=area]").val());
           //学校组别
           var group= encodeURI($("[name=group]").val());
           //等级
           var vip= encodeURI($("[name=is_vip]").val());
           //认证
           var certify= encodeURI($("[name=is_certify]").val());
           //学生数
           var stu_num= encodeURI($("[name=stu_num]").val());
           //关注数
           var care_num= encodeURI($("[name=care_num]").val());
           

            $.get("/backup/wxtest/Home/DataStatistics/pub_query_index/pub_date/"+pub_date+"/city/"+city
                                            +"/area/"+area+"/group/"+group+"/vip/"+vip+"/certify/"+certify
                                            +"/stu_num/"+stu_num+"/care_num/"+care_num+"/pub_name/"+pub_name, null, function(html)
            {
                $("#u40").empty().html(html);
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