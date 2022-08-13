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
<<<<<<< HEAD
			<div class="rate_star"> 
=======
			<div class="rate_star">
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
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
	<div class="box_dynamic">
		<!-- bat dau quan ly chung -->
		<div class="block_general">
			<div class="box_top">
				<div class="box_item">
<<<<<<< HEAD
					<a href="/account-manager/list-apply">
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
					<img src="/images/job_apply.png" alt="cong viec ung
                                tuyen">
					<div class="text">
						<p class="title">Công việc ứng tuyển</p>
						<p class="content"><?= count($list_apply) ?> công việc</p>
					</div>
<<<<<<< HEAD
					</a>
				</div>
				<div class="box_item">
					<a href="/account-manager/list-accepted">
=======
				</div>
				<div class="box_item">
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
					<img src="/images/job_accept.png" alt="cong viec da
                                chap nhan">
					<div class="text">
						<p class="title">Công việc đã được chấp nhận</p>
						<p class="content"><?= count($list_accept) ?> công việc</p>
					</div>
<<<<<<< HEAD
					</a>
				</div>
				<div class="box_item">
					<a href="/account-manager/list-saved">
=======
				</div>
				<div class="box_item">
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
					<img src="/images/job_save.png" alt="cong viec da
                                luu">
					<div class="text">
						<p class="title">Công việc đã lưu</p>
						<p class="content"><?= count($list_save) ?> công việc</p>
					</div>
<<<<<<< HEAD
					</a>
=======
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
				</div>
			</div>
			<!-- 1 list job -->
			<div class="box_content">
				<div class="top">
					<p class="title">Công việc ứng tuyển</p>
