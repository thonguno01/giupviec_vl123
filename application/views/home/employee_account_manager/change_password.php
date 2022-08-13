<!-- Bat dau noi dung -->
<div class="main_content">
	<div class="box_left">
		<div class="profile">
			<div class="avt">
			<div class="box_img">
					<div class="avata" id="show_avata">
					<?if($user['image']!=''){?>
					<img src="/upload/users/
							<?if($_SESSION['user']['user_type']==0) echo 'user'; 
							else echo 'company'?>
							_<?=$user['id']?>
							/<?=$user['image']?>" 
							alt="anh dai dien">
					<?} else {?>
						<img src="/images/logo_vieclam123.png" alt="anh dai dien">
					<?}?>
					</div>
					<button type="button"><img src="/images/upload_img.svg" alt="tai anh len">
					<input id="change_avata" type="file">
				</button>
				</div>

			</div>
			<div class="rate_star">
				<span class="score">
					<div class="score-wrap">
						<span class="stars-active" style="width:80%">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</span>
						<span class="stars-inactive">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</span>
					</div>
				</span>
			</div>
			<div class="info">
				<p class="name"><?=$user['name']?></p>
				<p class="id">ID: <?=$user['id']?></p>
			</div>
			<div class="renew_profile">
				<button id="renew_profile"><span>Làm mới </span><span><img src="/images/refresh_button.svg" alt="lam moi"></span></button>
			</div>
			<div class="hide_profile">
				<span>Hiển thị: </span>
				<label class="switch">
    			<input id="profile_status" type="checkbox" <?if($user['status']==1) echo 'checked';?>>
    			<span class="slider round"></span>
  			</label>
			</div>
		</div>
		<div class="menu_manager">
			<button id="general" class="active">Quản lý chung</button>
			<button id="job_apply">Công việc ứng tuyển</button>
			<button id="job_accept">Công việc đã được chấp nhận</button>
			<button id="job_saved">Công việc đã lưu</button>
			<button id="profile_detail">Thông tin cá nhân</button>
			<button id="change_password">Đổi mật khẩu</button>
			<button onclick="logout_action()" id="log_out">Đăng xuất</button>
		</div>
		<div class="btn_collapse">
			<button type="button" id="collapse_profile"><img src="/images/btn_collapse_col.svg" alt="thu gon"></button>
		</div>
	</div>
	<div class="box_change_password">
		<div class="box_content">
			<p class="title">Đổi mật khẩu</p>
			<div class="box_img"><img src="/images/password_change_bg.png" alt="doi mat khau"></div>
			<form onsubmit="return false">
			<div class="box_form">
				<div class="row">
					<label for="current_pass"><span>Mật khẩu hiện tại (<span class="warning">*</span>)</span></label>
					<span class="icon"><img src="/images/pass_icon.svg" alt="icon"></span>
					<input type="text" name="current_pass" id="current_pass">	
				</div>
				<div class="row_error">
						<p class="warning" id="error_current_pass"></p>
				</div>
				<div class="row">
					<label for="new_pass"><span>Mật khẩu mới (<span class="warning">*</span>)</span></label>
					<span class="icon"><img src="/images/pass_icon.svg" alt="icon"></span>
					<input type="password" name="new_pass" id="new_pass">
				</div>
				<div class="row_error">
						<p class="warning" id="error_new_pass"></p>
				</div>
				<div class="row">
					<label for="re_pass"><span>Nhập lại mật khẩu (<span class="warning">*</span>)</span></label>
					<span class="icon"><img src="/images/pass_icon.svg" alt="icon"></span>
					<input type="password" name="re_pass" id="re_pass">
				</div>
				<div class="row_error">
						<p class="warning" id="error_re_pass"></p>
				</div>
				<button type="submit" onclick="change_password()">Đổi mật khẩu</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>
<!-- Ket thuc noi dung -->

<!-- popup -->
<!-- popup confirm logout -->
<div class="confirm_logout">
	<div class="popup_bg">
		<div class="popup_content">
			<p class="title">Thông báo</p>
			<p class="content">Bạn chắc chắn muốn đăng xuất tài khoản này?</p>
			<div class="confirm_button">
				<button class="yes" id="yes">Đăng xuất</button>
				<button class="no" id="no">Hủy</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup confirm logout -->

<!-- popup confirm bo ung tuyen -->
<div class="confirm_unapply">
	<div class="popup_bg">
		<div class="popup_content">
			<p class="title">Thông báo</p>
			<p class="content">Bạn chắc chắn muốn bỏ ứng tuyển tin tuyển dụng này?</p>
			<div class="confirm_button">
				<button class="yes" id="yes">Bỏ ứng tuyển</button>
				<button class="no" id="no">Hủy</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup confirm bo ung tuyen -->

<!-- popup confirm bo luu -->
<div class="confirm_unsave">
	<div class="popup_bg">
		<div class="popup_content">
			<p class="title">Thông báo</p>
			<p class="content">Bạn chắc chắn muốn bỏ lưu tin tuyển dụng này? </p>
			<div class="confirm_button">
				<button class="yes" id="yes">Bỏ lưu</button>
				<button class="no" id="no">Hủy</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup confirm bo luu -->
<!-- popup doi mat khau thanh cong -->
<div class="popup_change_pwd_success">
	<div class="popup_bg">
		<div class="popup_content">
			<p class="title">Thông báo</p>
			<p class="content">Đổi mật khẩu thành công!</p>
			<div class="confirm_button">
				<button onclick="close_change_pwd_success()" class="ok" id="ok">OK</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup doi mat khau thanh cong -->

<!-- popup sai mat khau -->
<div class="popup_invalid_pwd">
	<div class="popup_bg">
		<div class="popup_content">
			<p class="title">Cảnh báo!</p>
			<p class="content">Mật khẩu hiện tại không đúng, vui lòng kiểm tra lại.</p>
			<div class="confirm_button">
				<button onclick="close_invalid_pwd()" class="ok" id="ok">OK</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup sai mat khau -->
<!-- het popup -->

<!-- Bat dau footer -->
