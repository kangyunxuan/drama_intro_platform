<?php
          header("Content-Type: text/html; charset=utf-8");
          include("conn_mysql.php");
          $seldb = @mysqli_select_db($db_link, "tv");
          if (!$seldb) die("資料庫選擇失敗！");
          
          $account = $_POST['account'];
          $password = $_POST['password'];


          $sql = "SELECT * FROM `manager`";
          $result = mysqli_query($db_link, $sql);
          $row = @mysqli_fetch_row($result);


          if($account != null && $password != null  && $account==$row[0] && $password==$row[1]){
            echo '登入成功!';
            echo '<meta http-equiv=REFRESH CONTENT=1;url=manage.php>';
            //header("Location: data.php");
          }
          else
          {

            echo '登入失敗!';
            echo '<meta http-equiv=REFRESH CONTENT=1;url=manager.php>';
          }
?>