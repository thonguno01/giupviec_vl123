<!-- Bat dau noi dung -->
    <div id="wrap-content">
        <div class="main_content">
            <div class="bar_address  flex">
                <span class="trang_chu"><a href="/">Trang chủ </a></span>
                <span><img src="/images/job_list/arrow-right.svg" alt="mui ten"></span>
                <span class="slug_none_1"><a class="active" href="">Giúp việc quanh đây </a></span>
            </div>
        </div>
        <!-- BOX-LEFT    -->
        <div id="wr-content">
            <div class="box-left">
				<div class="open_filter">
					<button type="button" id="open_filter" style=""><img src="/images/sort.svg" alt="sap xep"><span>Bộ lọc</span></button>
				</div>
                <div class="content">
                    <div class="location">
                        <img src="/images/map.png" alt="ban do">
                    </div>
                    <div class="item_parent">
                        <div class="info ">
                            <?
							foreach($list_employee as $employee){
							?>
                            <div class="box ">
                                <div class="star_prominent">
                                    <img src="/images/job_list/starPNG.svg" alt="LogoVieclam123">
                                </div>
                                <div class="box-child flex">
                                    <div class="image">
                                        <div class="border_radius">
										<a href="<?= rewrite_employee_link($employee['alias'], $employee['id']) ?>">
										<div class="avt">
											<? if ($employee['image']) { ?>
												<img src="<?= rewirte_user_img_href($employee['id'], $employee['image']) ?>" alt="anh dai dien">
											<? } else { ?>
												<img src="/images/employee_ava.png" alt="anh dai dien">
											<? } ?>
										</div>
									</a>
                                        </div>
                                        <div class="rate_star">
    										<span class="score">
    											<div class="score-wrap">
    												<span class="stars-active" style="width:<?=$employee['star_rating']/5*100?>%">
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
                                    <div class="info_detail">
                                        <span class="name"><a href="<?=rewrite_employee_link($employee['alias'], $employee['id'])?>"><?=$employee['name']?></a> </span>
                                        <div class="address grid-2 ">
                                            <img src="/images/job_around/address.svg" alt="Địa điểm">
                                            <span><?=$employee['cit_name']?></span>
                                        </div>
                                        <div class="money grid-2 ">
                                            <img src="/images/job_around/money.svg" alt="Tiền lương">
                                            <div class="from_to">

											<? if ($employee['salary_type'] == 0) {echo '<p><span class="text-danger">'.number_format($employee['salary1'], 0, '', '.') . 'vnđ';
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

											echo '</span></p>';}
																	else {
																		echo '<p>Từ <span class="text-danger">'.number_format($employee['salary1'], 0, '', '.') . 'vnđ';
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
																		echo '</span></p>';

																		echo '<p>đến <span class="text-danger">'.number_format($employee['salary2'], 0, '', '.') . 'vnđ';
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
																		echo '</span></p>';
																	}
																	?>
                                                <!-- <p>Từ
                                                    <span class="text-danger">80.000 vnđ/Giờ</span>
                                                </p>
                                                <p> đến
                                                    <span class="text-danger">200.000vnđ/Giờ</span>
                                                </p> -->

                                            </div>
                                        </div>
                                        <div class="exp grid-2 ">
                                            <img src="/images/job_around/exp.svg" alt="Tiền lương">
                                            <span>Kinh nghiệm  <strong class="">
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
											</strong> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="job ">
								<? $list_employee_job_style = explode(',', $employee['job_style_id']);
								foreach ($list_employee_job_style as $employee_job_style) {
									foreach ($list_job_style as $job_style) {
										if ($employee_job_style == $job_style['id']) {
								?>
												<span><?= $job_style['content'] ?></span>
								<? }
									}
								} ?>
                                </div>
                                <div class="see_detail">
                                    <span>Xem chi tiết >></span>
                                </div>
                            </div>
							<?}?>
                        </div>
                    </div>


                    <!--=========================  pagination =====================-->
                    <div class="pagination_box">
					<div class="pagination">
						<ul>
							<li><button id="minus_page"><img src="/images/prev.png" alt="nut lui trang"></button></li>
							<li><input type="number" id="current_page" class="active" max="<?=$total_page?>" value="<?=$page?>"></li>
							<li><button id="add_page"><img src="/images/pagination_next.svg" alt="nut tien"></button></li>
						</ul>
					</div>
					<span class="total_page"> of <?=$total_page?></span>
				</div>

                </div>
            </div>
            <!-- siderbar -->
            <div class="siderbar_right block_right">
                <div id="wr-sidebar">
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
						<button class="apply" onclick="apply_filter_new()">Áp dụng</button>
					</div>
				</div>
			</div>       
                </div>
                <!-- kết thúc sidebar -->
            </div>
        </div>

    </div>
    <!-- Ket thuc noi dung -->
