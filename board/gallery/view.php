<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
	
	$num = $_GET['num'];
	$page = $_GET['page'];
	$serch_text = $_GET['serch_text'];
	$select_align = $_GET['select_align'];

	$sql = " SELECT * FROM gallery WHERE num = ".$num;
	
	$result = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$row_category = $row['category'];
	$row_title = $row['title'];
	$row_content = $row['content'];
	$row_price = $row['price'];
	$row_writer = $row['writer'];
	
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상세보기</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>

    <!-- 상세보기 폼 -->
    <div class="container write-form-container">
        <form name="form_view" method="post" action="./edit.php" >
            <table class="table table-bordered table-form">
                <tbody>
					<tr>
                        <th>카테고리</th>
                        <td style="text-align:left;">
							<?php 
								switch($row_category){
									case '':
										echo '';
										break;
									case '1':
										echo '아우터';
										break;
									case '2':
										echo '상의';
										break;
									case '3':
										echo '하의';
										break;
									case '4':
										echo '패션잡화';
										break;
								}
							?>
                        </td>
                    </tr>
					<tr>
                        <th>제목</th>
                        <td style="text-align:left;">
                            <?php echo $row_title; ?>
                        </td>
                    </tr>
					<tr>
                        <th>내용</th>
                        <td style="text-align:left;">
                            <?php echo $row_content; ?>
                        </td>
                    </tr>
					<tr>
                        <th>가격</th>
                        <td style="text-align:left;">
                            <?php echo $row_price; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td style="text-align:left;">
                            <?php echo $row_writer; ?>
                        </td>
                    </tr>
					
					<?php for($i=1; $i<6; $i++){ 
						$img = 'img'.$i; // "img1~5"라는 이름의 변수(DB 컬럼명)를 만듬
						$row_img = $row[$img]; // $row['img5'] 값을 가져옴	
					?>
						<tr>
							<th>첨부파일<?php echo $i; ?></th>
							<td style="text-align:left;">
								<?php echo $row_img; ?>
							</td>
						</tr>
					<?php } ?>
                </tbody>
            </table>
			
			<div>
				<input type="hidden" name="num" value="<?php echo $num; ?>">
				<input type="hidden" name="serch_text" value="<?php echo $serch_text; ?>">
				<input type="hidden" name="select_align" value="<?php echo $select_align; ?>">
				<input type="hidden" name="page" value="<?php echo $page; ?>">
			</div>

            <!-- 제출 버튼 -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary" id="btn_edit" name="mode" value="btn_edit">글 수정</button>
                <button type="button" class="btn btn-secondary" id="btn_cancle">이전</button>
            </div>
        </form>
    </div>
	
	<script>
		// 이전페이지 이동
		$('#btn_cancle').on('click', function() {
			history.go(-1);
		});
	</script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>