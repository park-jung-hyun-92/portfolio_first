<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/board/gallery/config.php';
	
	if($_GET['mode'] == 'u'){
		$sql = " SELECT * FROM notice WHERE num = ".$num;
		$result = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_assoc($result);
		
		$row_title = $row['title'];
		$row_content = $row['content'];
		$row_writer = $row['writer'];
	}
?>

	<div class="container write-form-container">
        <form id="form_view" name="form_view" method="post" action="./edit_ok.php">
            <table class="table table-bordered table-form">
                <tbody>
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
                        <th>작성자</th>
                        <td>
							<?php if($_GET['mode'] == 'u'){ ?>
	                            <input type="text" class="form-control" id="writer" name="writer" value="<?php echo $row_writer; ?>">
							<?php }else{ ?>
								<input type="text" class="form-control" id="writer" name="writer" placeholder="작성자를 입력하세요" required>
							<?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
			
		<div>
			<input type="hidden" name="num" value="<?php echo $num; ?>">
			<input type="hidden" name="serch_text" value="<?php echo $serch_text; ?>">
			<input type="hidden" name="select_align" value="<?php echo $select_align; ?>">
			<input type="hidden" name="page" value="<?php echo $page; ?>">
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
			location.href ="./list.php?<?= $add_domain; ?><?= $page; ?>";
			// history.go(-1);
		});
	</script>

<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>