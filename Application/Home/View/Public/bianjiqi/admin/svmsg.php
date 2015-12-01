<?php
require_once('../conn.php');
error_reporting(0);
@header('Content-Type: text/html; charset=utf-8');
mysql_query("set names 'utf8'");

$do=$_GET['do'];
if($do =="tongbu" ) {
    $wxtitle1 =  $_POST['wxtitle1'];
    $content1= $_POST['content1'];
	$content1 = str_replace("'Microsoft YaHei'", ' ', $content1);
	$content1 = str_replace("'Hiragino Sans GB'", ' ', $content1);
	$content1 = str_replace("'Helvetica Neue'", ' ', $content1);

    header("Content-type: text/html; charset=utf-8");
    if ($wxtitle1==""||$content1==""){
        echo "<script>alert('样式名称及内容不能为空！');window.history.back(-1);</script>";
    }else{

        $sql="insert into wxart(title,content,addtime) values('".$wxtitle1."','".$content1."',now())";
        mysql_query("set names 'utf8'");
        $retss=mysql_query($sql,$link);
        if ($retss===false) {
            die("faile:".mysql_error($link));
        }else{
            echo "<script>alert('添加成功,点击确定去后台草稿箱看看吧！');window.location.href='login.html';</script>";
        }
        mysql_close($link);

        }
}else{

    echo "Fuck";
    exit;



}

?>















