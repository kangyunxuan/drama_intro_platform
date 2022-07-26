<!DOCTYPE html>
<?php 
include("conn_mysql.php");
if (!@mysqli_select_db($db_link, "tv")) die("資料庫選擇失敗！");
if(isset($_POST["action"])&&($_POST["action"]=="delete")){  
  $sql_query = "DELETE FROM `drama` WHERE `id`=".$_POST["id"];
  mysqli_query($db_link, $sql_query);
  //重新導向回到主畫面
  header("Location: manage.php");
}

$sql_db = "SELECT * FROM `drama` WHERE `id`=".$_GET["id"];
$result = mysqli_query($db_link, $sql_db);
$row=mysqli_fetch_assoc($result);
?>
<html>
      <div id="right">  <!--選單旁的主要內容-->
        <h1>刪除韓劇</h1>
        <form action="" method="post">
          <table class="all">
            <tr>
              <td class="tt ct">編號</td>
              <td class="pp"><?php echo $row["id"];?></td>
            </tr>
            <tr>
              <td class="tt ct">戲劇編號</td>
              <td class="pp"><?php echo $row["dNo"];?></td>
            </tr>
            <tr>
              <td class="tt ct">名稱</td>
              <td class="pp"><?php echo $row["dName"];?></td>
            </tr>
            <tr>
              <td class="tt ct">類別</td>
              <td class="pp">
                <?php echo $row["category"];?>
              </td>
            </tr>
            <tr>
              <td class="tt ct">年份</td>
              <td class="pp"><?php echo $row["year"];?></td>
            </tr>
            <tr>
              <td class="tt ct">集數</td>
              <td class="pp"><?php echo $row["episode"];?></td>
            </tr>
            
            <tr>
              <td class="tt ct">劇情介紹</td>
              <td class="pp"><?php echo $row["intro"];?></td>
            </tr>
            <tr>
              <td class="tt ct">地區</td>
              <td class="pp"><?php echo $row["region"];?></td>
            </tr>
            <tr>
              <td class="tt ct">連結</td>
              <td class="pp"><?php echo $row["link"];?></td>
            </tr>
            <tr>
              <td class="tt ct">圖片</td>
              <td class="pp"><?php echo $row["img"];?></td>
            </tr>
          </table>
          <tr>
            <td colspan="2" align="center">
            <input name="id" type="hidden" value="<?php echo $row["id"];?>">
            <input name="action" type="hidden" value="delete">
            <input type="submit" name="button" id="button" value="確定刪除這筆資料嗎？">
            </td>
          </tr>
        </form>
      </div>
</body>
</html>