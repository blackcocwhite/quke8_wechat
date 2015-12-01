<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <td>
        <?php echo strlen($result[0][answera]); echo strlen($result['answera']); ?>
    </td>
    
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
    </body>
</html>