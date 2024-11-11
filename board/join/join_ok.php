<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/board/join/config.php';

	if(empty($agree_sms)){
		$agree_sms = 'N';
	}
	if(empty($agree_email)){
		$agree_email = 'N';
	}

	$sql = " SELECT PASSWORD('$pw') AS pwd ";
	$result = mysqli_query($mysqli, $sql);
	$result_password = mysqli_fetch_assoc($result);
	
	$pwd = $result_password['pwd'];

	$sql = " INSERT INTO JOIN ( id, pw, name, nickname, addr, phone, email, agree_sms, agree_email, authority, level, cur_date) VALUES ('$id', '$pwd', '$name', '$nickname', '$addr', '$phone', '$email', '$agree_sms', '$agree_email', '2', '9', now()) ";

	mysqli_query($mysqli, $sql);
	mysqli_close($mysqli);

	echo "<script>alert('회원가입을 축하드립니다.^^*');</script>";
	echo "<script>location.href='/index.php';</script>";
?>