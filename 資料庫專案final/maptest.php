<?php
  header("Content-Type: text/html; charset=utf-8");
  include("conn_mysql.php");
    $seldb = @mysqli_select_db($db_link, "tv");
    $dNo=$_GET["id"];
    // $sql_query = "SELECT * FROM `Drama` where `dNo`='$dNo'";
    $sql ="SELECT *
    FROM drama
    INNER JOIN map
    ON map.dNo=drama.dNo WHERE map.dNo='$dNo' ";
    $result = mysqli_query($db_link, $sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="zh-tw">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
    <?php
   echo '<iframe 
      width="600" 
      height="450" 
      frameborder="0" 
      style="border:0" 
      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD-MDvTcz3nQxEqqGsAD5rFPjjiMe6FiPg&q='.$row["address"].'&language=zh-TW" 
      allowfullscreen>';
    echo "</iframe>";
    if($row["address1"]!= NULL){
      echo '<iframe 
      width="600" 
      height="450" 
      frameborder="0" 
      style="border:0" 
      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD-MDvTcz3nQxEqqGsAD5rFPjjiMe6FiPg&q='.$row["address1"].'&language=zh-TW" 
      allowfullscreen>';
    echo "</iframe>";
    }
    if($row["address2"]!= NULL){
      echo '<iframe 
      width="600" 
      height="450" 
      frameborder="0" 
      style="border:0" 
      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD-MDvTcz3nQxEqqGsAD5rFPjjiMe6FiPg&q='.$row["address2"].'&language=zh-TW" 
      allowfullscreen>';
    echo "</iframe>";
    }
    if($row["address3"]!= NULL){
      echo '<iframe 
      width="600" 
      height="450" 
      frameborder="0" 
      style="border:0" 
      src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD-MDvTcz3nQxEqqGsAD5rFPjjiMe6FiPg&q='.$row["address3"].'&language=zh-TW" 
      allowfullscreen>';
    echo "</iframe>";
    }
    ?>
</body>
</html>