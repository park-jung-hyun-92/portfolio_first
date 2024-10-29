<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';
	
	$title = $_POST['title'];
	$content = $_POST['content'];
	$author = $_POST['author'];
	$cur_ip = $_SERVER['REMOTE_ADDR'];

	$sql = " INSERT INTO notice (title, content, writer, cur_date, cur_ip) VALUES ('$title', '$content', '$author', now(), '$cur_ip')";
	
	mysqli_query($mysqli, $sql);
	
	mysqli_close($mysqli);

	echo "<script>location.href='/board/notice/list.php';</script>";
?>

