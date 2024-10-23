<?php
	function total_cnt($tbl){
		global $mysqli;
		
		$sql = " SELECT count(*) as total_cnt FROM ".$tbl;
		$result = mysqli_query($mysqli, $sql);
		$row = mysqli_fetch_assoc($result);
		
		return $row;
	}

	function pagination ($tbl, $page, $list_limit){
		$row = total_cnt($tbl);
		
		$page = $page;
		
		$total_list = $row['total_cnt']; // 총 게시글 수
		$list_limit = $list_limit; // 한페이지에 보여줄 게시글 수
		$list_num = $total_list-$list_limit*($page-1); // 현재페이지 게시글 번호
		
		return $list_num;
	}
	
	function pagination2 ($tbl, $col_date, $page, $list_limit, $page_limit){
		global $mysqli; 
		
		$row = total_cnt($tbl);
		
		$page = $page;
		
		$total_list = $row['total_cnt']; // 총 게시글 수
		$list_limit = $list_limit; // 한페이지에 보여줄 게시글 수
		$list_num = $total_list-$list_limit*($page-1); // 현재페이지 게시글 번호
		$list_start = $list_limit*($page-1); // 현재페이지 게시글 시작번호
		$list_end = $page*$list_limit; // 현재페이지 게시글 끝번호
				
		$page_limit = $page_limit; // 현재 페이지 수
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
		
		$sql = " SELECT * FROM ".$tbl." ORDER BY ".$col_date." DESC limit ".$list_start." , ".$list_limit;
		$result = mysqli_query($mysqli, $sql);
		
		$add_domain = "./list.php?page="; // 페이지 도메인 세팅
		
		$rt_pagination = "<nav aria-label='Page navigation'>
			<ul class='pagination justify-content-center notice_pagination'>
				<li class='page-item'>
					<a class='page-link' href='".$add_domain."1'>처음</a>
				</li>
				<li class='page-item'>
					<a class='page-link' href='".$add_domain.$pre."'>이전</a>
				</li>
			 ";
				
					for($i=$page_start; $i<=$page_end; $i++){
						if($page == $i){
							$rt_pagination += "<li class='page-item'><a class='page-link'>".$i."</a></span>";
						}else if($i > $page_total){
							continue;
						}else{
							$rt_pagination += "<li class='page-item'><a class='page-link' href='".$add_domain.$i."'>".$i."</a></span>";
						}
					}
				
		 $rt_pagination += "<li class='page-item'>
					<a class='page-link' href='".$add_domain.$next."'>다음</a>
				</li>
				<li class='page-item'>
					<a class='page-link' href='".$add_domain.$page_total."'>마지막</a>
				</li>
			</ul>
		</nav>
		";
	}
?>