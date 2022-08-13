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
			<button id="general">Quản lý chung</button>
			<button id="job_apply" class="active">Công việc ứng tuyển</button>
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
	<div class="box_dynamic">
		<!-- bat dau cong viec ung tuyen -->
		<div class="block_apply">
			<div class="box_content">
				<p class="title">CÔNG VIỆC ỨNG TUYỂN</p>
				<!-- <div class="data_table_box"></div> -->
				<div class="data_table">
					<div class="row thead">
						<p class="job_id">Mã công việc</p>
						<p class="job_title">Tiêu đề</p>
						<p class="job_location">Địa chỉ làm việc</p>
						<p class="job_salary">Mức lương</p>
						<p class="job_start">Ngày nhận việc</p>
						<p class="job_status">Trạng thái</p>
					</div>
					<? foreach ($list_apply as $job) { ?>
						<div class="row">
							<p class="job_id"><?= $job['new_id'] ?></p>
<<<<<<< HEAD
							<p class="job_title"><a href="<?=rewrite_new_detail_link($job['alias'],$job['new_id'])?>"><?= $job['title'] ?></a></p>
=======
							<p class="job_title"><?= $job['title'] ?></p>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
							<p class="job_location"><?= $job['full_address'] ?></p>
							<?if ($job['salary_type'] == 0) { ?>
								<p class="job_salary"><?= number_format($job['salary1'], 0, '', '.').'VNĐ ' ?>
									
							<? } else{?>
								<p class="job_salary"><?= number_format($job['salary1'], 0, '', '.').'VNĐ'.' - '.number_format($job['salary2'], 0,'', '.').'VNĐ '?>
									
								<?}?>
								<?
											switch ($job['salary_time']) {
												case '1':
													echo "/Tháng";
													break;
												case '2':
													echo "/Tuần";
													break;
												case '3':
													echo "/Giờ";
													break;
												default:
													break;
											}
											?>
								</p>
							<p class="job_start"><?=date('d/m/Y',$job['start_time'])?></p>
							<?
							switch ($job['status']) {
								case '1':
									echo '<p class="job_status accept">Chấp nhận</p>';
									break;
								case '2':
									echo '<p class="job_status refuse">Từ chối</p>';
									break;
								default:
									echo '<p class="job_status waiting">Chưa trả lời</p>';
									break;
							}?>
						</div>
					<? } ?>
				</div>
				<div class="pagination_box">
					<div class="pagination">
						<ul>
							<li><button id="minus_page"><img src="/images/pagination_prev.svg" alt="nut lui trang"></button></li>
							<li><input type="number" id="current_page" class="active" max="<?=$total_page?>" value="<?=$page?>"></li>
							<li><button id="add_page"><img src="/images/pagination_next.svg" alt="nut tien"></button></li>
						</ul>
					</div>
					<span class="total_page"> of <?=$total_page?></span>
				</div>
			</div>
		</div>
		<!-- het con viec ung tuyen -->
	</div>
	<div class="box_right">
		<div class="calender">
			<div class="month_box">
				<img src="/images/calendar.svg" alt="lich">
				<p class="month"><span id="month">December</span><span> </span><span id="year">2022</span></p>
				<div class="action_month">
					<button id="prev_month"><img src="/images/calender_arrow_left_blue.svg" alt="prev"></button>
					<button id="next_month"><img src="/images/calender_arrow_right_blue.svg" alt="next"></button>
				</div>
			</div>
			<div class="week_box">
				<p>Sun</p>
				<p>Mon</p>
				<p>Tue</p>
				<p>Wed</p>
				<p>Thu</p>
				<p>Fri</p>
				<p>Sat</p>
			</div>
			<div class="day_box">
				<button class="disable">29</button>
				<button class="disable">30</button>
				<button class="enable">1</button>
				<button class="enable">2</button>
				<button class="enable">3</button>
				<button class="enable">4</button>
				<button class="enable">5</button>
				<button class="enable">6</button>
				<button class="enable">7</button>
				<button class="enable">8</button>
				<button class="enable">9</button>
				<button class="enable">10</button>
				<button class="enable">11</button>
				<button class="enable">12</button>
				<button class="enable">13</button>
				<button class="enable">14</button>
				<button class="enable">15</button>
				<button class="enable">16</button>
				<button class="enable">17</button>
				<button class="enable">18</button>
				<button class="enable">19</button>
				<button class="enable">20</button>
				<button class="enable">21</button>
				<button class="enable">22</button>
				<button class="enable">23</button>
				<button class="enable">24</button>
				<button class="enable">25</button>
				<button class="enable">26</button>
				<button class="enable">27</button>
				<button class="enable">28</button>
				<button class="enable">29</button>
				<button class="enable">30</button>
				<button class="disable">1</button>
				<button class="disable">2</button>

			</div>

		</div>
		<div class="img">
			<img src="/images/calendar_img.png" alt="anh lich">
		</div>

	</div>
	<div class="box_change_password" hidden>
		<div class="box_content">
			<p class="title">Đổi mật khẩu</p>
			<div class="box_img"><img src="/images/password_change_bg.png" alt="doi mat khau"></div>
			<div class="box_form">
				<div class="row">
					<label for="current_pass"><span>Mật khẩu hiện tại (<span class="warning">*</span>)</span></label>
					<span class="icon"><img src="/images/pass_icon.svg" alt="icon"></span>
					<input type="password" name="current_pass" id="current_pass">
				</div>
				<div class="row">
					<label for="current_pass"><span>Mật khẩu mới (<span class="warning">*</span>)</span></label>
					<span class="icon"><img src="/images/pass_icon.svg" alt="icon"></span>
					<input type="password" name="current_pass" id="new_pass">
				</div>
				<div class="row">
					<label for="current_pass"><span>Nhập lại mật khẩu (<span class="warning">*</span>)</span></label>
					<span class="icon"><img src="/images/pass_icon.svg" alt="icon"></span>
					<input type="password" name="current_pass" id="re_pass">
				</div>
				<button type="button">Đổi mật khẩu</button>
			</div>

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
