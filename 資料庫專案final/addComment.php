<!DOCTYPE html>

<?php 
session_start();
if(isset($_POST["action"])&&($_POST["action"]=="add")){
  if(isset($_SESSION['member'])){
  include("conn_mysql.php");
  if (!@mysqli_select_db($db_link, "tv")) die("資料庫選擇失敗！");
  $mId=$_SESSION['member']['mId'];
  $dNo=$_GET['id'];
  $sql_query = "INSERT INTO `comment` (`mId` ,`dNo` ,`content`) VALUES (";
  $sql_query .= "'".$mId."',";
  $sql_query .= "'".$dNo."',";
  $sql_query .= "'".$_POST["content"]."')";
  

  mysqli_query($db_link, $sql_query);
  //重新導向回到主畫面
  
  echo "<script>alert('留言成功!');history.go(-2);</script>";

  // header("Location:index.php");
  }
  else{
    echo "請登入";
  }
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
              // session_start();
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
<html>
<body>
<main id="main">
<div  class="table" style="text">  <!--選單旁的主要內容-->
        <h1 class="ct fb">新增留言</h1>
        <form action="" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data">
          <table class="table table-bordered table-striped table-hover" style="background:#F0F8FF">
            <tr>
              <td class="tt ct">留言</td>
              <td class="pp">
                <!-- <input type="text" > -->
                <textarea name="content" id="content" cols="50" rows="5" placeholder="輸入你想要寫的內容..."></textarea>
              </td>             
            </tr>
          <tr>
            <td colspan="2" align="center">
            <input name="action" type="hidden" value="add">
            <input type="submit" name="button" id="button" value="新增">
            <input type="reset" name="button2" id="button2" value="重新填寫">
            </td>
          </tr>
          </table>
        </form>
</div>
</main>
</body>
</html>