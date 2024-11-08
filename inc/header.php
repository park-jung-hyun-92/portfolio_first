<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" href="/css/style.css">
	
	<!-- 제이쿼리 -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	
	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Top Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 top">
                <h2>
					<div class="menu"><a href="/index.php"><img src="/img/logo.jpg" style="width:18%;"></a></div>
					<div class="menu"><a href="/board/gallery/gallery.php?cate=1"><?php echo $cate[1]; ?></a></div>
					<div class="menu"><a href="/board/gallery/gallery.php?cate=2"><?php echo $cate[2]; ?></a></div>
					<div class="menu"><a href="/board/gallery/gallery.php?cate=3"><?php echo $cate[3]; ?></a></div>
					<div class="menu"><a href="/board/gallery/gallery.php?cate=4"><?php echo $cate[4]; ?></a></div>
					<div class="menu"><a href="#">검색</a></div>
					<div class="menu"><a href="#">FAQ</a></div>
					<div class="menu"><a href="/board/notice/list.php">공지사항</a></div>
					<div class="menu"><a href="#">로그인</a></div>			
					<div class="menu"><a href="/board/join/join.php">회원가입</a></div>			
				</h2>
            </div>
        </div>
    </div>