<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/board/gallery/config.php';
	
	if($_GET['mode'] == 'w'){
		$row_category = '';
	} 
	
	if($_GET['mode'] == 'u'){
		$sql = " SELECT * FROM gallery WHERE num = ".$num;
		$result = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_assoc($result);
		
		$row_category = $row['category'];
		$row_title = $row['title'];
		$row_content = $row['content'];
		$row_writer = $row['writer'];
		$row_price = $row['price'];
	}
	
?>

	<div class="container write-form-container">
        <form id="form_view" name="form_view" method="post" action="./edit_ok.php" enctype="multipart/form-data">
            <table class="table table-bordered table-form">
                <tbody>
					<tr>
                        <th>카테고리</th>
                        <td style="text-align:left;">
							<select name="select_val" style="text-align:center;" required>
								<option value="" <?php echo ($row_category == '') ? 'selected' : ''; ?> >=선택=</option>
								<?php foreach($cate as $key => $value) { ?>
									<option value="<?php echo $key; ?>" <?php echo ($row_category == $key) ? 'selected' : ''; ?>><?php echo $value; ?></option>
								<?php } ?>
							</select>
                        </td>
                    </tr>
					<tr>
                        <th>제목</th>
                        <td>
							<?php if($_GET['mode'] == 'u'){ ?>
								<input type="text" class="form-control" id="title" name="title" value="<?php echo $row_title; ?>">
							<?php }else{ ?>
								<input type="text" class="form-control" id="title" name="title" placeholder="제목을 입력하세요" required>
							<?php } ?>
                        </td>
                    </tr>
					<tr>
                        <th>내용</th>
                        <td>
							<?php if($_GET['mode'] == 'u'){ ?>
	                            <textarea class="form-control" id="content" name="content" rows="5"><?php echo $row_content; ?></textarea>
							<?php }else{ ?>
								<textarea class="form-control" id="content" name="content" rows="5" placeholder="내용을 입력하세요" required></textarea>
							<?php } ?>
                        </td>
                    </tr>
					<tr>
                        <th>가격</th>
                        <td>
							<?php if($_GET['mode'] == 'u'){ ?>
								<input type="number" class="form-control" id="price" name="price" value="<?php echo $row_price; ?>">
							<?php }else{ ?>
								<input type="number" class="form-control" id="price" name="price" placeholder="가격을 입력하세요">
							<?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td>
							<?php if($_GET['mode'] == 'u'){ ?>
	                            <input type="text" class="form-control" id="writer" name="writer" value="<?php echo $row_writer; ?>">
							<?php }else{ ?>
								<input type="text" class="form-control" id="writer" name="writer" placeholder="작성자를 입력하세요" required>
							<?php } ?>
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
			<input type="hidden" name="cate" value="<?php echo $get_cate; ?>">
			<input type="hidden" name="mode" id="mode" value="">
		</div>
		
		<!-- 제출 버튼 -->
		<div class="text-center">
			<?php if($_GET['mode'] == 'u'){ ?>
				<button type="button" class="btn btn-primary" id="u">글 수정</button>
			<?php }else{ ?>
				<button type="submit" class="btn btn-primary" id="w" name="mode" value="w">글 작성</button>
			<?php } ?>
			<button type="button" class="btn btn-secondary" id="btn_cancle">목록</button>
		</div>
	</form>

	<script>
		// 글 수정시 메세지 확인창
		$('#u').on('click', function() {
			if(confirm("해당 글을 수정하시겠습니까?")){
				$('[name="mode"]').val('u');
				$('#form_view').submit(); // jQuery를 사용하여 폼 전송
			}
		});
		
		// 목록 버튼 클릭시 목록으로 이동
		$('#btn_cancle').on('click', function() {
			location.href ="./gallery.php?<?= $add_domain; ?><?= $page; ?>";
			// history.go(-1);
		});
	</script>

<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>