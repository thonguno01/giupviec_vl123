<!-- Bat dau noi dung -->
<div class="main_content">
	<!-- bat dau thanh dia chi -->
	<div class="address_bar address_bar_pc">
		<span class="link_blue"><a href="/">Trang chủ</a></span>
		<span><img src="/images/arrow_right_blue.svg" alt="mui ten"></span>
		<span class="link_grey"><a href="#"><?= $page_title ?></a></span>
	</div>
	<div class="address_bar address_bar_mb">
		<span class="link_blue"><a href="/">Trang chủ</a></span>
		<span><img src="/images/arrow_right_blue.svg" alt="mui ten"></span>
		<span class="link_grey"><a href="tim-gip-viec-gvt0c0d0.html">Tìm người giúp việc</a></span>
	</div>
	<!-- ket thuc thanh dia chi -->
	<!-- bat dau box job -->
	<div class="box_job">
		<div class="block_left">
			<div class="open_filter">
				<button type="button" id="open_filter"><img src="/images/sort.svg" alt="sap xep"><span>Bộ lọc</span></button>
			</div>
			<!-- DANH SÁCH GIÚP VIỆC -->
			<div class="block_left_content">
				<p id="page_title" class="title"><?= $page_title ?></p>
				<div class="job_list">
					<?
					$dayms = 60 * 60 * 24;
					$timenow = strtotime(date('Y-m-d'));
					foreach ($list_employee as $employee) { ?>
						<!-- job item -->
						<div class="job_item">
							<? $datediff = floor(($employee['update_at'] - $timenow) / $dayms);
							if (abs($datediff) < 3) { ?>
								<div class="sticker"><img src="/images/new_sticker.svg" alt="sticker"></div>
							<? } ?>
							<? if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] != 1) { ?>
								<button class="btn_like btn_like_<?= $employee['id'] ?>" type="button" onclick="action_popup_login()">
									<img src="/images/like_star.svg" alt="them vao yeu thich">
								</button>
								<? } else {
								if ($_SESSION['user']['user_type'] == 1) {
									if (!in_array($employee['id'], $list_user_save)) { ?>
										<button class="btn_like btn_like_<?= $employee['id'] ?>" type="button" onclick="action_save(<?= $employee['id'] ?>)">
											<img src="/images/like_star.svg" alt="them vao yeu thich">
										</button>
									<? } else { ?>
										<button class="btn_like liked btn_like_<?= $employee['id'] ?>" type="button" onclick="action_save(<?= $employee['id'] ?>)">
											<img src="/images/like_star_full.svg" alt="them vao yeu thich">
										</button>
							<? }
								}
							} ?>
							<div class="box_profile">
								<div class="box_left">
									<a href="<?= rewrite_employee_link($employee['alias'], $employee['id']) ?>">
										<div class="avt">
											<? if ($employee['image']) { ?>
												<img src="<?= rewirte_user_img_href($employee['id'], $employee['image']) ?>" alt="anh dai dien">
											<? } else { ?>
												<img src="/images/employee_ava.png" alt="anh dai dien">
											<? } ?>
										</div>
									</a>
									<div class="rate_star">
										<span class="score">
											<div class="score-wrap">
												<span class="stars-active" style="width:<?= $employee['star_rating'] / 5 * 100 ?>%">
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
								<div class="box_right">
									<a class="name" href="<?= rewrite_employee_link($employee['alias'], $employee['id']) ?>"><?= $employee['name'] ?>
										<? if ($employee['worker_point_status'] == 1) echo '<span class="view_status">Đã mở</span>';
										elseif ($employee['worker_view_status'] == 1) echo '<span class="view_status">Đã xem</span>'; ?>
									</a>
									<div class="info">
										<div class="row_info">
											<div class="icon icon_location">
												<img src="/images/location_icon.svg" alt="dia chi">
											</div>
											<div class="text">
												<p class="location"><?= $employee['cit_name'] ?></p>
											</div>
										</div>
										<div class="row_info">
											<div class="icon icon_salary">
												<img src="/images/salary_icon.svg" alt="luong">
											</div>
											<div class="text">
												<p class="salary"><? if ($employee['salary_type'] == 0) echo number_format($employee['salary1'], 0, '', '.') . 'vnđ';
																	else echo (number_format($employee['salary1'], 0, '', '.') . ' - ' . number_format($employee['salary2'], 0, '', '.') . 'vnđ');
																	switch ($employee['salary_time']) {
																		case '1':
																			echo '/Tháng';
																			break;
																		case '2':
																			echo '/Tuần';
																			break;
																		case '3':
																			echo '/Giờ';
																			break;
																		default:
																			break;
																	}
																	?>
												</p>
											</div>
										</div>
										<div class="row_info">
											<div class="icon icon_exp">
												<img src="/images/exp_icon.svg" alt="kinh nghiem">
											</div>
											<div class="text">
												<p class="exp"><span class="grey">Kinh
														nghiệm:</span>
													<? switch ($employee['exp']) {
														case '0':
															echo 'Chưa có';
															break;
														case '1':
															echo 'Dưới 1 năm';
															break;
														case '2':
															echo '1-2 năm';
															break;
														case '3':
															echo '3-5 năm';
															break;
														case '4':
															echo '6-9 năm';
															break;
														case '5':
															echo 'Trên 10 năm';
															break;
														default:
															break;
													} ?>
												</p>
											</div>
											<!-- <div class="icon icon_birthday">
                                            <img src="/images/birthday_icon.svg" alt="tuoi">
                                        </div>
                                        <div class="location">
                                            <p>46 <span class="grey">tuổi</span></p>
                                        </div> -->
										</div>
										<div class="row_info">
											<div class="icon
                                                    icon_job_location">
												<img src="/images/job_location_icon.svg" alt="noi o">
											</div>
											<div class="text text_job_location">
												<p class="job_location"><?= $employee['work_name'] ?></p>
											</div>
											<div class="icon icon_birthday">
												<img src="/images/birthday_icon.svg" alt="tuoi">
											</div>
											<div class="text">
												<p class="age"><?= (date('Y') - date('Y', $employee['birth'])) ?> <span class="grey">tuổi</span></p>
											</div>
										</div>
										<div class="row_info">
											<div class="schedule">
												<? if ($employee['t2_ca1_bd']) echo '<div class="active">T2</div>';
												else echo '<div class="non_active">T2</div>' ?>
												<? if ($employee['t3_ca1_bd']) echo '<div class="active">T3</div>';
												else echo '<div class="non_active">T3</div>' ?>
												<? if ($employee['t4_ca1_bd']) echo '<div class="active">T4</div>';
												else echo '<div class="non_active">T4</div>' ?>
												<? if ($employee['t5_ca1_bd']) echo '<div class="active">T5</div>';
												else echo '<div class="non_active">T5</div>' ?>
												<? if ($employee['t6_ca1_bd']) echo '<div class="active">T6</div>';
												else echo '<div class="non_active">T6</div>' ?>
												<? if ($employee['t7_ca1_bd']) echo '<div class="active">T7</div>';
												else echo '<div class="non_active">T7</div>' ?>
												<? if ($employee['t8_ca1_bd']) echo '<div class="active">CN</div>';
												else echo '<div class="non_active">CN</div>' ?>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div class="list_tag">
								<? $list_employee_job_style = explode(',', $employee['job_style_id']);
								foreach ($list_employee_job_style as $employee_job_style) {
									foreach ($list_job_style as $job_style) {
										if ($employee_job_style == $job_style['id']) {
								?>

											<div class="tag_item">
												<span><?= $job_style['content'] ?></span>
											</div>
								<? }
									}
								} ?>
							</div>
							<div class="box_detail">
								<p class="content"><?= $employee['intro'] ?></p>
							</div>
						</div>
						<!-- end job item -->
					<? } ?>
				</div>
				<div class="pagination_box">
					<div class="pagination">
						<ul>
							<li><button id="minus_page"><img src="/images/prev.png" alt="nut lui trang"></button></li>
							<li><input type="number" id="current_page" class="active" max="<?= $total_page ?>" value="<?= $page ?>"></li>
							<li><button id="add_page"><img src="/images/pagination_next.svg" alt="nut tien"></button></li>
						</ul>
					</div>
					<span class="total_page"> of <?= $total_page ?></span>
				</div>
			</div>
			<!-- HẾT DANH SÁCH GIÚP VIỆC -->
		</div>
		<div class="block_right">
			<div class="block_right_content filter" id="filter">
				<div class="title">
					<p>Bộ lọc nâng cao</p>
					<button id="close_filter" type="button"><img src="/images/close_icon.svg" alt="dong bo loc"></button>
				</div>
				<div class="filter_content">
					<div class="list_item">
						<div class="item" id="filter_tag">
							<button type="button" id="dropdown_tag"><span>Nhóm dịch vụ</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_tag" style="display: none;"><button type="button" id="reset_tag"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_tag_content">Giúp việc theo giờ</span></div>
							<div class="inf" id="menu_tag" style="display: none;">
								<div class="select_menu">
									<? foreach ($list_job_style as $job_style) { ?>
										<div class="row filter_tag_item">
											<label class="container"><span class="tag_content"><?= $job_style['content'] ?></span>
												<input type="radio" name="tag" value="<?= $job_style['id'] ?>">
												<span class="checkmark"></span>
											</label>
										</div>
									<? } ?>
									<!-- <div class="row filter_tag_item">
                                    <label class="container">Giúp việc theo giờ
                                    <input type="radio" name="tag" value="Giúp việc theo giờ">
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                                <div class="row filter_tag_item">
                                    <label class="container">Giúp việc văn phòng
                                    <input type="radio" name="tag" value="Giúp việc văn phòng">
                                    <span class="checkmark"></span>
                                  </label>


                                </div>
                                <div class="row filter_tag_item">
                                    <label class="container">Giúp việc chăm sóc trẻ em
                                    <input type="radio" name="tag" value="Giúp việc chăm sóc trẻ em">
                                    <span class="checkmark"></span>
                                  </label>

                                </div>
                                <div class="row filter_tag_item">
                                    <label class="container">Giúp việc gia đình
                                    <input type="radio" name="tag" value="Giúp việc gia đình">
                                    <span class="checkmark"></span>
                                </label>

                                </div> -->
									<!-- <div class="row filter_tag_item">
                                    <label class="container">Giúp việc chăm sóc người già, người bệnh
                                    <input type="radio" name="tag" value="Giúp việc chăm sóc người già, người bệnh">
                                    <span class="checkmark"></span>
                                  </label>
                                </div> -->
								</div>
							</div>
						</div>
						<div class="item" id="filter_province">
							<button type="button" id="dropdown_province"><span>Tỉnh/Thành phố</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_province" style="display: none;"><button type="button" id="reset_province"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_province_content"></span></div>
							<div class="box_menu" id="menu_province" style="display: none;">
								<input type="text" autocomplete="off" id="inp_filter_province">
								<!-- <div class="result">
                            <p class="item">Hà Nội</p>
                            <p class="item">Hà Nam</p>
                            <p class="item">Hải Phòng</p>
                            <p class="item">Hòa Bình</p>
                        </div> -->
							</div>
						</div>
						<div class="item" id="filter_district">
							<button type="button" id="dropdown_district"><span>Quận/Huyện</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_district" style="display: none;"><button type="button" id="reset_district"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_district_content"></span></div>
							<div class="box_menu" id="menu_district" style="display: none;">
								<input type="text" autocomplete="off" id="inp_filter_district">
								<!-- <div class="result">
                            <p class="item">Hà Nội</p>
                            <p class="item">Hà Nam</p>
                            <p class="item">Hải Phòng</p>
                            <p class="item">Hòa Bình</p>
                        </div> -->
							</div>
						</div>
						<div class="item" id="filter_age">
							<button type="button" id="dropdown_age"><span>Độ tuổi</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_age" style="display: none;"><button type="button" id="reset_age"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_age_content">Từ 25-40 tuổi</span></div>
							<div id="menu_age" style="display: none;">
								<input class="range_age" type="text" id="range_age">
							</div>
						</div>
						<div class="item" id="filter_exp">
							<button type="button" id="dropdown_exp"><span>Kinh Nghiệm</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_exp" style="display: none;"><button type="button" id="reset_exp"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_exp_content"></span></div>
							<div class="inf" id="menu_exp" style="display: none;">
								<div class="select_menu">
									<div class="row">
										<label class="container"><span>Không có kinh nghiệm</span>
											<input type="radio" name="exp" value="0">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="row">
										<label class="container"><span>Dưới 1 năm</span>
											<input type="radio" name="exp" value="1">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="row">
										<label class="container"><span>1-2 năm</span>
											<input type="radio" name="exp" value="2">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="row">
										<label class="container"><span>3-5 năm</span>
											<input type="radio" name="exp" value="3">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="row">
										<label class="container"><span>6-9 năm</span>
											<input type="radio" name="exp" value="4">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="row">
										<label class="container"><span>Trên 10 năm</span>
											<input type="radio" name="exp" value="5">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="item dynamic_salary" id="filter_dynamic_salary">
							<button type="button" id="dropdown_dynamic_sal"><span>Mức lương ước định</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_dynamic_sal" style="display: none;"><button type="button" id="reset_dynamic_sal"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_dynamic_sal_content"></span></div>
							<div id="menu_dynamic_sal" style="display: none;">
								<div class="input_dynamic_sal">
									<div class="input_sal_box">
										<p>Từ</p>
										<div class="sal_fr"><input type="number" id="min_sal"><span>vnđ</span></div>
									</div>
									<div class="input_sal_box">
										<p>Đến</p>
										<div class="sal_to"><input type="number" id="max_sal"><span>vnđ</span></div>
									</div>
								</div>
								<div class="select_menu">
									<div class="row">
										<label class="container">Giờ
											<input type="radio" name="dynamic_sal_unit" value="3">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="row">
										<label class="container">Tuần
											<input type="radio" name="dynamic_sal_unit" value="2">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="row">
										<label class="container">Tháng
											<input type="radio" name="dynamic_sal_unit" value="1" checked="true">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="item static_salary" id="filter_static_salary">
							<button type="button" id="dropdown_static_sal"><span>Mức lương cố định</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_static_sal" style="display: none;"><button type="button" id="reset_static_sal"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_static_sal_content"></span></div>
							<div id="menu_static_sal" style="display: none;">
								<div class="select_menu">
									<div class="input_static_sal"><input type="number" id="sal_value"><span>vnđ</span></div>

									<div class="row">
										<label class="container">Giờ
											<input type="radio" name="static_sal_unit" value="3">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="row">
										<label class="container">Tuần
											<input type="radio" name="static_sal_unit" value="2">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="row">
										<label class="container">Tháng
											<input type="radio" name="static_sal_unit" value="1" checked="true">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="item" id="filter_work_schedule">
							<button type="button" id="dropdown_work_schedule"><span>Lịch làm việc</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_work_schedule" style="display: none;"><button type="button" id="reset_work_schedule"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_work_schedule_content"></span></div>
							<div id="menu_work_schedule" style="display: none;">
								<div class="select_menu">
									<label class="container"><span>Thứ 2</span>
										<input type="checkbox" value="t2" name="work_schedule">
										<span class="checkmark"></span>
									</label>
									<label class="container"><span>Thứ 3</span>
										<input type="checkbox" value="t3" name="work_schedule">
										<span class="checkmark"></span>
									</label>
									<label class="container"><span>Thứ 4</span>
										<input type="checkbox" value="t4" name="work_schedule">
										<span class="checkmark"></span>
									</label>
									<label class="container"><span>Thứ 5</span>
										<input type="checkbox" value="t5" name="work_schedule">
										<span class="checkmark"></span>
									</label>
									<label class="container"><span>Thứ 6</span>
										<input type="checkbox" value="t6" name="work_schedule">
										<span class="checkmark"></span>
									</label>
									<label class="container"><span>Thứ 7</span>
										<input type="checkbox" value="t7" name="work_schedule">
										<span class="checkmark"></span>
									</label>
									<label class="container"><span>Chủ nhật</span>
										<input type="checkbox" value="t8" name="work_schedule">
										<span class="checkmark"></span>
									</label>
								</div>
							</div>
						</div>
						<div class="item" id="filter_stay">
							<button type="button" id="dropdown_stay"><span>Ở cùng gia chủ</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_stay" style="display: none;"><button type="button" id="reset_stay"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_stay_content"></span></div>
							<div id="menu_stay" style="display: none;">
								<div class="select_menu">
									<? foreach ($list_work_type as $work_type) { ?>
										<div class="row">
											<label class="container"><span><?= $work_type['work_name'] ?></span>
												<input type="radio" name="stay" value="<?= $work_type['id'] ?>">
												<span class="checkmark"></span>
											</label>
										</div>
									<? } ?>
								</div>
							</div>
						</div>
					</div>
					<div class="btn_box">
						<button type="button" class="reset" id="reset_all">Cài đặt lại</button>
						<button class="apply" onclick="apply_filter_employee()">Áp dụng</button>
					</div>
				</div>
			</div>
			<div class="block_right_content list_province">
				<div class="title">
					<img src="/images/btn_search.svg" alt="icon tim
                                kiem">
					<p>Tìm kiếm theo tỉnh thành</p>
				</div>
				<div class="list_item">
					<? foreach ($list_city_worker as $city) { ?>
						<div class="item">
							<button type="button" onclick="window.location.href='/tim-giup-viec-tai-<?= create_slug($city['cit_name']) ?>-gvt0c<?= $city['cit_id'] ?>d0.html'"><?= $city['cit_name'] ?> (<?= $city['count_worker'] ?>)</button>
						</div>
					<? } ?>
				</div>
			</div>
			<div class="block_right_content list_district">
				<div class="title">
					<img src="/images/btn_search.svg" alt="icon tim
                                kiem">
					<p>Tìm kiếm theo quận/huyện</p>
				</div>
				<div class="list_item">
					<? foreach ($list_district_worker as $city) { ?>
						<div class="item">
							<button type="button" onclick="window.location.href='/tim-giup-viec-tai-<?= create_slug($city['cit_name']) ?>-gvt0c0d<?= $city['cit_id'] ?>.html'"><?= $city['cit_name'] ?> (<?= $city['count_worker'] ?>)</button>
						</div>
					<? } ?>
					<!-- <div class="item">
                    <button type="button" id="">Hà Nội (103)</button>
                </div>
                <div class="item">
                    <button type="button" id="">Hà Nội (103)</button>
                </div>
                <div class="item">
                    <button type="button" id="">Hà Nội (103)</button>
                </div>
                <div class="item">
                    <button type="button" id="">Hà Nội (103)</button>
                </div> -->
				</div>
			</div>
			<div class="block_right_content list_hot_key">
				<div class="title">
					<img src="/images/tag_icon.svg" alt="icon tu khoa">
					<p>Từ khóa phổ biến</p>
				</div>
				<div class="list_key">
					<a href="/tim-giup-viec-tai-ha-noi-gvt0c1d0.html">Tìm giúp việc tại Hà Nội</a>
					<a href="/tim-giup-viec-tai-ho-chi-minh-gvt0c45d0.html">Tìm giúp việc tại TPHCM</a>
					<a href="/tim-giup-viec-tai-da-nang-gvt0c26d0.html">Tìm giúp việc tại Đà Nẵng</a>
					<a href="/tim-giup-viec-tai-can-tho-gvt0c48d0.html">Tìm giúp việc tại Cần Thơ</a>
					<a href="/tim-giup-viec-tai-hai-phong-gvt0c2d0.html">Tìm giúp việc tại Hải Phòng</a>
				</div>
			</div>
		</div>
	</div>
	<div class="banner_4">
		<div class="box_img">
			<img src="/images/banner_4_img_1.png" alt="anh banner">
			<img src="/images/banner_4_img_2.png" alt="anh banner">
		</div>
		<div class="text_box">
			<p class="box_title">NHỮNG CON SỐ ẤN TƯỢNG</p>
			<div class="content">
				<div class="box_content">
					<div class="sub_title">10.000+ </div>
					<div class="text">Lượt đăng ký làm giúp việc</div>
				</div>
				<div class="box_content">
					<div class="sub_title">50.000+ </div>
					<div class="text">Lượt tìm kiếm giúp việc</div>
				</div>
				<div class="box_content">
					<div class="sub_title">5.000+ </div>
					<div class="text">Người giúp việc nhận việc</div>
				</div>
			</div>
			<div class="banner_btn">
				<button>Đăng tin tuyển dụng ngay</button>
			</div>
		</div>
	</div>
</div>
<!-- het box job -->
</div>
<!-- Ket thuc noi dung -->