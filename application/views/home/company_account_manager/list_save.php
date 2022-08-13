<!-- Bat dau noi dung -->
<div class="main_content">
	<!-- bat dau box left -->
	<div class="box_left">
		<div class="profile">
			<div class="avt">
				<div class="box_img">
					<div class="avata" id="show_avata">
						<? if ($company['image'] != '') { ?>
							<img src="<?= rewirte_company_img_href($company['id'], $company['image']) ?>" alt="anh dai dien">
						<? } else { ?>
							<img src="/images/logo_vieclam123.png" alt="anh dai dien">
						<? } ?>
					</div>

				</div>
				<button type="button"><img src="/images/upload_img.svg" alt="tai anh len">
					<input id="change_avata" type="file">
				</button>
			</div>
			<div class="info">
				<p class="name"><?= $company['name'] ?></p>
				<p class="id">ID: <?= $company['id'] ?></p>
				<p class="point">Điểm xem miễn phí hôm nay: <?= $company['point_free'] + $company['point_pay'] ?></p>
			</div>
		</div>
		<div class="menu_manager">
			<div class="btn_post">
				<button id="new_post">Đăng tin tuyển dụng</button>
			</div>
			<button id="general">Quản lý chung</button>
			<button id="post">Đăng tin tuyển giúp việc</button>
			<button id="list_post">Tin đã đăng</button>
			<button id="list_apply">Người giúp việc đã ứng tuyển</button>
			<button id="list_accept">Người giúp việc đã nhận việc</button>
			<button id="list_save" class="active">Người giúp việc đã lưu</button>
			<button id="list_from_filter">Người giúp việc từ điểm lọc</button>
			<button id="profile_detail">Thông tin cá nhân</button>
			<button id="change_password">Đổi mật khẩu</button>
			<button onclick="logout_action()" id="log_out">Đăng xuất</button>
		</div>
		<div class="btn_collapse">
			<button type="button" id="collapse_profile"><img src="/images/btn_collapse_col.svg" alt="thu gon"></button>
		</div>
	</div>
	<!-- het box left -->
	<div class="box_dynamic">
		<!-- danh sach nguoi giup viec da luu -->
		<div class="list_save">
			<div class="box_content">
				<p class="title">Danh sách người giúp việc đã lưu</p>
				<div class="employee_container">
					<? foreach ($list_save as $user) { ?>
						<div class="box_employee" id="save_user_<?=$user['save_id']?>">
							<div class="employee">
								<div class="box_top">
									<div class="profile">
										<div class="border">
										<? if ($user['image']) { ?>
											<img src="<?= rewirte_user_img_href($user['user_id'], $user['image']) ?>" alt="anh
                                        dai dien">
										<? } else { ?>
											<img src="/images/logo_vieclam123.png" alt="anh
                                        dai dien">
										<? }
										?>
										</div>
										<div class="star">
											<span class="score">
												<div class="score-wrap">
													<span class="stars-active" style="width:<?= round($user['star_rating'] / 5 * 100) ?>%">
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
										<p class="name"><a href="<?=rewrite_employee_link($user['alias'],$user['user_id'])?>"><?= $user['name'] ?></a></p>
										<div class="row">
											<div class="icon icon_location">
												<img src="/images/location_icon.svg" alt="dia diem">
											</div>
											<div class="text">
												<span><?= $user['cit_name'] ?></span>
											</div>
										</div>
										<div class="row">
											<div class="icon icon_birthday">
												<img src="/images/birthday_icon.svg" alt="dia diem">
											</div>
											<div class="text">
												<span><?= (date('Y') - date('Y', $user['birth'])) ?><span class="age"> tuổi</span></span>
											</div>
										</div>
										<div class="row">
											<div class="icon icon_exp">
												<img src="/images/exp_icon.svg" alt="dia diem">
											</div>
											<div class="text">
												<p><span class="exp">Kinh nghiệm:</span><?
																						switch ($user['exp']) {
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
												<span><?= $user['work_name'] ?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="box_bottom">
									<div class="box_tag">
										<span class="icon icon_job_tag">
											<img src="/images/job_tag_icon.svg" alt="dia diem">
										</span>
										<span class="text">
											<span>Công việc nhận làm: </span>
										</span>
										<?$user_job_style=explode(',',$user['job_style_id']);
										for($i=0;$i<count($user_job_style);$i++){
											foreach($list_job_style as $job_style){
												if($user_job_style[$i]==$job_style['id']){
													if($i==0){
														?>
														<span class="content">
															<?=$job_style['content']?>
														</span>
														<?
													}
													else{
														?>
														<span>/</span>
														<span class="content">
															<?=$job_style['content']?>
														</span>
														<?
													}
												}
											}
										}
										?>
										<!-- <span class="content">
											Giúp việc theo giờ
										</span>
										<span>/</span>
										<span class="content">
											Chăm sóc người già, người bệnh
										</span>
										<span>/</span>
										<span class="content">
											Giúp việc theo giờ
										</span> -->
									</div>
									<div class="box_schedule">
										<? if ($user['t2_ca1_bd']) echo '<span class="active">T2</span>';
										else echo '<span class="non_active">T2</span>' ?>
										<? if ($user['t3_ca1_bd']) echo '<span class="active">T3</span>';
										else echo '<span class="non_active">T3</span>' ?>
										<? if ($user['t4_ca1_bd']) echo '<span class="active">T4</span>';
										else echo '<span class="non_active">T4</span>' ?>
										<? if ($user['t5_ca1_bd']) echo '<span class="active">T5</span>';
										else echo '<span class="non_active">T5</span>' ?>
										<? if ($user['t6_ca1_bd']) echo '<span class="active">T6</span>';
										else echo '<span class="non_active">T6</span>' ?>
										<? if ($user['t7_ca1_bd']) echo '<span class="active">T7</span>';
										else echo '<span class="non_active">T7</span>' ?>
										<? if ($user['t8_ca1_bd']) echo '<span class="active">CN</span>';
										else echo '<span class="non_active">CN</span>' ?>
									</div>
								</div>
								<div class="box_btn">
									<button onclick="unsave_action(<?=$user['save_id']?>)" class="white">Bỏ lưu</button>
									<button class="blue">Xem chi tiết</button>
								</div>
							</div>
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
		<!-- het danh sach nguoi giup viec da luu -->

	</div>
	<!-- bat dau box right -->
	<div class="box_right">
		<div class="calender">
			<div class="month_box">
				<img src="/images/calendar.svg" alt="lich">
				<p class="month"><span id="month">___</span><span> </span><span id="year">___</span></p>
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


			</div>

		</div>
		<div class="img">
			<img src="/images/calendar_img.png" alt="anh lich">
		</div>

	</div>
	<!-- het box right -->

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
			<p class="content">Bạn chắc chắn muốn bỏ lưu ứng viên này? </p>
			<div class="confirm_button">
				<button class="yes" id="yes">Bỏ lưu</button>
				<button class="no" id="no">Hủy</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup confirm bo luu -->
<!-- popup chap nhan ung vien -->
<div class="confirm_accept">
	<div class="popup_bg">
		<div class="popup_content">
			<p class="title">Thông báo</p>
			<p class="content">Bạn chắc chắn chấp nhận yêu cầu ứng tuyển của ứng viên này ? </p>
			<div class="confirm_button">
				<button class="yes" id="yes">Chấp nhận</button>
				<button class="no" id="no">Hủy</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup chap nhan ung vien -->

<!-- popup tu choi ung vien -->
<div class="confirm_refuse">
	<div class="popup_bg">
		<div class="popup_content">
			<p class="title">Thông báo</p>
			<p class="content">Bạn chắc chắn từ chối yêu cầu ứng tuyển của ứng viên này? </p>
			<div class="confirm_button">
				<button class="yes" id="yes">Từ chối</button>
				<button class="no" id="no">Hủy</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup tu choi ung vien -->
<!-- popup dang tin thanh cong -->
<div class="popup_post_success">
	<div class="popup_bg">
		<div class="popup_content">
			<p class="title">Thông báo</p>
			<p class="content">Đăng tin thành công!</p>
			<div class="confirm_button">
				<button onclick="close_post_success()" class="ok" id="ok">OK</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup dang tin thanh cong -->

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
<!-- popup danh gia -->
<div class="popup_rate">
	<div class="popup_bg">
		<div class="popup_content">
			<div class="bg">
				<img src="/images/popup_rate_bg.png" alt="anh nen">
			</div>
			<div class="content">
				<div class="stars">
					<input class="star star-5" id="star-5" type="radio" name="star" value="5" checked="">
					<label class="star star-5" for="star-5"></label>
					<input class="star star-4" id="star-4" type="radio" name="star" value="4">
					<label class="star star-4" for="star-4"></label>
					<input class="star star-3" id="star-3" type="radio" name="star" value="3">
					<label class="star star-3" for="star-3"></label>
					<input class="star star-2" id="star-2" type="radio" name="star" value="2">
					<label class="star star-2" for="star-2"></label>
					<input class="star star-1" id="star-1" type="radio" name="star" value="1">
					<label class="star star-1" for="star-1"></label>
				</div>
				<textarea placeholder="Để lại lời nhận xét giúp ứng viên nâng cao thêm chất lượng công việc bạn nha..."></textarea>
			</div>
			<div class="confirm_button">
				<button class="yes" id="rate">Đánh giá</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup danh gia -->

<!-- popup danh gia thanh cong -->
<div class="popup_rate_success">
	<div class="popup_bg">
		<div class="popup_content">
			<p class="title">Thông báo</p>
			<p class="content">Bạn vừa tạo đánh giá chất lượng dịch vụ của người giúp việc tại <span><a>giupviec.vieclam123.vn</a></span></p>
			<div class="confirm_button">
				<button onclick="close_rate_success()" class="ok" id="ok">OK</button>
			</div>
		</div>
	</div>
</div>
<!-- het popup danh gia thanh cong -->
<!-- het popup -->
