<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/db_connect.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/function.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" href="/css/style.css">
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
					<div class="menu"><a href="/gallery/gallery.php">아우터</a></div>
					<div class="menu"><a href="#">상의</a></div>
					<div class="menu"><a href="#">하의</a></div>
					<div class="menu"><a href="#">패션잡화</a></div>
					<div class="menu"><a href="#">검색</a></div>
					<div class="menu"><a href="#">FAQ</a></div>
					<div class="menu"><a href="/notice/list.php">공지사항</a></div>
					<div class="menu"><a href="#">로그인</a></div>			

				</h2>
            </div>
        </div>
    </div>