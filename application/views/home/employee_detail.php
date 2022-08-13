    <!-- Bat dau noi dung -->
    <div id="wrap-content">
    	<!-- <div class="main_content"> -->
    	<div class="bar_address">
    		<span><a href="/">Trang chủ </a></span>
    		<span><img src="/images/job_list/arrow-right.svg" alt="mui ten"></span>
    		<span><a href="tim-nguoi-giup-viec-gvt0c0d0.html">Tìm người giúp việc</a></span>
    		<span><img src="/images/job_list/arrow-right.svg" alt="mui ten"></span>
    		<span><a class="active"><?= $employee['name'] ?></a></span>
    	</div>
    	<!-- </div> -->
    	<div id="wr-content">
    		<div class="box-1 ">

    			<? if (!isset($_SESSION['user'])) { ?>
    				<button class="star_hot btn_like_<?= $employee['id'] ?>" type="button" onclick="action_popup_login()">
    					<img src="/images/like_star.svg" alt="them vao yeu thich">
    				</button>
    				<? } else {
					if ($_SESSION['user']['user_type'] == 1) {
						if (!in_array($employee['id'], $list_user_save)) { ?>
    						<button class="star_hot btn_like_<?= $employee['id'] ?>" type="button" onclick="action_save(<?= $employee['id'] ?>)">
    							<img src="/images/like_star.svg" alt="them vao yeu thich">
    						</button>
    					<? } else { ?>
    						<button class="star_hot liked btn_like_<?= $employee['id'] ?>" type="button" onclick="action_save(<?= $employee['id'] ?>)">
    							<img src="/images/like_star_full.svg" alt="them vao yeu thich">
    						</button>
    			<? }
					}
				} ?>

    			<div class="image">
    				<div class="border_radius">
    					<? if ($employee['image']) { ?>
    						<img src="<?= rewirte_user_img_href($employee['id'], $employee['image']) ?>" alt="anh dai dien">
    					<? } else { ?>
    						<img src="/images/employee_ava.png" alt="anh dai dien">
    					<? } ?>
    				</div>
    				<div class="rate_star">
    					<span class="score">
    						<div class="score-wrap">
    							<span class="stars-active" style="width:<?= round($employee['star_rating'] / 5 * 100) ?>%">
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
    				<p class="text-center">ID: <?= $employee['id'] ?></p>
    			</div>
    			<div class="info">
    				<div class="information flex justify-center" id="share_option" style="display: none;">
    					<a href="https://www.facebook.com/sharer/sharer.php?u=<?= isset($canonical) ? $canonical : "" ?>" rel="nofollow"> <img src="/images/helper_detail/face.svg" alt="facebook"></a>
    					<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= isset($canonical) ? $canonical : "" ?>" rel="nofollow"><img src="/images/helper_detail/in.svg" alt="linkedin"> </a>
    					<a href="http://www.twitter.com/share?url=<?= isset($canonical) ? $canonical : "" ?>" rel="nofollow"> <img src="/images/helper_detail/twitter.svg" alt="twitter"></a>
    				</div>
    				<button class="option" id="share">

    					<img src="/images/helper_detail/menu.svg" alt="Option">
    				</button>
    				<span data-id="<?= $employee['id'] ?>" class="name_helper"><span><?= $employee['name'] ?></span>
    				</span>
    				<div class="address grid-2">
    					<img src="/images/helper_detail/address.svg" alt="Nơi làm việc Hà nội ">
    					<p>Nơi làm việc: <span><?= $employee['cit_name'] ?></span></p>
    				</div>
    				<?
					if ($employee['salary_type'] == 1) {
					?>
    					<div class="money grid-2">
    						<img src="/images/job_around/money.svg" alt="Tiền lương">
    						<div class="from_to">
    							<p>Mức lương ước lượng: từ
    								<span class="text-danger"><?= number_format($employee['salary1'], 0, '', '.') . 'vnđ';
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
																?></span>
    								đến
    								<span class="text-danger"><?= number_format($employee['salary2'], 0, '', '.') . 'vnđ';
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
																?></span>
    							</p>
    						</div>
    					</div>
    				<? } else { ?>
    					<div class="money grid-2 luong_co_dinh">
    						<img src="/images/job_around/money.svg" alt="Tiền lương Cố định ">
    						<div class="from_to">
    							<p>Mức lương cố định:
    								<span class="text-danger"><?= number_format($employee['salary1'], 0, '', '.') . 'vnđ';
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
																?></span>
    							</p>
    						</div>
    					</div>
    				<? } ?>
    				<div class="exp_info grid-2">
    					<img src="/images/helper_detail/exp.svg" alt="Kinh nghiêm">
    					<p>Kinh nghiệm <span><? switch ($employee['exp']) {
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
												} ?></span></p>
    				</div>
    				<div class="date grid-2">
    					<img src="/images/helper_detail/age.svg" alt="Nơi làm việc Hà nội ">
    					<p>Ngày sinh: <span><?= date('d-m-Y', $employee['birth']) ?></span></p>
    				</div>
    				<div class="star grid-2">
    					<img src="/images/helper_detail/start.svg" alt="Ở cùng chủ nhà ">
    					<p><?= $employee['work_name'] ?></p>
    				</div>
    				<div class="job grid-2">
    					<img src="/images/helper_detail/job.svg" alt=" Công việc nhận làm: ">
    					<!-- <p>Công việc nhận làm:</p> -->
    					<div class="chieu ">
    						<span class="name_job">Công việc nhận làm:</span>
    						<span class="job_detail ">
    							<!-- <span class=" "> -->
    							<? $list_employee_job_style = explode(',', $employee['job_style_id']);
								foreach ($list_employee_job_style as $employee_job_style) {
									foreach ($list_job_style as $job_style) {
										if ($employee_job_style == $job_style['id']) {
								?>
    										<span><?= $job_style['content'] ?></span>
    							<? }
									}
								} ?>
    						</span>
    					</div>
    				</div>

    			</div>
    		</div>
    		<div class="box-2">

    			<div class="self ">
    				<img class="self-1" src="/images/helper_detail/banthan.svg" alt="Bản thân ">

    				<p class="title self-2">Về bản thân </p>
    				<p class="detail self-3"><?= $employee['intro'] ?></p>

    			</div>


    			<div class="calendar">
    				<img class="calendar-1" src="/images/helper_detail/calendar.svg" alt="lịch làm việc ">
    				<p class="title calendar-2">Lịch làm việc </p>
    				<div class="calendar-3">
    					<div class="work_day">
    						<div class="day flex justyfy-between">
    							<? if ($employee_schedule['t2_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T2</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $employee_schedule['t2_ca1_bd'] ?> - <?= $employee_schedule['t2_ca1_kt'] ?></p>
    									<? if ($employee_schedule['t2_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $employee_schedule['t2_ca2_bd'] ?> - <?= $employee_schedule['t2_ca2_kt'] ?></p>
    									<? } ?>
    								</div>
    							<? } else { ?>
    								<div class="grid-2">
    									<div class="boder-circle">

    									</div>
    									<div class="radius non_active ">
    										<span class="">T2</span>
    									</div>
    								</div>
    								<div class="time_no_work">
    									<p>Tôi không làm việc</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($employee_schedule['t3_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T3</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $employee_schedule['t3_ca1_bd'] ?> - <?= $employee_schedule['t3_ca1_kt'] ?></p>
    									<? if ($employee_schedule['t3_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $employee_schedule['t3_ca2_bd'] ?> - <?= $employee_schedule['t3_ca2_kt'] ?></p>
    									<? } ?>
    								</div>
    							<? } else { ?>
    								<div class="grid-2">
    									<div class="boder-circle">

    									</div>
    									<div class="radius non_active ">
    										<span class="">T3</span>
    									</div>
    								</div>
    								<div class="time_no_work">
    									<p>Tôi không làm việc</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>

    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($employee_schedule['t4_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T4</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $employee_schedule['t4_ca1_bd'] ?> - <?= $employee_schedule['t4_ca1_kt'] ?></p>
    									<? if ($employee_schedule['t4_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $employee_schedule['t4_ca2_bd'] ?> - <?= $employee_schedule['t4_ca2_kt'] ?></p>
    									<? } ?>
    								</div>
    							<? } else { ?>
    								<div class="grid-2">
    									<div class="boder-circle">

    									</div>
    									<div class="radius non_active ">
    										<span class="">T4</span>
    									</div>
    								</div>
    								<div class="time_no_work">
    									<p>Tôi không làm việc</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($employee_schedule['t5_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T5</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $employee_schedule['t5_ca1_bd'] ?> - <?= $employee_schedule['t5_ca1_kt'] ?></p>
    									<? if ($employee_schedule['t5_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $employee_schedule['t5_ca2_bd'] ?> - <?= $employee_schedule['t5_ca2_kt'] ?></p>
    									<? } ?>
    								</div>
    							<? } else { ?>
    								<div class="grid-2">
    									<div class="boder-circle">

    									</div>
    									<div class="radius non_active ">
    										<span class="">T5</span>
    									</div>
    								</div>
    								<div class="time_no_work">
    									<p>Tôi không làm việc</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($employee_schedule['t6_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T6</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $employee_schedule['t6_ca1_bd'] ?> - <?= $employee_schedule['t6_ca1_kt'] ?></p>
    									<? if ($employee_schedule['t6_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $employee_schedule['t6_ca2_bd'] ?> - <?= $employee_schedule['t6_ca2_kt'] ?></p>
    									<? } ?>
    								</div>
    							<? } else { ?>
    								<div class="grid-2">
    									<div class="boder-circle">

    									</div>
    									<div class="radius non_active ">
    										<span class="">T6</span>
    									</div>
    								</div>
    								<div class="time_no_work">
    									<p>Tôi không làm việc</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($employee_schedule['t7_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T7</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $employee_schedule['t7_ca1_bd'] ?> - <?= $employee_schedule['t7_ca1_kt'] ?></p>
    									<? if ($employee_schedule['t7_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $employee_schedule['t7_ca2_bd'] ?> - <?= $employee_schedule['t7_ca2_kt'] ?></p>
    									<? } ?>
    								</div>
    							<? } else { ?>
    								<div class="grid-2">
    									<div class="boder-circle">

    									</div>
    									<div class="radius non_active ">
    										<span class="">T7</span>
    									</div>
    								</div>
    								<div class="time_no_work">
    									<p>Tôi không làm việc</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($employee_schedule['t8_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">CN</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $employee_schedule['t8_ca1_bd'] ?> - <?= $employee_schedule['t8_ca1_kt'] ?></p>
    									<? if ($employee_schedule['t8_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $employee_schedule['t8_ca2_bd'] ?> - <?= $employee_schedule['t8_ca2_kt'] ?></p>
    									<? } ?>
    								</div>
    							<? } else { ?>
    								<div class="grid-2">
    									<div class="boder-circle">

    									</div>
    									<div class="radius non_active ">
    										<span class="">CN</span>
    									</div>
    								</div>
    								<div class="time_no_work">
    									<p>Tôi không làm việc</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="exp">
    				<img class="exp-1" src="/images/helper_detail/exp.svg" alt="Kinh nghiệm làm việc  ">
    				<p class="title exp-2">Kinh nghiệm </p>
    				<p class="exp_detail exp-3"><?= $employee['work_process'] ?></p>

    			</div>

    			<div class="skill ">
    				<img class="skill-1" src="/images/helper_detail/skill.png" alt="Kỹ năng công việc ">

    				<p class="title skill-2">Kỹ năng công việc </p>
    				<ul class="main_skill skill-3">
    					<? if (!empty($employee['job_skill'])) {
							$list_job_skill = explode('|', $employee['job_skill']);
							foreach ($list_job_skill as $job_skill) { ?>
    							<li class="">
    								<img src="/images//helper_detail/dot_blue.png" alt="chấm xanh">
    								<span><?= $job_skill ?></span>
    							</li>
    					<? }
						} ?>

    				</ul>

    			</div>
    			<!-- </div> -->

    		</div>
    		<!-- kết thúc box left -->
    		<!-- siderbar -->
    		<!-- <div class="siderbar_right ">
            </div> -->
    		<div id="wr-contact">
    			<div class="top">
    				<p class="contact-title ">
    					Thông tin liên hệ
    				</p>
    				<div class="contact">
    					<div class="mail flex">
    						<img src="/images/helper_detail/mail.svg" alt="Email">
    						<p class="email">Email:</p>
    						<p class="name_email <? if ($employee['worker_point_status'] == 1) echo 'active' ?>"><? if ($employee['worker_point_status'] == 0) {
																														if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 0 && $_SESSION['user']['id'] == $employee['id']) {
																															echo $employee['email'];
																														} else echo 'Thông tin đang bị ẩn';
																													} else {
																														echo $employee['email'];
																													} ?></p>
    					</div>
    					<div class="phone flex">
    						<img src="/images/helper_detail/phone.svg" alt="Số điện thoại">
    						<p class="sdt">SĐT:</p>
    						<p class="number_phone <? if ($employee['worker_point_status'] == 1) echo 'active' ?>"><? if ($employee['worker_point_status'] == 0) {
																														if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 0 && $_SESSION['user']['id'] == $employee['id']) {
																															echo $employee['phone'];
																														} else echo 'Thông tin đang bị ẩn';
																													} else echo $employee['phone']; ?></p>
    					</div>
    				</div>
    			</div>
    			<div class="bottom">
    				<? if (!isset($_SESSION['user'])) { ?>
    					<button name="<?= $employee['id'] ?>" id="see_detail" class="see_detail" onclick="action_popup_login()">Xem chi tiết</button>
    					<? } elseif ($_SESSION['user']['user_type'] != 1) {
						if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 0 && $_SESSION['user']['id'] == $employee['id']) { ?>
    						<button name="<?= $employee['id'] ?>" id="see_detail" class="see_detail active">Xem chi tiết</button>
    					<? } else { ?>
    						<button name="<?= $employee['id'] ?>" id="see_detail" class="see_detail" onclick="action_popup_login()">Xem chi tiết</button>
    					<? }
					} else {
						if ($employee['worker_point_status'] == 0) { ?>
    						<button name="<?= $employee['id'] ?>" id="see_detail" class="see_detail" onclick="check_point('<?= $employee['alias'] ?>',<?= $employee['id'] ?>)">Xem chi tiết</button>
    					<? } else { ?>
    						<button name="<?= $employee['id'] ?>" id="see_detail" class="see_detail active">Xem chi tiết</button>
    				<? }
					}
					?>
    			</div>
    		</div>
    		<div id="wr-feedback">
    			<div class="top-feedback">
    				<p class="feedback-title">
    					Nhận xét người giúp việc
    				</p>
    				<div class="feedback">
    					<?
						if (!empty($employee_rate)) {
							foreach ($employee_rate as $rate) { ?>
    							<div class="item">
    								<div class="container flex">
    									<div class="image">
    										<? if ($rate['image']) { ?>
    											<img data-src="<?= rewirte_company_img_href($rate['id'], $rate['image']) ?>" alt="anh dai dien" class="lazyload" src="/images/lazy_load.gif">
    										<? } else { ?>
    											<img src="/images/helper_detail/avat_user.png" alt="anh dai dien">
    										<? } ?>
    									</div>
    									<div class="info-feedback">
    										<a href=""><?= $rate['name'] ?></a>
    										<div class="time-feedback">
    											<img src="/images/helper_detail/clcok.svg" alt="thời gian ">
    											<span><?= date('d-m-Y H:i:s', $rate['rate_time']) ?></span>
    										</div>
    									</div>
    								</div>
    								<p>
    									<?= $rate['rate_content'] ?>
    								</p>
    							</div>
    					<? }
						} ?>


    				</div>
    			</div>

    		</div>
    		<div id="wr-sidebar-search" class="keywords">
    			<div class="siderbar-search flex">
    				<img src="/images/job_list/keywords.svg" alt="Tìm kiếm ">
    				<!-- <input type="text" placeholder="Tìm kiếm theo tỉnh thành " name="search "> -->
    				<span>Từ khóa phổ biến </span>
    			</div>
    			<div class="filter ">
    				<div class="list-item-keywords">
    					<button>Tìm giúp việc tại hà nội</button>
    				</div>
    				<div class="list-item-keywords">
    					<button>Tìm giúp việc giá rẻ</button>
    				</div>
    				<div class="list-item-keywords">
    					<button>Tìm giúp việc tại thanh xuân</button>
    				</div>
    				<div class="list-item-keywords">
    					<button>Tìm giúp việc uy tín</button>
    				</div>
    				<div class="list-item-keywords">
    					<button>Tìm giúp việc chăm sóc người bệnh</button>
    				</div>
    				<div class="list-item-keywords">
    					<button>Tìm giúp việc 5 triệu tại hà nội</button>
    				</div>

    			</div>
    		</div>
    		<!-- kết  thúc sidebar -->

    	</div>
    	<div class="person_potential">
    		<div class="person_potential_parent">
    			<p class="title">ỨNG VIÊN TIỀM NĂNG KHÁC</p>

    			<div class="person_potential_parent_child slick_slider">
    				<? foreach ($potential_employees as $employee) { ?>
    					<!-- 1 ung vien tiem nang  -->
    					<div class="wrap_person_potential_box">
    						<div class="block">
    							<div class="flex">
    								<!-- <button class="image_wrap_person_potential_box" >
										<img src="/images/helper_detail/starPNG.svg" alt="yêu thích">
									</button> -->

    								<? if (!isset($_SESSION['user'])) { ?>
    									<button class="image_wrap_person_potential_box btn_like_<?= $employee['id'] ?>" type="button" onclick="action_popup_login()">
    										<img src="/images/like_star.svg" alt="them vao yeu thich">
    									</button>
    									<? } else {
										if ($_SESSION['user']['user_type'] == 1) {
											if (!in_array($employee['id'], $list_user_save)) { ?>
    											<button class="image_wrap_person_potential_box btn_like_<?= $employee['id'] ?>" type="button" onclick="action_save(<?= $employee['id'] ?>)">
    												<img src="/images/like_star.svg" alt="them vao yeu thich">
    											</button>
    										<? } else { ?>
    											<button class="image_wrap_person_potential_box liked btn_like_<?= $employee['id'] ?>" type="button" onclick="action_save(<?= $employee['id'] ?>)">
    												<img src="/images/like_star_full.svg" alt="them vao yeu thich">
    											</button>
    								<? }
										}
									} ?>

    								<div class="person_potential_child_image ">
    									<a href="<?= rewrite_employee_link($employee['alias'], $employee['id']) ?>">
    										<div class="round">
    											<? if ($employee['image']) { ?>
    												<img data-src="<?= rewirte_user_img_href($employee['id'], $employee['image']) ?>" alt="anh dai dien" class="lazyload" src="/images/lazy_load.gif">
    											<? } else { ?>
    												<img src="/images/employee_ava.png" alt="anh dai dien">
    											<? } ?>
    										</div>
    									</a>
    									<div class="rate_star">
    										<span class="score">
    											<div class="score-wrap">
    												<span class="stars-active" style="width:<?= round($employee['star_rating'] / 5 * 100) ?>%">
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
    									<span class="name"><a href="<?= rewrite_employee_link($employee['alias'], $employee['id']) ?>"><?= $employee['name'] ?></a> </span>
    									<div class="address  ">
    										<img src="/images/job_around/address.svg" alt="Địa điểm">
    										<span><?= $employee['cit_name'] ?></span>
    									</div>
    									<? if ($employee['salary_type'] == 1) { ?>
    										<div class="money  ">
    											<img src="/images/job_around/money.svg" alt="Tiền lương">
    											<div class="from_to">
    												<p>Từ
    													<span class="text-danger"><?= number_format($employee['salary1'], 0, '', '.') ?>vnđ <? switch ($employee['salary_time']) {
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
																																			} ?></span>
    												</p>
    												<p> đến
    													<span class="text-danger"><?= number_format($employee['salary2'], 0, '', '.') ?>vnđ <? switch ($employee['salary_time']) {
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
																																			} ?></span>
    												</p>

    											</div>
    										</div>
    									<? } else { ?>
    										<div class="money  ">
    											<img src="/images/job_around/money.svg" alt="Tiền lương">
    											<div class="from_to">
    												<p>
    													<span class="text-danger"><?= number_format($employee['salary1'], 0, '', '.') ?>vnđ <? switch ($employee['salary_time']) {
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
																																			} ?></span>
    												</p>

    											</div>
    										</div>
    									<? } ?>
    									<div class="exp  ">
    										<img src="/images/job_around/exp.svg" alt="Tiền lương">
    										<span>Kinh nghiệm <strong class=""><? switch ($employee['exp']) {
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
																				} ?></strong> </span>
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
    							<p class="see_detail_person_potential">
    								<a href="">Xem chi tiết >></a>
    							</p>

    						</div>
    					</div>

    					<!-- Het 1 ung vien tiem nang -->
    				<? } ?>
    			</div>
    		</div>
    	</div>
    </div>

    <!-- popup su dung diem -->
    <div class="popup_use_point">
    	<div class="popup_bg">
    		<div class="popup_content">
    			<p class="title">Thông báo</p>
    			<p class="content">Bạn có <span class="yellow" id="company_point">5 điểm miễn phí</span> hôm nay, sử dụng <span class="yellow">1 điểm</span> để xem chi tiết ứng viên này?</p>
    			<div class="confirm_button">
    				<button class="yes" id="yes">Tiếp tục</button>
    				<button class="no" id="no">Hủy</button>
    			</div>
    		</div>
    	</div>
    </div>

    <!-- het popup su dung diem -->

    <!-- popup het diem -->
    <div class="popup_empty_point">
    	<div class="popup_bg">
    		<div class="popup_content">
    			<p class="title">Thông báo</p>
    			<p class="content">Bạn đã sử dụng hết điểm miễn phí hôm nay</p>
    			<div class="confirm_button">
    				<button onclick="close_popup_empty_point()" class="ok" id="ok">OK</button>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- het popup het diem -->
    <!-- Ket thuc noi dung -->