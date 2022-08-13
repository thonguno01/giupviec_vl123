<!-- Bat dau noi dung -->
    <div id="wrap-content">
            <div class="bar_address">
                <span class="trang_chu "><a href="/">Trang chủ </a></span>
                <span><img src="/images/job_list/arrow-right.svg " alt="mui ten "></span>
                <span><a href="/tim-viec-lam-giup-viec-vlt0c0d0.html">Việc làm giúp việc</a></span>
                <span><img src="/images/job_list/arrow-right.svg " alt="mui ten "></span>
                <span class=" "><a class="active " href=" "><?=$new['title']?></a></span>
            </div>
        <div id="wr-content">
            <div class="box-1  ">
			<? if (!isset($_SESSION['user'])) { ?>
    								<button class="star_hot btn_like_<?= $new['new_id'] ?>" type="button" onclick="action_popup_login()">
    									<img src="/images/like_star.svg" alt="them vao yeu thich">
    								</button>
    								<? } else {
									if ($_SESSION['user']['user_type'] == 0) {
										if (!in_array($new['new_id'], $list_new_save)) { ?>
    										<button class="star_hot btn_like_<?= $new['new_id'] ?>" type="button" onclick="action_save(<?= $new['new_id'] ?>)">
    											<img src="/images/like_star.svg" alt="them vao yeu thich">
    										</button>
    									<? } else { ?>
    										<button class="star_hot liked btn_like_<?= $new['new_id'] ?>" type="button" onclick="action_save(<?= $new['new_id'] ?>)">
    											<img src="/images/like_star_full.svg" alt="them vao yeu thich">
    										</button>
    							<? }
									}
								} ?>
                <div class="image ">
					<a href="<?=rewrite_company_link($new['company_alias'],$new['company_id'])?>">
                    <div class="border_radius ">
					<?if($new['image']){?>
									<img src="<?=rewirte_company_img_href($new['company_id'], $new['image'])?>" alt="anh dai dien" src="/images/job_list/LogoVieclam123.png">
								<?} else{?>
								<img src="/images/job_list/LogoVieclam123.png" alt="Vieclam123.vn" class="img-thumb">
								<?}?>
                    </div>
					</a>
                    <p class="text-center ">ID: <?=$new['new_id']?></p>
                </div>
                <div class="info ">
					<div class="information flex justify-center" id="share_option" style="display: none;">
    					<a href="https://www.facebook.com/sharer/sharer.php?u=<?= isset($canonical) ? $canonical : ""?>" rel="nofollow"> <img src="/images/helper_detail/face.svg" alt="facebook"></a>
    					<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= isset($canonical) ? $canonical : ""?>" rel="nofollow"><img src="/images/helper_detail/in.svg" alt="linkedin"> </a>
    					<a href="http://www.twitter.com/share?url=<?= isset($canonical) ? $canonical : ""?>" rel="nofollow"> <img src="/images/helper_detail/twitter.svg" alt="twitter"></a>
    				</div>
    				<button class="option" id="share">
    					<img src="/images/helper_detail/menu.svg" alt="Option">
    				</button>
                    <div class="name_jd "><?=$new['title']?></div>
                    <div class="job grid-2 ">
                        <img src="/images/recruit_detail/job.svg " alt=" Công việc nhận làm: ">
                        <!-- <p>Công việc nhận làm:</p> -->
                        <div class="wrap-job ">
                            <span class="name_job ">Loại hình dịch vụ:</span>
                            <span class="job_detail ">
                            <!-- <span class=" "> -->
                            <span><?=$new['job_style']?></span>

                            </span>
                        </div>
                    </div>
                    <div class="date grid-2 ">
                        <img src="/images/recruit_detail/age.svg " alt="Nơi làm việc Hà nội ">
                        <p>Tuổi: <span><?=$new['age_from']?>-<?=$new['age_to']?></span></p>
                    </div>
                    <div class="money grid-2 ">
                        <img src="/images/recruit_detail/money.svg " alt="Tiền lương ">
                        <div class="from_to ">
                            <p>Mức lương:
                                <span class="text-danger "><? if ($new['salary_type'] == 0) echo number_format($new['salary1'], 0, '', '.') . ' vnđ';
																		else echo (number_format($new['salary1'], 0, '', '.') . ' - ' . number_format($new['salary2'], 0, '', '.') . ' vnđ');
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
                            </p>
                        </div>
                    </div>
                    <div class="exp_info grid-2 ">
                        <img src="/images/recruit_detail/exp.svg " alt="Kinh nghiêm ">
                        <p>Kinh nghiệm: <span><? switch ($new['exp']) {
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
														} ?></span></p>
                    </div>
                    <div class="teacher grid-2 ">
                        <img src="/images/recruit_detail/teacher.svg" alt="Trình độ học vấn ">
                        <p>Trình độ học vấn: <span><? switch ($new['edu']) {
															case '0':
																echo 'Không bằng cấp';
																break;
															case '1':
																echo 'THCS';
																break;
															case '2':
																echo 'THPT';
																break;
															case '3':
																echo 'Cao đẳng';
																break;
															case '4':
																echo 'Đại học';
																break;
															default:
																break;
														} ?></span></p>
                    </div>

                    <div class="location grid-2 ">
						<?if($new['work_type_id']==2){?>
                        <img src="/images/recruit_detail/location.svg" alt="Không chung chủ  ">
						<?} else{?>
							<img src="/images/job_location_icon.svg" alt="Không chung chủ  ">
							<?}?>
                        <p><?=$new['work_name']?></p>
                    </div>

                    <div class="address grid-2 ">
                        <img src="/images/recruit_detail/address.svg " alt="Nơi làm việc Hà nội ">
                        <p>Nơi làm việc: <span><?=$new['full_address']?></span></p>
                    </div>
                    <div class="day_started grid-2 ">
                        <img src="/images/recruit_detail/day_started.svg " alt="Ngày bắt đầu làm việc  ">
                        <p>Ngày bắt đầu: <span><?=date('d/m/Y',$new['start_time'])?></span></p>
                    </div>
                    <div class="day_ended grid-2 ">
                        <img src="/images/recruit_detail/security-time.svg " alt="Ngày bắt đầu làm việc  ">
                        <p>Thời hạn nhận việc:<span> <?=date('d/m/Y',$new['close_time'])?> </span></p>
                    </div>

                </div>
                <div class="done">
								<button class="wrap_ung_tuyen <?if($new['apply_status']==0) echo 'ung-tuyen'; else echo 'da-ung-tuyen'?> flex " 
								onclick="<?if(!isset($_SESSION['user'])|| $_SESSION['user']['user_type']!=0){
									echo 'action_popup_login()';
								}
								else{
									if($new['apply_status']==0){
										echo 'action_apply('.$new['new_id'].')';
									}
								}
								?>">
								<?if($new['apply_status']==0){?>
								<img src="/images/recruit_detail/ung_tuyen.svg" alt="ứng tuyển"><span>Ứng tuyển </span>
								<?} else{?>
									<img src="/images/recruit_detail/tich_chon.svg" alt="ứng tuyển"><span>Đã ứng tuyển </span>
									<?}?>
								</button>
							</div>


            </div>
            <div class="box-2 ">

                <div class="calendar ">
                    <img class="calendar-1 " src="/images/recruit_detail/calendar.svg " alt="lịch làm việc ">
                    <p class="title calendar-2 ">Lịch làm việc </p>
                    <div class="calendar-3">
    					<div class="work_day">
    						<div class="day flex justyfy-between">
    							<? if ($new['t2_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T2</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $new['t2_ca1_bd'] ?> - <?= $new['t2_ca1_kt'] ?></p>
    									<? if ($new['t2_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $new['t2_ca2_bd'] ?> - <?= $new['t2_ca2_kt'] ?></p>
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
    									<p>Ngày nghỉ</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($new['t3_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T3</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $new['t3_ca1_bd'] ?> - <?= $new['t3_ca1_kt'] ?></p>
    									<? if ($new['t3_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $new['t3_ca2_bd'] ?> - <?= $new['t3_ca2_kt'] ?></p>
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
    									<p>Ngày nghỉ</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>

    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($new['t4_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T4</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $new['t4_ca1_bd'] ?> - <?= $new['t4_ca1_kt'] ?></p>
    									<? if ($new['t4_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $new['t4_ca2_bd'] ?> - <?= $new['t4_ca2_kt'] ?></p>
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
    									<p>Ngày nghỉ</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($new['t5_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T5</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $new['t5_ca1_bd'] ?> - <?= $new['t5_ca1_kt'] ?></p>
    									<? if ($new['t5_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $new['t5_ca2_bd'] ?> - <?= $new['t5_ca2_kt'] ?></p>
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
    									<p>Ngày nghỉ</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($new['t6_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T6</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $new['t6_ca1_bd'] ?> - <?= $new['t6_ca1_kt'] ?></p>
    									<? if ($new['t6_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $new['t6_ca2_bd'] ?> - <?= $new['t6_ca2_kt'] ?></p>
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
    									<p>Ngày nghỉ</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($new['t7_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">T7</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $new['t7_ca1_bd'] ?> - <?= $new['t7_ca1_kt'] ?></p>
    									<? if ($new['t7_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $new['t7_ca2_bd'] ?> - <?= $new['t7_ca2_kt'] ?></p>
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
    									<p>Ngày nghỉ</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    					<div class="work_day">
    						<div class="day flex justyfy-between">

    							<? if ($new['t8_ca1_bd']) { ?>
    								<div class="grid-2">
    									<img src="/images/helper_detail/select.svg" class="chose" alt="tích chọn">
    									<div class="radius active ">
    										<span class="">CN</span>
    									</div>
    								</div>
    								<div class="time_work flex justyfy-between">
    									<p><?= $new['t8_ca1_bd'] ?> - <?= $new['t8_ca1_kt'] ?></p>
    									<? if ($new['t8_ca2_bd']) { ?>
    										<p class="pl-2"> / </p>
    										<p class="pl-2"><?= $new['t8_ca2_bd'] ?> - <?= $new['t8_ca2_kt'] ?></p>
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
    									<p>Ngày nghỉ</p>
    								</div>
    							<? } ?>
    						</div>
    					</div>
    				</div>
                </div>
                <div class="mo_ta_cong_viec ">
                    <img class="mo_ta_cong_viec-1 " src="/images/recruit_detail/book.svg " alt="Mô tả công việc">
                    <p class="title mo_ta_cong_viec-2 ">Mô tả công việc </p>
                    <p class="mo_ta_cong_viec-3 "><?=$new['description']?></p>

                </div>
                <div class="yeu_cau_cong_viec ">
                    <img class="yeu_cau_cong_viec-1 " src="/images/recruit_detail/tag-user.svg " alt="Yêu cầu công việc">
                    <p class="title yeu_cau_cong_viec-2 ">Yêu cầu công việc </p>
                    <p class="yeu_cau_cong_viec-3 "><?=$new['request']?></p>

                </div>
                <div class="quyen_loi ">
                    <img class="quyen_loi-1 " src="/images/recruit_detail/ticket-star.svg " alt="Quyền lợi">
                    <p class="title quyen_loi-2 ">Quyền lợi </p>
                    <p class="quyen_loi-3 "><?=$new['interest']?></p>

                </div>
                <div class="ung-tuyen flex ">
                    <div>
							<div class="done">
								<button class="wrap_ung_tuyen <?if($new['apply_status']==0) echo 'ung-tuyen'; else echo 'da-ung-tuyen'?> flex " 
								onclick="<?if(!isset($_SESSION['user'])|| $_SESSION['user']['user_type']!=0){
									echo 'action_popup_login()';
								}
								else{
									if($new['apply_status']==0){
										echo 'action_apply('.$new['new_id'].')';
									}
								}
								?>">
								<?if($new['apply_status']==0){?>
								<img src="/images/recruit_detail/ung_tuyen.svg" alt="ứng tuyển"><span>Ứng tuyển </span>
								<?} else{?>
									<img src="/images/recruit_detail/tich_chon.svg" alt="ứng tuyển"><span>Đã ứng tuyển </span>
									<?}?>
								</button>
							</div>
                    </div>
                </div>
                <!-- </div> -->

            </div>
            <!-- kết thúc box left -->
            <!-- siderbar -->
            <!-- <div class="siderbar_right ">
            </div> -->
            <div id="box-3">
                <p class="contact-title ">
                    Thông tin liên hệ
                </p>
                <div class="contact ">
                    <div class="recruit flex ">
                        <img src="/images/recruit_detail/user.svg" alt="Người tuyển dụng  ">
                        <p class="recruiter ">Người tuyển dụng:</p>
                        <p class="name_recruiter "><?=$new['company_name']?></p>
                    </div>
                    <div class="mail flex ">
                        <img src="/images/recruit_detail/mail.svg " alt="Email ">
                        <p class="email ">Email:</p>
                        <p class="name_email ">Thông tin đang bị ẩn</p>
                    </div>
                    <div class="phone flex ">
                        <img src="/images/recruit_detail/phone.svg " alt="Số điện thoại ">
                        <p class="sdt ">SĐT:</p>
                        <p class="number_phone ">Thông tin đang bị ẩn</p>
                    </div>
                </div>
                <button name="see_detail" class="see_detail"
				onclick="<?if(!isset($_SESSION['user']) || $_SESSION['user']['user_type']!=0) echo 'action_popup_login()';
				else echo 'view_contact('.$new['company_id'].')';?>">Xem chi tiết</button>


            </div>
            <div id="box-4" class="keywords ">
                <div class="siderbar-search flex ">
                    <img src="/images/job_list/keywords.svg " alt="Tìm kiếm ">
                    <!-- <input type="text " placeholder="Tìm kiếm theo tỉnh thành " name="search "> -->
                    <span>Từ khóa phổ biến </span>
                </div>
                <div class="filter ">
                    <div class="list-item-keywords ">
                        <button>Tìm giúp việc tại hà nội</button>
                    </div>
                    <div class="list-item-keywords ">
                        <button>Tìm giúp việc giá rẻ</button>
                    </div>
                    <div class="list-item-keywords ">
                        <button>Tìm giúp việc  tại thanh xuân</button>
                    </div>
                    <div class="list-item-keywords ">
                        <button>Tìm giúp việc uy tín</button>
                    </div>
                    <div class="list-item-keywords ">
                        <button>Tìm giúp việc chăm sóc người bệnh</button>
                    </div>
                    <div class="list-item-keywords ">
                        <button>Tìm giúp việc 5 triệu tại hà nội</button>
                    </div>

                </div>
            </div>
            <!-- kết  thúc sidebar -->

        </div>
        <div class="person_potential ">
            <div class="person_potential_parent ">
                <p class="title ">VIỆC LÀM TƯƠNG TỰ</p>

                <div class="person_potential_parent_child slick_slider_recruit ">

                    <?foreach($list_same_job as $new){?>
                    <div class="wrap_person_potential_box ">
                        <div class="block">
                            <div class="flex ">
                                <div class="img_star">
								<? if (!isset($_SESSION['user'])) { ?>
    								<button class=" btn_like_<?= $new['new_id'] ?>" type="button" onclick="action_popup_login()">
    									<img src="/images/like_star.svg" alt="them vao yeu thich">
    								</button>
    								<? } else {
									if ($_SESSION['user']['user_type'] == 0) {
										if (!in_array($new['new_id'], $list_new_save)) { ?>
    										<button class=" btn_like_<?= $new['new_id'] ?>" type="button" onclick="action_save(<?= $new['new_id'] ?>)">
    											<img src="/images/like_star.svg" alt="them vao yeu thich">
    										</button>
    									<? } else { ?>
    										<button class=" liked btn_like_<?= $new['new_id'] ?>" type="button" onclick="action_save(<?= $new['new_id'] ?>)">
    											<img src="/images/like_star_full.svg" alt="them vao yeu thich">
    										</button>
    							<? }
									}
								} ?>
                                </div>

                                <div class="person_potential_child_image ">
									<a href="<?=rewrite_company_link($new['company_alias'],$new['company_id'])?>">
                                    <div class="round ">
									<?if($new['image']){?>
									<img class="lazyload" src="/images/lazy_load.gif" data-src="<?= rewirte_company_img_href($new['company_id'], $new['image']) ?>" alt="anh dai dien">
								<?} else{?>
								<img src="/images/job_list/LogoVieclam123.png" alt="Vieclam123.vn" class="img-thumb">
								<?}?>
                                    </div>
									</a>
                                </div>
                                <div class="info_detail ">
                                    <span class="name "><a href="<?=rewrite_new_detail_link($new['new_alias'],$new['new_id'])?>"><?=$new['title']?></a> </span>
                                    <div class="address flex ">
                                        <div class="img_add">

                                            <img src="/images/recruit_detail/address.svg " alt="Địa điểm ">
                                        </div>
                                        <span><?=$new['full_address']?></span>
                                    </div>
                                    <div class="money flex ">
                                        <div class="img_money">

                                            <img src="/images/recruit_detail/money.svg " alt="Tiền lương ">
                                        </div>
                                        <div class="from_to ">
                                            <span class="text-danger "><? if ($new['salary_type'] == 0) echo number_format($new['salary1'], 0, '', '.') . 'vnđ';
																		else echo (number_format($new['salary1'], 0, '', '.') . ' - ' . number_format($new['salary2'], 0, '', '.') . 'vnđ');
																		switch ($new['salary_time']) {
																			case '1':
																				echo ' /Tháng';
																				break;
																			case '2':
																				echo ' /Tuần';
																				break;
																			case '3':
																				echo ' /Giờ';
																				break;
																			default:
																				break;
																		}
																		?></span>
                                        </div>
                                    </div>
                                    <div class="exp flex">
                                        <div class="img_exp">

                                            <img src="/images/recruit_detail/exp.svg " alt="Tiền lương ">
                                        </div>
                                        <span>Kinh nghiệm  <strong class=" "><? switch ($new['exp']) {
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
														} ?></strong> </span>
                                    </div>
                                    <div class="job_gt flex ">
                                        <div class="img_job_gt">

                                            <img src="/images/recruit_detail/job.svg" alt="Giúp việc ">
                                        </div>
                                        <span><?=$new['job_style']?></span>

                                    </div>
                                </div>

                            </div>
                            <p class="see_detail_person_potential ">
                                <a href="<?=rewrite_new_detail_link($new['new_alias'],$new['new_id'])?>">Xem chi tiết >></a>
                            </p>

                        </div>
                    </div>
						<?}?>



                </div>
            </div>
        </div>
    </div>

    <!-- Ket thuc noi dung -->
