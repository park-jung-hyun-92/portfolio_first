<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/board/gallery/config.php';
?>

    <!-- 글쓰기 폼 -->
    <div class="container write-form-container">
        <form name="form_write" method="post" action="./write_ok.php" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" id="title" name="title" placeholder="제목" required>
                        </td>
                    </tr>
					<tr>
                        <th>내용</th>
                        <td>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="내용을 입력하세요" required></textarea>
                        </td>
                    </tr>
					<tr>
                        <th>가격</th>
                        <td>
                            <input type="number" class="form-control" id="price" name="price" placeholder="가격">
                        </td>
                    </tr>
                    <tr>
                        <th>작성자</th>
                        <td>
                            <input type="text" class="form-control" id="writer" name="writer" placeholder="작성자" required>
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

            <!-- 제출 버튼 -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">글 작성</button>
                <button type="reset" class="btn btn-secondary">초기화</button>
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

<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>