<?php
	
	function pagination ($page, $total_list, $list_limit, $page_limit, $add_domain){
		global $mysqli; 
		
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
		
		$rt_pagination = '';
		$rt_pagination .= "
			<nav aria-label='Page navigation'>
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
				$rt_pagination .= "<li class='page-item'><a class='page-link'>".$i."</a></li>";
			}else if($i > $page_total){
				continue;
			}else{
				$rt_pagination .= "<li class='page-item'><a class='page-link' href='".$add_domain.$i."'>".$i."</a></li>";
			}
		}
				
		 $rt_pagination .= "
					<li class='page-item'>
						<a class='page-link' href='".$add_domain.$next."'>다음</a>
					</li>
					<li class='page-item'>
						<a class='page-link' href='".$add_domain.$page_total."'>마지막</a>
					</li>
				</ul>
			</nav>
		";
		
		return $rt_pagination;
	}
?>