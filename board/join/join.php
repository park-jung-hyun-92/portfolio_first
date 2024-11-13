<?php
     include_once $_SERVER['DOCUMENT_ROOT'].'/inc/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/board/join/config.php';
?>

	<div class="container write-form-container">
		<form id="form_join" name="form_join" method="post" action="./join_ok.php" onsubmit="return submit_check();">
			<table class="table table-bordered table-form">
				<tbody>
					<tr>
						<th>아이디</th>
						<td class="join_id">
							<div class="d-inline-flex align-items-center">
								<input type="text" class="form-control" id="id" name="id" style="width: 300px;" placeholder="아이디를 입력해주세요" required>
								<span id="id_check" class="ml-2" style="background-color:black; border:1px solid gray; font-size:14px; color:white; padding:2px 8px; border-radius:5px; cursor:pointer;">
									중복확인
								</span>
								<span id="id_check_val" style="display:block; margin-left:10px;"></span>
							</div>
						</td>
					</tr>
					<tr>
						<th>비밀번호</th>
						<td>
							<input type="password" class="form-control" id="pw" name="pw" placeholder="비밀번호를 입력해주세요" required>
						</td>
					</tr>
					<tr>
						<th>비밀번호확인</th>
						<td>
							<input type="password" class="form-control" id="pw_check" name="pw_check" placeholder="비밀번호를 한번 더 입력해주세요" required>
						</td>
					</tr>
					<tr>
						<th>이름</th>
						<td>
							<input type="text" class="form-control" id="name" name="name" placeholder="이름을 입력해주세요" required>
						</td>
					</tr>
					<tr>
						<th>닉네임</th>
						<td>
							<input type="text" class="form-control" id="nickname" name="nickname" placeholder="닉네임을 입력해주세요" required>
						</td>
					</tr>
					<tr>
						<th>성별</th>
						<td>
							<input type="radio" id="man" name="gender" value="남"> 남&nbsp;&nbsp;&nbsp;
							<input type="radio" id="woman" name="gender" value="여"> 여
						</td>
					</tr>
					<tr>
						<th>전화번호</th>
						<td>
							<input type="text" class="form-control" id="phone" name="phone" placeholder="전화번호를 입력해주세요" required>
						</td>
					</tr>
					<tr>
						<th>주소</th>
						<td>
							<input type="text" class="form-control" id="addr" name="addr" placeholder="주소를 입력해주세요" required>
						</td>
					</tr>
					<tr>
						<th>이메일</th>
						<td>
							<input type="email" class="form-control" id="email" name="email" placeholder="이메일을 입력해주세요" required>
						</td>
					</tr>
					<tr>
						<th>
							<input type="checkbox" id="checkAll">&nbsp;&nbsp;이용약관 및<br>개인정보 수집에 모두 동의합니다
						</th>
						<td>
							<input type="checkbox" class="essential">&nbsp;&nbsp;[필수] 이용약관 동의<br>
							<input type="checkbox" class="essential">&nbsp;&nbsp;[필수] 개인정보 수집 및 이용 동의<br>
							<input type="checkbox" id="choiceAll">&nbsp;&nbsp;[선택] 정보 수신 동의<br>
							<input type="checkbox" class="checkbox" name="agree_sms" value="">&nbsp;SMS&nbsp;&nbsp;
							<input type="checkbox" class="checkbox" name="agree_email" value="">&nbsp;이메일
						</td>
					</tr>
				</tbody>
			</table>
			<div class="text-center">
				<button type="submit" class="btn btn-primary" id="btn_submit">회원가입</button>
				<input type="button" class="btn btn-primary" id="btn_cancel" value="취소">
			</div>
		</form>
	</div>
	
	<script>
		var id_hidden_value; // 중복체크한 id 값 전역변수 선언

		$(document).ready(function() {
            // 버튼 클릭 이벤트
            $('#id_check').click(function() {
				var id_val = $('#id').val(); // 아이디 입력란에 입력한 값

				if(id_val.trim() === ''){
					alert('아이디를 입력해주세요.');
					return false;
				}

               $.ajax({
                    url: './id_check.php', // 요청을 보낼 서버의 URL
                    type: 'POST', // 요청 방식 (GET, POST, PUT, DELETE 등)
					data: { 
						id: id_val,
					}, // 전송할 데이터 (키-값 쌍)
                    dataType: 'json', // 서버에서 반환받을 데이터 형식 (json, xml, html, text 등)
                    success: function(response) { // 요청이 성공했을 때 실행할 콜백 함수
                        // 서버로부터 받은 데이터를 처리
						console.log(response);
                        $('#id_check_val').html(response.message); // ok 페이지에서 객체로 반환되서 그냥 response를 사용했지만, 다른 형식으로 반환시에는 JSON.stringify(response) 써야 함
						id_hidden_value = id_val;
                    },
                    error: function(xhr, status, error) { // 요청이 실패했을 때 실행할 콜백 함수
                        $('#id_check_val').html(error);
                    }
                });				
            });
        });

		// 회원가입 목록 입력 필수 체크
		function submit_check(){
			var id = document.getElementById('id');
			var pw = document.getElementById('pw');
            var pw_check = document.getElementById('pw_check');
			var agree_essential = new Array();
			agree_essential = document.getElementsByClassName('essential');
			var agree_checkbox = new Array();
			agree_checkbox = document.getElementsByClassName('checkbox');

			// 비밀번호 값과 비밀번호확인 값 일치 여부
			if(pw.value != pw_check.value){
				alert("비밀번호와 비밀번호확인 값이 서로 일치하지 않습니다.\n다시 확인해주세요.");
				pw.focus();
				return false;
			}

			// 이용약관 및 정보수집 필수 동의 여부 체크
			if(!agree_essential[0].checked || !agree_essential[1].checked){
				alert("2개의 필수 동의를 체크해주세요.");
				return false;
			}

			// 중복체크한 id 값과 회원가입시 id 값 일치 여부
			if(id_hidden_value !== id.value){
				alert("중복확인 버튼을 눌러주세요.");
				return false;
			}
			
			return true;
		}
		
		// ** 회원가입 목록 입력 필수 체크 또 다른 방법 **
		//     ** 단, 코드로 강제 submit 하는 경우에는 html require 작동 안함 **
		//		const btn_submit = document.getElementById('btn_submit');		
		//		btn_submit.addEventListener('click', () => {
		//			var pw = $('#pw').val();
		//          var pw_check = $('#pw_check').val();
		//			var agree_essential = new Array();
		//			agree_essential = document.getElementsByClassName('essential');
		//			var agree_checkbox = new Array();
		//			agree_checkbox = document.getElementsByClassName('checkbox');
		//
		//			// 비밀번호 값과 비밀번호확인 값 일치 여부
		//			if(pw != pw_check){
		//				alert("비밀번호와 비밀번호확인 값이 서로 일치하지 않습니다.\n다시 확인해주세요.");
		//				pw.focus();
		//				return false;
		//			}
		//
		//			// 이용약관 및 정보수집 필수 동의 여부 체크
		//			if(!agree_essential[0].checked || !agree_essential[1].checked){
		//				alert("2개의 필수 동의를 체크해주세요.");
		//				return false;
		//			}
		//
		//			// 중복체크한 id 값과 회원가입시 id 값 일치 여부
		//			if(id_hidden_value !== id.value){
		//				alert("중복확인 버튼을 눌러주세요.");
		//				return false;
		//			}
		//
		//			document.getElementById('form_join').submit();
		//		});

		// 체크박스 기능들
		// $('input.checkbox[value="20"]'); // .checkbox인 모든 input 요소 중 value가 20인 것
		// checkbox20.prop('checked', true); // 선택한 체크박스의 checked 속성을 true로 설정하여 체크
		// checkbox20.is(':checked'); // 해당 체크박스가 체크되어 있는지 여부

		// 이용약관 및 정보수집 동의 "전체 선택/해제" 체크박스 기능
		$(document).ready(function() {
            $('#checkAll').click(function() {
                $('.essential').prop('checked', this.checked); // this.checked는 #checkAll의 현재 체크상태를 뜻하며, $checkAll의 체크 상태와 동일하게 .essential 체크 여부 적용
                $('#choiceAll').prop('checked', this.checked); // this.checked는 #checkAll의 현재 체크상태를 뜻하며, $checkAll의 체크 상태와 동일하게 .choiceAll 체크 여부 적용
                $('.checkbox').prop('checked', this.checked); // this.checked는 #checkAll의 현재 체크상태를 뜻하며, $checkAll의 체크 상태와 동일하게 .checkbox 체크 여부 적용
            });
        });

		// 정보수신 선택 동의 "전체 선택/해제" 체크박스 기능
		$(document).ready(function() {
            // 전체 선택 체크박스 기능
            $('#choiceAll').click(function() {
                $('.checkbox').prop('checked', this.checked); // this.checked는 #checkAll의 현재 체크상태를 뜻하며, $checkAll의 체크 상태와 동일하게 .checkbox 체크 여부 적용
            });

            // 개별 체크박스 클릭 시
            $('.checkbox').click(function() {
                if ($('.checkbox:checked').length > 0) { // .checkbox 체크박스 체크 갯수 === .checkbox 체크박스 갯수
                    $('#choiceAll').prop('checked', true); // 모든 개별 체크박스가 체크되면 "전체 선택" 체크박스 체크
                } else {
                    $('#choiceAll').prop('checked', false); // 하나라도 체크되지 않으면 "전체 선택" 체크박스 체크 해제
                }
            });
        });

		// 취소 버튼 클릭시 로그인 페이지로 이동
		$('#btn_cancle').on('click', function() {
			window.location.href = '/index.php';
		});
	</script>

<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/inc/footer.php';
?>