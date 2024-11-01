<?php

	// 현재 페이지 값 세팅
	$cur_page = get_post_val('page');
	$page = number_val($cur_page, 1);
	
	// 현재 페이지 정렬 값 세팅
	$cur_select_align = get_post_val('select_align');
	$select_align = string_val($cur_select_align, 'asc');
	
	// 검색시 텍스트 값 세팅
	$cur_serch_text = get_post_val('serch_text');
	$serch_text = string_val($cur_serch_text); // 검색을 한번 하게 되면, list 페이지 들어오면서 $serch_text 변수에 값을 세팅하고, 현재 값을 쿼리에서 각 컬럼의 값으로 사용

	// 현재 게시물 idx 값 세팅
	$num = get_post_val('num');
	
	// 현재 게시물 카테고리 값 세팅
	$category = get_post_val('select_val');
	
	$title = get_post_val('title');
	$content = get_post_val('content');
	$price = get_post_val('price');
	$writer = get_post_val('writer');
	
	// 현재 게시물 등록시 ip 값 세팅
	$cur_ip = $_SERVER['REMOTE_ADDR'];
	
	// 현재 페이지 도메인 값 세팅
	$add_domain = "serch_text=".$serch_text."&select_align=".$select_align."&page=";

?>