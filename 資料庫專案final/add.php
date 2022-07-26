<!DOCTYPE html>
<?php 
if(isset($_POST["action"])&&($_POST["action"]=="add")){
  include("conn_mysql.php");
  if (!@mysqli_select_db($db_link, "tv")) die("資料庫選擇失敗！");

  $file = fopen($_FILES['img']['tmp_name'], 'r');
  // 讀入圖片檔資料
  $fileContents = fread($file, filesize($_FILES['img']['tmp_name'])); 
  // 圖片檔案資料編碼
  fclose($file);
  $file_uploads = base64_encode($fileContents);

  $sql_query = "INSERT INTO `drama` (`id`,`dNo` ,`dName` ,`category` ,`year` ,`episode` ,`intro` ,`region` ,`link` ,`img`) VALUES (";
  $sql_query .= "'".$_POST["id"]."',";
  $sql_query .= "'".$_POST["dNo"]."',";
  $sql_query .= "'".$_POST["dName"]."',";
  $sql_query .= "'".$_POST["category"]."',";
  $sql_query .= "'".$_POST["year"]."',";
  $sql_query .= "'".$_POST["episode"]."',";
  $sql_query .= "'".$_POST["intro"]."',";
  $sql_query .= "'".$_POST["region"]."',";
  $sql_query .= "'".$_POST["link"]."',";
  $sql_query .= "'".$file_uploads."')";
  mysqli_query($db_link, $sql_query);
  //重新導向回到主畫面
  header("Location: manage.php");
} 
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
              <a class="nav-link" href="index.php">全部戲劇<span class="sr-only">(current)</span></a>
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
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary my-2 my-sm-0" type="submit" id="searchstyle">Search</button>
          </form>
        </div>
      </nav>
    </header>
    <main id="main">
<div class="table-responsive">
<p class="ct fb">戲劇新增</p>
    <div class="ct"><a href=index.php>回全部戲劇</a></div>
   
    <!-- 表格表頭 -->
    <tr class="ct" style="background:#336699;color:white;">

    <form action="" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data">
          <table class="table table-bordered table-striped table-hover" style="background:#F0F8FF">
          <tr>
              <td class="tt ct">編號</td>
              <td class="pp"><input type="text" name="id"></td>
            </tr>
            <tr>
              <td class="tt ct">戲劇編號</td>
              <td class="pp"><input type="text" name="dNo"></td>
            </tr>

            <tr>
              <td class="tt ct">名稱</td>
              <td class="pp"><input type="text" name="dName"></td>
            </tr>
            <tr>
              <td class="tt ct">類別</td>
              <td class="pp">
                <select name="category">
                  <option value="愛情"> 愛情</option>
                  <option value="校園"> 校園</option>
                  <option value="懸疑推理"> 懸疑推理</option>
                  <option value="古裝"> 古裝</option>
                  <option value="醫療"> 醫療</option>
                  <option value="網路"> 網路</option>
                </select>
              </td>
            </tr>
            <tr>
              <td class="tt ct">年份</td>
              <td class="pp"><input type="number_format" name="year"></td>
            </tr>
            <tr>
              <td class="tt ct">集數</td>
              <td class="pp"><input type="number_format" name="episode"></td>
            </tr>            
            <tr>
              <td class="tt ct">劇情介紹</td>
              <td class="pp"><input type="text" name="intro"></td>
            </tr>
            <tr>
              <td class="tt ct">地區</td>
              <td class="pp"><input type="text" name="region"></td>
            </tr>
            <tr>
              <td class="tt ct">連結</td>
              <td class="pp"><input type="text" name="link"></td>
            </tr>
            <tr>
              <td class="tt ct">圖片</td>
              <td class="pp"><input type="file" name="img"></td>
            </tr>
          </table>
          <tr>
            <td colspan="2" text-align="center">
            <input name="action" type="hidden" value="add">
            <input type="submit" name="button" id="button" value="新增資料">
            <input type="reset" name="button2" id="button2" value="重新填寫">
            </td>
          </tr>
        </form>
    
</main>
        



<footer>
</footer>
<script src="project.js"></script>
  </div>
</body>
</html>