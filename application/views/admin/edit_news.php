<style type="text/css">
    /*.ugs_avatar{display: none !important;}*/
    .user-img .avt{border-radius:50%;}
</style>
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Sửa
        <small>Việc làm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Việc làm</a></li>
        <li><a href="#">Sửa</a></li>
      </ol>
    </section>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                
				<form>
                <div class="form_input">
				<input hidden id="news_id" value="<?=$news['id']?>">
				<input hidden id="company_id" value="<?=$news['company_id']?>">
                    <div class="row">
                        <div class="center">
                            <label for="title">
                                <span>Tiêu đề</span>
                                <span class="warning">*</span>
                            </label>
                            <input type="text" name="title" id="title" placeholder="Nhập tiêu đề tin tuyển dụng" value="<?=$news['title']?>">
                            <p class="warning" id="error_title"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_style">
                                    <span>Loại hình dịch vụ</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="job_style" id="job_style">
                                    <option></option>
                                    <? foreach ($list_job_style as $job) {
										if ($job['id'] == $news['job_style_id']) { ?>
											<option value="<?= $job['id'] ?>" selected><?= $job['content'] ?></option>
										<? } else { ?>
											<option value="<?= $job['id'] ?>"><?= $job['content'] ?></option>
									<? }
									}
									?>
                                </select>
                            <p class="warning" id="error_job_style"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_style">
                            <span>Tuổi</span>
                            <span class="warning">*</span>
                        </label>
                            <div id="menu_age" style="width:100%">
                                <input class="range_age" type="text" id="range_age" min="<?=$news['age_from']?>" max="<?=$news['age_to']?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="left">
                            <label for="experience">
                                    <span>Kinh nghiệm</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="experience" id="experience">
							<?
									switch ($news['exp']) {
										case '1':
											echo '<option value="0">Chưa có kinh nghiệm</option>
												<option value="1" selected>Dưới 1 năm</option>
												<option value="2">1-2 năm</option>
												<option value="3">3-5 năm</option>
												<option value="4">6-9 năm</option>
												<option value="5">Trên 10 năm</option>';
											break;
										case '2':
											echo '<option value="0">Chưa có kinh nghiệm</option>
												<option value="1">Dưới 1 năm</option>
												<option value="2" selected>1-2 năm</option>
												<option value="3">3-5 năm</option>
												<option value="4">6-9 năm</option>
												<option value="5">Trên 10 năm</option>';
											break;
										case '3':
											echo '<option value="0">Chưa có kinh nghiệm</option>
												<option value="1">Dưới 1 năm</option>
												<option value="2">1-2 năm</option>
												<option value="3" selected>3-5 năm</option>
												<option value="4">6-9 năm</option>
												<option value="5">Trên 10 năm</option>';
											break;
										case '4':
											echo '<option value="0">Chưa có kinh nghiệm</option>
												<option value="1">Dưới 1 năm</option>
												<option value="2">1-2 năm</option>
												<option value="3">3-5 năm</option>
												<option value="4" selected>6-9 năm</option>
												<option value="5">Trên 10 năm</option>';
											break;
										case '5':
											echo '<option value="0">Chưa có kinh nghiệm</option>
												<option value="1">Dưới 1 năm</option>
												<option value="2">1-2 năm</option>
												<option value="3">3-5 năm</option>
												<option value="4">6-9 năm</option>
												<option value="5" selected>Trên 10 năm</option>';
											break;
										default:
											echo '<option value="0" selected>Chưa có kinh nghiệm</option>
												<option value="1">Dưới 1 năm</option>
												<option value="2">1-2 năm</option>
												<option value="3">3-5 năm</option>
												<option value="4">6-9 năm</option>
												<option value="5">Trên 10 năm</option>';
											break;
									}
									?>
                                </select>
                            <p class="warning" id="error_experience"></p>
                        </div>
                        <div class="right">
                            <label for="education">
                                    <span>Trình độ học vấn</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="education" id="education">
							<?
									switch ($news['edu']) {
										case '1':
											echo '<option value="0">Không có bằng cấp</option>
												<option value="1" selected>THCS</option>
												<option value="2">THPT</option>
												<option value="3">Cao đẳng</option>
												<option value="4">Đại học</option>';
											break;
										case '2':
											echo '<option value="0">Không có bằng cấp</option>
												<option value="1">THCS</option>
												<option value="2">THPT</option>
												<option value="3">Cao đẳng</option>
												<option value="4" selected>Đại học</option>';
											break;
										case '3':
											echo '<option value="0">Không có bằng cấp</option>
												<option value="1">THCS</option>
												<option value="2">THPT</option>
												<option value="3" selected>Cao đẳng</option>
												<option value="4">Đại học</option>';
											break;
										case '4':
											echo '<option value="0">Không có bằng cấp</option>
												<option value="1">THCS</option>
												<option value="2">THPT</option>
												<option value="3">Cao đẳng</option>
												<option value="4" selected>Đại học</option>';
											break;
										default:
											echo '<option value="0" selected>Không có bằng cấp</option>
												<option value="1">THCS</option>
												<option value="2">THPT</option>
												<option value="3">Cao đẳng</option>
												<option value="4">Đại học</option>';
											break;
									}
									?>
                                </select>
                            <p class="warning" id="error_education"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="left">
                            <label for="province">
                                    <span>Tỉnh/Thành phố</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="province" id="province">
							<? foreach ($list_city as $city) { 
										if($city['cit_id']==$news['city_id']){?>
										<option value="<?= $city['cit_id'] ?>" selected><?= $city['cit_name'] ?></option>
									<? } else{ ?>
										<option value="<?= $city['cit_id'] ?>"><?= $city['cit_name'] ?></option>
										<?}}?>
                                </select>
                            <p class="warning" id="error_province"></p>
                        </div>
                        <div class="right">
                            <label for="district">
                                    <span>Quận/Huyện</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="district" id="district">
							<? foreach ($list_district as $district) { 
										if($district['cit_id']==$news['district_id']){?>
										<option value="<?= $district['cit_id'] ?>" selected><?= $district['cit_name'] ?></option>
									<? } else{ ?>
										<option value="<?= $district['cit_id'] ?>"><?= $district['cit_name'] ?></option>
										<?}}?>
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
                            <input type="text" name="address" id="address" placeholder="Nhập địa chỉ cụ thể" value="<?=$news['address']?>">
                            <p class="warning" id="error_address"></p>
                        </div>
                        <div class="right">
                            <label for="stay">
                                    <span>Ở cùng chủ nhà</span>
                                    <span class="warning">*</span>
                                </label>
                            <select name="stay" id="stay">
							<? foreach ($list_work_type as $work_type) { 
										if($work_type['id']==$news['work_type_id']){?>
											<option value="<?= $work_type['id'] ?>" selected><?= $work_type['work_name'] ?></option>
										<?}else{?>
											<option value="<?= $work_type['id'] ?>"><?= $work_type['work_name'] ?></option>
									<? } }?>
                                </select>
                            <p class="warning" id="error_district"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="address">
                                <span>Mức lương ước lượng</span>
                                <span class="warning">*</span>
                            </label>
                            <div class="sal_opt">
                                <input type="radio" name="sal_option" id="static_sal_btn" value="0" <?if($news['salary_type']==0) echo 'checked'?>>
                                <input type="radio" name="sal_option" value="1" id="dynamic_sal_btn" <?if($news['salary_type']==1) echo 'checked'?>>
                                <label for="static_sal_btn" class="option static_sal_btn">
                                    <span>Cố định</span>
                                </label>
                                <label for="dynamic_sal_btn" class="option dynamic_sal_btn">
                                    <span>Ước lượng</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row_sal dynamic_sal" id="sal_dynamic" <?if($news['salary_type']==0) echo 'style="display: none;"'?>>
                        <div class="left" id="dynamic">
                            <div class="sal_from">
                                <label for="sal_from">Từ</label>
                                <div>
                                    <input type="text" name="sal_from" id="sal_from" value="<?=$news['salary1']?>">
                                    <div class="text"><span>VND</span></div>
                                </div>
                            </div>
                            <div class="sal_to">
                                <label for="sal_to">Đến</label>
                                <div>
                                    <input type="text" name="sal_to" id="sal_to" value="<?=$news['salary2']?>">
                                    <div class="text"><span>VND</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="middle">
                            /
                        </div>
                        <div class="right">
                            <select name="sal_time" id="sal_time_dynamic">
									<option value="3" <?if($news['salary_time']==3) echo 'selected'?>>Giờ</option>
									<option value="2" <?if($news['salary_time']==2) echo 'selected'?>>Tuần</option>
									<option value="1" <?if($news['salary_time']==1) echo 'selected'?>>Tháng</option>
                                </select>
                        </div>
                    </div>
                    <div class="row_sal static_sal" id="sal_static" <?if($news['salary_type']==1) echo 'style="display: none;"'?>>
                        <div class="left" id="static">
                            <input type="text" name="sal" id="sal" value="<?=$news['salary1']?>">
                            <div class="text"><span>VND</span></div>
                        </div>
                        <div class="middle">
                            /
                        </div>
                        <div class="right">
                            <select name="sal_time" id="sal_time_static">
									<option value="3" <?if($news['salary_time']==3) echo 'selected'?>>Giờ</option>
									<option value="2" <?if($news['salary_time']==2) echo 'selected'?>>Tuần</option>
									<option value="1" <?if($news['salary_time']==1) echo 'selected'?>>Tháng</option>
                                </select>
                        </div>
                    </div>
                    <p class="warning" id="error_sal"></p>
                    <div class="row">
                        <div class="left">
                            <label for="day_start">
                                <span>Ngày bắt đầu làm việc</span>
                                <span class="warning">*</span>
                            </label>
                            <input type="date" name="day_start" id="day_start" value="<?=date('Y-m-d',$news['start_time'])?>">
                            <p class="warning" id="error_day_start"></p>
                        </div>
                        <div class="right">
                            <label for="day_close">
                                    <span>Thời hạn nhận việc</span>
                                    <span class="warning">*</span>
                                </label>
                            <input type="date" name="day_close" id="day_close" value="<?=date('Y-m-d',$news['close_time'])?>">
                            <p class="warning" id="error_day_close"></p>
                        </div>
                    </div>
                    <!-- lich lam viec -->
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
										<input type="checkbox" class="checkbox_schedule" <? if ($work_schedule['t2_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t2')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($work_schedule['t2_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t2_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $work_schedule['t2_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $work_schedule['t2_ca1_kt'] ?>">
										<button id="add_t2" type="button" <? if ($work_schedule['t2_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t2')"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($work_schedule['t2_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t2_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $work_schedule['t2_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $work_schedule['t2_ca2_kt'] ?>">
											<button type="button" id="minus_t2" onclick="minus_schedule_row('t2')"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t2">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="t3">
								<div class="col_1">
									<label class="container">
										<div class="date">T3</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($work_schedule['t3_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t3')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($work_schedule['t3_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t3_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $work_schedule['t3_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $work_schedule['t3_ca1_kt'] ?>">
										<button id="add_t3" <? if ($work_schedule['t3_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t3')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($work_schedule['t3_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t3_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $work_schedule['t3_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $work_schedule['t3_ca2_kt'] ?>">
											<button id="minus_t3" onclick="minus_schedule_row('t3')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t3">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="t4">
								<div class="col_1">
									<label class="container">
										<div class="date">T4</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($work_schedule['t4_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t4')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($work_schedule['t4_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t4_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $work_schedule['t4_ca1_bd'] ?>" id="t4_am">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $work_schedule['t4_ca1_kt'] ?>">
										<button id="add_t4" <? if ($work_schedule['t4_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t4')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($work_schedule['t4_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t4_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $work_schedule['t4_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $work_schedule['t4_ca2_kt'] ?>">
											<button id="minus_t4" onclick="minus_schedule_row('t4')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t4">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="t5">
								<div class="col_1">
									<label class="container">
										<div class="date">T5</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($work_schedule['t5_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t5')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($work_schedule['t5_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t5_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $work_schedule['t5_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $work_schedule['t5_ca1_kt'] ?>">
										<button id="add_t5" <? if ($work_schedule['t5_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t5')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($work_schedule['t5_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t5_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $work_schedule['t5_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $work_schedule['t5_ca2_kt'] ?>">
											<button id="minus_t5" onclick="minus_schedule_row('t5')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t5">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="t6">
								<div class="col_1">
									<label class="container">
										<div class="date">T6</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($work_schedule['t6_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t6')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($work_schedule['t6_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t6_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $work_schedule['t6_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $work_schedule['t6_ca1_kt'] ?>">
										<button id="add_t6" <? if ($work_schedule['t6_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t6')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($work_schedule['t6_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t6_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $work_schedule['t6_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $work_schedule['t6_ca2_kt'] ?>">
											<button id="minus_t6" onclick="minus_schedule_row('t6')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t6">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="t7">
								<div class="col_1">
									<label class="container">
										<div class="date">T7</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($work_schedule['t7_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('t7')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($work_schedule['t7_ca1_bd']) { ?>
									<div class="col_2 col_time" id="t7_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $work_schedule['t7_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $work_schedule['t7_ca1_kt'] ?>">
										<button id="add_t7" <? if ($work_schedule['t7_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('t7')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($work_schedule['t7_ca2_bd']) { ?>
										<div class="col_3 col_time" id="t7_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $work_schedule['t7_ca2_bd'] ?>">
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $work_schedule['t7_ca2_kt'] ?>">
											<button id="minus_t7" onclick="minus_schedule_row('t7')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_t7">Tôi không làm việc</div>' ?>
							</div>
							<div class="schedule_row" id="cn">
								<div class="col_1">
									<label class="container">
										<div class="date">CN</div>
										<input type="checkbox" class="checkbox_schedule" <? if ($work_schedule['t8_ca1_bd']) echo 'checked' ?> onchange="hide_schedule_row('cn')">
										<span class="checkmark"></span>
									</label>
								</div>
								<? if ($work_schedule['t8_ca1_bd']) { ?>
									<div class="col_2 col_time" id="cn_am">
										<span>Từ</span>
										<input type="text" class="time start" value="<?= $work_schedule['t8_ca1_bd'] ?>">
										<span>Đến</span>
										<input type="text" class="time end" value="<?= $work_schedule['t8_ca1_kt'] ?>">
										<button id="add_cn" <? if ($work_schedule['t8_ca2_bd']) echo 'hidden' ?> onclick="add_schedule_row('cn')" type="button"><img src="/images/add_schedule.svg" alt="them lich"></button>
									</div>
									<? if ($work_schedule['t8_ca2_bd']) { ?>
										<div class="col_3 col_time" id="cn_pm">
											<span>Từ</span>
											<input type="text" class="time start" value="<?= $work_schedule['t8_ca2_bd'] ?>" name='cn_pm_start'>
											<span>Đến</span>
											<input type="text" class="time end" value="<?= $work_schedule['t8_ca2_kt'] ?>">
											<button id="minus_cn" onclick="minus_schedule_row('cn')" type="button"><img src="/images/clear_schedule.svg" alt="xoa lich"></button>
										</div>
								<? }
								} else echo '<div class="schedule_msg" id="schedule_msg_cn">Tôi không làm việc</div>' ?>
							</div>
						</div>
                    <!-- het lich lam viec -->
                    <div class="row">
                        <div class="center">
                            <label for="job_detail"><span><img src="/images/job_detail.svg" alt="mo ta cong viec"></span><span>Mô tả công việc</span></label>
                            <textarea name="" id="job_detail" placeholder="Mô tả chi tiết công việc"><?=$news['description']?></textarea>
                            <p class="warning" id="error_job_detail"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_require"><span><img src="/images/job_require.svg" alt="yeu cau cong viec"></span><span>Yêu cầu công việc</span></label>
                            <textarea name="" id="job_require" placeholder="Nhà tuyển dụng đặt ra những yêu cầu gì với người giúp việc?"><?=$news['request']?></textarea>
                            <p class="warning" id="error_job_require"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="center">
                            <label for="job_benefit"><span><img src="/images/job_benefit.svg" alt="yeu cau cong viec"></span><span>Quyền lợi</span></label>
                            <textarea name="" id="job_benefit" placeholder="Người giúp việc sẽ được hưởng những quyền lợi gì?"><?=$news['interest']?></textarea>
                            <p class="warning" id="error_job_benefit"></p>
                        </div>
                    </div>
                    <div class="box_btn">
                        <button class="update" onclick="submit_post()" type="button">Cập nhật</button>
                    </div>
                </div>
            </form>

                </div>
            </div>
        </div>
    </div>
</div>
