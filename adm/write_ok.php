<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';
	
	$title = $_POST['title'];
	$content = $_POST['content'];
	$price = $_POST['price'];
	$author = $_POST['author'];
	$file1 = $_POST['file1'];
	$file2 = $_POST['file2'];
	$file3 = $_POST['file3'];
	$file4 = $_POST['file4'];
	$file5 = $_POST['file5'];
	$cur_ip = $_SERVER['REMOTE_ADDR'];

	if($file1 == '' && $file2 == '' && $file3 == '' && $file4 == '' && $file5 == ''){
		$sql = " INSERT INTO notice (`title`, `content`, `writer`, `cur_date`, `cur_ip`) VALUES ('$title', '$content', '$author', now(), '$cur_ip')";
	} else {
		$sql = " INSERT INTO gallery (`pd_img`, `pd_title`, `pd_content`, `pd_price`, `pd_writer`, `pd_date`, `pd_ip`, `col_2`, `col_3`, `col_4`, `col_5`) VALUES ('$file1', '$title', '$content', '$price', '$author', now(), '$cur_ip', '$file2', '$file3', '$file4', '$file5')";
	}
	mysqli_query($mysqli, $sql);
	
	mysqli_close($mysqli);

	echo "<script>location.href='/index.php';</script>";
?>