<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/common/common.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/board/gallery/config.php';

//	$num = $_POST['num'];
//	$category = $_POST['select_val'];
//	$title = $_POST['title'];
//	$content = $_POST['content'];
//	$price = $_POST['price'];
//	$writer = $_POST['writer'];
//	$serch_text = $_POST['serch_text'];
//	$select_align = $_POST['select_align'];
//	$page = $_POST['page'];
	
	$column_img = ""; // 초기화
	$i = 0;
	$j = 0;
	$z = 0;
	$col = "";
	$val = "";
	
	// 체크박스(삭제)를 체크한 경우, 해당 첨부파일의 컬럼의 값을 ''(빈값)으로 세팅
	for($i=1; $i<6; $i++){
		if($_POST['check_val'.$i] == 'y'){
			$column_img .= $comma ."img".$i." = '' ";
			$comma = ", ";
		}
	}
	
	// 내 방식 : 체크박스(삭제)를 체크한 경우, 해당 첨부파일의 컬럼의 값을 ''(빈값)으로 세팅
	//	for($i=1; $i<6; $i++){
	//		if($_POST['check_val'.$i] == 'y'){
	//			$j++;
	//			if($j == 1){ // ,(콤마) 구분으로 인한 분개처리
	//				$column_img .= "img".$i." = '' ";
	//			}else{
	//				$column_img .= ", img".$i." = '' ";
	//			}
	//		}
	//	}
	
	// 위의 해당되는 첨부파일의 컬럼의 값을 ''(빈값)으로 수정
	if($column_img != ''){
		$sql = " UPDATE gallery SET ".$column_img." WHERE num = ".$num;
		$result = mysqli_query($mysqli, $sql);
	}
	
	// 파일 업로드 기능
	foreach ($_FILES["pictures"]["error"] as $key => $error) { // $key는 인덱스이며, $error는 값임
		$name = ""; // 파일명 초기화 (업로드 했을 때만 파일명 담아서 현재 코드는 없어도 되지만 혹시나 해서 넣어둠)
		if ($error == UPLOAD_ERR_OK) { // $error는 업로드 완료된 값으로 0이며, UPLOAD_ERR_OK 값은 0을 의미
			$tmp_name = $_FILES["pictures"]["tmp_name"][$key];
			$name = basename($_FILES["pictures"]["name"][$key]);
			move_uploaded_file($tmp_name, "D:/xampp/portfolio_first/adm/data/".$name);
		}
		
		$z++; // 이미지 이름 구분값을 위한 변수
		if($error == UPLOAD_ERR_OK){
			$col.= ", img". $z ." = '". $name ."'";
		}
	}
	
//	$add_domain = "serch_text=".$serch_text."&select_align=".$select_align."&page=".$page;
	$add_domain_page = $add_domain.$page;

	if($_POST['mode'] == 'btn_delete'){		
		
		$sql = " DELETE FROM gallery WHERE num = ".$num;
		mysqli_query($mysqli, $sql);
		mysqli_close($mysqli);
		
	}else if($_POST['mode'] == 'btn_edit'){
		
		$sql = " UPDATE gallery SET category = '".$category."', title = '".$title."', content = '".$content."', price = '".$price."', writer = '".$writer."'".$col." WHERE num = ".$num;
		$result = mysqli_query($mysqli, $sql);
		mysqli_close($mysqli);
	}
	
	echo "<script>location.href='./gallery.php?$add_domain_page';</script>";
?>




