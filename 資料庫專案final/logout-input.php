<?php 
    $db_link=@mysqli_connect("localhost","mis","999");
	// if(!$db_link){
	// 	die("資料庫連線失敗<br>");
	// }else{
	// 	echo"資料庫連線成功<br>";   //連結伺服器
	// }
	mysqli_query($db_link,"SET NAMES 'utf-8'");  //設定字元集與編碼為utf-8
	$seldb=@mysqli_select_db($db_link,"tv");
	// if(!$seldb){
	// 	die("資料庫選擇失敗<br>");
	// }else{
	// 	echo"資料庫選擇成功<br>";
	// }
?>
<?php
include("conn_mysql.php");
if (!@mysqli_select_db($db_link, "tv")) die("資料庫選擇失敗！");
// $sql = "SELECT * FROM `drama` WHERE `dNo` like '%$search%'";
// $result = mysqli_query($db_link, $sql);
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
      echo '<a class="dropdown-item" href="fav.php">收藏夾</a>';
      echo '<a class="dropdown-item" href="logout-input.php">登出</a>';
      echo '<a class="dropdown-item" href="manager.php">管理</a>';
      echo '</div>';
    }
?>
<?php
  $category=@$_GET['category'];

  switch ($category) {
   case "k_all":
    $sql = "SELECT * FROM `drama` WHERE `region` = '韓國'";
    $result = mysqli_query($db_link, $sql);
    break;

   case "j_all":
    $sql = "SELECT * FROM `drama` WHERE `region` = '日本'";
    @$result = mysqli_query($db_link, $sql);
    break;

    case "t_all":
      $sql = "SELECT * FROM `drama` WHERE `region` = '台灣'";
      $result = mysqli_query($db_link, $sql);
      break;

    case "h_all":
      $sql = "SELECT * FROM `drama` WHERE `region` = '香港'";
      $result = mysqli_query($db_link, $sql);
      break;
    
    case "k_suspense":
      $sql = "SELECT * FROM `drama` WHERE `region` = '韓國' AND `category` = '懸疑劇' ";
      $result = mysqli_query($db_link, $sql);
      break;
    
    case "k_laugh":
      $sql = "SELECT * FROM `drama` WHERE `region` = '韓國' AND `category` = '喜劇' ";
      $result = mysqli_query($db_link, $sql);
      break;
    
    case "k_love":
      $sql = "SELECT * FROM `drama` WHERE `region` = '韓國' AND `category` = '愛情劇' ";
      $result = mysqli_query($db_link, $sql);
      break;

    case "k_palace":
        $sql = "SELECT * FROM `drama` WHERE `region` = '韓國' AND `category` = '宮廷劇' ";
        $result = mysqli_query($db_link, $sql);
        break;

    case "k_move":
      $sql = "SELECT * FROM `drama` WHERE `region` = '韓國' AND `category` = '動作劇' ";
      $result = mysqli_query($db_link, $sql);
      break;

    case "k_cross":
        $sql = "SELECT * FROM `drama` WHERE `region` = '韓國' AND `category` = '穿越劇' ";
        $result = mysqli_query($db_link, $sql);
        break;

    case "k_story":
        $sql = "SELECT * FROM `drama` WHERE `region` = '韓國' AND `category` = '劇情劇' ";
        $result = mysqli_query($db_link, $sql);
        break;

    
        case "j_suspense":
          $sql = "SELECT * FROM `drama` WHERE `region` = '日本' AND `category` = '懸疑劇' ";
          $result = mysqli_query($db_link, $sql);
          break;
        
        case "j_laugh":
          $sql = "SELECT * FROM `drama` WHERE `region` = '日本' AND `category` = '喜劇' ";
          $result = mysqli_query($db_link, $sql);
          break;
        
        case "j_love":
          $sql = "SELECT * FROM `drama` WHERE `region` = '日本' AND `category` = '愛情劇' ";
          $result = mysqli_query($db_link, $sql);
          break;
    
        case "j_palace":
            $sql = "SELECT * FROM `drama` WHERE `region` = '日本' AND `category` = '宮廷劇' ";
            $result = mysqli_query($db_link, $sql);
            break;
    
        case "j_move":
          $sql = "SELECT * FROM `drama` WHERE `region` = '日本' AND `category` = '動作劇' ";
          $result = mysqli_query($db_link, $sql);
          break;
    
        case "j_cross":
            $sql = "SELECT * FROM `drama` WHERE `region` = '日本' AND `category` = '穿越劇' ";
            $result = mysqli_query($db_link, $sql);
            break;
    
        case "j_story":
            $sql = "SELECT * FROM `drama` WHERE `region` = '日本' AND `category` = '劇情劇' ";
            $result = mysqli_query($db_link, $sql);
            break;
            case "t_suspense":
              $sql = "SELECT * FROM `drama` WHERE `region` = '台灣' AND `category` = '懸疑劇' ";
              $result = mysqli_query($db_link, $sql);
              break;
            
            case "t_laugh":
              $sql = "SELECT * FROM `drama` WHERE `region` = '台灣' AND `category` = '喜劇' ";
              $result = mysqli_query($db_link, $sql);
              break;
            
            case "t_love":
              $sql = "SELECT * FROM `drama` WHERE `region` = '台灣' AND `category` = '愛情劇' ";
              $result = mysqli_query($db_link, $sql);
              break;
        
            case "t_palace":
                $sql = "SELECT * FROM `drama` WHERE `region` = '台灣' AND `category` = '宮廷劇' ";
                $result = mysqli_query($db_link, $sql);
                break;
        
            case "t_move":
              $sql = "SELECT * FROM `drama` WHERE `region` = '台灣' AND `category` = '動作劇' ";
              $result = mysqli_query($db_link, $sql);
              break;
        
            case "t_cross":
                $sql = "SELECT * FROM `drama` WHERE `region` = '台灣' AND `category` = '穿越劇' ";
                $result = mysqli_query($db_link, $sql);
                break;
        
            case "t_story":
                $sql = "SELECT * FROM `drama` WHERE `region` = '台灣' AND `category` = '劇情劇' ";
                $result = mysqli_query($db_link, $sql);
                break;
                case "h_suspense":
                  $sql = "SELECT * FROM `drama` WHERE `region` = '香港' AND `category` = '懸疑劇' ";
                  $result = mysqli_query($db_link, $sql);
                  break;
                
                case "h_laugh":
                  $sql = "SELECT * FROM `drama` WHERE `region` = '香港' AND `category` = '喜劇' ";
                  $result = mysqli_query($db_link, $sql);
                  break;
                
                case "h_love":
                  $sql = "SELECT * FROM `drama` WHERE `region` = '香港' AND `category` = '愛情劇' ";
                  $result = mysqli_query($db_link, $sql);
                  break;
            
                case "h_palace":
                    $sql = "SELECT * FROM `drama` WHERE `region` = '香港' AND `category` = '宮廷劇' ";
                    $result = mysqli_query($db_link, $sql);
                    break;
            
                case "h_move":
                  $sql = "SELECT * FROM `drama` WHERE `region` = '香港' AND `category` = '動作劇' ";
                  $result = mysqli_query($db_link, $sql);
                  break;
            
                case "h_cross":
                    $sql = "SELECT * FROM `drama` WHERE `region` = '香港' AND `category` = '穿越劇' ";
                    $result = mysqli_query($db_link, $sql);
                    break;
            
                case "h_story":
                    $sql = "SELECT * FROM `drama` WHERE `region` = '香港' AND `category` = '劇情劇' ";
                    $result = mysqli_query($db_link, $sql);
                    break;
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
          <form class="form-inline my-2 my-lg-0" name="search" method="post" action="search-output.php">
          <input class="form-control mr-sm-2" type="search" placeholder="請輸入戲劇名稱" aria-label="Search" name="Dname">
            <button class="btn btn-primary my-2 my-sm-0" type="submit" id="searchstyle">Search</button>
          </form>
        </div>
      </nav>

    </header>
<main id="main" style="text-align: center;">
    <p>確定要登出系統嗎？</p>
    <a href="logout-output.php">登出</a>
</main>
<footer>
</footer>
<script src="project.js"></script>
  </div>
</body>
</html>