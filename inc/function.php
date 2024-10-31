<?php

	// 숫자 값 세팅 (값, 디폴트 값)
	function number_val($cur_val, $default_val=''){
		if(empty($cur_val) || !is_numeric($cur_val)){ // empty() : 0, null, '' 모두 false이므로 확실하게 판단 가능
			$final_val = $default_val;
		}else{
			$final_val = $cur_val;
		}
		return $final_val;
	}
	
	// 문자 값 세팅 (값, 디폴트 값)
	function string_val($cur_val, $default_val=''){
		
		if(!isset($cur_val)){ 
			$final_val = $default_val;
		}else{
			$final_val = $cur_val;
		}
		return $final_val;
	}
	
	// GET 또는 POST 값 세팅
	function get_post_val($param_val){
		$cur_val = $_GET[$param_val];
		if($cur_val == ""){
			$cur_val = $_POST[$param_val];
		}
		return $cur_val;
	}
	
	// 페이징 처리
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