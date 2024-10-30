<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';

	$num = $_POST['num'];
	$serch_text = $_POST['serch_text'];
	$select_align = $_POST['select_align'];
	$page = $_POST['page'];
	
	
	if($_POST['mode'] == ''){
		$row_category = '2';
	}
	
	if($_POST['mode'] == 'u'){
		$sql = " SELECT * FROM gallery WHERE num = ".$num;
		$result = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_assoc($result);
		
		$row_category = $row['category'];
		$row_title = $row['title'];
		$row_content = $row['content'];
		$row_writer = $row['writer'];
		$row_price = $row['price'];
	}

	$sql = " SELECT * FROM gallery WHERE num = ".$num;
		$result = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_assoc($result);
		
		$row_category = $row['category'];
		$row_title = $row['title'];
		$row_content = $row['content'];
		$row_writer = $row['writer'];
		$row_price = $row['price'];
	

	
?>

	<div class="container write-form-container">
        <form name="form_view" method="post" action="./edit_ok.php" enctype="multipart/form-data">
            <table class="table table-bordered table-form">
                <tbody>
					<tr>
                        <th>카테고리</th>
                        <td style="text-align:left;">
							<select name="select_val" style="text-align:center;" required>
								<option value="" <?php echo ($row_category == '') ? 'selected' : ''; ?> >=선택=</option>
								<?php foreach($cate as $key => $value) { ?>
									<option value="<?php echo $key; ?>" <?php echo ($row_category == '1') ? 'selected' : ''; ?>><?php echo $value; ?></option>
								<?php } ?>
								
								
								<option value="1" <?php echo ($row_category == '1') ? 'selected' : ''; ?>>아우터</option>
								<option value="2" <?php echo ($row_category == '2') ? 'selected' : ''; ?>>상의</option>
								<option value="3" <?php echo ($row_category == '3') ? 'selected' : ''; ?>>하의</option>
								<option value="4" <?php echo ($row_category == '4') ? 'selected' : ''; ?>>패션잡화</option>
							</select>
                        </td>
                    </tr>
					<tr>
                        <th>제목</th>
                        <td>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row_title; ?>">
                        </td>
                    </tr>
					<tr>
                        <th>내용</th>
                        <td>
                            <textarea class="form-control" id="content" name="content" rows="5"><?php echo $row_content; ?></textarea>
                        </td>
                    </tr>
					<tr>
                        <th>가격</th>
                        <td>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $row_price; ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td>
                            <input type="text" class="form-control" id="writer" name="writer" value="<?php echo $row_writer; ?>">
                        </td>
                    </tr>
					
					<?php for($i=1; $i<6; $i++){ 
						$img = 'img'.$i; // "img1~5"라는 이름의 변수(DB 컬럼명)를 만듬
						$row_img = $row[$img]; // $row['img5'] 값을 가져옴		
					?>
						<tr>
							<th>첨부파일<?php echo $i; ?></th>
							<td style="text-align:left;">
								<input type='file' class='form-control-file' id='pictures[]' name='pictures[]'  value="<?php echo $row_img; ?>"  />
								<?php echo $row_img; ?>&nbsp;&nbsp;<?php echo $row_img != '' ? '<input type="checkbox" name="check_val'.$i.'" value="y">&nbsp삭제' : ''; ?>
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
			<button type="submit" class="btn btn-primary" id="btn_delete" name="mode" value="btn_delete">글 삭제</button>
			<button type="button" class="btn btn-secondary" id="btn_cancle">이전</button>
		</div>
	</form>

	<script>
		// 목록 버튼 클릭시 이전 페이지 이동
		$('#btn_cancle').on('click', function() {
			history.go(-1);
		});
	</script>

<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>