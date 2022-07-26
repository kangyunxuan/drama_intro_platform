<!DOCTYPE html PUBLIC>
<?php
  header("Content-Type: text/html; charset=utf-8");
  include("conn_mysql.php");
    $seldb = @mysqli_select_db($db_link, "tv");
    $dNo=$_GET["id"];
    // $sql_query = "SELECT * FROM `Drama` where `dNo`='$dNo'";
    $sql ="SELECT *
    FROM drama
    INNER JOIN actor
    ON actor.dNo=drama.dNo WHERE drama.dNo='$dNo' ";
    $result = mysqli_query($db_link, $sql);
    $row=mysqli_fetch_assoc($result);
    //留言板
    // $sql_comment = "SELECT * FROM `comment`";
    $sql_comment="SELECT * FROM member INNER JOIN comment ON member.mId=comment.mId WHERE comment.dNo='$dNo'";
    $comment = mysqli_query($db_link, $sql_comment);
?>
<?php 
    function notLogedIn() {
      echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      echo '<a class="dropdown-item" href="register.php">註冊</a>';
      echo '<a class="dropdown-item" href="signin.php">登入</a>';
      echo '<a class="dropdown-item" href="manager.php">管理</a>';
      echo '</div>';
    }

    function signedIn() {
      echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      echo '<a class="dropdown-item" href="showfav.php">收藏夾</a>';
      echo '<a class="dropdown-item" href="logout-input.php">登出</a>';
      echo '<a class="dropdown-item" href="manager.php">管理</a>';
      echo '</div>';
    }
?>

<!doctype html>
<html lang="en">
<head>
  <link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@600&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="home.css"><!--匯入css檔-->
    <!-- 新 Bootstrap4 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!--mobile device-->
    <title>drama</title>
</head>

