<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';
	
	$title = $_POST['title'];
	$content = $_POST['content'];
	$price = $_POST['price'];
	$author = $_POST['author'];
	$cur_ip = $_SERVER['REMOTE_ADDR'];


	$file_flag = 0;
	$i = 0;
	$col = "";
	$val = "";
	
	foreach ($_FILES["pictures"]["error"] as $key => $error) {
		$name = "";
		if ($error == UPLOAD_ERR_OK) {
			$file_flag++;
			$tmp_name = $_FILES["pictures"]["tmp_name"][$key];
			$name = basename($_FILES["pictures"]["name"][$key]);
			move_uploaded_file($tmp_name, "D:/xampp/portfolio_first/adm/data/".$name);
		}
		$i++;
		$col.= " ,pd_img". $i ." ";
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

	if($file_flag == 0){
		$sql = " INSERT INTO notice (title, content, writer, cur_date, cur_ip) VALUES ('$title', '$content', '$author', now(), '$cur_ip')";
	} else {
		$sql = " INSERT INTO gallery (pd_title, pd_content, pd_price, pd_writer, pd_date, pd_ip ". $col .") VALUES ('$title', '$content', '$price', '$author', now(), '$cur_ip' ". $val .")";
	}
	mysqli_query($mysqli, $sql);
	
	mysqli_close($mysqli);

	echo "<script>location.href='/index.php';</script>";
?>

