<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/board/gallery/config.php';
	
//	// 현재 페이지 셋팅
//	$page = cur_val($_GET['page'], 1, '1');
//	
//	// 정렬
//	$select_align = cur_val($_GET['select_align']);
//	echo $select_align;
//	// 검색시 사용할 변수 선언
//	$serch_text = '';
//	
//	// 검색시 텍스트 값
//	$serch_text = cur_val($_GET['serch_text'], '', '2'); // 검색을 한번 하게 되면, list 페이지 들어오면서 $serch_text 변수에 값을 세팅하고, 현재 값을 쿼리에서 각 컬럼의 값으로 사용
	
	// 조건문 셋팅 (검색 포함)
	$where = "WHERE 1=1";
	
	if($serch_text != ''){
		$where = $where.' AND title LIKE "%'.$serch_text.'%" ';
	}
			
	$sql = " SELECT count(*) as total_cnt FROM gallery ".$where;
	$result = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$total_list = $row['total_cnt']; // 총 게시글 수
	$list_limit = 8; // 한페이지에 보여줄 게시글 수
	$list_num = $total_list-$list_limit*($page-1); // 현재페이지 게시글 번호
	$list_start = $list_limit*($page-1); // 현재페이지 게시글 시작번호
	$list_end = $page*$list_limit; // 현재페이지 게시글 끝번호

	$sql = " SELECT * FROM gallery ".$where." ORDER BY cur_date ".$select_align." limit ".$list_start." , ".$list_limit;
	$result = mysqli_query($mysqli, $sql);
	
	// 페이지 도메인 세팅
	// $add_domain = "serch_text=".$serch_text."&select_align=".$select_align."&page="; // $serch_text 값을 페이지 이동시 원하는 컬럼의 값으로 사용하면 됨
?>

	<!-- 게시판 리스트 정렬 -->
	<div>
		<select id="select_align" style="text-align:center;" onchange="align();">
			<option value="desc" <?php echo ($select_align == "desc") ? 'selected' : ''; ?>>최신순</option>
			<option value="asc" <?php echo ($select_align == "asc") ? 'selected' : ''; ?>>과거순</option>
		</select>
	</div>
	
    <!-- 갤러리 게시판 상품 리스트 -->
    <div class="container gallery-container">
        <div class="row">
			<?php
				while ($row = mysqli_fetch_assoc($result)){
			?>
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="card">
							<img src="/img/<?php echo $row['img1']; ?>" class="card-img-top">
							<div class="card-body">
								<input type="hidden" name="list_num" value="<?php echo $list_num ?>">
								<h5 class="card-title"><a href="./view.php?<?php echo $add_domain; ?><?php echo $page; ?>&num=<?php echo $row['num']; ?>"><?php echo $row['title']; ?></a></h5>
								<p class="card-text"><?php echo $row['content']; ?></p>
								<p class="price"><?php echo $row['price']; ?></p>
							</div>
						</div>
					</div>
			<?php 
					$list_num--;
				}
			?>
		</div>	
			
		<?php
			$rt = pagination($page, $total_list, $list_limit, 5, './gallery.php?'.$add_domain); // 현재페이지, 총리스트 수, 한페이지에 보여줄 게시글 수, 한 블럭당 페이지 수, 페이지도메인
			
			echo $rt;
		?>
    </div>
	
	<form id="serch_form" method="get" action="./gallery.php" >
		<div>
			<input type="text" id="serch_text" name="serch_text" value="<?php echo $serch_text; ?>" placeholder="제목을 검색해주세요.">
			<input type="submit" id="search_btn" value="검색">
		</div>
	</form>	
	
	<div>
		<input type="button" id="write_btn" value="글쓰기"></button>
	</div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<script>
		var select_align;
		// 게시글 날짜순(오름차순, 내림차순) 정렬 기능
		function align(){
			serch_text = document.getElementById('serch_text').value;
			select_align = document.getElementById('select_align').value;

			location.href = "./gallery.php?serch_text="+serch_text+"&select_align="+select_align+"&page=<?=$page;?>";
		}
		
		// 글쓰기 페이지 이동
		$('#write_btn').on('click', function() {
			window.location.href = './write.php';
		});
	</script>
</body>
</html>

<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>