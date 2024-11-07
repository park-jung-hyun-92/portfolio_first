<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/board/gallery/config.php';
	
	// 조건문 셋팅 (검색 포함)
    $where = "WHERE 1=1";

    if($serch_text != ''){
        $where .= ' AND title LIKE "%'.$serch_text.'%" ';
    }
	
	// 헤더 메뉴 카테고리 별로 리스트 셋팅
    $sql = " SELECT count(*) as total_cnt FROM gallery ".$where;
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);

    $total_list = $row['total_cnt']; // 총 게시글 수
    $list_limit = 8; // 한 페이지에 보여줄 게시글 수
    $list_num = $total_list-$list_limit*($page-1); // 현재 페이지 게시글 번호
    $list_start = $list_limit*($page-1); // 현재 페이지 게시글 시작 번호
    $list_end = $page*$list_limit; // 현재 페이지 게시글 끝 번호

	$sql = " SELECT * FROM notice ".$where." ORDER BY cur_date ".$select_align." limit ".$list_start." , ".$list_limit;
	$result = mysqli_query($mysqli, $sql);
	
?>
	<div class="container">		
		<div class="d-flex justify-content-between align-items-center">
			<!-- 게시판 리스트 정렬 (왼쪽 정렬) -->
			<div class="d-flex justify-content-start">
				<div class="form-group d-inline-block">
					<select id="select_align" class="form-control sel_align" onchange="align();">
						<option value="desc" <?php echo ($select_align == "desc") ? 'selected' : ''; ?>>최신순</option>
						<option value="asc" <?php echo ($select_align == "asc") ? 'selected' : ''; ?>>과거순</option>
					</select>
				</div>
			</div>

			<!-- 검색 입력란과 버튼 (오른쪽 정렬) -->
			<form id="serch_form" method="get" action="./list.php" class="form-inline justify-content-end">
				<div class="form-group">
					<input type="text" id="serch_text" name="serch_text" class="form-control" style="width:196px;" value="<?php echo $serch_text; ?>" placeholder="제목을 검색해주세요.">
					<button type="submit" id="search_btn" class="btn btn-primary">검색</button>
				</div>
			</form>
		</div>
		
    <!-- 게시판 리스트 -->
    <div class="container board-table">
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
						<td><a href="./view.php?<?php echo $add_domain; ?><?php echo $page; ?>&num=<?php echo $row['num']; ?>"><?php echo $list_num; ?></td>
						<td><a href="./view.php?<?php echo $add_domain; ?><?php echo $page; ?>&num=<?php echo $row['num']; ?>"><?php echo $row['title']; ?></a></td>
						<td><a href="./view.php?<?php echo $add_domain; ?><?php echo $page; ?>&num=<?php echo $row['num']; ?>"><?php echo $row['writer']; ?></td>
						<td><a href="./view.php?<?php echo $add_domain; ?><?php echo $page; ?>&num=<?php echo $row['num']; ?>"><?php echo $row['cur_date']; ?></td>
					</tr>
			<?php 
					$list_num--;
				}
			?>
            </tbody>
        </table>
		
		<!-- 페이지네이션과 글쓰기 버튼 -->
		<div class="d-flex justify-content-center align-items-center">
			<div class="d-flex justify-content-center w-100">
				<?php
					$rt = pagination($page, $total_list, $list_limit, 5, './list.php?' . $add_domain);
					echo $rt;
				?>
			</div>
			<div class="d-flex justify-content-end align-items-center" style="margin-bottom:8px;">
				<button id="write_btn" class="btn btn-success">글쓰기</button>
			</div>
		</div>

		<script>
			var select_align;
			// 게시글 날짜순(오름차순, 내림차순) 정렬 기능
			function align(){
				serch_text = document.getElementById('serch_text').value;
				select_align = document.getElementById('select_align').value;

				location.href = "./notice.php?serch_text="+serch_text+"&select_align="+select_align+"&page=<?= $page; ?>";
			}
			
			// 글쓰기 페이지 이동
			$('#write_btn').on('click', function() {
				window.location.href = "./edit.php?mode=w";
			});
		</script>
	
<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>