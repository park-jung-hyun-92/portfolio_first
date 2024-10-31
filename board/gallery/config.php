<?php

	// 현재 페이지 세팅
//	$cur_page = $_GET['page'];
//	if($cur_page == ""){
//		$cur_page = $_POST['page']; 
//	}
	$cur_page = get_post_val('page');
	$page = number_val($cur_page, 1);
	
	// 현재 페이지 정렬 세팅
//	$cur_select_align = $_GET['select_align'];
//	if($cur_select_align == ""){
//		$cur_select_align = $_POST['select_align'];
//	}
	$cur_select_align = get_post_val('select_align');
	$select_align = string_val($cru_select_align, 'asc');
	
	// 검색시 텍스트 값 세팅
//	$cur_serch_text = $_GET['serch_text'];
//	if($cur_serch_text == ""){
//		$cur_serch_text = $_POST['serch_text'];
//	}
	$cur_serch_text = get_post_val('serch_text');
	$serch_text = string_val($cur_serch_text); // 검색을 한번 하게 되면, list 페이지 들어오면서 $serch_text 변수에 값을 세팅하고, 현재 값을 쿼리에서 각 컬럼의 값으로 사용

	// 현재 게시물 idx 값 세팅
//	$cur_num = $_GET['num'];
//	if($cur_num == ""){
//		$cur_num = $_POST['num']; 
//	}	
	$num = get_post_val('num');
	
//	$category = $_POST['select_val'];
	$category = get_post_val('select_val');
	
//	$title = $_POST['title'];
	$title = get_post_val('title');
	
//	$content = $_POST['content'];
	$content = get_post_val('content');
	
//	$price = $_POST['price'];
	$price = get_post_val('price');
	
//	$writer = $_POST['writer'];
	$writer = get_post_val('writer');
	
	$cur_ip = $_SERVER['REMOTE_ADDR'];
	
	$add_domain = "serch_text=".$serch_text."&select_align=".$select_align."&page=";

?>