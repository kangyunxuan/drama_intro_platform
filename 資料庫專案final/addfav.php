<?php 
session_start();
if(isset($_SESSION['member'])){
  include("conn_mysql.php");
  // if (!@mysqli_select_db($db_link, "tv")) die("資料庫選擇失敗！");
  $mId=$_SESSION['member']['mId'];
  $dNo=$_GET['id'];

    $sql_query = "INSERT INTO `favorites` (`mId`, `dNo`) VALUES ('$mId', '$dNo')";
    mysqli_query($db_link, $sql_query);
    // 重新導向回到主畫面
    echo "<script>alert('收藏成功!');history.go(-1);</script>";
    // else{
    //   echo  "<script>alert('收藏過!');history.go(-1);</script>";
    // }

}
else{
    echo "<script>alert('收藏請登入!');history.go(-1);</script>";
}
?>