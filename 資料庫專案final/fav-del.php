<?php
include("conn_mysql.php");
if (!@mysqli_select_db($db_link, "tv")) die("資料庫選擇失敗！");

if(!isset($_SESSION['member'])){  
	session_start();
  $mId=$_SESSION['member']['mId'];
  $dNo=$_GET['id'];	
  $sql_query = "DELETE FROM `favorites` WHERE `dNo`='$dNo' AND `mId`='$mId'";
  mysqli_query($db_link, $sql_query);
  echo '所選戲劇已從我的最愛移除。';
  //重新導向回到主畫面
//   header("Location: manage.php");
}
else{
	echo 'wrong';
}
require 'showfav.php';
?>

