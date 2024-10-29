<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';

	$num = $_POST['num'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$writer = $_POST['writer'];
	$serch_text = $_POST['serch_text'];
	$page = $_POST['page'];

	if($_POST['mode'] == 'btn_delete'){			
		$sql = " DELETE FROM notice WHERE num = ".$num;
		mysqli_query($mysqli, $sql);
		mysqli_close($mysqli);
		
		echo "<script>location.href='./list.php';</script>";
	}else if($_POST['mode'] == 'btn_edit'){
		
		$sql = " UPDATE notice SET title = '".$title."', content = '".$content."', writer = '".$writer."' WHERE num = ".$num;
		$result = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_assoc($result);
		mysqli_close($mysqli);
	}
	
	$add_domain = "page="$page."&serch_text=".$serch_text;
	echo "<1script>location.href='./list.php?'".$add_domain."';</script>";
?>




