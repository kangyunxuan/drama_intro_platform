<?php
session_start();
if (isset($_SESSION['member'])) {
	unset($_SESSION['member']);
	echo '登出成功。';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
} else {
	echo '您原本就已登出。';
}
?>

