<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';

	$num = $_POST['num'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$writer = $_POST['writer'];
	$serch_text = $_POST['serch_text'];
	$select_align = $_POST['select_align'];
	$page = $_POST['page'];

	$add_domain = "serch_text=".$serch_text."&select_align=".$select_align."&page=".$page;

	if($_POST['mode'] == 'btn_delete'){		
		
		$sql = " DELETE FROM notice WHERE num = ".$num;
		mysqli_query($mysqli, $sql);
		mysqli_close($mysqli);
		
	}else if($_POST['mode'] == 'btn_edit'){
		
		$sql = " UPDATE notice SET title = '".$title."', content = '".$content."', writer = '".$writer."' WHERE num = ".$num;
		$result = mysqli_query($mysqli, $sql);
		mysqli_close($mysqli);
	}
	echo "<script>location.href='./list.php?$add_domain';</script>";
?>




