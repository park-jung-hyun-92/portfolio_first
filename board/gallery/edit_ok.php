<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';

	$num = $_POST['num'];
	$category = $_POST['select_val'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$price = $_POST['price'];
	$writer = $_POST['writer'];
	$serch_text = $_POST['serch_text'];
	$select_align = $_POST['select_align'];
	$page = $_POST['page'];
	
	$i = 0;
	$col = "";
	$val = "";
	$column_img = ""; // 초기화
	
	
	
	
	// 첨부파일 전용 SQL문 만들기
	// 삭제가 있으면 해당 컬럼 빈값으로 업데이트 

	
	// 체크박스(삭제)를 체크한 경우, DB에서 이미지 파일 컬럼의 값을 ''(빈값)으로 수정
	for($i=1; $i<6; $i++){
		if($_POST['check_val'.$i] == 'y'){		
				$column_img .= "img".$i." = '', ";
		}
	}
	
	
	// 파일 업로드 기능
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
	


	$add_domain = "serch_text=".$serch_text."&select_align=".$select_align."&page=".$page;

	if($_POST['mode'] == 'btn_delete'){		
		
		$sql = " DELETE FROM gallery WHERE num = ".$num;
		mysqli_query($mysqli, $sql);
		mysqli_close($mysqli);
		
	}else if($_POST['mode'] == 'btn_edit'){
		
		$sql = " UPDATE gallery SET ".$column_img. " category = '".$category."', title = '".$title."', content = '".$content."', price = '".$price."', writer = '".$writer."' WHERE num = ".$num;
		$result = mysqli_query($mysqli, $sql);
		mysqli_close($mysqli);
	}
	
	echo "<script>location.href='./gallery.php?$add_domain';</script>";
?>




