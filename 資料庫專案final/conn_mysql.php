<?php
	$db_link=@mysqli_connect("localhost","mis","999");
	// if(!$db_link){
	// 	die("資料庫連線失敗<br>");
	// }else{
	// 	echo"資料庫連線成功<br>";
	// }
	mysqli_query($db_link,"SET NAMES 'utf8'");  //設定字元集與編碼為utf-8
	$seldb=@mysqli_select_db($db_link,"tv");
	// if(!$seldb){
	// 	die("資料庫選擇失敗<br>");
	// }else{
	// 	echo"資料庫選擇成功<br>";
	// }
?>