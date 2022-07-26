<?php 
include("conn_mysql.php");
if (!@mysqli_select_db($db_link, "tv")) die("資料庫選擇失敗！");


$search=$_POST["Aname"];
$sql = "SELECT actor.aName, drama.dName, drama.year FROM `actor` NATURAL JOIN `drama` WHERE `aName` like '%$search%'";
$result = mysqli_query($db_link, $sql);


if($result)
{
          while($row=mysqli_fetch_assoc($result)){
          echo "<table class='all'>";
          
          echo"<tr class='pp'>";
          echo"<td>"."演員名稱 :".$row["aName"]."</td>";
          echo "</tr>";

          echo"<tr class='pp'>";
          echo"<td>"."戲劇名稱 :".$row["dName"]."</td>";
          echo "</tr>";

          echo "<tr class='pp'>";
          echo "<td>"."年份 :".$row["year"]."</td>";
          echo"</tr>";
          
          echo "</table>";
      }
  }
  else{
  	echo"failed";
  }
?>