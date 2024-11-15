<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/board/join/config.php';

	if(empty($agree_sms)){ // isset($_POST['agree_sms']) ? $_POST['agree_sms'] : 'N'; 이렇게도 가능
		$agree_sms = 'N';
	}
	if(empty($agree_email)){ // isset($_POST['agree_email']) ? $_POST['agree_email'] : 'N'; 이렇게도 가능
		$agree_email = 'N';
	}

	$sql = " SELECT PASSWORD('$pw') AS pwd ";
	$result = mysqli_query($mysqli, $sql);
	$result_password = mysqli_fetch_assoc($result);
	
	$pwd = $result_password['pwd'];

	$sql = " INSERT INTO member_join ( id, pw, name, nickname, addr, phone, email, agree_sms, agree_email, authority, level, cur_date) VALUES ('$id', '$pwd', '$name', '$nickname', '$addr', '$phone', '$email', '$agree_sms', '$agree_email', '2', '9', now()) ";

echo $sql;
exit;

	mysqli_query($mysqli, $sql);
	mysqli_close($mysqli);

	echo "<script>alert('회원가입을 축하드립니다.^^*');</script>";
	echo "<script>location.href='/index.php';</script>";
?>