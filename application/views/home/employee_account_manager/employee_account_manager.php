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
	<div class="box_dynamic">
		<!-- bat dau quan ly chung -->
		<div class="block_general">
			<div class="box_top">
				<div class="box_item">
					<img src="/images/job_apply.png" alt="cong viec ung
                                tuyen">
					<div class="text">
						<p class="title">Công việc ứng tuyển</p>
						<p class="content"><?= count($list_apply) ?> công việc</p>
					</div>
				</div>
				<div class="box_item">
					<img src="/images/job_accept.png" alt="cong viec da
                                chap nhan">
					<div class="text">
						<p class="title">Công việc đã được chấp nhận</p>
						<p class="content">15 công việc</p>
					</div>
				</div>
				<div class="box_item">
					<img src="/images/job_save.png" alt="cong viec da
                                luu">
					<div class="text">
						<p class="title">Công việc đã lưu</p>
						<p class="content"><?= count($list_save) ?> công việc</p>
					</div>
				</div>
			</div>
			<!-- 1 list job -->
			<div class="box_content">
				<div class="top">
					<p class="title">Công việc ứng tuyển</p>
					<button>Xem tất cả</button>
				</div>
				<div class="job_container">
					<? foreach ($list_apply as $job) { 
						if($job['status']==0){?>
						<!-- 1 job -->
						<div class="box_job">
							<div class="job_item">
								<div class="profile">
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
											<span class="tag"><?= $job['job_style'] ?></span>
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
											<span>Ở cùng chủ nhà</span>
										</div>
									</div>
								</div>
								<div class="box_btn">
									<button onclick="unapply_action(4)" class="white">Bỏ ứng tuyển</button>
									<button class="blue">Xem chi tiết</button>
								</div>
							</div>
						</div>
						<!-- het 1 job -->
					<? }} ?>
				</div>
			</div>
			<!-- het 1 list job -->

			<!-- 1 list job -->
			<div class="box_content">
				<div class="top">
					<p class="title job_save">Công việc đã lưu</p>
					<button>Xem tất cả</button>
				</div>
				<div class="job_container">
					<? foreach ($list_save as $job) { ?>
						<!-- 1 job -->
						<div class="box_job">
							<div class="job_item">
								<div class="profile">
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
											<span class="tag"><?= $job['job_style'] ?></span>
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
											<span>Ở cùng chủ nhà</span>
										</div>
									</div>
								</div>
								<div class="box_btn">
									<button onclick="unsave_action(4)" class="white">Bỏ lưu</button>
									<button class="blue">Xem chi tiết</button>
								</div>
							</div>
						</div>
						<!-- het 1 job -->
					<? } ?>


				</div>
			</div>
			<!-- het 1 list job -->
		</div>
		<!-- het quan ly chung -->
		<!-- bat dau cong viec ung tuyen -->
		<div class="block_apply" hidden>
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
							<p class="job_id"><?= $job['id'] ?></p>
							<p class="job_title"><?= $job['title'] ?></p>
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
							<li><img src="/images/pagination_prev.svg" alt="nut lui trang"></li>
							<li class="active">1</li>
							<li><img src="/images/pagination_next.svg" alt="nut tien"></li>
						</ul>
					</div>
					<span class="total_page"> of 67</span>
				</div>
			</div>
		</div>
		<!-- het con viec ung tuyen -->

		<!-- bat dau cong viec da nhan -->
		<div class="block_accept" hidden>
			<div class="box_content">
				<p class="title">CÔNG VIỆC Đã ĐƯỢC CHẤP NHẬN</p>
				<div class="data_table">
					<div class="row thead">
						<p class="job_id">Mã công việc</p>
						<p class="job_title">Tiêu đề</p>
						<p class="job_location">Địa chỉ làm việc</p>
						<p class="job_salary">Mức lương</p>
						<p class="job_start">Ngày nhận việc</p>
						<p class="job_status">Trạng thái</p>
					</div>
					<div class="row">
						<p class="job_id">ID001</p>
						<p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
						<p class="job_location">Số 1 Minh Khai</p>
						<p class="job_salary">8.000.000VNĐ /Tháng</p>
						<p class="job_start">24/12/2022</p>
						<div class="job_status">
							<button class="change_job_status">
								<span class=" text working">Đang làm</span>
								<span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
							</button>
							<div class="menu_status" style="display: none;">
								<button class="not_start">Chưa bắt đầu</button>
								<button class="working selected">Đang làm</button>
								<button class="done">Kết thúc</button>
							</div>
						</div>
					</div>
					<div class="row">
						<p class="job_id">ID001</p>
						<p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
						<p class="job_location">Số 1 Minh Khai</p>
						<p class="job_salary">8.000.000VNĐ /Tháng</p>
						<p class="job_start">24/12/2022</p>
						<div class="job_status">
							<button class="change_job_status">
								<span class=" text end">Kết thúc</span>
								<span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
							</button>
							<div class="menu_status" style="display: none;">
								<button class="not_start">Chưa bắt đầu</button>
								<button class="working">Đang làm</button>
								<button class="done selected">Kết thúc</button>
							</div>
						</div>
					</div>
					<div class="row">
						<p class="job_id">ID001</p>
						<p class="job_title">Tìm gấp giúp việc nhà tại Hà Nội </p>
						<p class="job_location">Số 1 Minh Khai</p>
						<p class="job_salary">8.000.000VNĐ /Tháng</p>
						<p class="job_start">24/12/2022</p>
						<div class="job_status">
							<button class="change_job_status">
								<span class=" text not_start">Chưa bắt đầu</span>
								<span class="img"><img src="/images/arrow_down.svg" alt="mui ten"></span>
							</button>
							<div class="menu_status" style="display: none;">
								<button class="not_start selected">Chưa bắt đầu</button>
								<button class="working">Đang làm</button>
								<button class="done">Kết thúc</button>
							</div>
						</div>
					</div>
				</div>
				<div class="pagination_box">
					<div class="pagination">
						<ul>
							<li><img src="/images/pagination_prev.svg" alt="nut lui trang"></li>
							<li class="active">1</li>
							<li><img src="/images/pagination_next.svg" alt="nut tien"></li>
						</ul>
					</div>
					<span class="total_page"> of 67</span>
				</div>
			</div>
		</div>
		<!-- het cong viec da nhan -->
		<!-- cong viec da luu -->
		<div class="block_saved" hidden>
			<div class="box_content">
				<p class="title">Công việc đã lưu</p>
				<div class="job_container">
					<? foreach ($list_save as $job) { ?>
						<!-- 1 job -->
						<div class="box_job">
							<div class="job_item">
								<div class="profile">
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
											<span class="tag"><?= $job['job_style'] ?></span>
										</div>
									</div>
									<div class="row">
										<div class="icon icon_salary">
											<img src="/images/salary_icon.svg" alt="dia diem">
										</div>
										<div class="text">
											<? if ($job['salary_type'] == 0) { ?>
												<span class="salary"><?= number_format($job['salary1'], 0, '', '.') ?>
													vnđ/<?
														switch ($job['salary_time']) {
															case '1':
																echo "Tháng";
																break;
															case '2':
																echo "Tuần";
																break;
															case '3':
																echo "Giờ";
																break;
															default:
																break;
														}
														?>
												</span>
											<? } ?>
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
											<span>Ở cùng chủ nhà</span>
										</div>
									</div>
								</div>
								<div class="box_btn">
									<button onclick="unsave_action(4)" class="white">Bỏ lưu</button>
									<button class="blue">Xem chi tiết</button>
								</div>
							</div>
						</div>
						<!-- het 1 job -->
					<? } ?>

				</div>
				<div class="pagination_box">
					<div class="pagination">
						<ul>
							<li><img src="/images/pagination_prev.svg" alt="nut lui trang"></li>
							<li class="active">1</li>
							<li><img src="/images/pagination_next.svg" alt="nut tien"></li>
						</ul>
					</div>
					<span class="total_page"> of 67</span>
				</div>
			</div>
		</div>
		<!-- het cong viec da luu -->
		<!-- thong tin ca nhan -->
		<div class="block_profile" hidden>
			<div class="box_content">
				<p class="title">THÔNG TIN CÁ NHÂN</p>
				<form>
					<div class="form_input">
						<div class="row">
							<div class="left">
								<label for="email">
									<span>Email</span>
									<span class="warning">*</span>
								</label>
								<input type="text" name="email" id="email" placeholder="Nhập địa chỉ email">
								<p class="warning" id="error_email"></p>
							</div>
							<div class="right">
								<label for="phone">
									<span>Số điện thoại</span>
									<span class="warning">*</span>
								</label>
								<input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại">
								<p class="warning" id="error_phone"></p>
							</div>
						</div>
						<div class="row">
							<div class="left">
								<label for="name">
									<span>Họ và tên</span>
									<span class="warning">*</span>
								</label>
								<input type="text" name="name" id="name" placeholder="Nhập họ và tên">
								<p class="warning" id="error_name"></p>
							</div>
							<div class="right">
								<label for="birth">
									<span>Ngày sinh</span>
									<span class="warning">*</span>
								</label>
								<input type="date" name="birth" id="birth">
								<p class="warning" id="error_birth"></p>
							</div>
						</div>
						<div class="row">
							<div class="left">
								<label for="province">
									<span>Tỉnh/Thành phố</span>
									<span class="warning">*</span>
								</label>
								<select name="province" id="province">
									<option value="" selected></option>
									<option value="1">Hà Nội</option>
									<option value="2">Nam Định</option>
								</select>
								<p class="warning" id="error_province"></p>
							</div>
							<div class="right">
								<label for="district">
									<span>Quận/Huyện</span>
									<span class="warning">*</span>
								</label>
								<select name="district" id="district">
									<option value="" selected></option>
									<option value="1">Quận Hoàn Kiếm</option>
									<option value="2">Quận Hoàng Mai</option>
								</select>
								<p class="warning" id="error_district"></p>
							</div>
						</div>
						<div class="row">
							<div class="left">
								<label for="address">
									<span>Địa chỉ cụ thể</span>
									<span class="warning">*</span>
								</label>
								<input type="text" name="address" id="address" placeholder="Nhập địa chỉ cụ thể">
								<p class="warning" id="error_address"></p>
							</div>
							<div class="right">
								<label for="stay">
									<span>Ở cùng chủ nhà</span>
									<span class="warning">*</span>
								</label>
								<select name="stay" id="stay">
									<option value="1">Ở cùng chủ nhà</option>
									<option value="2">Không ở cùng chủ nhà</option>
								</select>
								<p class="warning" id="error_district"></p>
							</div>
						</div>
						<div class="row">
							<div class="center">
								<label for="job_style">
									<span>Loại công việc</span>
									<span class="warning">*</span>
								</label>
								<select name="job_style[]" id="job_style" multiple="multiple">
									<option></option>
									<option value="1">Giúp việc theo giờ</option>
									<option value="2">Giúp việc văn phòng</option>
									<option value="3">Giúp việc chăm sóc trẻ em </option>
									<option value="4">Giúp việc gia đình</option>
								</select>
								<p class="warning" id="error_job_style"></p>
							</div>
						</div>
						<div class="row">
							<div class="left">
								<label for="experience">
									<span>Kinh nghiệm</span>
									<span class="warning">*</span>
								</label>
								<select name="experience" id="experience">
									<option></option>
									<option value="1">Chưa có kinh nghiệm</option>
									<option value="2">Dưới 1 năm</option>
									<option value="3">1-2 năm</option>
									<option value="4">3-5 năm</option>
									<option value="5">6-9 năm</option>
									<option value="6">Trên 10 năm</option>
								</select>
								<p class="warning" id="error_experience"></p>
							</div>
							<div class="right">
								<label for="education">
									<span>Trình độ học vấn</span>
									<span class="warning">*</span>
								</label>
								<select name="education" id="education">
									<option value="" selected></option>
									<option value="1">THCS</option>
									<option value="2">THPT</option>
									<option value="3">Cao đẳng</option>
									<option value="4">Đại học</option>
								</select>
								<p class="warning" id="error_education"></p>
							</div>
						</div>
						<div class="row">
							<div class="center">
								<label for="address">
									<span>Mức lương ước lượng</span>
									<span class="warning">*</span>
								</label>

							</div>
						</div>
						<div class="row_sal dynamic_sal">
							<div class="left" id="dynamic">
								<div class="sal_from">
									<label for="sal_from">Từ</label>
									<div>
										<input type="number" name="sal_from" id="sal_from" value="5000000">
										<div class="text"><span>VND</span></div>
									</div>
								</div>
								<div class="sal_to">
									<label for="sal_to">Đến</label>
									<div>
										<input type="number" name="sal_to" id="sal_to" value="5000000">
										<div class="text"><span>VND</span></div>
									</div>
								</div>
							</div>
							<div class="middle">
								/
							</div>
							<div class="right">
								<select name="sal_time" id="sal_time_dynamic">
									<option value="1">Giờ</option>
									<option value="2">Tuần</option>
									<option value="3" selected>Tháng</option>
								</select>
							</div>
						</div>
						<p class="warning" id="error_dynamic_sal"></p>

						<div class="row">
							<div class="center">
								<label for="address">
									<span>Mức lương cố định</span>
									<span class="warning">*</span>
								</label>

							</div>
						</div>
						<div class="row_sal static_sal">
							<div class="left" id="static">
								<input type="number" name="sal" id="sal" value="5000000">
								<div class="text"><span>VND</span></div>
								<p class="warning" id="error_static_sal"></p>
							</div>
							<div class="middle">
								/
							</div>
							<div class="right">
								<select name="sal_time" id="sal_time_static">
									<option value="1">Giờ</option>
									<option value="2">Tuần</option>
									<option value="3" selected>Tháng</option>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="text">
								<span><img src="/images/calendar_icon.svg" alt="lich lam viec"></span>
								<span>Lịch làm việc</span>
								<span class="warning">*</span>
							</div>
						</div>
						<p class="warning" id="error_schedule"></p>
						<div class="table_schedule">
							<div class="schedule_row" id="t2">
								<div class="col_1">
									<label class="container">
										<div class="date">T2</div>
										<input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t2')">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="col_2 col_time" id="t2_am">
									<span>Từ</span>
									<input type="text" class="time start" value="07:00">
									<span>Đến</span>
									<input type="text" class="time end" value="11:00">
									<button id="add_t2" type="button" onclick="add_schedule_row('t2')"><img src="/images/add_schedule.svg" alt="them lich"></button>
								</div>
								<div class="col_3 col_time" id="t2_pm">
									<span>Từ</span>
									<input type="text" class="time start" value="18:00">
									<span>Đến</span>
									<input type="text" class="time end" value="21:00">
									<button type="button" id="minus_t2" onclick="minus_schedule_row('t2')"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
								</div>
							</div>
							<div class="schedule_row" id="t3">
								<div class="col_1">
									<label class="container">
										<div class="date">T3</div>
										<input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t3')">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="col_2 col_time" id="t3_am">
									<span>Từ</span>
									<input type="text" class="time start" value="07:00">
									<span>Đến</span>
									<input type="text" class="time end" value="11:00">
									<button id="add_t3" onclick="add_schedule_row('t3')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
								</div>
								<div class="col_3 col_time" id="t3_pm">
									<span>Từ</span>
									<input type="text" class="time start" value="18:00">
									<span>Đến</span>
									<input type="text" class="time end" value="21:00">
									<button id="minus_t3" onclick="minus_schedule_row('t3')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
								</div>
							</div>
							<div class="schedule_row" id="t4">
								<div class="col_1">
									<label class="container">
										<div class="date">T4</div>
										<input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t4')">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="col_2 col_time" id="t4_am">
									<span>Từ</span>
									<input type="text" class="time start" value="07:00" id="t4_am">
									<span>Đến</span>
									<input type="text" class="time end" value="11:00">
									<button id="add_t4" onclick="add_schedule_row('t4')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
								</div>
								<div class="col_3 col_time" id="t4_pm">
									<span>Từ</span>
									<input type="text" class="time start" value="18:00">
									<span>Đến</span>
									<input type="text" class="time end" value="21:00">
									<button id="minus_t4" onclick="minus_schedule_row('t4')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
								</div>
							</div>
							<div class="schedule_row" id="t5">
								<div class="col_1">
									<label class="container">
										<div class="date">T5</div>
										<input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t5')">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="col_2 col_time" id="t5_am">
									<span>Từ</span>
									<input type="text" class="time start" value="07:00">
									<span>Đến</span>
									<input type="text" class="time end" value="11:00">
									<button id="add_t5" onclick="add_schedule_row('t5')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
								</div>
								<div class="col_3 col_time" id="t5_pm">
									<span>Từ</span>
									<input type="text" class="time start" value="18:00">
									<span>Đến</span>
									<input type="text" class="time end" value="21:00">
									<button id="minus_t5" onclick="minus_schedule_row('t5')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
								</div>
							</div>
							<div class="schedule_row" id="t6">
								<div class="col_1">
									<label class="container">
										<div class="date">T6</div>
										<input type="checkbox" class="checkbox_schedule" checked="checked" onchange="hide_schedule_row('t6')">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="col_2 col_time" id="t6_am">
									<span>Từ</span>
									<input type="text" class="time start" value="07:00">
									<span>Đến</span>
									<input type="text" class="time end" value="11:00">
									<button id="add_t6" onclick="add_schedule_row('t6')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
								</div>
								<div class="col_3 col_time" id="t6_pm">
									<span>Từ</span>
									<input type="text" class="time start" value="18:00">
									<span>Đến</span>
									<input type="text" class="time end" value="21:00">
									<button id="minus_t6" onclick="minus_schedule_row('t6')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
								</div>
							</div>
							<div class="schedule_row" id="t7">
								<div class="col_1">
									<label class="container">
										<div class="date">T7</div>
										<input type="checkbox" class="checkbox_schedule" onchange="hide_schedule_row('t7')">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="col_2 col_time" id="t7_am">
									<span>Từ</span>
									<input type="text" class="time start" value="07:00">
									<span>Đến</span>
									<input type="text" class="time end" value="11:00">
									<button id="add_t7" onclick="add_schedule_row('t7')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
								</div>
								<div class="col_3 col_time" id="t7_pm">
									<span>Từ</span>
									<input type="text" class="time start" value="18:00">
									<span>Đến</span>
									<input type="text" class="time end" value="21:00">
									<button id="minus_t7" onclick="minus_schedule_row('t7')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
								</div>
							</div>
							<div class="schedule_row" id="cn">
								<div class="col_1">
									<label class="container">
										<div class="date">CN</div>
										<input type="checkbox" class="checkbox_schedule" onchange="hide_schedule_row('cn')">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="col_2 col_time" id="cn_am">
									<span>Từ</span>
									<input type="text" class="time start" value="07:00">
									<span>Đến</span>
									<input type="text" class="time end" value="11:00">
									<button id="add_cn" onclick="add_schedule_row('cn')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
								</div>
								<div class="col_3 col_time" id="cn_pm">
									<span>Từ</span>
									<input type="text" class="time start" value="18:00" name='cn_pm_start'>
									<span>Đến</span>
									<input type="text" class="time end" value="21:00">
									<button id="minus_cn" onclick="minus_schedule_row('cn')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
								</div>
							</div>
						</div>

						<!-- het lich lam viec -->
						<div class="row">
							<div class="center">
								<label for="intro"><span><img src="/images/profile_icon.svg" alt="gioi thieu ban than"></span><span>Về bản thân</span></label>
								<textarea name="" id="intro" placeholder="Giới thiệu một vài điều về bản thân ứng viên"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="center">
								<label for="exp"><span><img src="/images/profile_exp.svg" alt="kinh nghiem"></span><span>Kinh nghiệm làm giúp việc</span></label>
								<textarea name="" id="exp" placeholder="Giới thiệu một vài điều về kinh nghiệm làm giúp việc của ứng viên"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="text">
								<span><img src="/images/profile_skill.svg" alt="ky nang"></span>
								<span>Kỹ năng công việc</span>
								<span class="warning">*</span>
							</div>
						</div>
						<div class="box_skill">
							<div class="check_box">
								<div class="left">
									<label class="container">Nấu ăn
										<input type="checkbox" checked="checked">
										<span class="checkmark"></span>
									</label>
									<label class="container">Giặt là
										<input type="checkbox" checked="checked">
										<span class="checkmark"></span>
									</label>
									<label class="container">Đi dạo
										<input type="checkbox" checked="checked">
										<span class="checkmark"></span>
									</label>
									<label class="container">Dọn dẹp văn phòng
										<input type="checkbox" checked="checked">
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="right">
									<label class="container">Đi chợ, mua thực phẩm
										<input type="checkbox" checked="checked">
										<span class="checkmark"></span>
									</label>
									<label class="container">Sơ cứu đơn giản
										<input type="checkbox" checked="checked">
										<span class="checkmark"></span>
									</label>
									<label class="container">Xử lý vết thương, băng bó
										<input type="checkbox" checked="checked">
										<span class="checkmark"></span>
									</label>
									<label class="container">Chăm trẻ sơ sinh
										<input type="checkbox" checked="checked">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
							<div class="other_skill">
								<label class="container">
									<input type="checkbox" class="add_skill">
									<span class="checkmark"></span>
								</label>
								<input type="text" placeholder="Kỹ năng khác" disabled>
								<button class="btn_add_skill" type="button" hidden><img src="/images/add_skill.svg" alt="them ky nang"></button>
								<button class="btn_remove_skill" disabled type="button" hidden><img src="/images/minus_skill_disabled.svg" alt="xoa ky nang"></button>
							</div>

						</div>
						<div class="box_btn">
							<button class="update" type="button">Cập nhật</button>
							<button class="cancel" type="button">Hủy</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- het thong tin ca nhan -->
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
