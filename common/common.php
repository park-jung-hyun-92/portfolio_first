<?php 
	error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING ); // 진짜 심각한 오류들만 알려주는 기능
	
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/db_connect.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/function.php';
	
	$cate = array(
		"1" => "아우터",
		"2" => "상의",
		"3" => "하의",
		"4" => "패션잡화",
	);
?>