<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/js/function.php';
	
	// 현재 페이지 셋팅
	if(empty($_GET['page']) || !is_numeric($_GET['page'])){ // empty() : 0, null, '' 모두 false이므로 확실하게 판단 가능
		$page = 1;
	}else{
		$page = $_GET['page'];
	}
	
	$tbl = 'notice';
	
	$rt_list_num = pagination ($tbl, $page, 10); // 테이블명, 현재페이지, 한페이지에 보여줄 게시글 수
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
				while ($row = total_cnt($tbl)){
			?>
					<tr>
						<td><?php echo $rt_list_num; ?></td>
						<td><?php echo $row['title']; ?></a></td>
						<td><?php echo $row['writer']; ?></td>
						<td><?php echo $row['cur_date']; ?></td>
					</tr>
			<?php 
					if($rt_list_num <= 60){
						exit;
					}
					$rt_list_num--;
				}
			?>
            </tbody>
        </table>
		<?php
			$rt = pagination2 ($tbl, 'cur_date', $page, 10, 5); // 테이블명, order by 컬럼명, 현재페이지, 한페이지에 보여줄 게시글 수, 한 블럭당 페이지 수
			
			echo $rt;
		?>
	</div>
	
<?php
	include_once  $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>