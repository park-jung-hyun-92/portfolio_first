<?php

	$id = get_post_val('id');
	$pw = get_post_val('pw');
	$name = get_post_val('name');
	$nickname = get_post_val('nickname');
	$gender = get_post_val('gender');
	$addr = get_post_val('addr');
	$phone = get_post_val('phone');
	$email = get_post_val('email');
	$agree_sms = $_POST['agree_sms'];
	$agree_email = $_POST['agree_email'];
		
	// 현재 게시물 등록시 ip 값 세팅
	$cur_ip = $_SERVER['REMOTE_ADDR'];
	
?>