

    <!-- Bat dau noi dung -->
    <!-- nut hien danh muc man mobile -->
    <div class="btn_show_tag">
    	<button id="open_popup_tag"><img src="/images/menu_tag.svg" alt="hien thi danh muc"></button>
    </div>
    <!-- het nut hien danh muc man mobile -->
    <!-- popup danh muc man mobile -->
    <div class="bg_popup_tag" hidden>
    	<div class="list_tag_popup">
			<div class="list_tag">
			<? foreach ($list_job_style as $job_style) { ?>
				<div class="item">
    			<a href="<?=rewrite_tag_link($job_style['alias'],$job_style['id'])?>"><?= $job_style['content'] ?></a>
    			</div>
				<?}?>
			</div>
    		<div class="item btn_close">
    			<button id="close_popup_tag"><img src="/images/close_tag_popup.png" alt="dong popup"></button>
    		</div>
    	</div>
    </div>
    <!-- het popup danh muc man mobile -->
    <div class="banner_1">
    	<div class="text">
    		<div class="title">
    			<p class="title_blue">Giúp việc</p>
    			<p class="title_yellow"><a href="#">Vieclam123.vn</a></p>
    		</div>
    		<div class="content">
    			<p>GIẢI PHÁP TÌM GIÚP VIỆC UY TÍN, <br>CHẤT LƯỢNG SỐ 1 VIỆT NAM
    			</p>
    		</div>
    	</div>
    	<div class="link">
    		<p class="text"><a href="/">HTTPS://GIUPVIEC.VIECLAM123.VN</a></p>
    		<div class="icon">
    			<a href="#"><img src="/images/banner1_facebook_icon.svg" alt="icon facebook"></a>
    			<a href="#"><img src="/images/banner1_linkin_icon.svg" alt="icon linkin"></a>
    			<a href="#"><img src="/images/banner1_twitter_icon.svg" alt="icon twitter"></a>
    		</div>
    	</div>
    </div>
    <div class="main_content">
    	<div class="box_top">
    		<div class="box_content">
    			<div class="title">
    				<p>Dịch vụ nổi bật</p>
    			</div>
    			<div class="box_tag">
    				<? foreach ($list_job_style as $job_style) { ?>
						<a href="<?=rewrite_tag_link($job_style['alias'],$job_style['id'])?>">
    					<div class="tag_item">
							<?if($job_style['image']){?>
    						<img src="<?= rewirte_job_style_img_href($job_style['id'], $job_style['image']) ?>" alt="anh tag">
							<?} else{?>
								<img src="/images/giup-viec.png" alt="anh tag" >
								<?}?>
    						<p class="title"><?= $job_style['content'] ?></p>
    						<p class="content"><?= $job_style['description'] ?></p>
    					</div>
						</a>
    				<? } ?>
    			</div>
    		</div>
    	</div>
    	<!-- bat dau box job -->
    	<div class="box_job">
    		<div class="block_left">
    			<!-- DANH SÁCH GIÚP VIỆC ĐÁNH GIÁ CAO -->
    			<div class="block_left_content">
    				<p class="title">DANH SÁCH GIÚP VIỆC ĐÁNH GIÁ CAO</p>
    				<div class="job_list">
    					<?
						$dayms=60*60*24;
						$timenow=strtotime(date('Y-m-d'));
						 foreach ($list_employee_rate as $employee) { ?>
    						<!-- job item -->
    						<div class="job_item">
							<?$datediff=floor(($employee['update_at']-$timenow)/$dayms);
						if(abs($datediff)<3){?>
							<div class="sticker"><img src="/images/new_sticker.svg" alt="sticker"></div>
							<?}?>
    							<? if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] != 1) { ?>
    								<button class="btn_like btn_like_<?= $employee['id'] ?>" type="button" onclick="action_popup_login()">
    									<img src="/images/like_star.svg" alt="them vao yeu thich">
										<div class='btn_hover'>Lưu người giúp việc</div>
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
									<a href="<?=rewrite_employee_link($employee['alias'],$employee['id'])?>">
    									<div class="avt">
    										<? if ($employee['image']) { ?>
    											<img data-src="<?= rewirte_user_img_href($employee['id'], $employee['image']) ?>" alt="anh dai dien" src="/images/lazy_load.gif">
    										<? } else { ?>
    											<img data-src="/images/employee_ava.png" alt="anh dai dien" src="/images/lazy_load.gif">
    										<? } ?>
    									</div>
									</a>
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
    								<div class="box_right">
    									<a href="<?=rewrite_employee_link($employee['alias'],$employee['id'])?>" class="name"><?= $employee['name'] ?>
										<?if($employee['worker_point_status']==1) echo '<span class="view_status">Đã mở</span>';
										elseif($employee['worker_view_status']==1) echo '<span class="view_status">Đã xem</span>';?>
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
    											<div class="text">
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
							<li><button id="minus_rate_page"><img src="/images/prev.png" alt="nut lui trang"></button></li>
							<li><input type="number" id="current_rate_page" class="active" max="<?=$total_rate_page?>" value="<?=$rate_page?>"></li>
							<li><button id="add_rate_page"><img src="/images/pagination_next.svg" alt="nut tien"></button></li>
    						</ul>
    					</div>
    					<span class="total_page"> of <?=$total_rate_page?></span>
    				</div>
    			</div>
    			<!-- HẾT DANH SÁCH GIÚP VIỆC ĐÁNH GIÁ CAO -->
    			<!-- Danh sách giúp việc nhiều kinh nghiệm -->
    			<div class="block_left_content">
    				<p class="title">DANH SÁCH GIÚP VIỆC NHIỀU KINH NGHIỆM</p>
    				<div class="job_list">
    					<?
						 foreach ($list_employee_exp as $employee) { ?>
    						<!-- job item -->
    						<div class="job_item">
							<?$datediff=floor(($employee['update_at']-$timenow)/$dayms);
						if(abs($datediff)<3){?>
							<div class="sticker"><img src="/images/new_sticker.svg" alt="sticker"></div>
							<?}?>
							<?if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] != 1) { ?>
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
									<a href="<?=rewrite_employee_link($employee['alias'],$employee['id'])?>">
    									<div class="avt">
										<? if ($employee['image']) { ?>
    											<img data-src="<?= rewirte_user_img_href($employee['id'], $employee['image']) ?>" class="lazyload" alt="anh dai dien" src="/images/lazy_load.gif">
    										<? } else { ?>
    											<img data-src="/images/employee_ava.png" alt="anh dai dien" class="lazyload" src="/images/lazy_load.gif">
    										<? } ?>
    									</div>
									</a>
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
    								<div class="box_right">
    									<a href="<?=rewrite_employee_link($employee['alias'],$employee['id'])?>" class="name"><?= $employee['name'] ?></a>
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
    											<div class="text">
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
							<li><button id="minus_exp_page"><img src="/images/prev.png" alt="nut lui trang"></button></li>
							<li><input type="number" id="current_exp_page" class="active" max="<?=$total_exp_page?>" value="<?=$exp_page?>"></li>
							<li><button id="add_exp_page"><img src="/images/pagination_next.svg" alt="nut tien"></button></li>
    						</ul>
    					</div>
    					<span class="total_page"> of <?=$total_rate_page?></span>
    				</div>
    			</div>
    			<!-- Hết danh sách người giúp việc nhiều kinh nghiệm -->
    		</div>
    		<div class="block_right">
    			<div class="block_right_content list_province">
    				<div class="title">
    					<img src="/images/btn_search.svg" alt="icon tim
                                kiem">
    					<p>Tìm kiếm theo tỉnh thành</p>
    				</div>
    				<div class="list_item">
    					<? foreach ($list_city_worker as $city) { ?>
    						<div class="item">
    							<button type="button" onclick="window.location.href='/tim-giup-viec-tai-<?=create_slug($city['cit_name'])?>-gvt0c<?=$city['cit_id']?>d0.html'"><?= $city['cit_name'] ?> (<?= $city['count_worker'] ?>)</button>
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
    							<button type="button" onclick="window.location.href='/tim-giup-viec-tai-<?=create_slug($city['cit_name'])?>-gvt0c0d<?=$city['cit_id']?>.html'"><?= $city['cit_name'] ?> (<?= $city['count_worker'] ?>)</button>
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
    		</div>
    	</div>
    	<!-- het box job -->
    	<!-- bat dau banner 2 -->
    	<div class="banner_2">
    		<div class="title">
    			<p>TẠI SAO NÊN CHỌN THUÊ GIÚP VIỆC TẠI GIUPVIEC.TIMVIEC123.VN?
    			</p>
    		</div>
    		<div class="box_content">
    			<div class="text_box">
    				<div class="box_item">
    					<div class="title">
    						<p>Tìm kiếm giúp việc nhanh chóng</p>
    					</div>
    					<div class="content">
    						<p>Đăng tin tuyển giúp việc tức thì</p>
    						<p>Kết nối người tuyển dụng và người giúp việc với nhau</p>
    					</div>
    				</div>
    				<div class="box_item">
    					<div class="title">
    						<p>Lựa chọn ứng viên đa dạng </p>
    					</div>
    					<div class="content">
    						<p>Chọn lọc những ứng viên từ khắp cả nước</p>
    						<p>Từ những ứng viên ít kinh nghiệm cho tới giàu kinh nghiệm giúp việc</p>
    					</div>
    				</div>
    				<div class="box_item">
    					<div class="title">
    						<p>Thời gian giúp việc chủ động, linh hoạt</p>
    					</div>
    					<div class="content">
    						<p>Chủ động lựa chọn thời gian giúp việc</p>
    						<p>Linh hoạt thời gian với giúp việc theo giờ</p>
    					</div>
    				</div>
    			</div>
    			<div class="box_img">
    				<img data-src="/images/banner_2_img.png" alt="anh banner"  class="lazyload"  src="/images/lazy_load.gif">
    			</div>
    		</div>
    	</div>
    	<!-- het banner 2 -->

    	<!-- bat dau banner 3 -->
    	<div class="banner_3">
    		<div class="box_app">
    			<p class="title">Tải ứng dụng ngay</p>
    			<div class="qr">
    				<img src="/images/banner_3_qr.png" alt="ma Qr">
    			</div>
    			<div class="store">
    				<a href="#"><img data-src="/images/banner_3_appstore.png" alt="appstore"  class="lazyload"  src="/images/lazy_load.gif"></a>
    				<a href="#"><img data-src="/images/banner_3_googleplay.png" alt="google play"  class="lazyload"  src="/images/lazy_load.gif"></a>
    			</div>
    		</div>
    		<div class="box_text">
    			<div class="title">
    				<p>TÌM NGƯỜI GIÚP VIỆC TẠI NHÀ DỄ DÀNG, TIỆN LỢI</p>
    			</div>
    			<div class="content">
    				<p>Chăm sóc cha mẹ, con trẻ, việc nhà không còn là nỗi lo
    				</p>
    			</div>
    		</div>
    	</div>
    	<!-- het banner 3 -->
    	<!-- <div class="box_blog">
    		<div class="title">
    			<p>CẨM NANG GIÚP VIỆC</p>
    		</div>
    		<div class="box_content">
    			<div class="box_left">
    				<div class="img">
    					<img src="/images/box_blog_img_1.png" alt="anh xem
                                truoc">
    				</div>
    				<div class="text">
    					<p class="title">Giúp việc thời đại 4.0</p>
    					<p class="author">Tác giả: Hà Linh</p>
    					<div class="time">
    						<span class="icon">
    							<img src="/images/clock.svg" alt="icon dong
                                        ho">
    						</span>
    						<span>
    							Thứ 2, 14 - 5 - 2022, 08 : 16
    						</span>
    					</div>
    					<div class="content">
    						<p>
    							Giúp việc gia đình đang bước vào thời đại số hóa với lượng cầu lớn hơn cung gấp nhiều lần. Theo con số thống kê của Bộ Lao động Thương binh và Xã hội, đến năm 2025 sẽ cần đến 550.000 lao động .
    						</p>
							<div class="view">
    						<a href="#"><span>Đọc thêm</span><span><img src="/images/double_arrow_right_org.svg" alt="mui ten"></span></a>
    					</div>
    					</div>
    				</div>
    			</div>
    			<div class="box_right">
    				<div class="box_right_item">
    					<div class="img">
    						<img src="/images/box_blog_img_2.png" alt="anh
                                    xem truoc">
    					</div>
    					<div class="text">
    						<p class="title">Giúp việc thời đại 4.0</p>
    						<p class="author">Tác giả: Hà Linh</p>

    						<div class="content">
    							<p>
    								Giúp việc gia đình đang bước vào thời đại số hóa với lượng cầu lớn hơn cung gấp nhiều lần. Theo con số thống kê của Bộ Lao động Thương binh và Xã hội, đến năm 2025 sẽ cần đến 550.000 lao động .
    							</p>
								<div class="view">
    							<a href="#"><span>Đọc thêm</span><span><img src="/images/double_arrow_right_org.svg" alt="mui ten"></span></a>
    						</div>
    						</div>
    						
    					</div>
    				</div>
    				<div class="box_right_item">
    					<div class="img">
    						<img src="/images/box_blog_img_3.png" alt="anh
                                    xem truoc">
    					</div>
    					<div class="text">
    						<p class="title">Giúp việc thời đại 4.0</p>
    						<p class="author">Tác giả: Hà Linh</p>
    						<div class="content">
    							<p>
    								Giúp việc gia đình đang bước vào thời đại số hóa với lượng cầu lớn hơn cung gấp nhiều lần. Theo con số thống kê của Bộ Lao động Thương binh và Xã hội, đến năm 2025 sẽ cần đến 550.000 lao động .
    							</p>
								<div class="view">
    							<a href="#"><span>Đọc thêm</span><span><img src="/images/double_arrow_right_org.svg" alt="mui ten"></span></a>
    						</div>
    						</div>
    						
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="box_link">
    			<a href="#">
    				<span>Xem thêm</span>
    				<span><img src="/images/double_arrow_right_blue.svg" alt="mui ten"></span>
    			</a>
    		</div>
    	</div> -->
    </div>
    <!-- Ket thuc noi dung -->
