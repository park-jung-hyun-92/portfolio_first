<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
	
	// 현재 페이지 셋팅
	if(empty($_GET['page']) || !is_numeric($_GET['page'])){ // empty() : 0, null, '' 모두 false이므로 확실하게 판단 가능
		$page = 1;
	}else{
		$page = $_GET['page'];
	}
	
	$sql = " SELECT count(*) as total_cnt FROM gallery ";
	$result = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$total_list = $row['total_cnt']; // 총 게시글 수
	$list_limit = 8; // 한페이지에 보여줄 게시글 수
	$list_num = $total_list-$list_limit*($page-1); // 현재페이지 게시글 번호
	$list_start = $list_limit*($page-1); // 현재페이지 게시글 시작번호
	$list_end = $page*$list_limit; // 현재페이지 게시글 끝번호
	
	$page_limit = 5; // 현재 페이지 수
	$page_total = ceil($total_list / $list_limit); // 총 페이지 수
	$page_start = ( ( floor( ($page - 1 ) / $page_limit ) ) * $page_limit ) + 1; // 현재 페이지 시작번호
	$page_end = $page_start+$page_limit-1; // 현재 페이지 마지막번호
	
	// 이전페이지 세팅
	$pre = ($page-1);
	if($pre < 2){
		$pre = 1;
	}
	// 다음페이지 세팅
	$next = ($page+1);
	if($next >= $page_total){
		$next = $page_total;
	}
	
	$sql = " SELECT * FROM gallery ORDER BY pd_date DESC limit ".$list_start." , ".$list_limit;
	$result = mysqli_query($mysqli, $sql);
?>

    <!-- 갤러리 게시판 상품 리스트 -->
    <div class="container gallery-container">
        <h3 style="margin-bottom:14px;">갤러리 리스트</h3>
        <div class="row">
			<?php
				while ($row = mysqli_fetch_assoc($result)){
			?>
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="card">
							<img src="/img/<?php echo $row['pd_img']; ?>" class="card-img-top">
							<div class="card-body">
								<input type="hidden" name="pd_num" value="<?php echo $list_num ?>">
								<h5 class="card-title"><a href="#"><?php echo $row['pd_title']; ?></a></h5>
								<p class="card-text"><?php echo $row['pd_content']; ?></p>
								<p class="price"><?php echo $row['pd_price']; ?></p>
							</div>
						</div>
					</div>
			<?php 
					$list_num--;
				}
			?>
		</div>	
		
		<?php
			$add_domain = "./gallery.php?page="; // 페이지 도메인 세팅
		?>
		
		<!-- 페이지네이션 -->
		<nav aria-label="Page navigation">
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" href="<?php echo $add_domain; ?>1">처음</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="<?php echo $add_domain.$pre; ?>">이전</a>
				</li>
				<?php
					for($i=$page_start; $i<=$page_end; $i++){
						if($page == $i){
							echo "<li class='page-item'><a class='page-link'>".$i."</a></span>";
						}else if($i > $page_total){
							continue;
						}else{
							echo "<li class='page-item'><a class='page-link' href='".$add_domain.$i."'>".$i."</a></span>";
						}
					}
				?>
				<li class="page-item">
					<a class="page-link" href="<?php echo $add_domain.$next; ?>">다음</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="<?php echo $add_domain.$page_total; ?>">마지막</a>
				</li>
			</ul>
		</nav>
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