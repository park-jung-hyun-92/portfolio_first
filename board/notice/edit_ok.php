<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/board/gallery/config.php';

	$add_domain_page = $add_domain.$page;

	if($_GET['mode'] == 'd'){		// 삭제일 때

		$sql = " DELETE FROM notice WHERE num = ".$num;
		mysqli_query($mysqli, $sql);
		
		mysqli_close($mysqli);
		
	}else if($_POST['mode'] == 'u'){ // 수정일 때

		$sql = " UPDATE notice SET title = '".$title."', content = '".$content."', writer = '".$writer."' WHERE num = ".$num;
		$result = mysqli_query($mysqli, $sql);
		
		mysqli_close($mysqli);
		
	}else if($_POST['mode'] == 'w'){ // 글쓰기 일 때
	
		$sql = " INSERT INTO notice (category, title, content, price, writer, cur_date, cur_ip ". $col .") VALUES ('$category', '$title', '$content', '$price', '$writer', now(), '$cur_ip' ". $val .")";
		mysqli_query($mysqli, $sql);
		
		mysqli_close($mysqli);
	}
	
	echo "<script>location.href='./list.php?$add_domain_page';</script>";
?>




