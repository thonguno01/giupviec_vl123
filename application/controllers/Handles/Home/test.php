
<?$html='<div class="item_parent">';
					$datediff=floor(($new['update_at']-$timenow)/$dayms);
						if(abs($datediff)<3){
						$html.='<div class="new_job">
                            <img src="/images/job_list/New.svg" alt="LogoVieclam123">
                        </div>';
						}
						if (!isset($_SESSION['user'])||$_SESSION['user']['user_type']!=0) {
    								$html.='<button class="star_prominent btn_like_'.$new['new_id'].'" type="button" onclick="action_popup_login()">
    									<img src="/images/like_star.svg" alt="them vao yeu thich">
    								</button>';
    								} else {
									if ($_SESSION['user']['user_type'] == 0) {
										if (!in_array($new['new_id'], $list_new_save)) {
    										$html.='<button class="star_prominent btn_like_'. $new['new_id'] .'" type="button" onclick="action_save('.$new['new_id'].')">
    											<img src="/images/like_star.svg" alt="them vao yeu thich">
    										</button>';
    									} else {
    										$html.='<button class="star_prominent liked btn_like_'.$new['new_id'].'" type="button" onclick="action_save('.$new['new_id'].')">
    											<img src="/images/like_star_full.svg" alt="them vao yeu thich">
    										</button>';
    							}
									}
								}
                        $hrml.='<div class="info flex">
                            <div class="image">
                                <div class="border_radius">';
								if($new['image']){
									$html.='<img src="'. rewirte_company_img_href($new['company_id'], $new['image']) .'" alt="anh dai dien">';
								} else{
								$html.='<img src="/images/job_list/LogoVieclam123.png" alt="Vieclam123.vn" class="img-thumb">';
								}
                                $html.='</div>
                            </div>
                            <div class="info_detail">
                                <p class="info_title">
                                    <a href="'.rewrite_new_detail_link($new['new_alias'],$new['new_id']).'">'.$new['title'].'</a>
                                </p>

                                <div class="item-child flex">
                                    <div class="item-child-1 flex address">
                                        <span class="icon icon_location"><img src="/images/job_list/address.svg" alt="Địa chỉ"></span>
                                        <span class="span_add">'.$new['cit_name'].'</span>
                                    </div>
                                </div>

                                <div class="item-child flex">
                                    <div class="item-child-1 flex job">
                                        <span class="icon icon_job_style"><img src="/images/job_list/job.svg" alt="Công việc"></span>
                                        <span class="span_job">'.$new['job_style'].'</span>
                                    </div>
                                    <div class="item-child-2 money">
                                        <span class="icon icon_salary"><img src="/images/job_list/money.svg" alt="Lương"></span>
                                        <span class="span_money">';
										if ($new['salary_type'] == 0) $html.= number_format($new['salary1'], 0, '', '.') . 'vnđ';
																		else $html.= (number_format($new['salary1'], 0, '', '.') . ' - ' . number_format($new['salary2'], 0, '', '.') . 'vnđ');
																		switch ($new['salary_time']) {
																			case '1':
																				$html.= '/Tháng';
																				break;
																			case '2':
																				$html.= '/Tuần';
																				break;
																			case '3':
																				$html.= '/Giờ';
																				break;
																			default:
																				break;
																		}
										$html.='</span>
                                    </div>
                                </div>
                                <div class="item-child flex">
                                    <div class=" item-child-1 flex exp">
                                        <span class="icon icon_exp"><img src="/images/job_list/exp.svg" alt="Kinh nghiệm"></span>
                                        <span class="span_exp">Kinh nghiệm: <strong>';
										switch ($new['exp']) {
															case '0':
																$html.= 'Không yêu cầu';
																break;
															case '1':
																$html.= 'Dưới 1 năm';
																break;
															case '2':
																$html.= '1-2 năm';
																break;
															case '3':
																$html.= '3-5 năm';
																break;
															case '4':
																$html.= '6-9 năm';
																break;
															case '5':
																$html.= 'Trên 10 năm';
																break;
															default:
																break;
														}
									$html.='</strong></span>
                                    </div>
                                    <div class="age">
                                        <span class="icon icon_birthday"><img src="/images/job_list/age.svg" alt="Độ tuổi"></span>
                                        <span class="span_age"><strong>'.$new['age_from'].' - '. $new['age_to'].' </strong>tuổi</span>
                                    </div>
                                </div>
                                <div class="item-child flex">
                                    <div class="item-child-1 flex star">
                                        <span class="icon icon_job_location"><img src="/images/job_list/start.svg" alt="Địa chỉ làm việc"></span>
                                        <span class="span_star">'.$new['work_name'].'</span>
                                    </div>

                                </div>
                                <div class="calendar flex">
                                    <div class="radius ';
									if ($new['t2_ca1_bd']) $html.= 'active'; else $html.= 'non_active' ;
									$html.='">
                                        <span class="">T2</span>
                                    </div>
                                    <div class="radius ';
									if ($new['t3_ca1_bd']) $html.= 'active'; else $html.= 'non_active';
									$html.='">
                                        <span class="">T3</span>
                                    </div>
                                    <div class="radius ';
									if ($new['t4_ca1_bd']) $html.= 'active'; else $html.= 'non_active';
									$html.='">
                                        <span class="">T4</span>
                                    </div>
                                    <div class="radius ';
									if ($new['t5_ca1_bd']) $html.= 'active'; else $html.= 'non_active';
									$html.='">
                                        <span class="">T5</span>
                                    </div>
                                    <div class="radius ';
									if ($new['t6_ca1_bd']) $html.= 'active'; else $html.= 'non_active';
									$html.='">
                                        <span class="">T6</span>
                                    </div>
                                    <div class="radius ';
									if ($new['t7_ca1_bd']) $html.= 'active'; else $html.= 'non_active';
									$html.='">
                                        <span class="">T7</span>
                                    </div>
                                    <div class="radius ';
									if ($new['t8_ca1_bd']) $html.= 'active'; else $html.= 'non_active';
									$html.='">
                                        <span class="">CN</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <p>'.$new['description'].'</p>
                        </div>
                    </div>';
?>
