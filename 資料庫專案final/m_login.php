<?php
session_start();
unset($_SESSION['member']);
$pdo=new PDO('mysql:host=localhost;dbname=tv;charset=utf8','mis', '999');
$sql=$pdo->prepare('select * from member where email=? and password=?');
$sql->execute([$_REQUEST['email'], $_REQUEST['password']]);
foreach ($sql->fetchAll() as $row) {
  $_SESSION['member']=[
    'name'=>$row['name'],
    'email'=>$row['email'], 'mId'=>$row['mId'], 
    'password'=>$row['password']];
}
if (isset($_SESSION['member'])) {
  echo $_SESSION['member']['name'], '登入成功';
  echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
} else {
  echo '登入失敗';
  echo '帳號或密碼有誤';
  echo '<meta http-equiv=REFRESH CONTENT=1;url=signin.php>';
}

?>