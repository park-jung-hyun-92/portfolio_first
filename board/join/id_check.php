<?php
	// header('Content-Type: application/json'); // Content-Type을 JSON으로 설정 >>> 이 문장이 있으면, 앞에 ajax 셋팅시 dataType: 'json' 안해도 됨

	include_once $_SERVER['DOCUMENT_ROOT'].'/project2/inc/db.php';

	$id_val = $_POST['id'];

	$sql = " SELECT count(`id`) as cnt FROM member_join WHERE id = '$id_val' ";
	$result = mysqli_query($mysqli, $sql);
	$result = mysqli_fetch_assoc($result);

	if($result['cnt'] != 0){
		$response = array('status' => 'fail', 'message' => '이미 존재합니다.');
	}else{
		$response = array('status' => 'success', 'message' => '사용 가능합니다.');
	}

	echo json_encode($response);

	mysqli_close($mysqli);
?>