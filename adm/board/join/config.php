<?php

	$id = get_post_val('id');
	$pw = get_post_val('pw');
	$name = get_post_val('name');
	$nickname = get_post_val('nickname');
	$gender = get_post_val('gender');
	$sample6_postcode = get_post_val('sample6_postcode'); // 우편번호
	$sample6_address = get_post_val('sample6_address'); // 주소
	$sample6_detailAddress = get_post_val('sample6_detailAddress'); // 상세주소
	$sample6_extraAddress = get_post_val('sample6_extraAddress'); // 참고항목 (동이나 아파트 이름 쓰는 경우)
	$addr = $sample6_postcode." ".$sample6_address." ".$sample6_detailAddress." ".$sample6_extraAddress;
	$phone = get_post_val('phone');
	$email = get_post_val('email');
	$agree_sms = $_POST['agree_sms'];
	$agree_email = $_POST['agree_email'];
		
	// 현재 게시물 등록시 ip 값 세팅
	$cur_ip = $_SERVER['REMOTE_ADDR'];
	
?>