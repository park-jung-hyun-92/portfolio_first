<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/project2/inc/db.php';

	if(empty($agree_sms)){
		$agree_sms = 'N';
	}
	if(empty($agree_email)){
		$agree_email = 'N';
	}

	$sql = " SELECT PASSWORD('$password') AS pwd ";
	$result = mysqli_query($mysqli, $sql);
	$result_password = mysqli_fetch_assoc($result);
	$pwd = $result_password['pwd'];

	$sql = " INSERT INTO MEMBER_JOIN ( `id`, `password`, `name`, `nick`, `dad`, `mom`, `addr`, `phone`, `email`, `agree_sms`, `agree_email`, `authority`, `level`, `cur_date`) VALUES ('$id', '$pwd', '$name', '$nick', '$dad', '$mom', '$addr', '$phone', '$email', '$agree_sms', '$agree_email', '2', '9', now()) ";

	mysqli_query($mysqli, $sql);
	mysqli_close($mysqli);

	echo "<script>alert('회원가입을 축하드립니다.^^*');</script>";
	echo "<script>location.href='/project2/login/login.php';</script>";
?>