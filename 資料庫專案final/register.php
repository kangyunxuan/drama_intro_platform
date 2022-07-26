<?php
    $msg = "";

  if (isset($_POST['action'])) {
    if ($con = new mysqli('localhost', 'mis', '999', 'tv')){
            // echo 'connected to database!';
        }

    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    $cPassword = $con->real_escape_string($_POST['cPassword']);

    if ($name == "" || $email == "" || $password == "" || $cPassword == "" || $password !== $cPassword){
        $msg = "Please check your inputs!";
        }else{
            if(strpos($email,'@gmail.com')){
                $sql = $con->query("SELECT mId FROM Member WHERE email='$email'");
                if ($sql->num_rows > 0){
                    $msg = "Email already exists in the database!";
                }else{
                    $token  = 'qwertyuiopasdfghjkl*zxcvbnm1234567890"!$&QWERTYUIOPASDFGHJKLZXCVBNM';
                    $token = str_shuffle($token);
                    $token = substr($token, 0, 10);

                   // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                    $con->query("INSERT INTO Member (name,email,password,cPassword,token) VALUE ('$name','$email','$password','0','$token')");

                    require 'phpmailer_/PHPMailerAutoload.php';
                    //require 'credential.php';
                    $mail = new PHPMailer();
                    $mail->isSMTP();

                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure='tls';

                    $mail->Username='gvalentina02@gmail.com';
                    $mail->Password='gab2gabFeb_';

                    $mail->setFrom($email,$name);
                    $mail->addAddress($email);
                    $mail->addReplyTo($email);

                    $mail->isHTML(true);
                    $mail->Subject='Verify Your Email';
                    $mail->Body="<h2 align=center>Thank you for your registration!!</h2><br><h4><a href='http://localhost/資料庫專案/confirm.php?email=$email&token=$token'>Click here</a> to verify</h4>";
                    if($mail->send()){
                        $msg = "You have been registered! Please verify your email!";
                    }else{
                        $msg = "Something wrong happend! Please try again!";
                    }
                    
                }

            }else{
                $msg = "Please enter Gmail address";
            }
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
      echo '<a class="dropdown-item" href="fav.php">收藏夾</a>';
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- 新 Bootstrap4 核心 CSS 文件 -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <!-- Libs CSS -->
    <link rel="stylesheet" href="./assets/fonts/Feather/feather.css">
    <link rel="stylesheet" href="./assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="./assets/libs/aos/dist/aos.css">
    <link rel="stylesheet" href="./assets/libs/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" href="./assets/libs/flickity-fade/flickity-fade.css">
    <link rel="stylesheet" href="./assets/libs/flickity/dist/flickity.min.css">
    <link rel="stylesheet" href="./assets/libs/highlightjs/styles/vs2015.css">
    <link rel="stylesheet" href="./assets/libs/jarallax/dist/jarallax.css">
    <link rel="stylesheet" href="./assets/libs/quill/dist/quill.core.css" />

    <!-- Map -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css' rel='stylesheet' />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="./assets/css/theme.min.css">
    <link rel="stylesheet" type="text/css" href="signin.css"><!--匯入css檔-->
    <title>Register</title>

  </head>
  <body class="container-fluid con">
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
             <a class="nav-link" href="index.php">首頁 <span class="sr-only">(current)</span></a>
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
    <!-- CONTENT
    ================================================== -->
    <section class="section-border border-primary">
      <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center no-gutters min-vh-100">
          <div class="col-8 col-md-6 col-lg-7 offset-md-1 order-md-2 mt-auto mt-md-0 pt-8 pb-4 py-md-11">

            <!-- Image -->
            <img src="edit.png" alt="..." class="img-fluid" >

          </div>
          <div class="col-12 col-md-5 col-lg-4 order-md-1 mb-auto mb-md-0 pb-8 py-md-11">
            
            <!-- Heading -->
            <h1 class="mb-0 font-weight-bold text-center">
              會員註冊
            </h1>
             
             <?php 
               if($msg != "") {
               echo '<div class="alert alert-success">'.$msg.'</div>';
                   } 
              ?>
            <!-- Form register.php完成寫入數據和發送郵件-->
            <form action="register.php" method="post" name="formAdd" id="formAdd" enctype="multipart/form-data">
              <!-- Email -->
              <div class="form-group">
                <label for="email">
                  Email Address
                </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@address.com">
              </div>
              <!-- 名字 -->
              <div class="form-group">
                <label for="name">
                  Name
                </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="請輸入暱稱">
              </div>
              <!-- Password -->
              <div class="form-group mb-5">
                <label for="password">
                  Password
                </label>
                <input type="password" class="form-control" id="password" name="password"  placeholder="Enter your password">
              </div>
               <!-- cPassword -->
              <div class="form-group mb-5">
                <label for="cPassword">
                 Comfirm Password
                </label>
                <input type="password" class="form-control" id="cPassword" name="cPassword"  placeholder="Enter your password">
              </div>

              <!-- Submit -->
              <button name="action" value="add" class="btn btn-block  btn-info" type="submit" acto>
                Register
              </button>
            </form>
          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </section>

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.js"></script>
    <script src="./assets/libs/aos/dist/aos.js"></script>
    <script src="./assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="./assets/libs/countup.js/dist/countUp.min.js"></script>
    <script src="./assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="./assets/libs/flickity/dist/flickity.pkgd.min.js"></script>
    <script src="./assets/libs/flickity-fade/flickity-fade.js"></script>
    <script src="./assets/libs/highlightjs/highlight.pack.min.js"></script>
    <script src="./assets/libs/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="./assets/libs/isotope-layout/dist/isotope.pkgd.min.js"></script>
    <script src="./assets/libs/jarallax/dist/jarallax.min.js"></script>
    <script src="./assets/libs/jarallax/dist/jarallax-video.min.js"></script>
    <script src="./assets/libs/jarallax/dist/jarallax-element.min.js"></script>
    <script src="./assets/libs/quill/dist/quill.min.js"></script>
    <script src="./assets/libs/smooth-scroll/dist/smooth-scroll.min.js"></script>
    <script src="./assets/libs/typed.js/lib/typed.min.js"></script>

    <!-- Map -->
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js'></script>

    <!-- Theme JS -->
    <script src="./assets/js/theme.min.js"></script>

      
  </body>
</html>