<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';

	$num = $_POST['num'];
	$serch_text = $_POST['serch_text'];
	$page = $_POST['page'];
	
	$sql = " SELECT * FROM notice WHERE num = ".$num;
	$result = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$row_title = $row['title'];
	$row_writer = $row['writer'];
?>

	<div class="container write-form-container">
        <form name="form_view" method="post" action="./edit_ok.php" >
            <table class="table table-bordered table-form">
                <tbody>
					<tr>
                        <th>카테고리</th>
                        <td style="text-align:left;">
							<select name="select_val" style="text-align:center;" required>
								<option value="">=선택=</option>
								<option value="1">아우터</option>
								<option value="2">상의</option>
								<option value="3">하의</option>
								<option value="4">패션잡화</option>
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
                            <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                        </td>
                    </tr>
					<!--
					<tr>
                        <th>가격</th>
                        <td>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $row_price; ?>">
                        </td>
                    </tr>
                    <tr>
					-->
                        <th>작성자</th>
                        <td>
                            <input type="text" class="form-control" id="writer" name="writer" value="<?php echo $row_writer; ?>">
                        </td>
                    </tr>
					
					<?php for($i=1; $i<6; $i++){ ?>
						<tr>
							<th>첨부파일<?php echo $i; ?></th>
							<td>
								<input type='file' class='form-control-file' id='pictures[]' name='pictures[]' />
							</td>
						</tr>
					<?php } ?>
                </tbody>
            </table>
			
		<div>
			<input type="hidden1" name="num" value="<?php echo $num; ?>">
			<input type="hidden1" name="serch_text" value="<?php echo $serch_text; ?>">
			<input type="hidden1" name="page" value="<?php echo $page; ?>">
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