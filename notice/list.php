<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
	
	// 현재 페이지 셋팅
	if(empty($_GET['page']) || !is_numeric($_GET['page'])){ // empty() : 0, null, '' 모두 false이므로 확실하게 판단 가능
		$page = 1;
	}else{
		$page = $_GET['page'];
	}
	
	$sql = " SELECT count(*) as total_cnt FROM notice";
	$result = mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$total_list = $row['total_cnt']; // 총 게시글 수
	$list_limit = 10; // 한페이지에 보여줄 게시글 수
	$list_num = $total_list-$list_limit*($page-1); // 현재페이지 게시글 번호
	$list_start = $list_limit*($page-1); // 현재페이지 게시글 시작번호
	$list_end = $page*$list_limit; // 현재페이지 게시글 끝번호

	$sql = " SELECT * FROM notice ORDER BY cur_date DESC limit ".$list_start." , ".$list_limit;
	$result = mysqli_query($mysqli, $sql);
		
	$add_domain = "./list.php?page="; // 페이지 도메인 세팅
?>
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
						<td><?php echo $list_num; ?></td>
						<td><?php echo $row['title']; ?></a></td>
						<td><?php echo $row['writer']; ?></td>
						<td><?php echo $row['cur_date']; ?></td>
					</tr>
			<?php 
					$list_num--;
				}
			?>
            </tbody>
        </table>
		<?php
			$rt = pagination($page, $total_list, $list_limit, 5, $add_domain); // 현재페이지, 총리스트 수, 한페이지에 보여줄 게시글 수, 한 블럭당 페이지 수, 페이지도메인
			
			echo $rt;
		?>
	</div>
	
<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>