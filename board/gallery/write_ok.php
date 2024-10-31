<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/board/gallery/config.php';
	
//	$category = $_POST['select_val'];
//	$title = $_POST['title'];
//	$content = $_POST['content'];
//	$price = $_POST['price'];
//	$writer = $_POST['writer'];
//	$cur_ip = $_SERVER['REMOTE_ADDR'];

	$i = 0;
	$col = "";
	$val = "";
	
	foreach ($_FILES["pictures"]["error"] as $key => $error) { // $key는 인덱스이며, $error는 값임
		$name = "";
		if ($error == UPLOAD_ERR_OK) { // UPLOAD_ERR_OK 값은 0
			$tmp_name = $_FILES["pictures"]["tmp_name"][$key];
			$name = basename($_FILES["pictures"]["name"][$key]);
			move_uploaded_file($tmp_name, "D:/xampp/portfolio_first/adm/data/".$name);
		}
		$i++;
		$col.= " ,img". $i ." ";
		$val.= " , '". $name ."' ";	
	}

	/* 내 방식으로 만든 파일업로드
	for($j=0; $j<5; $j++){
		if($_FILES["pictures"]["name"][$j] != ""){
			$tmp_name = $_FILES["pictures"]["tmp_name"][$j];
			$name=  basename($_FILES["pictures"]["name"][$j]);
			move_uploaded_file($tmp_name, "D:/xampp/portfolio_first/adm/data/".$name);
			
			$val.= " , '". $name ."' ";				
		}else{
			$val.= " , '"."'";				
		}
	}
	*/

	$sql = " INSERT INTO gallery (category, title, content, price, writer, cur_date, cur_ip ". $col .") VALUES ('$category', '$title', '$content', '$price', '$writer', now(), '$cur_ip' ". $val .")";

	mysqli_query($mysqli, $sql);
	
	mysqli_close($mysqli);

	echo "<script>location.href='/board/gallery/gallery.php';</script>";
?>