<body>
  <div class="container-fluid con">
    <header id="header"><!--標題區-->
     
      <nav class="navbar navbar-expand-lg navbar-light bg-green navbar-static-top">
        <a class="icon navbar-brand" href="home.php">
         <img width="110" height="110" alt=""  src="TVicon.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse align-self-end" id="navbarSupportedContent"> 
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">全部戲劇 <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                帳號
              </a>
              <?php
              session_start();
             if(isset($_SESSION['member'])){
                  signedIn();
             }
             else{
                  notLogedIn();
             }
             ?>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                韓劇
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?category=k_all">全部</a>
                <a class="dropdown-item" href="index.php?category=k_suspense">懸疑劇</a>
                <a class="dropdown-item" href="index.php?category=k_laugh">喜劇</a>
                <a class="dropdown-item" href="index.php?category=k_love">愛情劇</a>            
                <a class="dropdown-item" href="index.php?category=k_palace">宮廷劇</a>
                <a class="dropdown-item" href="index.php?category=k_move">動作劇</a>
                <a class="dropdown-item" href="index.php?category=k_cross">穿越劇</a>
                <a class="dropdown-item" href="index.php?category=k_story">劇情劇</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                日劇
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?category=j_all">全部</a>
                <a class="dropdown-item" href="index.php?category=j_suspense">懸疑劇</a>
                <a class="dropdown-item" href="index.php?category=j_laugh">喜劇</a>
                <a class="dropdown-item" href="index.php?category=j_love">愛情劇</a>            
                <a class="dropdown-item" href="index.php?category=j_palace">宮廷劇</a>
                <a class="dropdown-item" href="index.php?category=j_move">動作劇</a>
                <a class="dropdown-item" href="index.php?category=j_cross">穿越劇</a>
                <a class="dropdown-item" href="index.php?category=j_story">劇情劇</a>
              </div>
            </li>
  
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                台劇
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?category=t_all">全部</a>
                <a class="dropdown-item" href="index.php?category=t_suspense">懸疑劇</a>
                <a class="dropdown-item" href="index.php?category=t_laugh">喜劇</a>
                <a class="dropdown-item" href="index.php?category=t_love">愛情劇</a>            
                <a class="dropdown-item" href="index.php?category=t_palace">宮廷劇</a>
                <a class="dropdown-item" href="index.php?category=t_move">動作劇</a>
                <a class="dropdown-item" href="index.php?category=t_cross">穿越劇</a>
                <a class="dropdown-item" href="index.php?category=t_story">劇情劇</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                港劇
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?category=h_all">全部</a>
                <a class="dropdown-item" href="index.php?category=h_suspense">懸疑劇</a>
                <a class="dropdown-item" href="index.php?category=h_laugh">喜劇</a>
                <a class="dropdown-item" href="index.php?category=h_love">愛情劇</a>            
                <a class="dropdown-item" href="index.php?category=h_palace">宮廷劇</a>
                <a class="dropdown-item" href="index.php?category=h_move">動作劇</a>
                <a class="dropdown-item" href="index.php?category=h_cross">穿越劇</a>
                <a class="dropdown-item" href="index.php?category=h_story">劇情劇</a>
              </div>
            </li>
          </ul>
          <p style="margin-bottom: 0;margin-right:10px;">
          <?php
          if(isset($_SESSION['member'])){
          $user=$_SESSION['member']['name'];
          echo "Welcome!$user";
          }
          ?>
          </p>
          <form class="form-inline my-2 my-lg-0" name="search" method="post" action="search-output.php">
          <input class="form-control mr-sm-2" type="search" placeholder="請輸入戲劇名稱" aria-label="Search" name="Dname">
            <button class="btn btn-primary my-2 my-sm-0" type="submit" id="searchstyle">Search</button>
          </form>
        </div>
      </nav>
     
    </header>
  <main>
  <?php
          echo "<p class='fb ct'>".$row["dName"]."</p>";
          echo "<table class='table table-bordered table-striped' style='background:#F0F8FF'>";
          echo "<tbody>";
          echo "<tr class='pp'>";
          echo "<td class='ct' rowspan='9'>";
          echo '<img src = " '.'data:image/jpg;base64,'.base64_encode($row["img"]).'" class = "photo">'.'</a>';
          echo '<br>';
          echo '<br>';
          echo "<a href='maptest.php?id=".$row["dNo"]."'>";
          echo "<p>拍攝景點</p>";
          echo '</a>';
          echo "<a href='addfav.php?id=".$row["dNo"]."'>";//get what
          echo "<p>收藏</p>";
          echo '</a>';
          echo "<a href='addComment.php?id=".$row["dNo"]."'>";
          echo "<p>新增留言</p>";
          echo '</a>';
          echo "</td>";
          echo"<td>"."分類 :".$row["category"]."</td>";
          echo "</tr>";
          echo"<tr class='pp'>";
          echo"<td>"."編號 :".$row["dNo"]."</td>";
          echo "</tr>";
          echo"<tr class='pp'>";
          echo"<td>"."名稱 :".$row["dName"]."</td>";
          echo "</tr>";
          echo "<tr class='pp'>";
          echo "<td>"."年份 :".$row["year"]."</td>";
          echo"</tr>";
          echo"<tr class='pp'>";
          echo"<td>"."集數:".$row["episode"]."</td>";
          echo "</tr>";          
          echo"<tr class='pp'>";
          echo"<td>"."劇情介紹:".$row["intro"]."</td>";
          echo "</tr>";
          echo"<tr class='pp'>";
          echo"<td>"."地區 :".$row["region"]."</td>";
          echo "</tr>";
          echo"<tr class='pp'>";
          echo"<td>  <a href=".$row["link"].">連結<a></td>";
          echo "</tr>";           
          echo"<tr class='pp'>";
          echo"<td>"."演員 :".$row["aName"]."</td>";
          echo "</tr>";    



          echo "<th colspan='3' style='text-align:center;background:#004B97;color:white;font-size:25px;'>留言板</th>";
          echo"<tr class='tt'>";
          echo"<th>會員名稱</th>";
          echo"<th>留言</th>";
          echo"<th>時間</th>";
          echo"</tr>";
          while($row2 = mysqli_fetch_assoc($comment)){
                echo"<tr class='tt'>";
                echo "<td class='pp'>".$row2["name"]."</td>";
                // echo "<td class='pp'>".$row["dNo"]."</td>";
                
                echo "<td class='pp'>".$row2["content"]."</td>";
                echo "<td class='pp'>".$row2["cTime"]."</td>";
                echo "</tr>";
              }
              echo "</table>";
      //   <!-- </table>
      // </div> -->

?>
</main>
<footer>
</footer>
<script src="project.js"></script>
  </div>
</body>
</html>