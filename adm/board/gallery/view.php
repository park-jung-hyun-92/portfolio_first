<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/board/gallery/config.php';
	
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
        <form name="form_view" method="get" action="./edit.php" >
            <table class="table table-bordered table-form">
                <tbody>
					<tr>
                        <th>카테고리</th>
                        <td style="text-align:left;">
							<?php echo $cate[$row_category]; ?>
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
                            <?php echo number_format($row_price); ?>
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
							<td class="view_file" style="text-align:left;">
								<a href="./download.php?filename=<?php echo $row_img; ?>"><?php echo $row_img; ?></a>
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
				<input type="hidden" name="cate" value="<?php echo $get_cate; ?>">
			</div>

            <!-- 제출 버튼 -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary" id="btn_edit" name="mode" value="u">글 수정</button>
				<button type="button" class="btn btn-primary" id="d">글 삭제</button>
                <button type="button" class="btn btn-secondary" id="btn_cancle">목록</button>
            </div>
        </form>
    </div>
	
	<script>
		// 삭제 기능
		$('#d').on('click', function() {
			if(confirm("해당 글을 삭제하시겠습니까?")){
				location.href ="./edit_ok.php?mode=d&num=<?= $num; ?>";
			}
		});
		
		// 목록 버튼 클릭시 목록으로 이동
		$('#btn_cancle').on('click', function() {
			location.href ="./gallery.php?<?= $add_domain; ?><?= $page; ?>";
			// history.go(-1);				
		});
	</script>

</body>
</html>

<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>