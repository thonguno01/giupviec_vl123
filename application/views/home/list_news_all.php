

    <!-- Bat dau noi dung -->
    <div id="wrap-content">
        <div class="main_content">
            <div class="bar_address ">
                <span class="trang_chu"><a href="/">Trang chủ </a></span>
                <span><img src="/images/job_list/arrow-right.svg" alt="mui ten"></span>
                <span class="slug_none_1"><a class="active"><?=$page_title?></a></span>
            </div>

        </div>
        <div id="wr-content">
            <div class="box-left">
                <div class="content"> 
				<div class="open_filter">
                    <button type="button" id="open_filter"><img src="/images/sort.svg" alt="sap xep"><span>Bộ lọc</span></button>
                </div>
				
                    <p class="title"><?=$page_title?></p>
					<div class="job_list">
						<?
						$dayms=60*60*24;
						$timenow=strtotime(date('Y-m-d'));
						foreach($list_news as $new){?>
                    <div class="item_parent">
					<?$datediff=floor(($new['update_at']-$timenow)/$dayms);
						if(abs($datediff)<3){?>
						<div class="new_job">
                            <img src="/images/job_list/New.svg" alt="LogoVieclam123">
                        </div>
						<?}?>
						<? if (!isset($_SESSION['user'])||$_SESSION['user']['user_type']!=0) { ?>
    								<button class="star_prominent btn_like_<?= $new['new_id'] ?>" type="button" onclick="action_popup_login()">
    									<img src="/images/like_star.svg" alt="them vao yeu thich">
    								</button>
    								<? } else {
									if ($_SESSION['user']['user_type'] == 0) {
										if (!in_array($new['new_id'], $list_new_save)) { ?>
    										<button class="star_prominent btn_like_<?= $new['new_id'] ?>" type="button" onclick="action_save(<?= $new['new_id'] ?>)">
    											<img src="/images/like_star.svg" alt="them vao yeu thich">
    										</button>
    									<? } else { ?>
    										<button class="star_prominent liked btn_like_<?= $new['new_id'] ?>" type="button" onclick="action_save(<?= $new['new_id'] ?>)">
    											<img src="/images/like_star_full.svg" alt="them vao yeu thich">
    										</button>
    							<? }
									}
								} ?>
                        <!-- <button class="star_prominent">
                            <img src="/images/job_list/starPNG.svg" alt="nut thich">
                        </button> -->
                        <div class="info flex">
                            <div class="image">
								<a href="<?=rewrite_company_link($new['company_alias'],$new['company_id'])?>">
                                <div class="border_radius">
								<?if($new['image']){?>
									<img src="<?= rewirte_company_img_href($new['company_id'], $new['image']) ?>" alt="anh dai dien">
								<?} else{?>
								<img src="/images/job_list/LogoVieclam123.png" alt="Vieclam123.vn">
								<?}?>  
                                </div>
								</a>
                            </div>
                            <div class="info_detail">
                                <p class="info_title">
                                    <a href="<?=rewrite_new_detail_link($new['new_alias'],$new['new_id'])?>"><?=$new['title']?></a>
                                </p>

                                <div class="item-child flex">
                                    <div class="item-child-1 flex address">
                                        <span class="icon icon_location"><img src="/images/job_list/address.svg" alt="Địa chỉ"></span>
                                        <span class="span_add"><?=$new['cit_name']?></span>
                                    </div>
                                </div>

                                <div class="item-child flex">
                                    <div class="item-child-1 flex job">
                                        <span class="icon icon_job_style"><img src="/images/job_list/job.svg" alt="Công việc"></span>
                                        <span class="span_job"><?=$new['job_style']?></span>
                                    </div>
                                    <div class="item-child-2 money">
                                        <span class="icon icon_salary"><img src="/images/job_list/money.svg" alt="Lương"></span>
                                        <span class="span_money"><? if ($new['salary_type'] == 0) echo number_format($new['salary1'], 0, '', '.') . 'vnđ';
																		else echo (number_format($new['salary1'], 0, '', '.') . ' - ' . number_format($new['salary2'], 0, '', '.') . 'vnđ');
																		switch ($new['salary_time']) {
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
                                    </div>
                                </div>
                                <div class="item-child flex">
                                    <div class=" item-child-1 flex exp">
                                        <span class="icon icon_exp"><img src="/images/job_list/exp.svg" alt="Kinh nghiệm"></span>
                                        <span class="span_exp">Kinh nghiệm: <strong><? switch ($new['exp']) {
															case '0':
																echo 'Không yêu cầu';
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
														} ?></strong></span>
                                    </div>
                                    <div class="age">
                                        <span class="icon icon_birthday"><img src="/images/job_list/age.svg" alt="Độ tuổi"></span>
                                        <span class="span_age"><strong><?=$new['age_from']?> - <?=$new['age_to']?> </strong>tuổi</span>
                                    </div>
                                </div>
                                <div class="item-child flex">
                                    <div class="item-child-1 flex star">
                                        <span class="icon icon_job_location"><img src="/images/job_list/start.svg" alt="Địa chỉ làm việc"></span>
                                        <span class="span_star"><?= $new['work_name'] ?></span>
                                    </div>

                                </div>
                                <div class="calendar flex">
                                    <div class="radius <?if ($new['t2_ca1_bd']) echo 'active'; else echo 'non_active'?> ">
                                        <span class="">T2</span>
                                    </div>
                                    <div class="radius <?if ($new['t3_ca1_bd']) echo 'active'; else echo 'non_active'?>">
                                        <span class="">T3</span>
                                    </div>
                                    <div class="radius <?if ($new['t4_ca1_bd']) echo 'active'; else echo 'non_active'?>">
                                        <span class="">T4</span>
                                    </div>
                                    <div class="radius <?if ($new['t5_ca1_bd']) echo 'active'; else echo 'non_active'?>">
                                        <span class="">T5</span>
                                    </div>
                                    <div class="radius <?if ($new['t6_ca1_bd']) echo 'active'; else echo 'non_active'?>">
                                        <span class="">T6</span>
                                    </div>
                                    <div class="radius <?if ($new['t7_ca1_bd']) echo 'active'; else echo 'non_active'?>">
                                        <span class="">T7</span>
                                    </div>
                                    <div class="radius <?if ($new['t8_ca1_bd']) echo 'active'; else echo 'non_active'?>">
                                        <span class="">CN</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <p><?=$new['description']?></p>
                        </div>
                    </div>
					<?}?>
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
            <div class="siderbar_right block_right">
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
								</div>
							</div>
						</div>
						<div class="item" id="filter_province">
							<button type="button" id="dropdown_province"><span>Tỉnh/Thành phố</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_province" style="display: none;"><button type="button" id="reset_province"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_province_content"></span></div>
							<div class="box_menu" id="menu_province" style="display: none;">
								<input type="text" autocomplete="off" id="inp_filter_province">
                        </div>
							</div>
						<div class="item" id="filter_district">
							<button type="button" id="dropdown_district"><span>Quận/Huyện</span><span><img src="/images/arrow_down.svg" alt="drop down"></span></button>
							<div class="selected" id="selected_district" style="display: none;"><button type="button" id="reset_district"><img src="/images/close_icon.svg" alt="xoa"></button><span id="selected_district_content"></span></div>
							<div class="box_menu" id="menu_district" style="display: none;">
								<input type="text" autocomplete="off" id="inp_filter_district">
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
                <div id="wr-sidebar-search" class="town">
                    <div class="siderbar-search ">
                        <img src="/images//job_list/search.svg" alt="Tìm kiếm ">
                        <span>Tìm kiếm theo tỉnh thành </span>
                    </div>
                    <div class="list_item ">
						<?foreach($list_city_job as $city){?>
							<div class="list-item-search">
                            	<button  onclick="window.location.href='/tim-viec-lam-tai-<?=create_slug($city['cit_name'])?>-vlt0c<?=$city['cit_id']?>d0.html'"><?=$city['cit_name']?> (<?=$city['count_job']?>)</button>
                        	</div>
							<?}?>
                    </div>
                </div>
                <div id="wr-sidebar-search" class="distric">
                    <div class="siderbar-search ">
                        <img src="/images//job_list/search.svg" alt="Tìm kiếm ">
                        <span>Tìm kiếm theo quận / huyện</span>
                    </div>
                    <div class="list_item ">
					<?foreach($list_district_job as $district){?>
						<div class="list-item-search">
                            <button  onclick="window.location.href='/tim-viec-lam-tai-<?=create_slug($district['cit_name'])?>-vlt0c0d<?=$district['cit_id']?>.html'"><?=$district['cit_name']?> (<?=$district['count_job']?>)</button>
                        </div>
							<?}?>
                    </div>
                </div>
                

            </div>
        </div>


        <!-- Các địa điểm hot  -->
        <div id="address_hot">
            <p class="title">CÁC ĐỊA ĐIỂM CÓ NHU CẦU TÌM GIÚP VIỆC HOT NHẤT</p>
            <div class="box flex justyfy-between">
                <div class="box-item">
				<a href="/tim-viec-lam-tai-ha-noi-vlt0c1d0.html">
                    <img src="/images/post_HN.png" alt="Giúp việc tại Hà Nội">
                    <p class="box_title">Giúp việc tại Hà Nội</p>
                    <p class="box_detail">Hà Nội là thủ đô, thành phố trực thuộc trung ương, dân cư đông đúc, chủ yếu là công nhân viên chức nên nhu cầu tìm người giúp việc vô cùng lớn.</p>
				</a>
				</div>
                <div class="box-item">
				<a href="/tim-viec-lam-tai-da-nang-vlt0c26d0.html">
                    <img src="/images/post_DN.png" alt="Giúp việc tại Hà Nội">
                    <p class="box_title">Giúp việc tại Đà Nẵng</p>
                    <p class="box_detail">Đà Nẵng là thành phố du lịch trọng điểm của cả nước, nguồn lợi việc làm, nhu cầu nhân lực rất lớn.</p>
				</a>
				</div>
                <div class="box-item">
				<a href="/tim-viec-lam-tai-ho-chi-minh-vlt0c45d0.html">
                    <img src="/images/post_HCM.png" alt="Giúp việc tại Hà Nội">
                    <p class="box_title">Giúp việc tại Hồ Chí Minh</p>
                    <p class="box_detail">Hồ Chí Minh là trung tâm kinh tế lớn thứ 2 cả nước, với mật độ dân số đông đúc, nơi đây cũng là một trong những điểm nóng có nhu cầu tìm giúp việc vô cùng lớn. </p>
				</a>
				</div>
                <div class="box-item">
					<a href="/tim-viec-lam-tai-can-tho-vlt0c48d0.html">
                    <img src="/images/post_CT.png" alt="Giúp việc tại Hà Nội">
                    <p class="box_title">Giúp việc tại Cần Thơ</p>
                    <p class="box_detail">Hồ Chí Minh là trung tâm kinh tế lớn thứ 2 cả nước, với mật độ dân số đông đúc, nơi đây cũng là một trong những điểm nóng có nhu cầu tìm việc làm cao. </p>
					</a>
				</div>
            </div>
        </div>
        <!-- bài viết chi tiết  -->
		<?if($post['content']){?>
        <div class="flex justyfy-between post">
            <div class="box-left">
                <div class="content_detail">
                    <div class="pad">
                        <?=makeML_content($post['content'])?>
                    </div>
                </div>
            </div>
            <div class="siderbar_muc_luc">
                <div id="table_of_content">
                    <div class="table_of_content_title ">
                        <span>Mục lục</span>
                    </div>
                    <div class="container">
                        <?=makeML($post['content'])?>
                    </div>
                </div>
            </div>
        </div>
		<?}?>
    </div>
    <!-- Ket thuc noi dung -->
