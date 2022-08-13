<!-- Bat dau noi dung -->
    <div id="wrap-content">
        <div class="main_content">
            <div class="bar_address flex ">
                <span class="trang_chu "><a href="/">Trang chủ </a></span>
                <span><img src="/images/job_list/arrow-right.svg " alt="mui ten "></span>
                <span class=" "><a class="active " href=" "><?=$company['name']?></a></span>
            </div>
        </div>
        <div id="wr-content">
            <div class="box-1  ">
                <div class="information flex justify-center" id="share_option">
    					<a href="https://www.facebook.com/sharer/sharer.php?u=<?= isset($canonical) ? $canonical : ""?>" rel="nofollow"> <img src="/images/helper_detail/face.svg" alt="facebook"></a>
    					<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= isset($canonical) ? $canonical : ""?>" rel="nofollow"><img src="/images/helper_detail/in.svg" alt="linkedin"> </a>
    					<a href="http://www.twitter.com/share?url=<?= isset($canonical) ? $canonical : ""?>" rel="nofollow"> <img src="/images/helper_detail/twitter.svg" alt="twitter"></a>
    				</div>
                <button class="option " id="share">
                    <img src="/images/recruit_detail/menu.svg "  alt="Option ">
                </button>

                <div class="image">
                    <div class="border_radius ">
					<?if($company['image']){?>
									<img src="<?= rewirte_company_img_href($company['id'], $company['image']) ?>" alt="anh dai dien">
								<?} else{?>
								<img src="/images/job_list/LogoVieclam123.png" alt="Vieclam123.vn" class="img-thumb">
								<?}?>  
                    </div>
                </div>
                <div class="info ">


                    <p class="name "><?=$company['name']?></p>

                    <div class="address ">
                        <img src="/images/recruit_detail/address.svg " alt="Nơi làm việc Hà nội ">
                        <p><span>Địa chỉ:</span><span> <?=$company['full_address']?></span></p>
                    </div>
                    <div class="email ">
                        <img src="/images/recruit_detail/mail.svg " alt="Ngày bắt đầu làm việc  ">
                        <p><span>Email: </span><span class="detail">
							<?if(isset($_SESSION['user'])&&$_SESSION['user']['id']==$company['id'] && $_SESSION['user']['user_type']==1) echo $company['email']; 
							else{
								if(!isset($_SESSION['user']) || $_SESSION['user']['user_type']!=0){?>
								<button onclick="action_popup_login()" class="view_detail">Click để xem thông tin</button>
								<?} else{?>
									<button onclick="get_email(<?=$company['id']?>)" class="view_detail">Click để xem thông tin</button>
								<?}}?>
						</span></p>
                    </div>
                    <div class="phone ">
                        <img src="/images/recruit_detail/phone.svg " alt="Ngày bắt đầu làm việc  ">
                        <p><span>SĐT: </span><span class="detail">
						<?if(isset($_SESSION['user'])&&$_SESSION['user']['id']==$company['id'] && $_SESSION['user']['user_type']==1) echo $company['phone']; 
							else{
								if(!isset($_SESSION['user']) || $_SESSION['user']['user_type']!=0){?>
								<button onclick="action_popup_login()" class="view_detail">Click để xem thông tin</button>
								<?} else{?>
									<button onclick="get_phone(<?=$company['id']?>)" class="view_detail">Click để xem thông tin</button>
								<?}}?>
						</span></p>
                    </div>
                </div>
                <div class="overview">
                    <div class="tin_tuyen_dung">
                        <span class="top"><?=$company['count_new']?></span>
                        <span class="buttom">Tin tuyển dụng</span>
                    </div>
                    <div class="luot_xem">
                        <span class="top"><?=$company['view_count']?></span>
                        <span class="buttom">Lượt truy cập</span>
                    </div>
                </div>
            </div>
            <div id="box-2">
                <div class="box-left">
                    <div class="box-2">
                        <div class="content">
                            <p class="title">VIỆC LÀM CÙNG NHÀ TUYỂN DỤNG</p>


                            <?
							$dayms=60*60*24;
							$timenow=strtotime(date('Y-m-d'));
							foreach($list_new as $new){?>
                    <div class="item_parent">
						<?$datediff=floor(($new['update_at']-$timenow)/$dayms);
						if(abs($datediff)<3){?>
						<div class="new_job">
                            <img src="/images/job_list/New.svg" alt="LogoVieclam123">
                        </div>
						<?}?>
						<? if (!isset($_SESSION['user'])) { ?>
    								<button class="star_prominent btn_like_<?= $new['id'] ?>" type="button" onclick="action_popup_login()">
    									<img src="/images/like_star.svg" alt="them vao yeu thich">
    								</button>
    								<? } else {
									if ($_SESSION['user']['user_type'] == 0) {
										if (!in_array($new['id'], $list_new_save)) { ?>
    										<button class="star_prominent btn_like_<?= $new['id'] ?>" type="button" onclick="action_save(<?= $new['id'] ?>)">
    											<img src="/images/like_star.svg" alt="them vao yeu thich">
    										</button>
    									<? } else { ?>
    										<button class="star_prominent liked btn_like_<?= $new['id'] ?>" type="button" onclick="action_save(<?= $new['id'] ?>)">
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
                                <div class="border_radius">
								<?if($new['image']){?>
									<img src="<?= rewirte_company_img_href($new['company_id'], $new['image']) ?>" alt="anh dai dien">
								<?} else{?>
								<img src="/images/job_list/LogoVieclam123.png" alt="Vieclam123.vn" class="img-thumb">
								<?}?>  
                                </div>
                            </div>
                            <div class="info_detail">
                                <p class="info_title">
                                    <a href="<?=rewrite_new_detail_link($new['new_alias'],$new['id'])?>"><?=$new['title']?></a>
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
                            
                            

                            <!--=========================  pagination =====================-->
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
                </div>
                <div class="siderbar_right">
                    <div class="box-3">
                        <div class="siderbar-search ">
                            <img src="/images//job_list/search.svg" alt="Tìm kiếm ">
                            <!-- <input type="text" placeholder="Tìm kiếm theo tỉnh thành " name="search "> -->
                            <span>Tìm kiếm theo tỉnh thành </span>
                        </div>
                        <div class="box_list_item">
                            <div class="list-item-search">
                                <button>Hà Nội (103)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Hải Phòng (65)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Bắc Ninh (25)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Đà Nẵng (105)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Thanh Hóa (71)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Hồ Chí Minh (135)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Bình Dương (79)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Cần Thơ (88)</button>
                            </div>

                        </div>
                    </div>
                    <div class="box-4">
                        <div class="siderbar-search ">
                            <img src="/images//job_list/search.svg" alt="Tìm kiếm ">
                            <!-- <input type="text" placeholder="Tìm kiếm theo tỉnh thành " name="search "> -->
                            <span>Tìm kiếm theo quận / huyện</span>
                        </div>
                        <div class="box_list_item">
                            <div class="list-item-search">
                                <button>Quận Thanh Xuân (103)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Quận Hà Đông (65)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Quận Bắc Từ Liêm (25)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Quận Nam Từ Liêm (105)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Quận Cầu Giấy (71)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Quận Hai Bà Trưng (80)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Quận Hoàng Mai (135)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Quận Long Biên (79)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Huyện Sóc Sơn (88)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Huyện Thạch Thất (18)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Huyện Đông Anh (28)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Huyện Thường Tín (0)</button>
                            </div>
                            <div class="list-item-search">
                                <button>Huyện Phúc Thọ (0)</button>
                            </div>

                        </div>
                    </div>
                    <div class="box-5" class="keywords ">
                        <div class="siderbar-search flex ">
                            <img src="/images/job_list/keywords.svg " alt="Tìm kiếm ">
                            <!-- <input type="text " placeholder="Tìm kiếm theo tỉnh thành " name="search "> -->
                            <span>Từ khóa phổ biến </span>
                        </div>
                        <div class="box_list_item">
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
                </div>
            </div>



            <!-- kết  thúc sidebar -->

        </div>

    </div>
    <!-- Ket thuc noi dung -->
