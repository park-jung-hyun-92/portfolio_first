<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/adm/common/common.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/adm/board/gallery/config.php';
	
	$target_Dir = "D:/xampp/portfolio_first/adm/data/";
	$file = $_GET['filename'];
	$down = $target_Dir.$file;
	$filesize = filesize($down);
	  
	if(file_exists($down)){
		$file_extension = pathinfo($file, PATHINFO_EXTENSION);
		
		switch($file_extension) {
			case "jpg":
			case "jpeg":
				header("Content-Type: image/jpeg");
				break;
			case "png":
				header("Content-Type: image/png");
				break;
			case "pdf":
				header("Content-Type: application/pdf");
				break;
			default:
				header("Content-Type: application/octet-stream");
		}

		header("Content-Disposition: attachment; filename=\"" . rawurlencode($file) . "\"");
		header("Content-Transfer-Encoding:binary");
		header("Content-Length: " . filesize($down));
		header("Cache-Control:cache,must-revalidate");
		header("Pragma:no-cache");
		header("Expires:0");
		
		if(is_file($down)){
			$fp = fopen($down,"r");
			while(!feof($fp)){
			  $buf = fread($fp,8096);
			  $read = strlen($buf);
			  print($buf);
			  flush();
			}
			fclose($fp);
		}
	  } else{
		echo "<script>alert('존재하지 않는 파일입니다.')</script>";
	  }
?>