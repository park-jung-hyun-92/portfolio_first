<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>글쓰기</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
</head>
<body>

    <!-- 글쓰기 폼 -->
    <div class="container write-form-container">
        <h2>글쓰기</h2>
        <form name="form_write" method="post" action="./write_ok.php" enctype="multipart/form-data">
            <table class="table table-bordered table-form">
                <tbody>
				
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
                            <input type="text" class="form-control" id="author" name="author" placeholder="작성자" required>
                        </td>
                    </tr>
					
					<?php 
						for($i=1; $i<6; $i++){
							echo "					
								<tr>
									<th>첨부파일".$i."</th>
									<td>
										<input type='file' class='form-control-file' id='file".$i."' name='file".$i."' >
									</td>
								</tr>
							";
						}
					?>
                </tbody>
            </table>

            <!-- 제출 버튼 -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">글 작성</button>
                <button type="reset" class="btn btn-secondary">초기화</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>