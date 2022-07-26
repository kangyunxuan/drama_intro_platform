$(function() {
	$("#check").click (function() {
		if($('#inputEmail').val()=='[email protected]'&& $('#inputPassword').val()=='123'){
	 		alert('登陸成功！');

			return true;
	 	}else {
	 		$('#inputEmail').val('');//清空輸入框
	 		$('#inputPassword').val('');
	 		alert('登陸失敗！');

	 		return false;
	 	}
	 });
});