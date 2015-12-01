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
        <div id="pub_box" class="left-box">
           <ul>
               <li></li>
               <?php if(is_array($pub)): foreach($pub as $key=>$p): ?><li><input type='hidden' value='<?php echo ($p["id"]); ?>'><?php echo ($p["nick_name"]); ?></li><?php endforeach; endif; ?>
           </ul>
       </div>
    </body>
</html>