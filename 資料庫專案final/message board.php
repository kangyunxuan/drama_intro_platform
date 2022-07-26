<!DOCTYPE html>
<?php 
  header("Content-Type: text/html; charset=utf-8");
  include("conn_mysql.php");
  $seldb = @mysqli_select_db($db_link, "tv");
  if (!$seldb) {
    die("資料庫選擇失敗！");
  }else{
    //echo "資料庫選擇成功！";
  }

  $sql = "SELECT * FROM `comment`";
  $result = mysqli_query($db_link, $sql);
  //$total_records = mysqli_num_rows($result);
?>
<html>
      <div id="right">  <!--選單旁的主要內容-->
          <h1>留言板</h1>
          <h3 align="center"><!-- 目前資料筆數：<?php echo $total_records;?>，<a href="add.php">新增韓劇</a> --></h3>
          <table class="all">
            <?php 
              echo"<tr class='tt'>";
              echo"<th>會員編號</th>";
              echo"<th>戲劇編號</th>";
              echo"<th>時間</th>";
              echo"<th>留言</th>";
              echo"</tr>";

              while($row = mysqli_fetch_assoc($result)){

                echo"<tr class='tt'>";
                echo "<td class='pp'>".$row["mId"]."</td>";
                echo "<td class='pp'>".$row["dNo"]."</td>";
                echo "<td class='pp'>".$row["cTime"]."</td>";
                echo "<td class='pp'>".$row["content"]."</td>";
                echo "</tr>";
              }
            ?> 
        </table>
      </div>
</body>
</html>