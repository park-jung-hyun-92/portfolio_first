<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
	
	$sql = " SELECT * FROM notice ";
	$result = mysqli_query($mysqli, $sql);
?>
    <!-- 게시판 리스트 -->
    <div class="container board-table">
        <h2>공지사항</h2>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">번호</th>
                    <th scope="col">제목</th>
                    <th scope="col">작성자</th>
                    <th scope="col">작성일</th>
                </tr>
            </thead>
            <tbody>
			<?php
				while ($row = mysqli_fetch_assoc($result)){
			?>
					<tr>
						<td><?php echo $row['num']; ?></td>
						<td><?php echo $row['title']; ?></a></td>
						<td><?php echo $row['writer']; ?></td>
						<td><?php echo $row['cur_date']; ?></td>
					</tr>
			<?php } ?>
            </tbody>
        </table>

        <!-- 페이지네이션 -->
		<nav aria-label="Page navigation">
			<ul class="pagination justify-content-center">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">이전</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">다음</a>
				</li>
			</ul>
		</nav>
	</div>
	
<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>