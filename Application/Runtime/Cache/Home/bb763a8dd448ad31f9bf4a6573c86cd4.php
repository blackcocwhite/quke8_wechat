<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/./Application/Home/View/Public/css/main.css" type="text/css" rel="stylesheet">
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

    /* tabbtn */
	.edit-margin { width:60%; margin:20px auto;}
	.wx-gongzonghao { margin:10px auto;}
	.wx-gongzonghao button{ float:right;width:90px; height:90px; line-height:90px; text-align:center; margin-left:20px; background:#f60;}
	.wx-gongzonghao input{ width:300px; height:32px; border:1px #bbb solid; padding-left:10px;}
	.wx-gongzonghao select{ width:155px; height:32px; border:1px #bbb solid; padding-left:10px;}
	.dyh{ text-align:center; margin:0 auto;}
	.dyh input{ margin-right:3px; margin-left:10px;}
	.wx-button input{ width:100px; height:35px; line-height:30px; background:#f60; color:white;text-align:center; font-size:14px;}
</style>
<body>
<form action="<?php echo U('com_info');?>" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
                    <tbody>
                        <div class="wx-gongzonghao" hidden="true"><input type="text" name="pub_id" value='<?php echo ($id); ?>'></div>
                    <tr class="tdcolor">
                        <td width="150" height="30" valign="middle"><h3 style=" color:red; font-size:18px; font-weight:bold;">编辑微信公众号</h3></td>
                    </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle">
                            <div class="dyh">
                                <?php if($result['service_type_info'] == 2): ?><input type="radio"  id="radio2" value="2" checked="checked" /> 服务号
                                    <?php else: ?>
                                    <input type="radio"  id="radio" value="0" checked="checked" disabled="disabled"/> 订阅号<?php endif; ?>
                                <?php if($result["verify_type_info"] == -1): ?><input type="radio" id="radio3" value="-1" checked="checked"/> 未认证
                                    <?php else: ?>
                                    <input type="radio"  id="radio4" value="0" checked="checked"/> 已认证<?php endif; ?>
                            </div>
                        </td>
                      </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle"><div class="wx-gongzonghao"><input type="text" value="<?php echo ($result['nick_name']); ?>" disabled="disabled"></div></td>
                    </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle"><div class="wx-gongzonghao"><input type="text" value="<?php echo ($result['user_name']); ?>" disabled="disabled"></div></td>
                    </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle"><div class="wx-gongzonghao"><input type="text" placeholder="添加人姓名" value="<?php echo ($result["uname"]); ?>" disabled="disabled"></div></td>
                      </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle"><div class="wx-gongzonghao"><input type="text" placeholder="添加人手机" value="<?php echo ($result["user_phone"]); ?>" disabled="disabled"></div></td>
                      </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle"><div class="wx-gongzonghao"><input type="text" placeholder="添加人邮箱" value="<?php echo ($result["user_email"]); ?>" disabled="disabled"></div>
            </td>
                      </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle"><div class="wx-gongzonghao"><input type="text"  placeholder="学校名称" name="school_name" value='<?php echo ($result["school_name"]); ?>' class="school_name"></div></td>
                      </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle">
                            <div class="wx-gongzonghao">
                                <select style="width:310px; height:32px; border:1px #bbb solid; padding-left:10px;" id="owner" name="owner">
                                    <option  value="<?php echo ($session_user); ?>"><?php echo ($session_user); ?></option>
                                    <?php if(is_array($user)): foreach($user as $key=>$vop): ?><option 
                                            <?php if($result['owner'] == $vop['user_name']) echo selected;?>
                                            value="<?php echo ($vop["user_name"]); ?>"><?php echo ($vop["user_name"]); ?></option><?php endforeach; endif; ?>   
                                </select>
                            </div>
                        </td>
                    </tr>                      
                    <tr>
                        <td width="150" height="30" align="center" valign="middle">
                            <div class="wx-gongzonghao">
                                <select id="city" name="city">
                                    <option  value="0">全部</option>
                                    <?php if(is_array($city)): foreach($city as $key=>$vop): ?><option 
                                            <?php if($result['city'] == $vop['city']) echo selected;?>
                                            value="<?php echo ($vop["city"]); ?>"><?php echo ($vop["city"]); ?></option><?php endforeach; endif; ?>   
                                </select>
                                <select id="area" name="area">
                                    <option 
                                        <?php if($result['area'] == null||$result['area']=="" ) echo selected;?> 
                                        value="0">全部</option>
                                    <option selected
                                        value="<?php echo ($result['area']); ?>"><?php echo ($result['area']); ?></option>                                    
                                </select>            
                            </div>
                        </td>
                      </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle"><div class="wx-gongzonghao"><input type="text" placeholder="学校人数" name="school_pnum" class="school_pnum" value='<?php echo ($result["school_pnum"]); ?>'></div>
            </td>
                      </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle"><div class="wx-gongzonghao">
                            <select style="width:310px; height:32px; border:1px #bbb solid; padding-left:10px;" name='pub_group'>
                                <option  value="">请选择分组</option>
                                <?php if(is_array($group)): foreach($group as $key=>$g): if($result["id"] == $g['id']): ?><option  selected value="<?php echo ($g["id"]); ?>"><?php echo ($g["gname"]); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($g["id"]); ?>"><?php echo ($g["gname"]); ?></option><?php endif; endforeach; endif; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle"><div class="wx-gongzonghao"><input type="text" placeholder="学校负责人姓名" value='<?php echo ($result["contact_name"]); ?>' name="contact_name"></div></td>
                      </tr>
                    <tr>
                        <td width="150" height="30" align="center" valign="middle"><div class="wx-gongzonghao"><input type="text" placeholder="学校负责人手机" value='<?php echo ($result["contact_phone"]); ?>'name="contact_phone"></div></td>
                      </tr>
                    <tr>
                      <td height="30" align="center" valign="middle"><div class="wx-gongzonghao"><input type="text" value='<?php echo ($result["contact_email"]); ?>' placeholder="学校负责人邮箱" name="contact_email"></div></td>
                    </tr>
                    <tr>
                      <td height="30" align="center" valign="middle"><div class="wx-button">
                          <input type="hidden" value="<?php echo ($result["aid"]); ?>" name='id' />
                          <input name="提 交" type="submit" value="提 交">
                          <input name="取消"  onClick="javascript :history.back(-1)" class="qx" style="margin-left:30px;" value="取 消">
                      </td>
                    </tr>
                    </tbody>
                </table>
</form>
<script src="/./Application/Home/View/Public/js/jquery1.42.min.js"></script>
<script src="/./Application/Home/View/Public/js/jquery.tabso_yeso.js"></script>
<script>
   
 $('#city').click(function(){
            $(this).change(function(){
                var city = encodeURI($("[name=city]").val());
                $.ajax({
                    url:'/Home/Manage/pub_area_info/city/'+city,
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



    $(function(){
       $('.school_pnum').click(function(){
           var schoolp = $('.school_pnum').val();
          if(isNaN(schoolp)){
              alert('学校人数必须为大于3位数的数字!');
          }else if(schoolp.length <3){
              alert('学校人数必须为大于3位数的数字!');
          }
       });
    });

    
      
    
</script>    
</body>
</html>