<<<<<<< HEAD
					<a href="/account-manager/list-apply">Xem tất cả</a>
				</div>
				<?if(count($list_apply_limit)==0){?>
					<p>Không có công việc ứng tuyển!</p>
					<?} else{?>
				<div class="job_container">
					<? foreach ($list_apply_limit as $job) { 
=======
					<a href="account-manager/list-apply">Xem tất cả</a>
				</div>
				<?if(count($list_apply_waiting)==0){?>
					<p>Không có công việc ứng tuyển đang chờ!</p>
					<?} else{?>
				<div class="job_container">
					<? foreach ($list_apply_waiting as $job) { 
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
						if($job['status']==0){?>
						<!-- 1 job -->
						<div class="box_job" id="apply_<?=$job['id']?>">
							<div class="job_item">
								<div class="profile">
<<<<<<< HEAD
									<a href="<?=rewrite_company_link($job['company_alias'],$job['company_id'])?>">
								<div class="border">
									<img src="<?if($job['image']) echo rewirte_company_img_href($job['company_id'],$job['image']);
									else echo '/images/logo_vieclam123.png';?>" alt="anh
                                            dai dien">
											</div>
									</a>
								</div>
								<div class="box_inf">
									<p class="title"><a href="<?=rewrite_new_detail_link($job['alias'],$job['new_id'])?>"><?= $job['title'] ?></a></p>
=======
									<img src="/images/bg_login.png" alt="anh
                                            dai dien">
									<div class="star">
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
								</div>
								<div class="box_inf">
									<p class="title"><?= $job['title'] ?></p>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
									<div class="row">
										<div class="icon icon_location">
											<img src="/images/location_icon.svg" alt="dia diem">
										</div>
										<div class="text">
											<span><?= $job['full_address'] ?></span>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_job_tag">
											<img src="/images/job_tag_icon.svg" alt="dia diem">
										</div>
										<div class="text">
											<div class="tag"><span><?= $job['job_style'] ?></span></div>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_salary">
											<img src="/images/salary_icon.svg" alt="dia diem">
										</div>
										<div class="text">
										<? if ($job['salary_type'] == 0) { ?>
												<span class="salary"><?= (number_format($job['salary1'], 0, '', '.').'vnđ') ?>
												
											<? } 
											else
											{?>
												<span class="salary"><?= (number_format($job['salary1'], 0, '', '.').'vnđ'.' - '.number_format($job['salary2'], 0, '', '.').'vnđ') ?>
												<?}
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
												</span>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_birthday">
											<img src="/images/birthday_icon.svg" alt="dia diem">
										</div>
										<div class="text">
											<span><?= $job['age_from'] ?> - <?= $job['age_to'] ?> <span class="age">tuổi</span></span>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_exp">
											<img src="/images/exp_icon.svg" alt="dia diem">
										</div>
										<div class="text">
											<p><span class="exp">Kinh
													nghiệm:</span><?
																	switch ($job['exp']) {
																		case '1':
																			echo "Dưới 1 năm";
																			break;
																		case '2':
																			echo "1-2 năm";
																			break;
																		case '3':
																			echo "3-5 năm";
																			break;
																		case '4':
																			echo "6-9 năm";
																			break;
																		case '5':
																			echo "Trên 10 năm";
																			break;
																		default:
																			echo "Không yêu cầu";
																			break;
																	}
																	?></p>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_job_location">
											<img src="/images/job_location_icon.svg" alt="dia diem">
										</div>
										<div class="text">
<<<<<<< HEAD
										<span><?=$job['work_name']?></span>
=======
											<span>Ở cùng chủ nhà</span>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
										</div>
									</div>
								</div>
								<div class="box_btn">
<<<<<<< HEAD
=======
									<button onclick="unapply_action(<?=$job['id']?>)" class="white">Bỏ ứng tuyển</button>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
									<button class="blue">Xem chi tiết</button>
								</div>
							</div>
						</div>
						<!-- het 1 job -->
					<? }} ?>
				</div>
				<?}?>
			</div>
			<!-- het 1 list job -->

			<!-- 1 list job -->
			<div class="box_content">
				<div class="top">
					<p class="title job_save">Công việc đã lưu</p>
					<a href="account-manager/list-saved">Xem tất cả</a>
				</div>
<<<<<<< HEAD
				<?if(count($list_save_limit)==0){?>
					<p>Bạn chưa lưu công việc!</p>
					<?} else{?>
				<div class="job_container">
					<? foreach ($list_save_limit as $job) { ?>
=======
				<?if(count($list_save)==0){?>
					<p>Bạn chưa lưu công việc!</p>
					<?} else{?>
				<div class="job_container">
					<? foreach ($list_save as $job) { ?>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
						<!-- 1 job -->
						<div class="box_job" id="save_new_<?=$job['id']?>">
							<div class="job_item">
								<div class="profile">
<<<<<<< HEAD
								<a href="<?=rewrite_company_link($job['company_alias'],$job['company_id'])?>">
									<div class="border">
									<img src="<?if($job['image']) echo rewirte_company_img_href($job['company_id'],$job['image']);
									else echo '/images/logo_vieclam123.png';?>" alt="anh
                                            dai dien">
											</div>
								</a>
								</div>
								<div class="box_inf">
									<p class="title"><a href="<?=rewrite_new_detail_link($job['alias'],$job['new_id'])?>"><?= $job['title'] ?></a></p>
=======
									<img src="/images/bg_login.png" alt="anh
                                            dai dien">
									<div class="star">
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
								</div>
								<div class="box_inf">
									<p class="title"><?= $job['title'] ?></p>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
									<div class="row">
										<div class="icon icon_location">
											<img src="/images/location_icon.svg" alt="dia diem">
										</div>
										<div class="text">
											<span><?= $job['full_address'] ?></span>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_job_tag">
											<img src="/images/job_tag_icon.svg" alt="dia diem">
										</div>
										<div class="text">
										<div class="tag"><span><?= $job['job_style'] ?></span></div>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_salary">
											<img src="/images/salary_icon.svg" alt="dia diem">
										</div>
										<div class="text">
											<? if ($job['salary_type'] == 0) { ?>
												<span class="salary"><?= (number_format($job['salary1'], 0, '', '.').'vnđ') ?>
												
											<? } 
											else
											{?>
												<span class="salary"><?= (number_format($job['salary1'], 0, '', '.').'vnđ'.' - '.number_format($job['salary2'], 0, '', '.').'vnđ') ?>
												<?}
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
												</span>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_birthday">
											<img src="/images/birthday_icon.svg" alt="dia diem">
										</div>
										<div class="text">
											<span><?= $job['age_from'] ?> - <?= $job['age_to'] ?> <span class="age">tuổi</span></span>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_exp">
											<img src="/images/exp_icon.svg" alt="dia diem">
										</div>
										<div class="text">
											<p><span class="exp">Kinh
													nghiệm:</span><?
																	switch ($job['exp']) {
																		case '1':
																			echo "Dưới 1 năm";
																			break;
																		case '2':
																			echo "1-2 năm";
																			break;
																		case '3':
																			echo "3-5 năm";
																			break;
																		case '4':
																			echo "6-9 năm";
																			break;
																		case '5':
																			echo "Trên 10 năm";
																			break;
																		default:
																			echo "Không yêu cầu";
																			break;
																	}
																	?></p>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_job_location">
											<img src="/images/job_location_icon.svg" alt="dia diem">
										</div>
										<div class="text">
<<<<<<< HEAD
										<span><?=$job['work_name']?></span>
=======
											<span>Ở cùng chủ nhà</span>
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
										</div>
									</div>
								</div>
								<div class="box_btn">
									<button onclick="unsave_action(<?=$job['id']?>)" class="white">Bỏ lưu</button>
									<button class="blue">Xem chi tiết</button>
								</div>
							</div>
						</div>
						<!-- het 1 job -->
					<? } ?>


				</div>
				<?}?>
			</div>
			<!-- het 1 list job -->
		</div>
		<!-- het quan ly chung -->
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
