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

  $sql = "SELECT * FROM `member`";
  $result = mysqli_query($db_link, $sql);
  $total_records = mysqli_num_rows($result);
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
                <a class="dropdown-item" href="index.php?id=k_all">全部</a>
                <a class="dropdown-item" href="index.php?id=k_suspense">懸疑劇</a>
                <a class="dropdown-item" href="index.php?id=k_laugh">喜劇</a>
                <a class="dropdown-item" href="index.php?id=k_love">愛情劇</a>            
                <a class="dropdown-item" href="index.php?id=k_palace">宮廷劇</a>
                <a class="dropdown-item" href="index.php?id=k_move">動作劇</a>
                <a class="dropdown-item" href="index.php?id=k_cross">穿越劇</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                日劇
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?id=j_all">全部</a>
                <a class="dropdown-item" href="index.php?id=j_suspense">懸疑劇</a>
                <a class="dropdown-item" href="index.php?id=j_laugh">喜劇</a>
                <a class="dropdown-item" href="index.php?id=j_love">愛情劇</a>            
                <a class="dropdown-item" href="index.php?id=j_palace">宮廷劇</a>
                <a class="dropdown-item" href="index.php?id=j_move">動作劇</a>
                <a class="dropdown-item" href="index.php?id=j_cross">穿越劇</a>
              </div>
            </li>
  
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                台劇
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?id=t_all">全部</a>
                <a class="dropdown-item" href="index.php?id=t_suspense">懸疑劇</a>
                <a class="dropdown-item" href="index.php?id=t_laugh">喜劇</a>
                <a class="dropdown-item" href="index.php?id=t_love">愛情劇</a>            
                <a class="dropdown-item" href="index.php?id=t_palace">宮廷劇</a>
                <a class="dropdown-item" href="index.php?id=t_move">動作劇</a>
                <a class="dropdown-item" href="index.php?id=t_cross">穿越劇</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                港劇
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="index.php?id=h_all">全部</a>
                <a class="dropdown-item" href="index.php?id=h_suspense">懸疑劇</a>
                <a class="dropdown-item" href="index.php?id=h_laugh">喜劇</a>
                <a class="dropdown-item" href="index.php?id=h_love">愛情劇</a>            
                <a class="dropdown-item" href="index.php?id=h_palace">宮廷劇</a>
                <a class="dropdown-item" href="index.php?id=h_move">動作劇</a>
                <a class="dropdown-item" href="index.php?id=h_cross">穿越劇</a>
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
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary my-2 my-sm-0" type="submit" id="searchstyle">Search</button>
          </form>
        </div>
      </nav>
      
    </header>
<main id="main">
<div class="table-responsive">
<p class="ct fb">會員資料</p>
    <div class="ct"><a href=manage.php>戲劇管理</a></div>
    <h6 align="center">目前資料筆數：<?php echo $total_records;?></h6>
    <table class="table table-bordered table-striped table-hover" style="background:#F0F8FF">
    <!-- 表格表頭 -->
    <tr class="ct" style="background:#336699;color:white;">
      <th>編號</th>
      <th>名稱</th>
      <th>email</th>
      <th>密碼</th>
    </tr>
    <!-- 資料內容 -->
    <?php
    $sql ="SELECT * FROM  member";
    $result = mysqli_query($db_link, $sql);
      while($row=mysqli_fetch_assoc($result)){
          echo '<tr'.' class="ct"'.'>';
          echo '<td>'.$row["mId"].'</td>';
          echo '<td>'.$row["name"].'</td>';
          echo "<td>".$row["email"]."</td>";
          echo "<td>".$row["password"]."</td>";
          // echo "<td><a href='update.php?id=".$row["dNo"]."'>修改</a> ";
          // echo "<a href='delete.php?id=".$row["id"]."'>刪除</a></td>";
          echo "</tr>";
      }
  ?>
  </table>
  </div>
</main>
<footer>
</footer>
<script src="project.js"></script>
  </div>
</body>
</html>